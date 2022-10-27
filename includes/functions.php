<?php

include_once 'includes/db_connection.php';

function getCategories() {
    global $database_connection;

    $query = 'SELECT * FROM category';
    $getCategories = $database_connection->prepare($query);
    $getCategories->execute();

    return $getCategories->fetchAll();
}

function getPosts() {
    global $database_connection;

    $query = 'SELECT * FROM posts';
    $getPosts = $database_connection->prepare($query);
    $getPosts->execute();

    return $getPosts->fetchAll();
}