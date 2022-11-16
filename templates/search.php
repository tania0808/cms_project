<?php
ob_start();
session_start();
if (isset($_POST['login'])) {
    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        login();
    } else {
        echo "Data can't be empty !!! 👩‍💻";
    }
}
?>
<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
        <div class="input-group">
            <form action="search_results.php" method="post">
                <input name="search" class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                <button name="submit" class="btn btn-primary mt-3" id="button-search">Go!</button>
            </form>
        </div>
    </div>
</div>
<!-- LOGIN FORM -->
<div class="card mb-4">
    <div class="card-header">LOGIN</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="username"></label>
                <input name="email" class="form-control" type="email" placeholder="Enter email"
                       aria-label="Enter email" />
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input name="password" class="form-control" type="password" placeholder="Enter password"
                       aria-label="Enter password" aria-describedby="button-search"/>
            </div>
            <button name="login" class="btn btn-primary mt-3">Login</button>
        </form>
    </div>
</div>
