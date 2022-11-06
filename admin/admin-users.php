<?php
include_once '../includes/functions.php';

if(isset($_GET['delete_id'])){
deleteUser($_GET['delete_id']);
header("Location: admin-users.php");
}
?>
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
                    <h1 class="page-header">
                        Admin Users
                        <small>Author</small>
                    </h1>
                    <?php
                        include_once '../includes/functions.php';
                        $users = getAllUsers();
                        if (count($users) === 0) {
                            echo '<h3 style="margin-bottom: 4rem">There are no users !</h3>';
                        } else { ?>

                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Role</th>
                            <th>Approve</th>
                            <th>Disapprove</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                    <?php
                        foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user['user_id'] ?></td>
                                <td><?php echo $user['user_name'] ?></td>
                                <td><?php echo $user['user_first_name'] ?></td>
                                <td><?php echo $user['user_last_name'] ?></td>
                                <td><?php echo $user['user_email'] ?></td>
                                <td>
                                    <img class="img-responsive"
                                         src="<?php echo '../images/' . $user['user_image']?>" alt="">
                                </td>
                                <td><?php echo $user['user_role'] ?></td>
                                <td><a href="admin-comments.php?user_id=<?php echo $user['user_id']?>&action=<?php echo 'Approve' ?>">Approve</a></td>
                                <td><a href="admin-comments.php?user_id=<?php echo $user['user_id']?>&action=<?php echo 'Disapprove' ?>">Disapprove</a></td>
                                <td><a href="admin-comments.php?delete_id=<?php echo $user['user_id'] ?>">Delete</a></td>
                            </tr>
                        <?php }

                        }
                        ?>
                        </tbody>
                    </table>

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