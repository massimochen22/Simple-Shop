<?php
require(__DIR__ . "/../../partials/nav.php");
reset_session();
?>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se($_POST, "confirm", "", false);
    $username = se($_POST, "username", "", false);
    //TODO 3


    //$errors = [];
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty");
        $hasError = true;
    }
    //$email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = sanitize_email($email);
    //validate
    //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (!is_valid_email($email)) {
        flash("Invalid email");
        $hasError = true;
    }
    if (!preg_match('/^[a-z0-9_-]{3,30}$/i', $username)) {
        flash("Username must only be alphanumeric and can only contain - or _");
        $hasError = true;
    }
    if (empty($password)) {
        flash("password must not be empty");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty");
        $hasError = true;
    }
    if (strlen($password) < 8) {
        flash("Password too short");
        $hasError = true;
    }
    if (strlen($password) > 0 && $password !== $confirm) {
        flash("Passwords must match");
        $hasError = true;
    }
    if ($hasError) {
        //flash("<pre>" . var_export($errors, true) . "</pre>");
    } else {
        //flash("Welcome, $email"); //will show on home.php
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password, username) VALUES(:email, :password, :username)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username]);
            flash("You've registered, yay...");
        } catch (Exception $e) {
            /*flash("There was a problem registering");
            flash("<pre>" . var_export($e, true) . "</pre>");*/
            users_check_duplicate($e->errorInfo);
        }
    }
}
else{
    $email = "";
    $username = "";
}
?>
<?php

?>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>" />
    </div>
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo $username; ?>" />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div>
        <label for="confirm">Confirm</label>
        <input type="password" name="confirm" required minlength="8" />
    </div>
    <input type="submit" value="Register" />
</form>
<script>
    function validate(form) {
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        let isValid = true;
        //TODO add other client side validation....

        //example of using flash via javascript
        //find the flash container, create a new element, appendChild
        if (pw !== con) {
            //find the container
            /*let flash = document.getElementById("flash");
            //create a div (or whatever wrapper we want)
            let outerDiv = document.createElement("div");
            outerDiv.className = "row justify-content-center";
            let innerDiv = document.createElement("div");
            //apply the CSS (these are bootstrap classes which we'll learn later)
            innerDiv.className = "alert alert-warning";
            //set the content
            innerDiv.innerText = "Password and Confirm password must match";
            outerDiv.appendChild(innerDiv);
            //add the element to the DOM (if we don't it merely exists in memory)
            flash.appendChild(outerDiv);*/
            flash("Password and Confirm password must match", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>

