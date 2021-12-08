<style>
h1 {text-align: center;}
#submit{text-align: center}
</style>
<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
$CurrID;
$db = getDB();
$stmt = $db->prepare("SELECT id, total_price from Orders ORDER BY modified DESC LIMIT 1");
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $CurrID = $r;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}

$totPrice = se($CurrID[0],"total_price","",false);

$db = getDB();
$stmt = $db->prepare("SELECT p.name, o.item_id, o.quantity, o.user_id, o.unit_price from OrderItems o JOIN Products p ON p.id = o.item_id WHERE order_id = :order_id");
try {
    $CurrID = se($CurrID[0],"id","",false);
    $stmt->execute([":order_id"=> $CurrID]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}

?>

<div class="container-fluid">
    <h1>Thank You!</h1>
    <hr>
    </form>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <div>
            <h3>Order Details:</h3>
            Order number: <?php echo $CurrID?>
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
        <div id="submit">
            <form action="Home.php">        
                    <input class="btn btn-primary" name="Home" type="submit" value= "Back to Home"/>
            </form>
        </div>
        
    <?php endif; ?>
</div>
<?php
require_once(__DIR__ . "/../../partials/footer.php");
?>

