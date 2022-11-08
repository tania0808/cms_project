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

<div class="card mb-4">
    <div class="card-header">LOGIN</div>
    <div class="card-body">
        <form action="../login.php" method="post">
            <div class="form-group">
                <label for="username"></label>
                <input name="username" class="form-control" type="text" placeholder="Enter username"
                       aria-label="Enter username" aria-describedby="button-search"/>
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
