<div class="card mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            <?php
            include_once 'includes/functions.php';
            $categories = getCategories();


            $categories = array_chunk($categories, ceil(count($categories) / 2)); ?>
            <?php foreach ($categories as $categoriesChunk) { ?>
                <div class="col-sm-6">
                    <?php foreach ($categoriesChunk as $category) { ?>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#!"><?php echo $category['category_title']; ?></a></li>
                        </ul>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>