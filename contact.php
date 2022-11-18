<?php session_start(); ?>
<?php include "includes/db_connection.php"; ?>
<?php include "templates/head.php"; ?>
<?php include "templates/navbar.php"; ?>
<?php
$to = 'tania08082000@gmail.com';
$subject = $_POST['subject'];
$message = $_POST['message'];

?>
<!-- Page Content -->
<div class="container" style="margin-top: 4rem;">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Contact</h1>
                        <form role="form" action="" method="post" id="contact-form" autocomplete="off">
                            <div class="form-group" style="margin-top: 1rem;">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="Enter your email">
                            </div>
                            <div class="form-group" style="margin-top: 1rem;">
                                <label for="email" class="sr-only">Subject</label>
                                <input type="email" name="subject" id="subject" class="form-control"
                                       placeholder="Enter your subject">
                            </div>
                            <div class="form-group" style="margin-top: 1rem;">
                                <label for="password" class="sr-only">Your message</label>
                                <textarea class="form-control" style="resize: none;" name="message" id="message" rows="5"></textarea>
                            </div>

                            <input style="margin-top: 1rem;" type="submit" name="login" id="btn btn-login"
                                   class="btn btn-primary btn-custom btn-lg btn-block" value="Send a message">
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