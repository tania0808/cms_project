<?php
include_once '../includes/functions.php';
if(isset($_GET['id'])) deleteCategory($_GET['id']);
?>

<?php include_once 'templates/head.php'; ?>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Top Menu Items -->
        <?php include_once 'templates/admin_header.php'; ?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include_once 'templates/admin_sidebar_menu.php'; ?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin page
                        <small>Author</small>
                    </h1>
                    <div class="col-xs-6">
                        <?php
                        include_once '../includes/functions.php';
                        if (isset($_POST['submit'])){
                            $catTitle = $_POST['cat_title'];
                            if($catTitle == "" || empty($catTitle)) {
                                echo 'This field should not be empty !!! 😇';
                            } else {
                                addCategory();
                            }
                        }
                        ?>
                        <form action="categories.php" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Add Category</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category title</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php include_once '../includes/functions.php';
                            include_once '../includes/db_connection.php';

                            $categories = getCategories();

                            foreach ($categories as $category) { ?>

                                <tr>
                                    <td><?php echo $category['category_id']; ?></td>
                                    <td><?php echo $category['category_title']; ?></td>
                                    <td><a href="categories.php?id=<?php echo $category['category_id']?>">delete</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

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