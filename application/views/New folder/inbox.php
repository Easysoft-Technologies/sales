
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
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
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
           <div class="row ">
           <div class="col-md-12 clearfix"><div class="admin-order"><p>order</p></div>
           </div>
           <div class="col-md-4">
            <div class="admin-select-box">
              <select name="" class="1" id="admin-slct">
              <option value="1">Select User</option>
              <option value="1">Select User</option>>
              </select>
            </div>
           </div>
          <div class="col-md-4">
            <div class="admin-select-box">
              <select name="" class="1" id="admin-slct">
              <option value="1">Select User</option>
              <option value="1">Select User</option>>
              </select>
            </div>
           </div>
          <div class="col-md-4">
            <div class="admin-select-box">
              <select name="" class="1" id="admin-slct">
              <option value="1">Select User</option>
              <option value="1">Select User</option>
              </select>
            </div>
           </div>
           </div>
    <div class="row">
           <div class="col-md-4">
            <div class="admin-select-box">
             <input type="text" class="admn-right-form" placeholder="Select User">
            </div>
           </div>
          <div class="col-md-4">
            <div class="admin-select-box">
             <input type="text" class="admn-right-form" placeholder="Select User">
            </div>
           </div>
          <div class="col-md-4">
             <div class="admin-select-box">
             <input type="text" class="admn-right-form" placeholder="Select User">
            </div>
           </div>  
           <div class="clearfix"></div>
          <div class="col-md-12">
           <div class="row">
            <div class="col-md-6 inbox-btncol6"><input type="submit" value="submit" class="admin-right-submit"></div>
          
         <div class="col-md-6 inbox-btncol6"> <div class="input-link link-btn"><a href="order-page.php">New Order</a></div></div>
         </div>
          </div>
          </div>
     </div>
     <div class="clearfix"></div>
     
<div class="admin-right-cnt">	
  <div class="row">

  <div class="col-md-12 clearfix"><div class="admin-order"><p>order list</p></div></div>

   <div class="col-md-12">
    <div class="table-responsive custom-tbl">
      <div class="tbl-grd"></div>
      <table class="table table-bordered" id="ag-tbl">
        <thead>
          <tr>
            <th>No</th>
            <th>Order No</th>
            <th>Date</th>
            <th>User Name</th>
            <th>Client Name</th>
            <th>Brand Name</th>
            <th>Total Amount</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr class="tr_stl tr-bg">
            <td>1</td>
            <td>INV-0113</td>
            <td>11-Jan-2016</td>
            <td>User Name</td>
            <td>Client Name</td>
            <td>Brand Name</td>
            <td>20000</td>	
            <td><a href="#"><span class="icon-file table-icon " data-toggle="modal" data-target="#myModalorder"></span></a></td>
            
            
             <td><a href="#"><i class="fa fa-trash-o delt-icon"></i></a></td>
          </tr>
          <tr class="tr_stl">
            <td>2</td>
            <td>INV-0113</td>
            <td>11-Jan-2016</td>
            <td>User Name</td>
            <td>Client Name</td>
            <td>Brand Name</td>
            <td>20000</td>
            <td><a href="#"><span class="icon-file table-icon"></span></a></td>
             <td><a href="#"><i class="fa fa-trash-o delt-icon"></i></a></td>
          </tr>
          <tr class="tr_stl tr-bg">
            <td>3</td>
            <td>INV-0113</td>
            <td>11-Jan-2016</td>
            <td>User Name</td>
            <td>Client Name</td>
            <td>Brand Name</td>
            <td>20000</td>
            <td><a href="#"><span class="icon-file table-icon"></span></a></td>
             <td><a href="#"><i class="fa fa-trash-o delt-icon"></i></a></td>
          </tr>
            <tr class="tr_stl">
            <td class="tr_stl1"> 4</td>
            <td>INV-0113</td>
            <td>11-Jan-2016</td>
            <td>User Name</td>
            <td>Client Name</td>
            <td>Brand Name</td>
            <td>20000</td>
            <td><a href="#"><span class="icon-file table-icon"></span></a></td>
             <td><a href="#"><i class="fa fa-trash-o delt-icon"></i></a></td>
          </tr>
         
        </tbody>
      </table>
    </div>
   </div>
 <!-----table popup-------->  
   <div id="myModalorder" class="modal fade report-fade-bg" role="dialog">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content order-popup-bg">
      <div class="modal-header order-popup-hd ">
        <button type="button" class="close close1" data-dismiss="modal">&times;</button>
        <h4>Order Details</h4>
      </div>
    <div class="modal-body ">
      <div class="border-pop">
      <div class="row">
       <div class="col-md-6 inbox-tabl-popup">
        <div class="ordr-popup">
        <h3>Order ID: INV-0112</h3>
        <p>User's ID: User 1,/</p>
        <p>User's Name: Test User</p>      
        </div>
       </div> 
       <div class="col-md-6 inbox-tabl-popup">
       <div class="ordr-popup ordr-popup-cnt ">
        <h3>Order ID: INV-0112</h3>
        <p>User's ID: User 1,/</p>
        <p>User's Name: Test User</p>      
        </div>
       </div>
      </div><!---row------>
     </div>
     
     <div class="clearfix"></div>
     
           <div class="border-pop">
      <div class="row">
       <div class="col-md-12">
        <div class="ordr-dtls-pop"><h4>Order Descriptions</h4></div>
        
        <table class="table table-bordered" id="ag-tbl">
        <thead>
          <tr>
            <th>No</th>
            <th>brand name</th>
            <th>product</th>
            <th>Quantity</th>
            <th>total</th>
          </tr>
        </thead>
        <tbody>
          <tr class="tr_stl tr-bg">
            <td>1</td>
            <td>Test brand</td>
            <td>product</td>
            <td>Quantity</td>
            <td>Total</td>
          </tr>
          <tr class="tr_stl">
            <td>1</td>
            <td>Test brand</td>
            <td>product</td>
            <td>Quantity</td>
            <td>Total</td>
          </tr>
          <tr class="tr_stl tr-bg">
            <td>1</td>
            <td>Test brand</td>
            <td>product</td>
            <td>Quantity</td>
            <td>Total</td>
          </tr>
            <tr class="tr_stl">
            <td>1</td>
            <td>Test brand</td>
            <td>product</td>
            <td>Quantity</td>
            <td>Total</td>
          </tr>
          <tr>
          <td colspan="4"> Grand Total</td>
          <td>1500</td>
          </tr>
         
        </tbody>
      </table>
       
       </div>
      </div><!---row------>
     </div>
      
      </div>
    </div>
  </div>
</div>
   <!-----table popup--end------>   
   <div class="col-md-12" style="text-align:center;">
 <nav>
  <ul class="pagination custom-pagntion">
    <li class="pagnton-arow">
      <a href="#" aria-label="Previous">
        <span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li class="pagnton-arow">
      <a href="#" aria-label="Next">
        <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
      </a>
    </li>
  </ul>
</nav>
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