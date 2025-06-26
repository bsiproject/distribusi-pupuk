<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Daftar dan Buat Akun | <?php echo get_store_name(); ?></title>

    <!-- Icons font CSS-->
    <link href="<?php echo get_theme_uri('custom/auth/register/vendor/mdi-font/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo get_theme_uri('custom/auth/register/vendor/font-awesome-4.7/css/font-awesome.min.css'); ?>" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo get_theme_uri('custom/auth/register/vendor/select2/select2.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo get_theme_uri('custom/auth/register/vendor/datepicker/daterangepicker.css'); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo get_theme_uri('custom/auth/register/css/main.css'); ?>" rel="stylesheet" media="all">

    <style>

         .page-wrapper {
            background-image: url('<?php echo base_url("assets/themes/converse/images/b3.jpg"); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .card {
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            color: #fff;
            display: flex;
            flex-direction: row;
            overflow: hidden;
        }

        .form-left-logo {
            flex: 1;
            display: flex;
            align-items: stretch;
        }

        .form-left-logo .logo-wrapper {
            width: 100%;
            height: 100%;
        }

        .form-left-logo .logo-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
                .input--style-2 {
            border-radius: 8px;
        }

         .card-body {
            flex: 2;
            padding: 30px;
        }
    </style>
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                   <div class="form-left-logo">
                    <div class="logo-wrapper">
                        <img src="<?php echo base_url('assets/themes/converse/images/merah.jpg'); ?>" alt="Logo">
                    </div>
                </div>
                
                <div class="card-body">
                    <h2 class="title">Buat Akun <?php echo get_store_name(); ?></h2>
                    <?php echo form_open('auth/register/verify'); ?>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Username" minlength="4" maxlength="16" name="username" value="<?php echo set_value('username'); ?>" required>
                                    <?php echo form_error('username'); ?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="password" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" required>
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Nama lengkap" name="name" value="<?php echo set_value('name'); ?>" required>
                            <?php echo form_error('name'); ?>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="No. HP" minlength="9" maxlength="15" name="phone_number" value="<?php echo set_value('phone_number'); ?>" required>
                                    <?php echo form_error('phone_number'); ?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" minlength="10" type="email" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>" required>
                                    <?php echo form_error('email'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Alamat" name="address" value="<?php echo set_value('address'); ?>" required>
                            <?php echo form_error('address'); ?>
                        </div>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Daftar</button> - <a href="http://localhost/distribusi-pupuk" class="btn btn--radius btn--green">Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->