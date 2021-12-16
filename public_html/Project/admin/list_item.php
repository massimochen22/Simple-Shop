<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")&&!has_role("Owner")) {
    flash("You don't have permission to view this page", "warning");
    die(redirect("$BASE_PATH" . "home.php"));
}

$checkBox = se($_GET,"checkbox","",false);

$results = [];
if (isset($_GET["itemName"])) {
    $params =[];
    $db = getDB();
    $query = "SELECT id, name, description, category, stock, unit_price from Products WHERE name like :name ";
    $tot_query = "SELECT count(1) as total FROM Products WHERE name like :name";
    if($checkBox ){
        $query .= " AND stock < 1 ";
        $tot_query .= " AND stock < 1 ";
    }
    $query .= "LIMIT :offset,:count";
    $name = se($_GET, "itemName", "", false);
    $name = "%$name%";
    $params[":name"] = $name;
    paginate($tot_query,$params,10);
    $params[":offset"] = $offset;
    $params[":count"] = 10;
    $stmt = $db->prepare($query);
    foreach ($params as $key => $value) {
        $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
        $stmt->bindValue($key, $value, $type);
    }
    $params = null;
    
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
    $query = "SELECT id, name, description, category, stock, unit_price from Products WHERE 1=1";
    $tot_query = "SELECT count(1) as total FROM Products WHERE 1=1";
    if($checkBox ){
        $query .= " AND stock < 1 ";
        $tot_query .= " AND stock < 1 ";
    }
    $query .= "LIMIT :offset,:count";
    paginate($tot_query,$params,10);
    $params[":offset"] = $offset;
    $params[":count"] = 10;
    $stmt = $db->prepare($query);
    foreach ($params as $key => $value) {
        $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
        $stmt->bindValue($key, $value, $type);
    }
    $params = null;
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
?>
<div >
    <h1>List Items</h1>
    <form >
        <div >
            <input  type="search" name="itemName" placeholder="Item Filter" />
            <input  type="submit" value="Search" />
            <div >
                <label for="checkbox "> Show Out of Stock</label>
                <input id=checkbox type="checkbox" name="checkbox"/>
            </div>
        </div>
    </form>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <table >
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <th><?php se($column); ?></th>
                        <?php endforeach; ?>
                        <th>Actions</th>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <td><?php se($value, null, "N/A"); ?></td>
                    <?php endforeach; ?>


                    <td>
                        <a href="edit_item.php?id=<?php se($record, "id"); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <?php include(__DIR__ . "/../../../partials/pagination.php"); ?>
</div>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/footer.php");
?>