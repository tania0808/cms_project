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
                    <a href="#!"><img style="height: 300px; object-fit: cover" class="card-img-top" src="../images/<?php echo $featuredPost['post_image'];?>" alt="..." /></a>
                    <div class="card-body">
                        <h2 class="card-title h4"><a href="post.php?id=<?php echo $featuredPost['post_id'];?>"><?php echo $featuredPost['post_title'] ?></a></h2>
                        <div class="small text-muted"><?php echo $featuredPost['post_date'] ?></div>
                        <div class="small">by <span class="text-primary"><?php echo $featuredPost['post_author'] ?></span></div>
                        <p class="card-text"><?php
                            $text = $featuredPost['post_text'];
                            $n_char = 50;
                            if(strlen($text) > $n_char) {
                                $text = substr($text, 0, $n_char);
                                echo $text . '...';
                            } else {
                                echo $text;
                            }
                            ?>
                        </p>
                        <a class="btn btn-primary" href="post.php?id=<?php echo $featuredPost['post_id'];?>">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <?php foreach ($posts as $postChunk) { ?>
                    <div class="col-lg-12">
                        <!-- Blog post-->
                        <?php foreach ($postChunk as $post) { ?>
                            <div class="card mb-4">
                                <a href="#!"><img style="height: 300px; object-fit: cover" class="card-img-top" src="images/<?php echo $post['post_image'] ?>" alt="..." /></a>
                                <div class="card-body">
                                    <h2 class="card-title h4"><a href="post.php?id=<?php echo $post['post_id'];?>"><?php echo $post['post_title'] ?></a></h2>
                                    <div class="small text-muted"><?php echo $post['post_date'] ?></div>
                                    <div class="small">by <span class="text-primary"><?php echo $featuredPost['post_author'] ?></span></div>
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