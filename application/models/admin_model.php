<?php if( ! defined('BASEPATH')) ecit('No direct script access allowed');

class Admin_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function check_login(){
	
		$username	=	$this->input->post('username');
		$password	=	$this->input->post('password');
		$return	=	FALSE;		
		
		$result	=	$this->db->where(array('users_username'=>$username,'users_password'=>$password))->get('users')->result();
		
		if(count($result)==1){		
			
			$this->session->set_userdata('ADMIN_NAME',$result[0]->users_full_name);
			$this->session->set_userdata('user_type',$result[0]->users_usertype);
			$this->session->set_userdata('users_id',$result[0]->users_id);
			
					
			
			$return	=	TRUE;
		}
		
		return $return;		
	}
	<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>admin_assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />


    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php
        $this->load->view('admin/header');
        ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->



            <?php
            $this->load->view('admin/left');
            ?>

            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Change Password
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?= base_url() ?>admin/users">User</a></li>
                        <li class="active">Change Password</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                    <?php echo form_open('admin/users/change_password'); ?>	
                                <?php if (isset($error)) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>        
                                        <?php
                                        echo '<span style="color:red">' . $error . '</span>';

                                        echo '</div>';
                                    }
                                    ?>   

                                    <?php echo form_open_multipart('admin/users/change_password'); ?>
                                    <?php
                                    if ($this->session->userdata('msg') == TRUE) {
                                        echo '<span style="color:red">' . $this->session->userdata('msg') . '</span>';
                                        $this->session->set_userdata('msg', '');
                                    }
                                    ?>
                                    <!--    <form class="span12 widget stacked dark form-horizontal bordered">-->

                                    <section class="body">
                                        <div class="body-inner">
                                            <!-- Message -->

                                                    <!-- Input Text Placeholder -->
                                                    <div class="box-body"> 
                                                        <div class="form-group">                                         
                                                            <label for="exampleInputPassword1">Old Password</label>

                                                            <input type="password" name="old_password" id="old_password" class="form-control"><br>
                                                            <p class="text-red"><?php echo form_error('password'); ?></p>		


                                                        </div>
                                                    </div><!--/ Input Text Placeholder -->

                                                    <!-- Textarea -->
                                                    <div class="box-body"> 
                                                        <div class="form-group">                                       
                                                            <label for="exampleInputPassword1">New Password</label>

                                                           <input type="password" name="password" id="password" value="" class="form-control"><br />
                                                            <p class="text-red"><?php echo form_error('email'); ?></p>	
                                                        </div>
                                                    </div><!--/ Textarea -->

                                                    <!-- Textarea -->
                                                    <div class="box-body">  
                                                        <div class="form-group">                                         
                                                            <label for="exampleInputPassword1">Re enter Password </label>

                                                           <input type="password" name="password_re" id="password_re" value="" class="form-control"><br />
                                                            <p class="text-red"><?php echo form_error('phone'); ?></p>

                                                        </div>
                                                    </div><!--/ Textarea -->


                                                    <div class="box-footer">
                                                        <input type="submit" name="Submit" value="Submit" class="btn btn-primary">

                                                    </div>
                                                    </form>
                                                </div><!-- /.box -->



                                            </div>   <!-- /.row -->
                                        </div>   <!-- /.row -->
                                    </section><!-- /.content -->
                                    </aside>


                                </div><!-- ./wrapper -->

                                <!-- add new calendar event modal -->


                                <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
                                <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
                                <script src="<?= base_url() ?>admin_assets/js/AdminLTE/app.js" type="text/javascript"></script>


                                </body>
                                </html>

}