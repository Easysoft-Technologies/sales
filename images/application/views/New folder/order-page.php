
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
           <div class="col-md-12">
           <div class="admin-order"><p>order</p></div>
           <div class="order-menu">
           <ul class="order-ull">
             <li><a href="inbox.php">Home<label><i class="fa fa-angle-right"></i></label></a></li>
             <li><a href="inbox.php">Order<label><i class="fa fa-angle-right"></i></label></a></li>
             <li class="active"><a href="#">Order Details</a></li>
           </ul>
           
           </div>
           
           </div>
           </div>
           <div class="row admin-order-list">
           <div class="col-md-12"><p>Order Details</p></div>
           </div>
           <div class="row">
           <div class="col-md-4">
            <div class="admin-select-box-out">
            <label>User Name</label>
             <div class="admin-select-box">
              <select name="" class="1" id="admin-slct">
              <option value="1">Select User</option>
              <option value="1">Select User</option>>
              </select>
            </div>
            </div>
           </div>
          <div class="col-md-4">
           <div class="admin-select-box-out">
            <label>Client Name</label>
                        <div class="admin-select-box">
              <select name="" class="1" id="admin-slct">
              <option value="1">Select User</option>
              <option value="1">Select User</option>>
              </select>
            </div>
            </div>
           </div>
          <div class="col-md-4">
            <div class="admin-select-box-out">
            <label>Brand Name</label>
             <div class="admin-select-box">
              <select name="" class="1" id="admin-slct">
              <option value="1">Brand Name</option>
              <option value="1">Brand Name</option>>
              </select>
            </div>
           </div>
           </div>
           </div><!--row end-->
             <div class="clearfix"></div>
           <div class="row">
          <div class="col-md-12">
          <div class="input-link link-btn" data-toggle="modal" data-target="#myModal"><a href="#"><strong>+</strong>&nbsp;&nbsp;add new</a></div>
<!-- Modal -->
<div id="myModal" class="modal fade report-fade-bg" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content order-popup-bg">
      <div class="modal-header order-popup-hd ">
        <button type="button" class="close close1" data-dismiss="modal">&times;</button>
        <h4>New Order</h4>
      </div>
      <div class="modal-body order-body">
      <div class="model-rprt-form">
      <label>Product</label>
       <div class="selct-rprt-form">
              <select name="" class="1" id="rprt-selct-box">
              <option value="1">Product</option>
              <option value="1">product</option>
              </select>
         </div>     
      </div>
      <div class="model-rprt-form">
      <label>Quantity</label>
       <input type="text" class="new-order-form new-order-form" name="name">
      </div>
      <div class="model-rprt-form">
      <label>Total Amount</label>
       <input type="text" class="new-order-form new-order-form" name="name">
      </div>

      </div>
      <div class="modal-footer new-report-btn">
       <input type="submit" class="report-file-dtn new-order-btn" value="Save & Continue">
       <input type="submit" class="report-file-dtn new-order-btn" value="Save & Exit">
      </div>
    </div>

  </div>
</div>

          </div>
         </div><!--row end-->
            <div class="clearfix"></div>
 <div class="row order-page-toppdng">
   <div class="col-md-12">
      <div class="table-responsive">          
  <table class="table table-bordered1">
    <thead>
      <tr>
        <th>SI No</th>
        <th>Brand</th>
        <th>Product ID & Name</th>
        <th>Description </th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr class="tr_stl-1">
        <td>1</td>
        <td>Brand</td>
        <td>Product ID & Name</td>
        <td>Description </td>
        <td>Quantity</td>
        <td>Unit Price</td>
        <td>Edit</td>
        <td class="icon-styl" ><a href="#"><span class="icon-pencil table-icon "></span></a></td>
        <td class="icon-styl"><a href="#"><i class="fa fa-trash-o delt-icon "></i></a></td>
       </tr>
      <tr class="tr_stl-1">
        <td>1</td>
        <td>Brand</td>
        <td>Product ID & Name</td>
        <td>Description </td>
        <td>Quantity</td>
        <td>Unit Price</td>
        <td>Edit</td>
        <td class="icon-styl" ><a href="#"><span class="icon-pencil table-icon "></span></a></td>
        <td class="icon-styl"><a href="#"><i class="fa fa-trash-o delt-icon "></i></a></td>
       </tr>
      <tr class="tr_stl-1">
        <td>1</td>
        <td>Brand</td>
        <td>Product ID & Name</td>
        <td>Description </td>
        <td>Quantity</td>
        <td>Unit Price</td>
        <td>Edit</td>
        <td class="icon-styl" ><a href="#"><span class="icon-pencil table-icon "></span></a></td>
        <td class="icon-styl"><a href="#"><i class="fa fa-trash-o delt-icon "></i></a></td>
       </tr>
      <tr class="tr_stl-1">
        <td>1</td>
        <td>Brand</td>
        <td>Product ID & Name</td>
        <td>Description </td>
        <td>Quantity</td>
        <td>Unit Price</td>
        <td>Edit</td>
        <td class="icon-styl" ><a href="#"><span class="icon-pencil table-icon "></span></a></td>
        <td class="icon-styl"><a href="#"><i class="fa fa-trash-o delt-icon "></i></a></td>
       </tr>
      <tr class="tr_stl-1">
        <td>1</td>
        <td>Brand</td>
        <td>Product ID & Name</td>
        <td>Description </td>
        <td>Quantity</td>
        <td>Unit Price</td>
        <td>Edit</td>
        <td class="icon-styl" ><a href="#"><span class="icon-pencil table-icon "></span></a></td>
        <td class="icon-styl"><a href="#"><i class="fa fa-trash-o delt-icon "></i></a></td>
       </tr>
      <tr class="tr_stl-1">
        <td>1</td>
        <td>Brand</td>
        <td>Product ID & Name</td>
        <td>Description </td>
        <td>Quantity</td>
        <td>Unit Price</td>
        <td>Edit</td>
        <td class="icon-styl" ><a href="#"><span class="icon-pencil table-icon "></span></a></td>
        <td class="icon-styl"><a href="#"><i class="fa fa-trash-o delt-icon "></i></a></td>
       </tr>


         
    </tbody>
  </table>
    </div>
   </div>
  </div>  

<div class="row admin-ordr-bg">
           <div class="col-md-12">
           <div class="order-footer-btn">
            <div class="input-link-order"><p>Grand Total - 4500</p></div>
            <div class="input-link link-btn" ><a href="#">Submit Order</a></div>
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