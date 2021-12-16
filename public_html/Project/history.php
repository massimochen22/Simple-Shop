<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
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
$db = getDB();

//Sort and Filters
$col = se($_GET, "col", "", false);
//allowed list
if (!in_array($col, ["total_price", "created"])) {
    $col = "created"; //default value, prevent sql injection
}
$order = se($_GET, "order", "desc", false);
//allowed list
if (!in_array($order, ["asc", "desc"])) {
    $order = "desc"; //default value, prevent sql injection
}

$start = se($_GET, "start", date("Y-m-d", strtotime("-1 month")), false);
$end = se($_GET, "end", date("Y-m-d"), false);
$category = se($_GET, "category", "", false);
//split query into data and total
// SELECT  distinct Orders.* FROM Orders JOIN OrderItems oi on Orders.id = oi.order_id JOIN Products p on p.id = oi.product_id WHERE p.category = "Test"
$base_query = "SELECT distinct Orders.* FROM Orders JOIN OrderItems oi on Orders.id = oi.order_id JOIN Products p on p.id = oi.item_id WHERE Orders.user_id = :user_id";
$total_query = "SELECT count(1) as total FROM Orders";
//dynamic query
$query = ""; //1=1 shortcut to conditionally build AND clauses
$params = []; //define default params, add keys as needed and pass to execute
//apply name filter
$params[":user_id"] = get_user_id();

if (!empty($category)) {
    $query .= " AND p.category like :categ";
    $params[":categ"] = $category;
}

if ($start) {
    //don't forget to prefix the ambiguous column name
    $query .= " AND Orders.created >= :start";
    $params[":start"] = $start;
}
if ($end) {

    $query .= " AND Orders.created <= :end";
    $params[":end"] = date("Y-m-d 23:59:59", strtotime($end));
}

//apply column and order sort
if (!empty($col) && !empty($order)) {
    $query .= " ORDER BY $col $order"; //be sure you trust these values, I validate via the in_array checks above
}
//paginate function
$per_page = 10;
paginate($total_query . $query, $params, $per_page);

$query .= " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;
//get the records
$stmt = $db->prepare($base_query . $query); //dynamically generated query
//we'll want to convert this to use bindValue so ensure they're integers so lets map our array
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null; //set it to null to avoid issues


//$stmt = $db->prepare("SELECT id, name, description, cost, stock, image FROM BGD_Items WHERE stock > 0 LIMIT 50");
try {
    $stmt->execute($params); //dynamically populated params to bind
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}
?>

<div >
    <h1>My orders</h1>
    <form >
       
        <div >
            <div >
                <div >Category</div>
                <select  name="category" value="<?php se($category); ?>">
                <?php foreach ($results2 as $item2) : ?>
                    <option value=<?php se($item2, "category");?>> <?php se($item2, "category");?> </option>
                <?php endforeach; ?>
                </select>
            </div>
            <span  id="start-date">Start</span>
                <input name="start" type="date" class="form-control" placeholder="mm/dd/yyyy" aria-label="start date" aria-describedby="start-date" value="<?php se($start); ?>">
                <span  >End</span>
                <input name="end" type="date" class="form-control" placeholder="mm/dd/yyyy" aria-label="end date" aria-describedby="end-date" value="<?php se($end); ?>">
        </div>
        <div >
            <div >
                <div >Sort</div>
                <!-- make sure these match the in_array filter above-->
                <select  name="col" value="<?php se($col); ?>">
                    <option value="total_price">Total Cost</option>
                    <option value="created">Created</option>
                </select>
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].col.value = "<?php se($col); ?>";
                </script>
                <select  name="order" value="<?php se($order); ?>">
                    <option value="desc">Down</option>
                    <option value="asc">Up</option>
                </select>
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].order.value = "<?php se($order); ?>";
                </script>
            </div>
        </div>
        <div >
            <div >
                <input type="submit" class="btn btn-primary" value="Apply" />
            </div>
        </div>
    </form>
    <hr>
    <div >
    <table >
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
                        <td>
                            <?php if ($column == "id"): ?>
                                    <a href="order_info.php?id=<?php se($value, null, "N/A"); ?>"> <?php echo se($value, null, "", false);?></a>
                            <?php else: 
                                echo se($value, null, "", false); 
                            ?>
                                    
                            <?php endif?>
                        </td>
                    <?php endforeach; ?>

                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <!-- this will be moved into a partial file for reusability-->
    <?php include(__DIR__ . "/../../partials/pagination.php"); ?>
</div>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>