<?php
include_once '../includes/functions.php'; ?>

<?php include_once 'templates/head.php'; ?>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once 'templates/admin_navbar.php'; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <?php
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $user = getOneUser($user_id);
            }


            if (isset($_POST['update_profile'])) {
                updateUser($user_id);
                header('Location: profile.php');
            }

            ?>
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $user['user_name']; ?></h1>
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
                                    <option value="Subscriber">Subscriber</option>
                                <?php } else { ?>
                                    <option value="Admin">Admin</option>
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
                        <button name="update_profile" style="margin-bottom: 4rem;" type="submit" class="btn btn-primary">Update Profile</button>
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