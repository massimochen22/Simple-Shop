<?php
session_start();
require(__DIR__ . "/../../lib/functions.php");
reset_session();

header('location: login.php');

header('location: login.php?status=loggedout');
//header("Location: login.php");