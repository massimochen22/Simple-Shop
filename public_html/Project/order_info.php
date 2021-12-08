<style>
body {text-align: center;}

</style>
<?php
require(__DIR__ . "/../../partials/nav.php");

$id = se($_GET, "id", 0,false);
$results = [];
$totPrice;

$db = getDB();
$stmt = $db->prepare("SELECT p.name, o.item_id, o.quantity, o.user_id, o.unit_price from OrderItems o JOIN Products p ON p.id = o.item_id WHERE order_id = :order_id");
try {
    $stmt->execute([":order_id"=> $id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}

$db = getDB();
$stmt = $db->prepare("SELECT total_price from Orders WHERE id = :order_id");
try {
    $stmt->execute([":order_id"=> $id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $totPrice= se($r[0],"total_price","",false);
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}

?>
<div class="container-fluid">
    </form>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <div>
            <h3>Order Details:</h3>
            Order number: <?php echo $id?>
        </div>
        
        <br>
        <table class="table text-light">
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <th><?php se($column); ?></th>
                        <?php endforeach; ?>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <td><?php se($value, null, "N/A"); ?></td>
                    <?php endforeach; ?>

                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <hr>
        <div>
            Total: <?php echo $totPrice?>$
        </div>
        <br>
        <div id="submit">
            <form action="history.php">        
                    <input class="btn btn-primary" name="Home" type="submit" value= "Go Back"/>
            </form>
        </div>
        
    <?php endif; ?>
</div>
<?php
require_once(__DIR__ . "/../../partials/footer.php");
?>