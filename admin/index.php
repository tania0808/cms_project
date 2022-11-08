<?php
ob_start();
session_start(); ?>

<?php
if((!isset($_SESSION['user_role'])) || ($_SESSION['user_role'] === "Subscriber")) {
    header('Location: ../index.php');
}

?>
<?php include_once 'templates/head.php'; ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once 'templates/admin_navbar.php'?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>
                                <?php echo $_SESSION['username'];?>
                            </small>
                        </h1>

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
