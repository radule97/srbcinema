<?php
/**
 * Created by PhpStorm.
 * User: Oliver Queen
 * Date: 8/21/2017
 * Time: 8:32 PM
 */
session_start();
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    session_destroy();
}
header("Location: login.php");