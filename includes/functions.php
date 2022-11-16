<?php

include_once 'db_connection.php';

// CATEGORIES
function getCategories(): bool|array
{
    global $database_connection;

    $query = 'SELECT * FROM category';
    $getCategories = $database_connection->prepare($query);
    $getCategories->execute();

    return $getCategories->fetchAll();
}

function getOneCategory($id)
{
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


// POSTS
function getPosts(): bool|array
{
    global $database_connection;

    $query = 'SELECT * FROM posts';
    $getPosts = $database_connection->prepare($query);
    $getPosts->execute();

    return $getPosts->fetchAll();
}

function getPostsByStatus($status): bool|array
{
    global $database_connection;

    $query = "SELECT * FROM posts WHERE post_status = '$status'";
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

function getOnePost($id)
{
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

    if ($post_image) {
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
    $search = $_POST['search'];
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
    $searchStatement = $database_connection->prepare($query);
    $searchStatement->execute();

    return $searchStatement->fetchAll();

}

function searchPostsByCategory(): bool|array
{
    global $database_connection;
    $search = $_GET['category'];
    $query = "SELECT * FROM posts WHERE post_category_id = '$search'";
    $searchStatement = $database_connection->prepare($query);
    $searchStatement->execute();

    return $searchStatement->fetchAll();

}

function searchPostsByAuthor(): bool|array
{
    global $database_connection;
    $author = $_GET['author'];
    $query = "SELECT * FROM posts WHERE post_author = '$author'";
    $searchStatement = $database_connection->prepare($query);
    $searchStatement->execute();

    return $searchStatement->fetchAll();

}

function changePostStatus($id, $action)
{
    global $database_connection;
    $status = $action === 'Draft' ? 'Draft' : 'Published';
    $query = "UPDATE posts SET post_status = '$status'  WHERE post_id = '$id'";
    $changeStatus = $database_connection->prepare($query);
    $changeStatus->execute();
}

function incrementPostViews($post_id) {
    global $database_connection;
    $updatePostViews = <<<SQL
        UPDATE posts
        SET post_views_count = post_views_count + 1
        WHERE post_id = '$post_id'
    SQL;
    $updateViewsCount = $database_connection->prepare($updatePostViews);
    $updateViewsCount->execute();
}

function resetPostViews($post_id) {
    global $database_connection;
    $updatePostViews = <<<SQL
        UPDATE posts
        SET post_views_count = 0
        WHERE post_id = '$post_id'
    SQL;
    $resetViewsCount = $database_connection->prepare($updatePostViews);
    $resetViewsCount->execute();
}


function copyAPost($id)
{
    global $database_connection;
    $query = <<<SQL
        INSERT INTO posts (post_category_id, post_title, post_date, post_author, post_user, post_image, post_text, post_tags, post_comments_count, post_status )  
        SELECT post_category_id, post_title, post_date, post_author, post_user, post_image, post_text, post_tags, post_comments_count, post_status 
        FROM posts 
        WHERE post_id = '$id'
    SQL;

    $copyPost = $database_connection->prepare($query);
    $copyPost->execute();
}

// COMMENTS
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

function getCommentsByStatus($status): bool|array
{
    global $database_connection;

    $query = "SELECT * FROM comments WHERE comment_status = '$status'";
    $getComments = $database_connection->prepare($query);
    $getComments->execute();

    return $getComments->fetchAll();
}

function changeCommentStatus($id, $action)
{
    global $database_connection;
    $status = $action === 'Approve' ? 'approved' : 'disapproved';
    $query = "UPDATE comments SET comment_status = '$status'  WHERE comment_id = '$id'";
    $changeStatus = $database_connection->prepare($query);
    $changeStatus->execute();
}


// USERS
function getAllUsers(): bool|array
{
    global $database_connection;

    $query = 'SELECT * FROM users';
    $getUsers = $database_connection->prepare($query);
    $getUsers->execute();

    return $getUsers->fetchAll();
}

function getOneUser($id)
{
    global $database_connection;

    $query = "SELECT * FROM users WHERE user_id = $id";
    $getUser = $database_connection->prepare($query);
    $getUser->execute();

    return $getUser->fetch();
}

function registration()
{
    global $database_connection;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = <<<SQL
        INSERT INTO users (user_name, user_email , user_password) 
        VALUES (:username, :email, :password)
    SQL;

    $registerUser = $database_connection->prepare($query);
    $registerUser->bindValue('username', $username);
    $registerUser->bindValue('email', $email);
    $registerUser->bindValue('password', $password);
    return $registerUser->execute();
}

function login(): void
{
    global $database_connection;
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = <<<SQL
        SELECT * FROM users
        WHERE user_email = '$email'
    SQL;

    $login = $database_connection->prepare($query);
    $login->execute();

    $res = $login->fetch(PDO::FETCH_ASSOC);

    if ($res) {
        $passwordHash = $res['user_password'];
        if (password_verify($password, $passwordHash)) {
            echo "Successful connection ! 😇";
            $_SESSION['user_id'] = $res['user_id'];
            $_SESSION['username'] = $res['user_name'];
            $_SESSION['first_name'] = $res['user_first_name'];
            $_SESSION['last_name'] = $res['user_last_name'];
            $_SESSION['user_role'] = $res['user_role'];
            header('Location: admin/index.php');
        } else {
            echo "Bad credentials !😥";
            header('Location: index.php');
        }
    } else {
        echo "Bad credentials !😥";
        header('Location: index.php');
    }

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

function changeUserRole($id, $action)
{
    global $database_connection;
    $role = $action === 'Admin' ? 'Admin' : 'Subscriber';
    $query = "UPDATE users SET user_role = '$role'  WHERE user_id = '$id'";
    $changeRole = $database_connection->prepare($query);
    $changeRole->execute();
}

function updateUser($id): void
{
    global $database_connection;
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $image = 'earth.jpeg';

    $query = <<<SQL
        UPDATE users
        SET user_first_name = :first_name, 
            user_last_name = :last_name, 
            user_role = :role, 
            user_name = :username, 
            user_email = :email, 
            user_password = :password, 
            user_image = :image
        WHERE user_id = $id
SQL;
    $data = [
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':role' => $role,
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
        ':image' => $image
    ];
    $editUser = $database_connection->prepare($query);
    $editUser->execute($data);
}


function findUserByUsername($username)
{
    global $database_connection;

    $query = "SELECT * FROM users WHERE user_name = :username";
    $getUser = $database_connection->prepare($query);
    $getUser->bindParam(':username', $username, PDO::PARAM_STR);
    $getUser->execute();
    $user = $getUser->fetch();
    if (!$user) {
        return null;
    }
    return $user;
}

function getUsersByRole($role): bool|array
{
    global $database_connection;

    $query = "SELECT * FROM users WHERE user_role = '$role'";
    $getUsers = $database_connection->prepare($query);
    $getUsers->execute();

    return $getUsers->fetchAll();
}
