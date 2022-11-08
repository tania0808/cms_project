<?php
session_start();
include_once '../includes/functions.php';
if((!isset($_SESSION['user_role'])) || ($_SESSION['user_role'] === "Subscriber")) {
    header('Location: ../index.php');
}

$user = getOneUser($_SESSION['user_id']);
?>
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">CMS Admin</a>
</div>
<ul class="nav navbar-right top-nav">
    <li>
        <a class="navbar-brand" href="../index.php">HOME</a>
    </li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $user['user_name']; ?> <b
                    class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>