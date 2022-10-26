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
        <?php include_once 'includes/ui/navbar.php'?>
        <!-- Page header with logo and tagline-->
        <?php include_once 'includes/ui/header.php'?>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <?php include 'includes/ui/blog_post.php'?>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <?php include 'includes/ui/blog_post.php'?>
                            <!-- Blog post-->
                            <?php include 'includes/ui/blog_post.php'?>
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <?php include 'includes/ui/blog_post.php'?>
                            <!-- Blog post-->
                            <?php include 'includes/ui/blog_post.php'?>
                        </div>
                    </div>
                    <!-- Pagination-->
                    <?php include_once 'includes/ui/pagination.php'?>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <?php include_once 'includes/ui/search.php'?>
                    <!-- Categories widget-->
                    <?php include_once 'includes/ui/categories.php'?>
                    <!-- Side widget-->
                    <?php include_once 'includes/ui/side_card.php'?>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <?php include_once 'includes/ui/footer.php'?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
