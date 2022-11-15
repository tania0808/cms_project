<?php include "includes/db_connection.php"; ?>
<?php include "templates/head.php"; ?>
<?php include "templates/navbar.php"; ?>
<!-- Page Content -->
<div class="container" style="margin-top: 4rem;">
    <?php
    if(isset($_POST['submit'])) {
     registration();
    }
    ?>
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group" style="margin-top: 1rem;">
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                       placeholder="Username">
                            </div>
                            <div class="form-group" style="margin-top: 1rem;">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="somebody@example.com">
                            </div>
                            <div class="form-group" style="margin-top: 1rem;">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control"
                                       placeholder="Password">
                            </div>

                            <input style="margin-top: 1rem;" type="submit" name="submit" id="btn btn-login"
                                   class="btn btn-primary btn-custom btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script
</body
</html>