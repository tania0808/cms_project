<?php

include_once 'db_connection.php';

function getCategories() {
    global $database_connection;

    $query = 'SELECT * FROM category';
    $getCategories = $database_connection->prepare($query);
    $getCategories->execute();

    return $getCategories->fetchAll();
}

function addCategory($title) {
    global $database_connection;
    $query = "INSERT INTO category (category_title) VALUES ('$title')";
    $addCategory = $database_connection->prepare($query);
    $addCategory->execute();

    return $addCategory->fetchAll();
}
function deleteCategory($id) {
    global $database_connection;
    $query = "DELETE FROM category WHERE category_id= '$id'";
    $addCategory = $database_connection->prepare($query);
    $addCategory->execute();
}

function editCategory($id, $newTitle) {
    global $database_connection;
    $query = "UPDATE category SET category_title = '$newTitle' WHERE category_id= '$id'";
    $editCategory = $database_connection->prepare($query);
    $editCategory->execute();
}

function getPosts() {
    global $database_connection;

    $query = 'SELECT * FROM posts';
    $getPosts = $database_connection->prepare($query);
    $getPosts->execute();

    return $getPosts->fetchAll();
}

function addPost() {
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
    $post_date = date('d-m-y');
    $post_comments_count = 4;

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

function searchPosts() {
    global $database_connection;
    $search =  $_POST['search'];
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
    $searchStatement = $database_connection->prepare($query);
    $searchStatement->execute();
    $results = $searchStatement->fetchAll();

    return $results;

}