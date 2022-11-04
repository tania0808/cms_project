<?php
include_once '../includes/functions.php';

if(isset($_GET['delete_id'])) {
    $comment_id = $_GET['delete_id'];
    deleteComment($comment_id);
    header("Location: admin-comments.php");
}

if(isset($_GET['action'])) {
    $id = $_GET['comment_id'];
    $action = $_GET['action'];

    changeCommentStatus($id, $action);
    header("Location: admin-comments.php");
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
                        Admin Comments
                        <small>Author</small>
                    </h1>
                    <?php
                        include_once '../includes/functions.php';
                        $comments = getComments();
                        if (count($comments) === 0) {
                            echo '<h3 style="margin-bottom: 4rem">There are no comments !</h3>';
                        } else { ?>

                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Post</th>
                            <th>Date</th>
                            <th>Approve</th>
                            <th>Disapprove</th>
                        </tr>
                        </thead>
                        <tbody>

                    <?php
                        foreach ($comments as $comment) { ?>
                            <tr>
                                <td><?php echo $comment['comment_id'] ?></td>
                                <td><?php echo $comment['comment_author'] ?></td>
                                <td><?php echo $comment['comment_content'] ?></td>
                                <td><?php echo $comment['comment_email'] ?></td>
                                <td><?php echo $comment['comment_status'] ?></td>
                                <td><a href="../post.php?id=<?php echo $comment['comment_post_id'] ?>">
                                        <?php
                                        $post = getOnePost($comment['comment_post_id']);
                                        echo $post['post_title'] ?>
                                    </a>
                                </td>
                                <td><?php echo $comment['comment_date'] ?></td>
                                <td><a href="admin-comments.php?comment_id=<?php echo $comment['comment_id']?>&action=<?php echo 'Approve' ?>">Approve</a></td>
                                <td><a href="admin-comments.php?comment_id=<?php echo $comment['comment_id']?>&action=<?php echo 'Disapprove' ?>">Disapprove</a></td>
                                <td><a href="admin-comments.php?delete_id=<?php echo $comment['comment_id'] ?>">delete</a></td>
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