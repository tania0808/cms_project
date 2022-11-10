<?php
include_once 'includes/functions.php';
?>
    <!-- Featured blog post-->
<?php
$posts = getPublishedPosts();
$featuredPost = array_shift($posts);
$posts = array_chunk($posts, 2);

if(!$posts) { ?>
        <h3>There are no posts ! </h3>
    <?php } else { ?>
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"><img style="height: 300px; object-fit: cover" class="card-img-top"
                                      src="../images/<?php echo $featuredPost['post_image']; ?>" alt="..."/></a>
                    <div class="card-body">
                        <h2 class="card-title h4"><a
                                    href="post.php?id=<?php echo $featuredPost['post_id']; ?>"><?php echo $featuredPost['post_title'] ?></a>
                        </h2>
                        <div class="small text-muted"><?php echo $featuredPost['post_date'] ?></div>
                        <div class="small">by <span
                                    class="text-primary"><?php echo $featuredPost['post_author'] ?></span></div>
                        <p class="card-text"><?php
                            $text = $featuredPost['post_text'];
                            $n_char = 50;
                            if (strlen($text) > $n_char) {
                                $text = substr($text, 0, $n_char);
                                echo $text . '...';
                            } else {
                                echo $text;
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <?php foreach ($posts as $postChunk) { ?>
                        <div class="col-lg-12">
                            <!-- Blog post-->
                            <?php foreach ($postChunk as $post) { ?>
                                <div class="card mb-4">
                                    <a href="#!"><img style="height: 300px; object-fit: cover" class="card-img-top"
                                                      src="./images/<?php echo $post['post_image'] ?>" alt="..."/></a>
                                    <div class="card-body">
                                        <h2 class="card-title h4"><a
                                                    href="post.php?id=<?php echo $post['post_id']; ?>"><?php echo $post['post_title'] ?></a>
                                        </h2>
                                        <div class="small text-muted"><?php echo $post['post_date'] ?></div>
                                        <div class="small">by <span
                                                    class="text-primary"><?php echo $post['post_author'] ?></span></div>
                                        <p class="card-text"><?php
                                            $text = $post['post_text'];
                                            $n_char = 50;
                                            if (strlen($text) > $n_char) {
                                                $text = substr($text, 0, $n_char);
                                                echo $text . '...';
                                            } else {
                                                echo $text;
                                            }
                                            ?>
                                        </p>
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
                <!-- Login Form -->
                <?php include_once './login.php' ?>
                <!-- Categories widget-->
                <?php include_once 'templates/categories.php' ?>
                <!-- Side widget-->
                <?php include_once 'templates/side_card.php' ?>
            </div>
        </div>
    </div>
    <!-- Nested row for non-featured blog posts-->
<?php } ?>
    <!-- Pagination-->
<?php include_once 'templates/pagination.php' ?>