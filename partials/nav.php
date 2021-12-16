<?php
//Note: this is to resolve cookie issues with port numbers
$domain = $_SERVER["HTTP_HOST"];
if (strpos($domain, ":")) {
    $domain = explode(":", $domain)[0];
}
$localWorks = false; //some people have issues with localhost for the cookie params
//if you're one of those people make this false

//this is an extra condition added to "resolve" the localhost issue for the session cookie
if (($localWorks && $domain == "localhost") || $domain != "localhost") {
    session_set_cookie_params([
        "lifetime" => 60 * 60,
        "path" => "/Project",
        //"domain" => $_SERVER["HTTP_HOST"] || "localhost",
        "domain" => $domain,
        "secure" => true,
        "httponly" => true,
        "samesite" => "lax"
    ]);
}
session_start();
require_once(__DIR__ . "/../lib/functions.php");


if (!is_logged_in()){
    $db = getDB();
    $stmt = $db->prepare("TRUNCATE table Customer_Cart");
    try {
        $stmt->execute();
    
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e, true) . "</pre>");
        }
}

?>
<!-- include css and js files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.1/font/bootstrap-icons.min.css" integrity="sha512-WYaDo1TDjuW+MPatvDarHSfuhFAflHxD87U9RoB4/CSFh24/jzUHfirvuvwGmJq0U7S9ohBXy4Tfmk2UKkp2gA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php echo get_url('style.css'); ?>">
<script src="<?php echo get_url('helpers.js'); ?>"></script>
<nav class="navbar navbar-expand-lg navbar-light ">
    <ul >
        <?php if (is_logged_in()) : ?>
            <li class="nav-item"><a href="<?php echo get_url('home.php'); ?>">Home</a></li>
            <li class="nav-item"><a href="<?php echo get_url('shop.php'); ?>">Products</a></li>
            <li class="nav-item"><a href="<?php echo get_url('cart.php'); ?>">Shopping Cart</a></li>
            <li class="nav-item"><a href="<?php echo get_url('history.php'); ?>">Purchased</a></li>
            <li class="nav-item"><a href="<?php echo get_url('profile.php'); ?>">Profile</a></li>
        <?php endif; ?>
        <?php if (!is_logged_in()) : ?>
            <li class="nav-item"><a href="<?php echo get_url('login.php'); ?>">Login</a></li>
            <li class="nav-item"><a href="<?php echo get_url('register.php'); ?>">Register</a></li>
            <li class="nav-item"><a href="<?php echo get_url('shop.php'); ?>">Products</a></li>
        <?php endif; ?>
        <?php if (has_role("Admin")|| has_role("Owner")) : ?>
            <li class="nav-item"><a href="<?php echo get_url('admin/create_role.php'); ?>">Create Role</a></li>
            <li class="nav-item"><a href="<?php echo get_url('admin/list_roles.php'); ?>">List Roles</a></li>
            <li class="nav-item"><a href="<?php echo get_url('admin/assign_roles.php'); ?>">Assign Roles</a></li>
            <li class="nav-item"><a href="<?php echo get_url('admin/add_item.php'); ?>">Add Items</a></li>
            <li class="nav-item"><a href="<?php echo get_url('admin/list_item.php'); ?>">List Items</a></li>
            <li class="nav-item"><a href="<?php echo get_url('admin/transactions.php'); ?>">Transactions</a></li>
        <?php endif; ?>
        <?php if (is_logged_in()) : ?>
            <li><a href="<?php echo get_url('logout.php'); ?>">Logout</a></li>
        <?php endif; ?>
        
    </ul>
</nav>