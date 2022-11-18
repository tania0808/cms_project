<?php
include_once 'includes/functions.php';
?>
<?php
$posts = getPublishedPostsPerPage($_GET['page']);

$postsCount = count(getPublishedPosts());
$pageNumber = ceil($postsCount / 5);

if (!$posts) { ?>
    <h3>There are no posts ! </h3>
<?php } else { ?>
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <nav aria-label="Pagination">
                        <hr class="my-0"/>
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item<?php if ($_GET['page'] == $pageNumber) {
                                echo "disabled";
                            } ?>"><a class="page-link" href="index.php?page=<?php
                                if ($_GET['page'] == 1) {
                                    echo $pageNumber;
                                } else {
                                    echo $_GET['page'] - 1;
                                } ?>" tabindex="-1"
                                     aria-disabled="true">Newer</a></li>
                            <?php
                            for ($i = 1; $i <= $pageNumber; $i++) { ?>
                                <li class="<?php if ($_GET['page'] == $i) {
                                    echo "page-item active";
                                } else {
                                    echo "page-item ";
                                } ?>"
                                    aria-current="page"><a class="page-link"
                                                           href="index.php?page=<?php echo $i ?>"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>
                            <!-- <?php if ($_GET['page'] == $pageNumber) {
                                echo "disabled";
                            } ?> -->
                            <li class="page-item<?php if ($_GET['page'] == 1) {
                                echo "disabled";
                            } ?>"><a class="page-link" href="index.php?page=<?php
                                if ($_GET['page'] >= $pageNumber) {
                                    echo 1;
                                } else {
                                    echo $_GET['page'] + 1;
                                } ?>">Older</a></li>

                        </ul>
                    </nav>
                    <?php foreach ($posts as $post) { ?>
                        <div class="col-lg-12">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img style="height: 300px; object-fit: cover" class="card-img-top"
                                                  src="./images/<?php echo $post['post_image'] ?>" alt="..."/></a>
                                <div class="card-body">
                                    <h1><?php echo $post['post_id']; ?></h1>
                                    <div class="small text-muted"><?php echo $post['post_date'] ?></div>
                                    <div class="small">by <a
                                                href="../posts_by_author.php?author=<?php echo $post['post_author'] ?>"
                                                class="text-primary"><?php echo $post['post_author'] ?></a></div>
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
                        </div>
                    <?php } ?>
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0"/>
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                                                          aria-disabled="true">Newer</a></li>
                        <?php
                        for ($i = 1; $i <= $pageNumber; $i++) { ?>
                            <li class="page-item" aria-current="page"><a class="page-link"
                                                                         href="#!"><?php echo $i; ?></a></li>
                        <?php } ?>
                        <!--<li class="page-item active" aria-current="page"><a class="page-link" href="#!"><?php echo $i; ?></a></li>-->
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav>
            </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <?php include_once 'templates/search.php' ?>
            <!-- Login Form -->
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