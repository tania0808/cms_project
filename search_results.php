<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php include_once 'templates/navbar.php' ?>
        <!-- Page header with logo and tagline-->
        <?php include_once 'templates/header.php' ?>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <?php
                    include_once 'includes/db_connection.php';
                    include_once 'includes/functions.php';

                    if (isset($_POST['submit'])){
                        $posts = searchPosts();

                        if(!$posts) {
                            echo 'NO RESULTS!';
                        }
                    }
                    ?>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                            <div class="col-lg-12">
                                <!-- Blog post-->
                                <?php foreach ($posts as $post) { ?>
                                    <div class="card mb-4">
                                        <p>Created by <a href="#"> <?php echo $post['post_author'] ?></a></p>
                                        <a href="#!"><img style="height: 300px; object-fit: cover" class="card-img-top" src="images/<?php echo $post['post_image'] ?>" alt="..." /></a>
                                        <div class="card-body">
                                            <div class="small text-muted"><?php echo $post['post_date'] ?></div>
                                            <h2 class="card-title h4"><?php echo $post['post_title'] ?></h2>
                                            <p class="card-text"><?php echo $post['post_text'] ?></p>
                                            <a class="btn btn-primary" href="#!">Read more →</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                    </div>
                    <!-- Pagination-->
                    <?php include_once 'templates/pagination.php' ?>
                </div>
                <!-- Side widgets-->
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
        <!-- Footer-->
        <?php include_once 'templates/footer.php' ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
