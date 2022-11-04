<?php include_once 'templates/head.php' ?>
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

                    if (isset($_GET['category'])){
                        $posts = searchPostsByCategory();

                        if(!$posts) {
                            echo 'NO RESULTS!' . '<br/><hr>';

                        }
                    }
                    ?>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                            <div class="col-lg-12">
                                <!-- Blog post-->
                                <?php
                                foreach ($posts as $post) { ?>
                                    <a href="#!"><img style="height: 300px; object-fit: cover" class="card-img-top" src="images/<?php echo $post['post_image'] ?>" alt="..." /></a>

                                    <div class="card-body mt-5">
                                        <h2 class="card-title h4"><a href="post.php?id=<?php echo $post['post_id'];?>"><?php echo $post['post_title'] ?></a></h2>
                                        <div class="small text-muted"><?php echo $post['post_date'] ?></div>
                                        <div class="small">by <span class="text-primary"><?php echo $post['post_author'] ?></span></div>
                                        <p class="card-text"><?php
                                            $text = $post['post_text'];
                                            $n_char = 50;
                                            if(strlen($text) > $n_char) {
                                                $text = substr($text, 0, $n_char);
                                                echo $text . '...';
                                            } else {
                                                echo $text;
                                            }
                                            ?>
                                        </p>
                                        <a class="btn btn-primary" href="post.php?id=<?php echo $post['post_id'];?>">Read more →</a>
                                    </div>
                                <?php } ?>
                            </div>
                    </div>
                    <!-- Pagination-->
                    <!--<?php include_once 'templates/pagination.php' ?>-->
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
