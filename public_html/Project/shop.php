<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];

$db = getDB();
$order = se($_POST, "order", "", false);
$categ = se($_POST, "categ", "", false);


if (isset($_POST["itemName"]) && isset($_POST["order"])&& isset($_POST["categ"])) {
    $db = getDB();
    $stmt = $db->prepare("SELECT id, name, description, unit_price, category, stock from Products WHERE stock > 0 AND visibility = 1 AND name like :name AND category = '" .$categ. "' ORDER BY unit_price " .$order);

    try {
        $stmt->execute([":name" => "%" . $_POST["itemName"] . "%"]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
    }
}


else{
    $db = getDB();
    $stmt = $db->prepare("SELECT id, name, description, unit_price, category, stock FROM Products WHERE stock > 0 and visibility = 1 LIMIT 10");
    try {
        $stmt->execute();
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


?>
<script>
    function purchase(item) {
        console.log("TODO purchase item", item);
        //TODO create JS helper to update all show-balance elements
    }
</script>

<div class="container-fluid">
    <h1>List Items</h1>
    <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group mb-3">
            <select name="order" value="<?php se($_POST, "order"); ?>">
                <option value="asc">ascending</option>
                <option value="desc">descending</option>
            </select>
            <select id="categ" name="categ">
                <?php foreach ($results2 as $item2) : ?>
                    <option value=<?php se($item2, "category");?>> <?php se($item2, "category");?> </option>
                <?php endforeach; ?>
            </select>
            <input class="form-control" type="search" name="itemName" placeholder="Item Name" />
            <input class="btn btn-primary" type="submit" value="Search" />
        </div>
    </form>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <table class="table text-light">
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
                        Cost: <?php se($item, "unit_price"); ?>
                        <button onclick="purchase('<?php se($item, 'id'); ?>')" class="btn btn-primary">Purchase</button>
                    </div>
                    <div>
                    <a href="product_info.php?id=<?php se($item, "id"); ?>">More info</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<?php
require(__DIR__ . "/../../partials/footer.php");
?>