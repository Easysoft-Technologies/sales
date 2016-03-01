
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
 
 <div class="admin-right-cnt">	
  <div class="row">

  <div class="col-md-12 clearfix"><div class="admin-order"><p>Details of file</p></div></div>

   <div class="col-md-12">
    <div class="table-responsive custom-tbl">
      <div class="tbl-grd"></div>
      <table class="table table-bordered" id="ag-tbl">
        <thead>
          <tr>
            <th>No</th>
            <th>Date</th>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Invoice/CM</th>
            <th>Quantity</th>
            <th>Product ID</th>
            <th>Description</th>
            <th>Sales Representative ID</th>
            <th>Brand Name</th>
            <th>Unit Price</th>
            <th>Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr class="tr_stl tr-bg">
            <td>1</td>
            <td>Date</td>
            <td>Customer ID</td>
            <td>Customer Name</td>
            <td>Invoice/CM</td>
            <td>Quantity</td>
            <td>Product ID</td>
            <td>Description</td>
            <td>Sales Representative ID</td>
            <td>Brand Name</td>
            <td>Unit Price</td>
            <td>Total</td>
            <td><a href="#"><i class="fa fa-trash-o delt-icon"></i></a></td>
          </tr>
          <tr class="tr_stl">
            <td>2</td>
            <td>Date</td>
            <td>Customer ID</td>
            <td>Customer Name</td>
            <td>Invoice/CM</td>
            <td>Quantity</td>
            <td>Product ID</td>
            <td>Description</td>
            <td>Sales Representative ID</td>
            <td>Brand Name</td>
            <td>Unit Price</td>
            <td>Total</td>
            <td><a href="#"><i class="fa fa-trash-o delt-icon"></i></a></td>
          </tr>
          <tr class="tr_stl tr-bg">
                        <td>1</td>
            <td>Date</td>
            <td>Customer ID</td>
            <td>Customer Name</td>
            <td>Invoice/CM</td>
            <td>Quantity</td>
            <td>Product ID</td>
            <td>Description</td>
            <td>Sales Representative ID</td>
            <td>Brand Name</td>
            <td>Unit Price</td>
            <td>Total</td>
            <td><a href="#"><i class="fa fa-trash-o delt-icon"></i></a></td>
          </tr>
          <tr class="tr_stl tr-bg">
           <td>1</td>
            <td>Date</td>
            <td>Customer ID</td>
            <td>Customer Name</td>
            <td>Invoice/CM</td>
            <td>Quantity</td>
            <td>Product ID</td>
            <td>Description</td>
            <td>Sales Representative ID</td>
            <td>Brand Name</td>
            <td>Unit Price</td>
            <td>Total</td>
            <td><a href="#"><i class="fa fa-trash-o delt-icon"></i></a></td>
            </tr>

        </tbody>
      </table>
    </div>
   </div>
   
   
   

 </div>             
</div>

      
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