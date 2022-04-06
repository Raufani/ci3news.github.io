<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
</head>
<body>
    <h1>Login Successfully !</h1>
    <h2>Welcome, <?php echo $this->session->userdata("nama"); ?></h2>
    <a href="<?php echo base_url(); ?>news/logout">Logout</a>
</body>
</html>