<div class="col-xs-6">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once '../includes/functions.php';
        include_once '../includes/db_connection.php';
        $categories = getCategories();

        foreach ($categories as $category) { ?>
            <tr>
                <td><?php echo $category['category_id']; ?></td>
                <td><?php echo $category['category_title']; ?></td>
                <td><a href="categories.php?category=<?php echo $category['category_title']?>&edit_id=<?php echo $category['category_id']?>">edit</a></td>
                <td><a href="categories.php?id=<?php echo $category['category_id']?>">delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>