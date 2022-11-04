
        <!-- Responsive navbar-->
        <?php include_once 'templates/navbar.php' ?>
        <!-- Page content-->
        <div style="margin-top: 4rem" class="container">
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
