<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");

$id = se($_GET, "id", 0,false);
$db = getDB();
$stmt = $db->prepare("SELECT * FROM Products WHERE id = :id");
try {
    $stmt->execute([":id"=> $id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo "<pre>" . var_export($r, true) . "</pre>";
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}


$quantity = se($_POST, "quantity", "", false);
if (isset($_POST["quantity"])){
    $item_id = se($_POST, "itid", "",false);
    $user_id = get_user_id();
    $unit_price = se($_POST, "itprice", "",false);

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


?>
<?php foreach ($results as $item) : ?>
    <div class="col">
        <div class="card bg-dark">
            <div class="card-header">
                Placeholder
            </div>
            <?php if (se($item, "image", "", false)) : ?>
                <img src="<?php se($item, "image"); ?>" class="card-img-top" alt="...">
            <?php endif; ?>

            <div class="card-body">
                <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
            </div>
            <div class="card-footer">
                Description: <?php se($item, "description"); ?>
            </div>
            <div class="card-footer">
                Cost: <?php se($item, "unit_price"); ?>
                <?php if (is_logged_in()):?>
                    <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
                        <label for="quantity">Quantity :</label>
                        <input type="number" id="quantity" name="quantity" min="0" max="<?php se($item, "stock"); ?>">
                        <input class="btn btn-primary" type="submit" value="Add to cart" />
                        <input type="hidden" id="itid" name="itid" value= <?php se($item, "id");?>>
                        <input type="hidden" id="itprice" name="itprice" value= <?php se($item, "unit_price");?>>
                        <!-- <input type="button" onclick="alert('Added to the Shopping Cart')" name="Add_cart" value="Add to Cart"> -->
                        <!-- <button onclick="purchase('<?php se($item, 'id'); ?>','<?php se($item, 'unit_price'); ?>','<?php se($item, 'quantity'); ?>')" class="btn btn-primary">Add to Cart</button> -->
                    </form>
                <?php endif; ?>
            </div>
        </div>
<?php endforeach; ?>

<?php
require_once(__DIR__ . "/../../partials/footer.php");
?>