<?php
session_start();
require(__DIR__ . "/../../lib/functions.php");
reset_session();
flash("Successfully logged out", "success");
header('location: login.php');