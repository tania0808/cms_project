<?php

include_once 'db_connection.php';

function getCategories(): bool|array
{
    global $database_connection;

    $query = 'SELECT * FROM category';
    $getCategories = $database_connection->prepare($query);
    $getCategories->execute();

    return $getCategories->fetchAll();
}
function getOneCategory($id) {
    global $database_connection;

    $query = "SELECT * FROM category WHERE category_id= '$id'";
    $getCategory = $database_connection->prepare($query);
    $getCategory->execute();

    return $getCategory->fetch();
}

function addCategory($title): bool|array
{
    global $database_connection;
    $query = "INSERT INTO category (category_title) VALUES ('$title')";
    $addCategory = $database_connection->prepare($query);
    $addCategory->execute();

    return $addCategory->fetchAll();
}
function deleteCategory($id): void
{
    global $database_connection;
    $query = "DELETE FROM category WHERE category_id= '$id'";
    $deleteCategory = $database_connection->prepare($query);
    $deleteCategory->execute();
}

function editCategory($id, $newTitle): void
{
    global $database_connection;
    $query = "UPDATE category SET category_title = '$newTitle' WHERE category_id= '$id'";
    $editCategory = $database_connection->prepare($query);
    $editCategory->execute();
}

function getPosts(): bool|array
{
    global $database_connection;

    $query = 'SELECT * FROM posts';
    $getPosts = $database_connection->prepare($query);
    $getPosts->execute();

    return $getPosts->fetchAll();
}


function getPublishedPosts(): bool|array
{
    global $database_connection;

    $query = 'SELECT * FROM posts WHERE post_status = "Published"';
    $getPosts = $database_connection->prepare($query);
    $getPosts->execute();

    return $getPosts->fetchAll();
}

function getOnePost($id) {
    global $database_connection;

    $query = "SELECT * FROM posts WHERE post_id = $id";
    $getPost = $database_connection->prepare($query);
    $getPost->execute();

    return $getPost->fetch();
}

function addPost(): void
{
    global $database_connection;
    $post_title = $_POST['title'];
    $post_category = $_POST['category'];
    $post_status = $_POST['status'];
    $post_author = $_POST['author'];
    $post_user = 'tania';
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];
    $post_date = date("F j, Y, g:i a");
    $post_comments_count = 0;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = <<<SQL
        INSERT INTO posts (post_category_id, post_title, post_date, post_author, post_user, post_image, post_text, post_tags, post_comments_count, post_status ) 
        VALUES (:post_category, :post_title, :post_date, :post_author, :post_user, :post_image, :post_content, :post_tags, :post_comments_count, :post_status)
    SQL;
    $data = [':post_category' => $post_category,
    ':post_title' => $post_title,
    ':post_date' => $post_date,
    ':post_author' => $post_author,
    ':post_user' => $post_user,
    ':post_image' => $post_image,
    ':post_content' => $post_content,
    ':post_tags' => $post_tags,
    ':post_comments_count' => $post_comments_count,
    ':post_status' => $post_status
    ];
    $addPost = $database_connection->prepare($query);
    $addPost->execute($data);
}

function updatePost($id): void
{
    global $database_connection;
    $post_title = $_POST['title'];
    $post_category = $_POST['category'];
    $post_status = $_POST['status'];
    $post_author = $_POST['author'];
    $post_user = 'tania';
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];
    $post_date = date("F j, Y, g:i a");
    $post_comments_count = 4;
    $old_image_name = $_POST['old_image_name'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = <<<SQL
        UPDATE posts 
        SET post_category_id = :post_category, 
            post_title = :post_title, 
            post_date = :post_date, 
            post_author = :post_author, 
            post_user = :post_user, 
            post_text = :post_content, 
            post_tags = :post_tags, 
            post_comments_count = :post_comments_count, 
            post_status = :post_status
        WHERE post_id = $id
SQL;
    $data = [':post_category' => $post_category,
        ':post_title' => $post_title,
        ':post_date' => $post_date,
        ':post_author' => $post_author,
        ':post_user' => $post_user,
        ':post_content' => $post_content,
        ':post_tags' => $post_tags,
        ':post_comments_count' => $post_comments_count,
        ':post_status' => $post_status
    ];
    $addPost = $database_connection->prepare($query);
    $addPost->execute($data);

    $imageQuery = "UPDATE posts SET post_image = '$post_image' WHERE post_id = '$id'";

    if($post_image) {
        unlink("../images/$old_image_name");
        move_uploaded_file($post_image_temp, "../images/$post_image");
        $updateImage = $database_connection->prepare($imageQuery);
        $updateImage->execute();
    }



}

function deletePost($id): void
{
    global $database_connection;
    $query = "DELETE FROM posts WHERE post_id= '$id'";
    $deletePost = $database_connection->prepare($query);
    $deletePost->execute();
}

function searchPosts(): bool|array
{
    global $database_connection;
    $search =  $_POST['search'];
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
    $searchStatement = $database_connection->prepare($query);
    $searchStatement->execute();

    return  $searchStatement->fetchAll();

}
function searchPostsByCategory(): bool|array
{
    global $database_connection;
    $search =  $_GET['category'];
    $query = "SELECT * FROM posts WHERE post_category_id = '$search'";
    $searchStatement = $database_connection->prepare($query);
    $searchStatement->execute();

    return $searchStatement->fetchAll();

}

function getComments(): bool|array
{
    global $database_connection;

    $query = 'SELECT * FROM comments';
    $getComments = $database_connection->prepare($query);
    $getComments->execute();

    return $getComments->fetchAll();
}

function getCommentsByPost(): array
{
    global $database_connection;
    $id = $_GET['id'];
    $query = "SELECT * FROM comments WHERE comment_post_id = '$id' AND comment_status = 'approved' ORDER BY comment_id DESC ";
    $getComments = $database_connection->prepare($query);
    $getComments->execute();

    return $getComments->fetchAll();
}

function addComment(): bool|array
{
    global $database_connection;
    $post_id = $_GET['id'];
    $author = $_POST['comment_author'];
    $email = $_POST['comment_email'];
    $content = $_POST['comment_content'];
    $status = 'disapproved';
    $date = date("F j, Y, g:i a");

    $query = <<<SQL
        INSERT INTO comments (comment_post_id, comment_date, comment_author, comment_email, comment_content , comment_status) 
        VALUES ('$post_id', '$date', '$author', '$email', '$content', '$status')
    SQL;

    $addComment = $database_connection->prepare($query);
    $addComment->execute();

    $updateCommentQuery = <<<SQL
    UPDATE posts
    SET post_comments_count = post_comments_count + 1
    WHERE post_id = '$post_id'
    SQL;
    $updateCommentCount = $database_connection->prepare($updateCommentQuery);
    $updateCommentCount->execute();

    return $addComment->fetchAll();
}

function deleteComment($id): void
{
    global $database_connection;
    $query = "DELETE FROM comments WHERE comment_id= '$id'";
    $deleteComment = $database_connection->prepare($query);
    $deleteComment->execute();
}

function changeCommentStatus($id, $action) {
    global $database_connection;
    $status = $action === 'Approve' ? 'approved' : 'disapproved';
    $query = "UPDATE comments SET comment_status = '$status'  WHERE comment_id = '$id'";
    $changeStatus = $database_connection->prepare($query);
    $changeStatus->execute();
}

function getAllUsers(): bool|array
{
    global $database_connection;

    $query = 'SELECT * FROM users';
    $getUsers = $database_connection->prepare($query);
    $getUsers->execute();

    return $getUsers->fetchAll();
}

function addUser(): bool|array
{
    global $database_connection;
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = 'earth.jpeg';

    $query = <<<SQL
        INSERT INTO users (user_first_name, user_last_name, user_role, user_name, user_email , user_password, user_image) 
        VALUES ('$first_name', '$last_name', '$role', '$username', '$email', '$password', '$image')
    SQL;

    $addUser = $database_connection->prepare($query);
    return $addUser->execute();
}

function deleteUser($id): void
{
    global $database_connection;
    $query = "DELETE FROM users WHERE user_id= '$id'";
    $deleteUser = $database_connection->prepare($query);
    $deleteUser->execute();
}