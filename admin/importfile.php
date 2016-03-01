
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
           <div class="admin-order"><p>File Upload</p></div>
           </div>
           </div>
           
           <div class="row">
           <div class="col-md-12">
             <div class="file-upld-brdr">
             
<div class="row">
              <div class="col-md-6 fileup-colm6">
               <div class="fileup-cnt">
                <h3>Please upload your file here</h3>
                <p class="md"  data-toggle="modal" data-target="#myModal"><a href="#">Check Format</a></p>
               </div>
  <div id="myModal" class="modal fade report-fade-bg" role="dialog">
  <div class="modal-dialog file-model">
    <!-- Modal content-->
    <div class="modal-content order-popup-bg">
      <div class="modal-header order-popup-hd ">
        <button type="button" class="close close1" data-dismiss="modal">&times;</button>
        <h4>Format</h4>
      </div>
      <div class="modal-body">
      
      <div class="table-responsive custom-tbl">
      <div class="tbl-grd"></div>
      <table class="table table-bordered" id="ag-tbl">
        <thead>
          <tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Invoice/CM #</th>
            <th>Date</th>
            <th>Sales Represe ntative ID</th>
            <th>Quantity</th>
            <th>Item ID</th>
            <th>Description</th>
            <th>G/L Account</th>
            <th>Unit Price</th>
          </tr>
        </thead>
        
      </table>
    </div>
      
      </div>
    </div>
  </div>
</div><!--model end------>
              </div>
              <div class=" col-md-6 fileup-colm6">
               <div class="fileup-cnt1">
            <label class="custom-file-upload " data-toggle="modal" data-target="#myModal1">
uplosd File
</label>
            </div>
              </div>
                        
<div id="myModal1" class="modal fade report-fade-bg" role="dialog">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content order-popup-bg">
      <div class="modal-header order-popup-hd ">
        <button type="button" class="close close1" data-dismiss="modal">&times;</button>
        <h4>Upload Sales Report</h4>
      </div>
      <div class="modal-body uplord-file-btn">
      
     <div class="filpopup-main-head">
       <div class="row">
      <div class="col-md-12">
       <div class="submit-pop">
      <p>maximum file upload size 2mb width</p>
      </div>
      </div>
      </div>
 <div class="row">
       <div class="col-md-6">
           <div class="poup-filupldr">
            <label class="custom-file-upload ">
            <input type="file"/>
            <i class="icon-file file-icon"></i>Upload File
            </label>
           </div>
       </div>
       <div class="col-md-6 clearfix">
       <div class="file-btn-bg">
        <button type="submit" class="file-pu-btn">Submit</button>
       </div>
       </div>
     

 </div>

</div>
      
      </div>
    </div>
  </div>
</div>              
              
              </div>


             </div>
             </div>
           </div><!--row end-->

 </div><!--bg-color-div-end------>
 
 <div class="admin-right-cnt">	
  <div class="row">

  <div class="col-md-12"><div class="admin-order"><p>order list</p></div></div>

   <div class="col-md-12">
    <div class="table-responsive custom-tbl">
      <div class="tbl-grd"></div>
      <table class="table table-bordered" id="ag-tbl">
        <thead>
          <tr>
            <th>No</th>
            <th>Imported Date</th>
            <th>No. of Records</th>
            <th>Download File	</th>
            <th>View</th>
          </tr>
        </thead>
        <tbody>
          <tr class="tr_stl tr-bg">
            <td>1</td>
            <td>INV-0113</td>
            <td>11-Jan-2016</td>
            <td><a href="#"><i class="fa fa-download"></i></a></td>	
            <td><a href="sales-list.php"><span class="icon-file table-icon"></span></a></td>
          </tr>
          <tr class="tr_stl">
            <td>2</td>
            <td>INV-0113</td>
            <td>11-Jan-2016</td>
            <td><a href="#"><i class="fa fa-download"></i></a></td>
            <td><a href="#"><span class="icon-file table-icon"></span></a></td>
          </tr>
          <tr class="tr_stl tr-bg">
            <td>3</td>
            <td>INV-0113</td>
            <td>11-Jan-2016</td>
            <td><a href="#"><i class="fa fa-download"></i></a></td>
            <td><a href="#"><span class="icon-file table-icon"></span></a></td>
          </tr>
            <tr class="tr_stl">
            <td class="tr_stl1"> 4</td>
            <td>INV-0113</td>
            <td>11-Jan-2016</td>
            <td><a href="#"><i class="fa fa-download"></i></a></td>
            <td><a href="#"><span class="icon-file table-icon"></span></a></td>
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