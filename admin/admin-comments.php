<?php
include_once '../includes/functions.php';

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
                            <th>Comment Id</th>
                            <th>Comment Post Id</th>
                            <th>Date</th>
                            <th>Author</th>
                            <th>User Email</th>
                            <th>Content</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                    <?php
                        foreach ($comments as $comment) { ?>
                            <tr>
                                <td><?php echo $comment['comment_id'] ?></td>
                                <td><?php echo $comment['comment_post_id'] ?></td>
                                <td><?php echo $comment['comment_date'] ?></td>
                                <td><?php echo $comment['comment_author'] ?></td>
                                <td><?php echo $comment['comment_email'] ?></td>
                                <td><?php echo $comment['comment_content'] ?></td>
                                <td><?php echo $comment['comment_status'] ?></td>
                                <td><a href="edit_post.php?edit_id=<?php ?>">Approve</a></td>
                                <td><a href="edit_post.php?edit_id=<?php ?>">Unapprove</a></td>
                                <td><a href="admin-posts.php?delete_id=<?php ?>">delete</a></td>
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