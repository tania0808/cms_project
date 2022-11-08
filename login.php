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

    $db_username = $user['user_name'];
    $db_user_password = $user['user_password'];
    $db_first_name = $user['user_first_name'];
    $db_last_name = $user['user_last_name'];
    $db_user_role = $user['user_role'];
    echo $db_user_role;

    if ($username !== $db_username && $password !== $db_user_password) {
        header('Location: ../index.php');
    } else if ($username == $db_username && $password == $db_user_password) {
        header('Location: CMS_Project/admin/index.php');
        $_SESSION['username'] = $db_username;
        $_SESSION['first_name'] = $db_first_name;
        $_SESSION['last_name'] = $db_last_name;
        $_SESSION['user_role'] = $db_user_role;
    } else {
        header('Location: CMS_Project/index.php');
    }
}