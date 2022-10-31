<div class="col-xs-6">
    <?php
    include_once '../includes/functions.php';
    if (isset($_POST['cat_title'])){
        $catTitle = $_POST['cat_title'];
        if($catTitle == "" || empty($catTitle)) {
            echo 'This field should not be empty !!! 😇';
        } else {
            addCategory($catTitle);
        }
    }
    ?>
    <form action="categories.php" method="post">
        <div class="form-group">
            <label for="cat_title">Add Category</label>
            <input class="form-control" type="text" name="cat_title">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" name="submit">Add Category</button>
        </div>
    </form>

    <form action="" method="post">
        <div class="form-group">
            <label for="cat_title">Edit Category</label>
            <?php
            $title = null;
            if (!$_GET){
                $title = "";
            } else {
                $title = trim($_GET["category"]);
            }

            if (isset($_GET['edit_id'])) {
                echo "<input class='form-control' type='text' name='new_title' value='$title'>";
            }
            ?>


        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="edit" value="Edit Category"/>
        </div>
    </form>
</div>