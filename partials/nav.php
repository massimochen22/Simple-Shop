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
<link rel="stylesheet" href="<?php echo get_url('style.css'); ?>">
<script src="<?php echo get_url('helpers.js'); ?>"></script>
<nav>
    <ul>
        <?php if (is_logged_in()) : ?>
            <li><a href="<?php echo get_url('home.php'); ?>">Home</a></li>
            <li><a href="<?php echo get_url('profile.php'); ?>">Profile</a></li>
            <li><a href="<?php echo get_url('shop.php'); ?>">Products</a></li>
            <li><a href="<?php echo get_url('cart.php'); ?>">Shopping Cart</a></li>
        <?php endif; ?>
        <?php if (!is_logged_in()) : ?>
            <li><a href="<?php echo get_url('login.php'); ?>">Login</a></li>
            <li><a href="<?php echo get_url('register.php'); ?>">Register</a></li>
            <li><a href="<?php echo get_url('shop.php'); ?>">Products</a></li>
        <?php endif; ?>
        <?php if (has_role("Admin")|| has_role("Owner")) : ?>
            <li><a href="<?php echo get_url('admin/create_role.php'); ?>">Create Role</a></li>
            <li><a href="<?php echo get_url('admin/list_roles.php'); ?>">List Roles</a></li>
            <li><a href="<?php echo get_url('admin/assign_roles.php'); ?>">Assign Roles</a></li>
            <li><a href="<?php echo get_url('admin/add_item.php'); ?>">Add Items</a></li>
            <li><a href="<?php echo get_url('admin/list_item.php'); ?>">List Items</a></li>
        <?php endif; ?>
        <?php if (is_logged_in()) : ?>
            <li><a href="<?php echo get_url('logout.php'); ?>">Logout</a></li>
            <span class="navbar-text show-balance">
                Test Placeholder, should get replaced if balance works
            </span>
        <?php endif; ?>
        
    </ul>
</nav>