<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['user_role']);
session_destroy();
header('Location: ../index.php');