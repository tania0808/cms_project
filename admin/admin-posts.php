<?php
include_once '../includes/functions.php';

if(isset($_GET['delete_id'])){
deletePost($_GET['delete_id']);
header("Location: admin-posts.php");
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
                        Admin Posts
                        <small>Author</small>
                    </h1>
                    <?php
                        include_once '../includes/functions.php';
                        $posts = getPosts();
                        if (count($posts) === 0) {
                            echo '<h3 style="margin-bottom: 4rem">There are no posts !</h3>';
                        } else { ?>

                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Post Id</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>

                    <?php
                        foreach ($posts as $post) { ?>
                            <tr>
                                <td><?php echo $post['post_id'] ?></td>
                                <td><?php echo $post['post_author'] ?></td>
                                <td><?php echo $post['post_title'] ?></td>
                                <td><?php echo $post['post_category_id'] ?></td>
                                <td><?php echo $post['post_status'] ?></td>
                                <td>
                                    <img class="img-responsive"
                                         src="<?php echo '../images/' . $post['post_image']?>" alt="">
                                </td>
                                <td><?php echo $post['post_tags'] ?></td>
                                <td><?php echo $post['post_comments_count'] ?></td>
                                <td><?php echo $post['post_date'] ?></td>
                                <td><a href="admin-posts.php?delete_id=<?php echo $post['post_id']?>">delete</a></td>
                                <td><a href="edit_post.php?edit_id=<?php echo $post['post_id']?>">edit</a></td>
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