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
                <button onclick="purchase('<?php se($item, 'id'); ?>')" class="btn btn-primary">Purchase</button>
            </div>
        </div>
<?php endforeach; ?>