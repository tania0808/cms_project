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

            if(isset($_POST['create_comment'])) {
                addComment();
            }
            ?>
            <h2><?php echo $post['post_title']?></h2>
            <p class="lead">
                by <?php echo $post['post_author']?>
            </p>
            <hr>
            <p>Posted on <?php echo $post['post_date']?></p>
            <hr>
            <img width="300" class="img-responsive" src="images/<?php echo $post['post_image']?>" alt="">
            <hr>
            <p><?php echo $post['post_text']?></p>
            <!-- Blog Comments -->
            <!-- Posted Comments -->
            <!-- Comments Form -->
            <div class="well">
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
            <hr>
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
    <!-- /.row -->
    <hr>
<?php include_once 'templates/footer.php' ?>



