<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");

$id = se($_GET, "id", 0,false);
$db = getDB();
$stmt = $db->prepare("SELECT * FROM Products WHERE id = :id");
$results2 = [];
$avg = 0;
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

$db = getDB();
$stmt = $db->prepare("SELECT * FROM Ratings join Users on Ratings.user_id = Users.id WHERE product_id = :id ORDER BY Ratings.created DESC LIMIT 10 ");
// Products p join Customer_Cart o ON p.id = o.item_id
try {
    $stmt->execute([":id"=> $id]);
    $r2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo "<pre>" . var_export($r, true) . "</pre>";
    if ($r2) {
        $results2 = $r2;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}

$db = getDB();
$stmt = $db->prepare("SELECT rating FROM Ratings WHERE product_id = :id ");
try {
    $stmt->execute([":id"=> $id]);
    $r3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo "<pre>" . var_export($r, true) . "</pre>";
    if ($r3) {
        $results3 = $r3;
        $count = count($results3);
        $tot_ratings = 0;
        foreach ($results3 as $item3){
            $temp = (float) se($item3, "rating","",false);
            $tot_ratings = $tot_ratings + $temp;
        }
        $avg = round(($tot_ratings/$count),3);
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}


if (isset($_POST["quantity"])&& isset($_POST["add"])){
    $quantity = (int) se($_POST, "quantity", "", false);
    if ($quantity!=0 && $quantity!=NULL){
        $item_id = se($_POST, "itid", "",false);
        $user_id = get_user_id();
        $unit_price = se($_POST, "itprice", "",false);

        $db = getDB();
        $qr = $db->prepare("SELECT item_id, quantity FROM Customer_Cart WHERE item_id = :item_id");
        try {
            // $stmt->execute([":quantity" => $quantity, ":user_id" => $user_id]);
            $qr->execute([":item_id"=>$item_id]);
            $r = $qr->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }

        if ($r) {  

            $curr_quantity = (int) se($r[0], "quantity", "", false);
            $db = getDB();
            $qr = $db->prepare("UPDATE Customer_Cart SET quantity = :quantity WHERE item_id = :item_id");
            try {
                flash("Added to Shopping Cart");
                $qr->execute([":quantity"=>($quantity+$curr_quantity),":item_id"=>$item_id]);
            } catch (Exception $e) {
                flash("<pre>" . var_export($e, true) . "</pre>");
            }
        }
        else{
            $db = getDB();
            // $qr = $db->prepare("INSERT INTO Customer_Cart (item_id, quantity, user_id, unit_price) VALUES ('122', :quantity, :user_id, '10')");
            $qr = $db->prepare("INSERT INTO Customer_Cart (item_id, quantity, user_id, unit_price) VALUES ( :item_id, :quantity, :user_id, :unit_price)");
            try {
                // $stmt->execute([":quantity" => $quantity, ":user_id" => $user_id]);
                $qr->execute([":quantity"=> $quantity, ":user_id"=>$user_id, ":item_id"=>$item_id, ":unit_price"=>$unit_price]);
                flash("Added to Shopping Cart");

            } catch (Exception $e) {
                flash("<pre>" . var_export($e, true) . "</pre>");
            }
        }
    }
}

if (isset($_POST["comment"])&& isset($_POST["rate"])){
    flash("Your review has been submitted!");
    $item_id = se($_POST, "itid", "",false);
    $user_id = get_user_id();
    $rating = se($_POST, "rate", "",false);
    $comment = se($_POST, "comment", "",false);
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO Ratings (product_id, user_id, rating, comment) VALUES (:product_id, :user_id, :rating, :comment)");
    try {
        $stmt->execute([ ":user_id"=>$user_id, ":product_id"=>$item_id, ":comment"=>$comment, ":rating"=>$rating]);
        die(redirect("shop.php"));
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
    }
}

?>
<?php foreach ($results as $item) : ?>
    <div class="col">
        <h2>Product Name: <?php se($item, "name"); ?></h2>
            <?php if (se($item, "image", "", false)) : ?>
                <img src="<?php se($item, "image"); ?>"  alt="...">
            <?php endif; ?>
            <div >
                Description: <?php se($item, "description"); ?>
            </div>
            <div >
                Cost: <?php se($item, "unit_price"); ?>
                <?php if (is_logged_in()):?>
                    <form method="POST" >
                        <label for="quantity">Quantity :</label>
                        <input type="number" id="quantity" name="quantity" min="0" max="<?php se($item, "stock"); ?>">
                        <input  name= "add" type="submit" value="Add to cart" />
                        <input type="hidden" id="itid" name="itid" value= <?php se($item, "id");?>>
                        <input type="hidden" id="itprice" name="itprice" value= <?php se($item, "unit_price");?>>
                    </form>
                <?php endif; ?>
            </div>
            <hr>
            <div>
                <h2>Rate this Product</h2>
                <form method="POST"  >
                    <label for="rate">Rating :</label>
                    <input type="number" id="rate" name="rate" min="1" max= "5" required="required"><br>
                    Comment:<br>
                    <textarea name="comment" required></textarea><br>
                    <input name= "enter" type="submit" value="Submit" />
                    <input type="hidden" id="itid" name="itid" value= <?php se($item, "id");?>>
                </form>
            </div>
        </div>
<?php endforeach; ?>
<hr>
<h2>Users Ratings</h2>
<?php if ($results2) : ?>
    <div >
        Average Rating: <b><u><?php echo($avg); ?></u></b>
    </div>
        <?php foreach ($results2 as $item2) : ?>
            <?php $curr_rating = (float) se($item2, "rating", "",false); ?>
            <p >
                Rated: <?php echo($curr_rating); ?> /5 | Wrote: " <?php se($item2, "comment"); ?>" | Date Posted :  <?php se($item2, "created"); ?> <br> by the user: 
                <?php $user_id = se($item2, "user_id", 0, false);
                $username = se($item2, "username", "", false);
                include(__DIR__ . "/user_profile_link.php");?>
                <br>
            </p>
        <?php endforeach; ?>
        <div >
        </div>
<?php else : ?>
    <p>No Reviews yet to show</p>
<?php endif; ?>
<?php
require_once(__DIR__ . "/../../partials/footer.php");
?>