<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $this->load->view('includes/link'); ?>   
<script src="<?= base_url() ?>js/jquery-1.11.1.min.js"></script>
        <script src="<?= base_url() ?>js/bootstrap.js"></script>
        <!--//Metis Menu -->
    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="landing-banner_inner">
                        <div class="landing-banner_caption-bg">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="langin-logo login-logo"><img src="<?= base_url() ?>images/login-logo.png" class="img-responsive"></div>
                                <div class="login-backgrnd">
                                    <div class="login-lyt-bg">Login</div>
                                    <div class="login-form-bg">
                                        <form action="<?= site_url('login') ?>" method="post" role="form">
                                            <?php if ($error_message) {
                                                ?>
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
                                                    <?php
                                                    echo $error_message;
                                                    echo '</div>';
                                                }
                                                ?>

                                                <input type="text" class="form-control-login" name="username"  placeholder="User Name">
                                                <?php echo form_error('username', '<div class="alert alert-danger">', '</div>'); ?>

                                                <input type="password" class="form-control-login" name="password" placeholder="Password">
                                                <?php echo form_error('password', '<div class="alert alert-danger">', '</div>'); ?>

                                                <input type="submit" value="login"  class="form-control-bttn" >
                                                </form>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>                        </div>
                        </div>
                    </div></div></div>

    </body>
</html>
