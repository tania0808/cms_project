<?php
include_once '../includes/functions.php';

if(isset($_GET['id'])){
    deleteCategory($_GET['id']);
    header("Location: categories.php");
}


if (isset($_POST['edit'])) {
    editCategory($_GET['edit_id'], trim($_POST['new_title']));
    header("Location: categories.php");
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
                        Welcome to admin page
                        <small>Author</small>
                    </h1>
                    <?php include_once 'templates/forms.php'; ?>

                    <!--All Categories List -->
                    <?php include_once 'templates/categories_list.php'; ?>

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