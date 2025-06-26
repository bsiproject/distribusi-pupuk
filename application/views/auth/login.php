<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo get_store_name(); ?></title>
    <link rel="icon" href="<?php echo base_url('assets/uploads/sites/Logo.png'); ?>">
    <link href="<?php echo get_theme_uri('custom/auth/login/css/style.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_theme_uri('custom/auth/login/css/fontawesome-all.css'); ?>" rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <style>
        body {
            background-image: url('<?php echo base_url("assets/themes/converse/images/b3.jpg"); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Raleway', sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #fff;
        }

        .w3l-login-form {
            background-color: rgba(0, 0, 0, 0.6); /* transparansi */
            padding: 40px;
            margin: 50px auto;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        }

        .w3l-login-form h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .form-control {
            background-color: #fff;
            color: #000;
        }

        .forgot p {
            margin-top: 10px;
        }

        button[type="submit"] {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }

        .flash-message {
            background-color: rgba(255, 255, 255, 0.8);
            color: #000;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <h1>Login ke <?php echo get_store_name(); ?></h1>

    <div class="w3l-login-form">
        <h2>Login Akun</h2>
        <?php if ($flash_message) : ?>
            <div class="flash-message">
                <?php echo $flash_message; ?>
            </div>
        <?php endif; ?>

        <?php if ($redirection) : ?>
            <div class="flash-message">
                Silahkan login untuk melanjutkan...
            </div>
        <?php endif; ?>

        <?php echo form_open('auth/login/do_login'); ?>

        <div class="w3l-form-group">
            <label>Username:</label>
            <div class="group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" value="<?php echo set_value('username', $old_username); ?>" class="form-control" placeholder="Username" minlength="4" maxlength="16" required>
            </div>
            <?php echo form_error('username'); ?>
        </div>

        <div class="w3l-form-group">
            <label>Password:</label>
            <div class="group">
                <i class="fas fa-unlock"></i>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <?php echo form_error('password'); ?>
        </div>

        <button type="submit">Login</button>
        <?php echo form_close(); ?>
        <br>
            <a href="<?php echo site_url('auth/register'); ?>" class="nav-link"> Olun punyo akun ? <u>Daftar disiko</u></a>   
                      </p>
    </div>

    <footer>
        <p class="copyright-agileinfo"> &copy; 2025 <?php echo anchor(base_url(), get_store_name()); ?></p>
    </footer>

</body>

</html>
