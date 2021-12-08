<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");

if (!is_logged_in()) {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM Customer_Cart");
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
    }

    die(header("Location: $BASE_PATH" . "home.php"));
}
if (isset($_POST["remove"])){
    $item_id = se($_POST,"itid","",false);
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM Customer_Cart WHERE item_id = :item_id");
    try {
        $stmt->execute([":item_id"=>$item_id]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
        }
}

if (isset($_POST["clear"])){
    $db = getDB();
    $stmt = $db->prepare("TRUNCATE table Customer_Cart");
    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
        }
}

if (isset($_POST["quantity"])&& isset($_POST["update"]) ){
    $quantity = se($_POST,"quantity","",false);
    $item_id = se($_POST,"itid","",false);
    $db = getDB();
    if ($quantity!=0){
        $qr = $db->prepare("UPDATE Customer_Cart SET quantity = :quantity WHERE item_id = :item_id");
        try {
            $qr->execute([":quantity"=>($quantity),":item_id"=>$item_id]);
            flash("Quantity updated");
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
    else{
        $stmt = $db->prepare("DELETE FROM Customer_Cart WHERE item_id = :item_id");
        try {
            $stmt->execute([":item_id"=>$item_id]);
            flash("Item removed");
        } catch (PDOException $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
            }
    }

}

$db = getDB();
$stmt = $db->prepare("SELECT SUM(quantity) FROM Customer_Cart GROUP BY item_id , user_id");
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
    }


$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT c.item_id, p.name, p.description, p.category, c.quantity, c.unit_price from Products p join Customer_Cart c ON p.id = c.item_id");
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
    }
?>
<div class="container-fluid">
    <h1>Shopping Cart</h1>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <?php $total = 0;?>
        <table class="table text-light">
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <th><?php se($column); ?></th>
                        <?php endforeach; ?>
                        <th>Subtotal</th>
                        <th>Edit Quantity</th>
                        <th>Remove</th>
                        <th>Details</th>

                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        
                        <td><?php se($value, null, "N/A"); ?></td>
                    <?php endforeach; ?>
                    <td>
                        <?php
                        $subtot = se($record, "unit_price", "",false) * se($record, "quantity", "",false);
                        echo $subtot."$"; 
                        $total += $subtot ;
                        ?>
                    </td>
                    <td>
                        <form method="POST" id = "updateQuantity" class="row row-cols-lg-auto g-3 align-items-center">
                        <input type="number" id="quantity" name="quantity" min="0" max="10000" required="required">
                        <input class="btn btn-primary" type="submit" name = "update" id = "update" value= "UPDATE" />
                        <input type="hidden" id="itid" name="itid" value= <?php se($record, "item_id");?>>
                        </form>
                        
                    </td>


                    <td>
                        <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
                        <input class="btn btn-primary" type="submit" name = "remove" id="remove" value= "remove" />
                        <input type="hidden" id="itid" name="itid" value= <?php se($record, "item_id");?>>
                        </form>
                    </td>

                    <td>
                        <a href="product_info.php?id=<?php se($record, "item_id"); ?>">More info</a>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <div>
            <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
            <input class="btn btn-primary" name="clear" type="submit" value= "Clear Cart"/>
        </div>
        <br>
        <div>TOTAL: <?php echo $total?>$</div>
    <?php endif; ?>
</div>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/footer.php");
?>