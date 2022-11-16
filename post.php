<?php include_once 'templates/head.php' ?>
<!-- Responsive navbar-->
<?php include_once 'templates/navbar.php' ?>
<!-- Page content-->
<div style="margin-top: 4rem" class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-10 col-lg-8 m-auto">
            <!-- Blog Post -->
            <?php include_once 'includes/functions.php';
            $id = $_GET['id'];
            $post = getOnePost($id);

            if (isset($_POST['create_comment'])) {
                $author = $_POST['comment_author'];
                $email = $_POST['comment_email'];
                $content = $_POST['comment_content'];
                if (!empty($author) && !empty($email) && !empty($content)) {
                    addComment();
                } else {
                    echo "<script> alert('Data cannot be empty !') </script>";
                }
            }
            ?>
            <h2><?php echo $post['post_title'] ?></h2>
            <p class="lead">
                by <?php echo $post['post_author'] ?>
            </p>
            <hr>
            <p>Posted on <?php echo $post['post_date'] ?></p>
            <hr>
            <img width="300" class="img-responsive" src="images/<?php echo $post['post_image'] ?>" alt="">
            <hr>
            <p><?php echo $post['post_text'] ?></p>
            <!-- Blog Comments -->
            <!-- Posted Comments -->
            <!-- Comments Form -->
            <div class="well mt-5 pt-5">
                <h4>Leave a Comment:</h4>
                <form action="#" method="post" role="form">
                    <div class="form-group">
                        <label for="Author">Author</label>
                        <input type="text" name="comment_author" class="form-control" name="comment_author">
                    </div>

                    <div class="form-group">
                        <label for="Author">Email</label>
                        <input type="email" name="comment_email" class="form-control" name="comment_email">
                    </div>

                    <div class="form-group">
                        <label for="comment">Your Comment</label>
                        <textarea name="comment_content" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="row d-flex justify-content-start mt-5">
                <div class="col-md-10 col-lg-10">
                    <?php
                    include_once 'includes/functions.php';
                    $comments = getCommentsByPost();
                    ?>

                    <?php foreach ($comments as $comment) { ?>
                        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                            <div class="card-body p-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <p><?php echo $comment['comment_content'] ?></p>

                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <img
                                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp"
                                                        alt="avatar"
                                                        width="25"
                                                        height="25"
                                                />
                                                <p class="small mb-0 ms-2"><?php echo $comment['comment_author'] ?></p>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                                <p class="small text-muted mb-0"><?php echo $comment['comment_date'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                    };
                    ?>

                </div>
            </div>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <div class="col-lg-4">
            <!-- Search widget-->
            <?php include_once 'templates/search.php' ?>
            <!-- Categories widget-->
            <?php include_once 'templates/categories.php' ?>
            <!-- Side widget-->
            <?php include_once 'templates/side_card.php' ?>
        </div>
    </div>
</div>
<?php include_once 'templates/footer.php' ?>



