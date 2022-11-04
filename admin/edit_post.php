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
                    $postId = $_GET['edit_id'];
                    $post = getOnePost($postId);

                    if(isset($_POST['edit_post'])){
                        updatePost($postId);
                        header("Location: admin-posts.php");
                    }
                    //echo $_FILES['image']['name'];
                    ?>
                    <h1 class="page-header">
                        Edit Post
                    </h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="old_image_name" value='<?php echo $post['post_image'] ?>'>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value='<?php echo $post['post_title'] ?>'>
                        </div>
                        <div class="form-group">
                            <label for="category">Post Category</label>
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
                            <label for="author">Post Author</label>
                            <input type="text" name="author" class="form-control" value='<?php echo $post['post_author'] ?>'>
                        </div>
                        <div class="form-group">
                            <label for="status">Post Status</label><br>
                            <select style="width: 200px;" name="status" id="" class="form-control">
                                <option value="Draft">Draft</option>
                                <option value="Published">Published</option>
                            </select>
                            <!--<input type="text" name="status" class="form-control" value='<?php echo $post['post_status'] ?>'>-->
                        </div>
                        <div class="form-group">
                            <label for="image">Post Image</label>
                            <input type="file" name="image" class="form-control" value='<?php echo $post['post_image'] ?>'>
                        </div>
                        <div class="form-group">
                            <img width="100" src='<?php echo "../images/" . $post['post_image'] ?>' alt="post image">
                        </div>
                        <div class="form-group">
                            <label for="tags">Post Tags</label>
                            <input type="text" name="tags" class="form-control" value='<?php echo $post['post_tags'] ?>'>
                        </div>
                        <div class="form-group">
                            <label for="content">Post Content</label>
                            <textarea name="content" class="form-control" cols="30" rows="5"><?php echo $post['post_text'] ?></textarea>
                        </div>
                        <button name="edit_post" style="margin-bottom: 4rem;" type="submit" class="btn btn-primary">Edit Post</button>
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
