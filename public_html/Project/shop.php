<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];

$db = getDB();
$order = se($_GET, "order", "", false);
$categ = se($_GET, "categ", "", false);

if (isset($_GET["itemName"]) && isset($_GET["order"])&& isset($_GET["categ"])&& isset($_GET["sort"])) {
    $params =[];
    $db = getDB();
    $sort = se($_GET, "sort", "", false);
    $name = se($_GET, "itemName", "", false);
    $name = "%$name%";
    $query = "SELECT id, name, description, unit_price, category, stock, rating from Products WHERE stock > 0 AND visibility = 1 AND name like :name AND category = :categ ORDER BY $sort $order LIMIT :offset,:count"; 
    $total_query = "SELECT count(1) as total FROM Products WHERE stock > 0 AND visibility = 1 AND name like :name AND category = :categ ORDER BY $sort  $order ";
    $params[":name"] = $name;
    $params[":categ"] = $categ;
    paginate($total_query,$params,10);
    $params[":offset"] = $offset;
    $params[":count"] = 10;
    $stmt = $db->prepare($query);
    foreach ($params as $key => $value) {
        $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
        $stmt->bindValue($key, $value, $type);
    }
    $params = null; //set it to null to avoid issues
    try {
        $stmt->execute($params);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
    }
}


else{
    $params =[];
    $db = getDB();
    $query = "SELECT id, name, description, unit_price, category, stock, rating FROM Products WHERE stock > 0 and visibility = 1 LIMIT :offset,:count";
    $total_query = "SELECT count(1) as total FROM Products WHERE stock > 0 AND visibility = 1 ";
    paginate($total_query,$params,10);
    $params[":offset"] = $offset;
    $params[":count"] = 10;
    // $query .= " LIMIT :offset, :count";
    // $total_query .= " LIMIT :offset, :count";
    $stmt = $db->prepare($query);
    foreach ($params as $key => $value) {
        $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
        $stmt->bindValue($key, $value, $type);
    }
    $params = null; //set it to null to avoid issues
    try {
        $stmt->execute($params);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
    }
}
$db = getDB();
$qr = $db->prepare("SELECT DISTINCT category FROM Products WHERE stock > 0 and visibility = 1");
try {
    $qr->execute();
    $r2 = $qr->fetchAll(PDO::FETCH_ASSOC);
    if ($r2) {
        $results2 = $r2;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}
$quantity = (int) se($_POST, "quantity", "", false);
if (isset($_POST["quantity"])&& isset($_POST["add"]) && $quantity!=0 && $quantity!=NULL){
    $item_id = se($_POST, "itid", "",false);
    $user_id = get_user_id();
    $unit_price = se($_POST, "itprice", "",false);

    $db = getDB();
    $qr = $db->prepare("SELECT item_id, quantity FROM Customer_Cart WHERE item_id = :item_id");
    try {
        // $stmt->execute([":quantity" => $quantity, ":user_id" => $user_id]);
        $qr->execute([":item_id"=>$item_id]);
        $r = $qr->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
    }

    if ($r) {  

        $curr_quantity = (int) se($r[0], "quantity", "", false);
        $db = getDB();
        $qr = $db->prepare("UPDATE Customer_Cart SET quantity = :quantity WHERE item_id = :item_id");
        try {
            flash("Added to Shopping Cart");
            $qr->execute([":quantity"=>($quantity+$curr_quantity),":item_id"=>$item_id]);
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
    else{
        $db = getDB();
        // $qr = $db->prepare("INSERT INTO Customer_Cart (item_id, quantity, user_id, unit_price) VALUES ('122', :quantity, :user_id, '10')");
        $qr = $db->prepare("INSERT INTO Customer_Cart (item_id, quantity, user_id, unit_price) VALUES ( :item_id, :quantity, :user_id, :unit_price)");
        try {
            // $stmt->execute([":quantity" => $quantity, ":user_id" => $user_id]);
            $qr->execute([":quantity"=> $quantity, ":user_id"=>$user_id, ":item_id"=>$item_id, ":unit_price"=>$unit_price]);
            flash("Added to Shopping Cart");

        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
}
?>
<div >
    <h1>List Items</h1>
    <form  >
        <div class="input-group ">
            <select name="sort" value="<?php se($_GET, "sort"); ?>">
                <option value="unit_price">Cost</option>
                <option value="Rating">Rating</option>
            </select>
            <select name="order" value="<?php se($_GET, "order"); ?>">
                <option value="asc">ascending</option>
                <option value="desc">descending</option>
            </select>
            <select id="categ" name="categ">
                <?php foreach ($results2 as $item2) : ?>
                    <option value=<?php se($item2, "category");?>> <?php se($item2, "category");?> </option>
                <?php endforeach; ?>
            </select>
            <input class="form-control" type="search" name="itemName" placeholder="Item Name" />
            <input  type="submit" value="Search" />
        </div>
    </form>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <table class="table text-light">
            <?php foreach ($results as $item) : ?>
                <div class="col">
                <div >
                    <div class="card-footer">
                    <div class="card-body">
                        <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                    </div>
                        Average Rating: 
                        <?php 
                        if (!empty(se($item, "rating","",false))){
                            se($item, "rating");
                        }
                        else{
                            echo "N/A";
                        }

                        ?><br>
                        Category: <?php se($item, "category"); ?> <br>
                        Cost: <?php se($item, "unit_price"); ?>$
                        <?php if (is_logged_in()):?>
                            <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
                                <label for="quantity">Quantity :</label>
                                <input type="number" id="quantity" name="quantity" min="0" max="<?php se($item, "stock"); ?>" required="required">
                                <input class="btn btn-primary" name= "add" type="submit" value="Add to cart" />
                                <input type="hidden" id="itid" name="itid" value= <?php se($item, "id");?>>
                                <input type="hidden" id="itprice" name="itprice" value= <?php se($item, "unit_price");?>>

                                <!-- <input type="button" onclick="alert('Added to the Shopping Cart')" name="Add_cart" value="Add to Cart"> -->
                                <!-- <button onclick="purchase('<?php se($item, 'id'); ?>','<?php se($item, 'unit_price'); ?>','<?php se($item, 'quantity'); ?>')" class="btn btn-primary">Add to Cart</button> -->
                            </form>
                        <?php endif; ?>
                        <!-- define quantity -->
                        <div>
                    <a href="product_info.php?id=<?php se($item, "id"); ?>">More info</a>
                    </div>
                    </div>
                    
                </div>
            </div>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <?php include(__DIR__ . "/../../partials/pagination.php"); ?>
</div>

<?php
require(__DIR__ . "/../../partials/footer.php");
?>