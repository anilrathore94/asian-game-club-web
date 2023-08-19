<!DOCTYPE html>
<?php include '../config.php';  ?>
<html>
    <head>   
        <meta charset="utf-8">  
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge">  
		<title>Asian Games</title>  
		<!-- CSS -->	
		<link rel="stylesheet" href="../css/bootstrap.min.css">   
		<link rel="stylesheet" href="../css/style.css">
		 <script src="https://cdn.tiny.cloud/1/o8q5j1lxv3ytkrzokb8hyql2qrp33qax69anbh0uaq4gd9l7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
		 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
	<body> 
	<style>button#btnsubmit {
    margin-top: 20px;
}</style>
		<div class="wrapper">       
		<!-- ================Sidebar================  -->      
		<nav id="sidebar">      
		 <div class="sidebar-header">      
			<h3>Asian Games</h3>              
			<strong>AG</strong>       
		 </div>          
		 <ul class="list-unstyled components">     
		  <li class="active"><a href=".././pages/index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>    
		  <li><a href=".././manage_user/index.php"><i class="fas fa-car"></i><span>Manage user</span></a></li>		
		      
		  <li><a href=".././transaction/index.php"><i class="fas fa-tv"></i><span>Transaction</span></a></li>    
		 
		  <li><a href=".././bid_management/index.php"><i class="fas fa-car"></i><span>Bid Management</span></a></li>
		  <li><a href=".././number_management/index.php"><i class="fas fa-car"></i><span>Number Management</span></a></li>
		  <li><a href=".././game_category/index.php"><i class="fas fa-car"></i><span>Game Category</span></a></li>
          <li><a href=".././withdraw/index.php"><i class="fas fa-tv"></i><span>Withdraw Request</span></a></li> 
          <li><a href=".././payment_management/index.php"><i class="fas fa-tv"></i><span>Payment Managementt</span></a></li>
           <li>
		    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
		    <i class="fas fa-user-friends"></i><span>Page Setting</span></a>                 
					<ul class="collapse list-unstyled" id="pageSubmenu">                        
		              <li><a href=".././page_setting/privacypolicy.php">Privacy Policy</a></li> 
		              <li><a href=".././page_setting/termandcondition.php">Terms & Conditions</a></li>		
					  <li><a href=".././page_setting/enquiry.php">About Us</a></li>
		      </ul> 
		  </li>
            <li><a href=".././app_setting/index.php"><i class="fas fa-tv"></i><span>App Setting </span></a></li>
            
		   
		 </ul>         
		</nav>     
		<!-- =======================Page Content=====================  -->  
		<div id="content">         
			<nav class="navbar navbar-expand-lg navbar-light">      
				<div class="container-fluid">               
					<button type="button" id="sidebarCollapse" class="btn">     
						<i class="fas fa-bars"></i>                      
						<!-- <span>Toggle Sidebar</span> -->             
					</button>               
					<div class="admin-panel">       
						<ul class="ml-auto">          
							<li>						
								<a href="#profilemenu" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
								<img src=".././images/Pixabay.png" /></a>						
								<ul class="collapse list-unstyled drop-list" id="profilemenu">								
									<li><a href="#">Agent</a></li> 
									<li><a href="#" >Admin</a></li>		
									<li><a href="#">End User</a></li>	
								</ul>						
							</li> 						
							<li>Admin</li>						
							<li>				
								<a href="#adminbmenu" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
								<img src=".././images/eng.png" /></a>		
								<ul class="collapse list-unstyled drop-list" id="adminbmenu">	
									<li><a href="#">Agent</a></li>	
									<li><a href="#">Admin</a></li>	
									<li><a href="#">End User</a></li>	
								</ul>								
							</li>							                
						</ul>            
					</div>            
				</div>     
			</nav>

			<div class="main-content">	