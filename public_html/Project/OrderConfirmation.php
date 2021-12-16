<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");
$results = [];

$db = getDB();
$stmt = $db->prepare("SELECT item_id, quantity, unit_price from Customer_Cart");
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}

if (isset($_POST["checkout"])){
    $total2 = 0;
    $user_id = get_user_id();
    $db = getDB();
    $stmt = $db->prepare("SELECT o.item_id, p.name, p.stock, o.quantity,p.unit_price as product_price, o.unit_price as cart_price from Products p join Customer_Cart o ON p.id = o.item_id");
    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results2 = $r;
            $i = 0;
            foreach ($results2 as $index => $value){
                $q_a = (int)se($value,"quantity","",false);
                $q_b = (int)se($value,"stock","",false);
                $p_a = (float)se($value,"cart_price","",false);
                $p_b = (float)se($value,"product_price","",false);
                $total2 += $q_a * $p_b;
                if ($q_b < $q_a ){
                    flash("Sorry there are only ".$q_b." unit left for the item '". se($value,"name","",false)."'. Please update the quantity","warning");
                    flash("Redirected to your cart...","warning");
                    $i++;
                }
                
                if ($p_a != $p_b){
                    flash("You have an outdated unit price for the item '". se($value,"name","",false)."'. Please update the quantity","warning");
                    flash("Redirected to your cart...","warning");
                    $i++;
                }
            }
            if ($i != 0){
                die(redirect('cart.php'));
            }
        }
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
    }
    $address = se($_POST,"address","",false).", ".se($_POST,"city","",false).", ".se($_POST,"state","",false).", ".se($_POST,"zip","",false);
    $payment = se($_POST, "order", "", false);
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO Orders (user_id, total_price, adress, payment) VALUES ('$user_id', '$total2', '$address', '$payment') ");
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
    }
    $db = getDB();
    $stmt = $db->prepare("SELECT id FROM Orders ORDER BY modified DESC ");
    $orderID ;
    try {
        $stmt->execute();
        $d = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($d) {
            $orderID = (int)se($d[0],"id","",false);
        }
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
    }

    $db = getDB();
    $stmt = $db->prepare("INSERT INTO OrderItems (item_id, quantity, user_id, unit_price, order_id) SELECT item_id, quantity, user_id, unit_price, :order_id FROM Customer_Cart");
    try {
        $stmt->execute([":order_id"=>$orderID]);
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
    }
    $db = getDB();
    $stmt = $db->prepare("TRUNCATE table Customer_Cart");
    try {
        $stmt->execute();

    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
        }
    

    $db = getDB();
    // $stmt = $db->prepare("UPDATE Products SET p.stock = (p.stock - o.quantity) FROM Products p INNER JOIN OrderItems o ON  o.item_id = p.id");
    $stmt = $db->prepare(
    "UPDATE Products p 
    SET stock = (stock - (SELECT quantity from OrderItems o where o.item_id = p.id and o.order_id = :order_id)) 
    where p.id IN (select item_id from OrderItems where order_id = :order_id)  "
    );
    try {
        $stmt->execute([":order_id"=>$orderID]);
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
    }
    
    flash("Congratulations, your order has been submitted!", "success");
    die(redirect('confirmationPage.php'));
}
?>

<script type="text/javascript">
window.onbeforeunload = function(){
  flash('Are you sure you want to leave?');
};
</script>


<div >
<style>
h1 {text-align: center;}
#submit{text-align: center}
</style>
    <h1>Confirmation</h1>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <?php $total = 0;?>
        <hr>
        <h2>Order Summary</h2>

        <table >
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <th><?php se($column); ?></th>
                        <?php endforeach; ?>
                        <th>Subtotal</th>
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
                    
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <div><b>TOTAL:</b> <?php echo $total?>$</div>
    
        <hr>
    </div>
    <form method="POST" >
        <div class="row">
            <div class="col-50">
                <h2>Shipping Address</h2>
                <label for="fname"> Full Name</label>
                <input type="text" id="fname" name="firstname" required="required" placeholder="John M. Doe">
                <label for="adr"> Address</label>
                <input type="text" id="adr" name="address"  required="required" placeholder="542 W. 15th Street">
                <label for="city"> City</label>
                <input type="text" id="city" name="city"  required="required" placeholder="New York">
                <div class="row">
                    <div class="col-50">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" required="required" placeholder="NY">
                    </div>
                    <div class="col-50">
                        <label for="zip">Zip</label>
                        <input type="text" id="zip" name="zip" required="required" placeholder="10001">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <h2>Payment</h2>
            Select Payment method:
            <select name="order" value="payment">
                <option value="cash">CASH</option>
                <option value="visa">VISA</option>
                <option value="mastercard">MASTERCARD</option>
                <option value="paypal">PAYPAL</option>
                <option value="amex">AMEX</option>
            </select>
        </div>
        <div>
            <label for="totCost">Input the total cost for confirmation purpose:</label>
            <input  id = "totCost" type="text" name="value" placeholder="Total Cost" required="required" pattern="<?php echo $total?>" title="The value has to match the total cost"/>$
        </div>
        <div id="submit">
            <br>
            <input  type="submit" name = "checkout" value="Check Out" />
        </div>
        
    </form>
    <?php endif; ?>


<?php
require_once(__DIR__ . "/../../partials/footer.php");
?>