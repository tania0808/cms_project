<?php
include_once 'includes/functions.php';
?>
    <!-- Featured blog post-->
    <?php
    $posts = getPosts();
    $featuredPost = array_shift($posts);
    $posts = array_chunk($posts, 2);



    ?>
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"><img style="height: 300px; object-fit: cover" class="card-img-top" src="../images/<?php echo $featuredPost['post_image'];?>.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted"><?php echo $featuredPost['post_date'] ?></div>
                        <h2 class="card-title h4"><?php echo $featuredPost['post_title'] ?></h2>
                        <p class="card-text"><?php echo $featuredPost['post_text'] ?></p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <?php foreach ($posts as $postChunk) { ?>
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <?php foreach ($postChunk as $post) { ?>
                            <div class="card mb-4">
                                <p>Created by <a href="#"> <?php echo $post['post_author'] ?></a></p>
                                <a href="#!"><img style="height: 300px; object-fit: cover" class="card-img-top" src="images/<?php echo $post['post_image'] ?>.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php echo $post['post_date'] ?></div>
                                    <h2 class="card-title h4"><?php echo $post['post_title'] ?></h2>
                                    <p class="card-text"><?php echo $post['post_text'] ?></p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
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
    <!-- Nested row for non-featured blog posts-->

    <!-- Pagination-->
    <?php include_once 'templates/pagination.php' ?>