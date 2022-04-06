<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Signin Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="<?= base_url()?>global/admin/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?= base_url()?>global/admin/signin.css" rel="stylesheet">
    </head>

    <body>

    <div class="container">

        <form class="form-signin" id=login-form action="<?php echo base_url('news/login_act'); ?>" method="post">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="username" id="username" class="form-control" placeholder="Email address" required>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div> <!-- /container -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#login_form").validate({
                rules: {
                    username:{
                        required: true,
                        email: true
                    },
                    password:{
                        minlegth: 6
                    },
                },
                messages: {
                    username: {
                        remote: 'Username should be email, which include "@" char'
                    }
                    pasword: {
                        remote: 'min length is 6'
                    }
                },
            
            });

            
        })
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?= base_url()?>global/admin/site/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
