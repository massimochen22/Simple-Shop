<style>
body {text-align: center;}

</style>

<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT id, total_price, adress, payment, modified from Orders  WHERE user_id = :user_id ORDER BY modified DESC LIMIT 10");
try {
    $stmt->execute([":user_id"=>get_user_id()]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results= $r;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}
?>

<div id= "bod" class="container-fluid">
    </form>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <div>
            <h3>Orders:</h3>
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
        <br>
        <hr>
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