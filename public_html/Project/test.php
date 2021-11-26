<?php
require(__DIR__ . "/../../partials/nav.php");
$db = getDB();
//get filters (i.e., distinct categories)
$stmt = $db->prepare("Select id, name from BGD_Items");
try {
    $stmt->execute();
    $available = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    var_export($e);
}
//get chosen filter from form submit
$filter = se($_POST, "filter", "", false);
$sort = se($_POST, "sort", "", false);
$order = se($_POST, "order", "", false);
//run query to get filtered stuff (where category = :cat)
$query = "SELECT inv.*, name FROM BGD_Inventory inv 
join BGD_Items i ON i.id = inv.item_id WHERE i.id = :item or 1=1";
if (!empty($sort)) {
    //TODO sanitize!

    if (in_array($sort, ["name", "cost", "created"])) {
        $query .= " ORDER BY i." . $sort . " $order";
    }
}
$stmt = $db->prepare($query);
try {
    $stmt->execute([":item" => $filter]);
    $items = $stmt->fetchAll();
    echo "<pre>" . var_export($items, true) . "</pre>";
} catch (PDOException $e) {
    var_export($e);
}
?>
<form method="POST">
    <select name="sort" value="<?php se($_POST, "sort"); ?>">
        <option value="name">name</option>
        <option value="cost">cost</option>
        <option value="created">created</option>
    </select>
    <select name="order" value="<?php se($_POST, "order"); ?>">
        <option value="asc">asc</option>
        <option value="desc">desc</option>
    </select>
    <select name="filter">
        <?php foreach ($available as $a) : ?>
            <option value="<?php se($a, "id"); ?>"><?php se($a, "name"); ?></option>
        <?php endforeach; ?>

    </select>
    <input type="submit" value="search" />
</form>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>