<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>
</head>
<body>
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
    <!-- /.row -->
    <hr>
    <!-- Footer-->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>



