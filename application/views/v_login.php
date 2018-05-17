<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/assets/css/loginstyle.css">
</head>
<body>
    <div class="container">
        <form method="post" action="<?php site_url('login'); ?>">
            <br><h2 align="center">Login</h2><br>
            <?php if ($error != "") {

                echo $error;

            } ?>
            <div class="container-form">
                <label><b>Username</b></label>
                <input type="text" placeholder="Masukkan username" name="username" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Masukkan password" name="password" required>

                <button name="submit" type="submit">Login</button>
                <br><br>
            </div>
        </form>
    </div>
</body>
</html>

