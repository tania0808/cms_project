<?php include_once 'templates/head.php'; ?>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once 'templates/admin_navbar.php'; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <?php include_once '../includes/functions.php';
                    $userId = $_GET['edit_id'];
                    $user = getOneUser($userId);

                    if(isset($_POST['edit_user'])){
                        updateUser($userId);
                        header("Location: admin-users.php");
                    }
                    //echo $_FILES['image']['name'];
                    ?>
                    <h1 class="page-header">
                        Edit a  User
                    </h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" class="form-control" value='<?php echo $user['user_first_name'] ?>'>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" name="last_name" class="form-control" value='<?php echo $user['user_last_name'] ?>'>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select style="width: 200px;" name="role" id="" class="form-control">
                                <option value='<?php echo $user['user_role'] ?>'><?php echo $user['user_role'] ?></option>
                                <?php
                                if ($user['user_role'] === 'Admin') { ?>
                                <option value="subscriber">Subscriber</option>
                                <?php } else { ?>
                                <option value="admin">Admin</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value='<?php echo $user['user_name'] ?>'>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value='<?php echo $user['user_email'] ?>'>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value='<?php echo $user['user_password'] ?>'>
                        </div>
                        <button name="edit_user" style="margin-bottom: 4rem;" type="submit" class="btn btn-primary">Edit User</button>
                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
