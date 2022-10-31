<?php

include_once 'db_connection.php';

function getCategories() {
    global $database_connection;

    $query = 'SELECT * FROM category';
    $getCategories = $database_connection->prepare($query);
    $getCategories->execute();

    return $getCategories->fetchAll();
}

function addCategory() {
    global $database_connection;
    $title = $_POST['cat_title'];
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

function getPosts() {
    global $database_connection;

    $query = 'SELECT * FROM posts';
    $getPosts = $database_connection->prepare($query);
    $getPosts->execute();

    return $getPosts->fetchAll();
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