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

                    if(isset($_POST['create_post'])){
                        addPost();
                    }
                    ?>
                    <h1 class="page-header">
                        Add Post
                    </h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_category">Post Category Id</label>
                            <input type="text" name="category" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="author">Post Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_status">Post Status</label>
                            <input type="text" name="status" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_image">Post Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_tags">Post Tags</label>
                            <input type="text" name="tags" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_content">Post Content</label>
                            <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <button name="create_post" style="margin-bottom: 4rem;" type="submit" class="btn btn-primary">Add Post</button>
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
