
<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
				<!--left-fixed -navigation-->
		<!-- header-starts -->
<?php include ('includes/leftmenu.php');?>

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
		 <div class="main-page">
         
         <div class="admin-right-cnt admi-cret-usr">	
           
           <div class="row admin-order-list">
           <div class="col-md-12"><p>Create User</p></div>
           </div>
           <div class="clearfix"></div>

          <div class="row">
           <div class="col-md-7">
            <div class="creat-user-main-bg">
            <div class="creat-user-form">
                <label>User Name</label>
                <input type="text" class=" new-order-form" name="name">
            </div>

           <div class="creat-user-form">
                <label>Sale ID</label>
                <input type="text" class="new-order-form" name="Sale ID">
            </div>
           <div class="creat-user-form">
                <label>Email</label>
                <input type="text" class=" new-order-form" name="Email">
            </div>
             <div class="creat-user-form">
                <label >Phone</label>
                <input type="text" class="new-order-form" name="Phone">
            </div>
           <div class="creat-user-form">
                <label >Password</label>
              <input type="text" class="new-order-form" name="Password">
            </div>
            <div class="creat-user-form">
                <label >Confirm Password</label>
               <input type="text" class="new-order-form" name="Confirm Password">
            </div>
            <div class="creat-user-form">
            <input type="submit" class="creat-usr-btn" value="create">
            </div>
            </div>
            <div class="clearfix"></div>
           </div> 
          </div>
         </div>  
      
          
 </div><!--bg-color-div-end------>

      
</div>
</div>

		<!--footer-->

<?php include ('includes/footer.php');?>
       
       
       
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>