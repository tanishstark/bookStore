<?php
session_start();
session_unset();
session_destroy();
$showAlert = "You are logout";
header("location:/my_book_store/home_page.php?signInSuccess=$showAlert");
