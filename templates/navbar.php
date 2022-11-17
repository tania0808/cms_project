<?php
include_once 'includes/functions.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php?page=1">CMS Front</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php
                foreach (getCategories() as $category) {
                    echo "<li class='nav-item'><a class='nav-link' href='#'>{$category['category_title']}</a></li>";
                }
                ?>
                <li class='nav-item'><a class='nav-link' href='admin'>Admin</a></li>
                <li class='nav-item'><a class='nav-link' href='registration.php'>Registration</a></li>
                <li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>

            </ul>
        </div>
    </div>
</nav>
