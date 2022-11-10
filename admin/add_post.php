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
                            <label for="post_category">Category</label>
                            <select style="width: 300px" name="category" id="" class="form-control">
                                <?php include_once '../includes/functions.php';
                                $categories = getCategories();
                                foreach ($categories as $category) {
                                    echo "<option value={$category['category_id']} >{$category['category_title']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_status">Status</label>
                            <select style="width: 200px;" name="status" id="" class="form-control">
                                <option value="Draft">Draft</option>
                                <option value="Published">Published</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_image">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_tags">Tags</label>
                            <input type="text" name="tags" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_content">Content</label><br>
                            <textarea class="form-control" rows="5" cols="30"></textarea>
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
