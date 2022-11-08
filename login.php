<?php session_start();
ob_start();
?>
<?php
include_once 'includes/db_connection.php';
include_once 'includes/functions.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = findUserByUsername($username);
    $db_user_id = $user['user_id'];
    $db_username = $user['user_name'];
    $db_user_password = $user['user_password'];
    $db_first_name = $user['user_first_name'];
    $db_last_name = $user['user_last_name'];
    $db_user_role = $user['user_role'];
    echo $db_user_role;

    if ($username === $db_username && $password === $db_user_password) {
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $db_username;
        $_SESSION['first_name'] = $db_first_name;
        $_SESSION['last_name'] = $db_last_name;
        $_SESSION['user_role'] = $db_user_role;
        header('Location: CMS_Project/admin/index.php');
    } else {
        header('Location: CMS_Project/index.php');
    }
}