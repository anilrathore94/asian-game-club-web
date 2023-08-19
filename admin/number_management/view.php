<?php include './../pages/header.php'; ?>



<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $userId =  $_GET['id'];
     
    $resultdata = $con->query("select * from `tbl_user` where `userId`='$userId'");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
       $name = $row["name"];
         $clientId = $row["clientId"];
          $phoneNumber = $row["phoneNumber"];
           $wallet = $row["wallet"];
            $mycouponcode = $row["mycouponcode"];
             $refcouponcode = $row["refcouponcode"];
             $result= $row;
              
    }
?>

<?php 
     $userId =  $_GET['id'];
    
    $resultdata = $con->query("select * from `tbl_user_bank` where `userId`='$userId'");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $bankHolderName = $row["bankHolderName"];
         $bankName = $row["bankName"];
          $IFSC = $row["IFSC"];
           $bankAccountNo = $row["bankAccountNo"];
            $mobileNo = $row["mobileNo"];
             $emailID = $row["emailID"];
             $bankName = $row["bankName"];
          $actualName = $row["actualName"];
           $UPIId = $row["UPIId"];
            $isdefault = $row["isdefault"];
             $upiisdefault = $row["upiisdefault"];
             $createAt = $row["createAt"];
             $result= $row;
              
    }
?>




<?php 
    $results = array();
   
    if($_GET["category"]){
        $category = $_GET["category"];
        
         $resultdata = $con->query("select tbl_payment.*, tbl_user.* from `tbl_user` left join tbl_payment on tbl_payment.userId = tbl_user.userId  where tbl_payment.category = '$category' AND tbl_payment.userId='$userId' ");

    while($row = mysqli_fetch_array($resultdata)) {
        $results[] = $row;
    }
    }else{
    $resultdata = $con->query("select tbl_payment.*, tbl_user.* from `tbl_user` left join tbl_payment on tbl_payment.userId = tbl_user.userId  where tbl_payment.userId='$userId'");
   
    while($row = mysqli_fetch_array($resultdata)) {
        $results[] = $row;
    }
    }
?>

<script>
    function getval(sel)
{
 window.location.href = "https://asiangameclub.com/admin/manage_user/view.php?id="+<?php echo $userId ?>+"&&category="+sel.value; 
}
</script>
<!-- ::::::::::::::::::::::::::::::::::::> Fetch Data End <:::::::::::::::::::::::::::::::::::: -->

<!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax Start <::::::::::::::::::::::::::::::::::::::  -->
 

<!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax End <::::::::::::::::::::::::::::::::::::::  -->


          <h3 class="heading-top-view">All Details User</h3>	
              <div class="row">
        <div class="col-sm-12">
            <div class="card">                
                <div class="dasbboard card-body">
                    <div class="row">
                        
                        <div class="col-sm-12 col-xl-12 col-lg-12">
                            <div class="card user-view">
                                <h5>Personal Details</h5>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Name :</span> <?php echo $name ?></p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Client Id :</span> <?php echo $clientId ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Phone Number :</span> <?php echo $phoneNumber ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Wallet :</span> <?php echo $wallet ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Own Code :</span> <?php echo $mycouponcode ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Ref. Code :</span> <?php echo $refcouponcode ?> </p>
                                   </div>
                               </div>
                                
                           </div>
                        </div>
                       
                </div>
                <div class="row">
                     <div class="col-sm-12 col-xl-6 col-lg-6">
                            
                            <div class="card user-view">
                                <h5>Bank Details</h5>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Bank :</span> <?php echo $bankName ?></p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Bank Account No. :</span> <?php echo $bankAccountNo ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>IFSC :</span> <?php echo $IFSC ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Bank Holder Name :</span> <?php echo $bankHolderName ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Mobile No. :</span> <?php echo $mobileNo ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Email :</span> <?php echo $emailID ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Bank Is Default :</span> <?php echo $isdefault ?> </p>
                                   </div>
                               </div>
                              
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Register Date :</span> <?php echo $createAt ?> </p>
                                   </div>
                               </div>
                               
                           </div>
                        </div>
                        
                         <div class="col-sm-12 col-xl-6 col-lg-6">
                            
                            <div class="card user-view">
                                <h5>UPI Details</h5>
                              <div class="user-main">
                                   <div class="u-name">
                                      <p><span>UPI Id :</span> <?php echo $UPIId ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Mobile No. :</span> <?php echo $mobileNo ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Email :</span> <?php echo $emailID ?> </p>
                                   </div>
                               </div>
                               
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Actual Name :</span> <?php echo $actualName ?> </p>
                                   </div>
                               </div>
                               
                              
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>UPI Is Default :</span> <?php echo $upiisdefault ?> </p>
                                   </div>
                               </div>
                               <div class="user-main">
                                   <div class="u-name">
                                      <p><span>Register Date :</span> <?php echo $createAt ?> </p>
                                   </div>
                               </div>
                               
                           </div>
                        </div>
                </div>
                
                
                <div class="row">
                        
                        <div class="col-sm-12 col-xl-12 col-lg-12">
                            <div class="card user-view">
                                <div>
                                           <form action="/action_page.php" class="cust-searchbar">
                                               
                                               <input type="hidden" value="<?php echo $value['userId']; ?>" name="userId">
                                              
                        				  <div class="input-group">	
                        			       <select name="category" onchange="getval(this);">
                        			           <option value="">Select One</option>
                        			           <option value="Recharge">Recharge</option>
                        			           <option value="Withdrawal">Withdrawal</option>
                        			           <option value="Wallet">Wallet</option>
                        			           <option value="Fund">Fund</option>
                        			       </select>
                        			     <button class="btn btn-default" type="submit" onclick=""><i class="glyphicon glyphicon-search"></i></button>	
                        			  </div> 	
                        			 
                        			</form> 
                            </div>
                            </div>
                            
                            <div class="card user-view">
                                <div class="users-table mt-4 mb-4">				 
              <div class="table-responsive">				  
                <table  class="table hover data-table-export nowrap" id= "table-id">					
                  <thead>
                      
                     					  
                    <tr>						
                    						
                     						
                       <th class="align-middle" scope="col">Name / <br>Customer Id /<br> Phone Number</th>	
                       
                        <th class="align-middle" scope="col">Amount</th>
                        <th class="align-middle" scope="col">Type CR / DR</th>
                        <th class="align-middle" scope="col">Category</th>
                        <th class="align-middle" scope="col">TranscationId</th>  
                        <th class="align-middle" scope="col">RazorpayId</th>
                        <th class="align-middle" scope="col">CreateAt</th>
                       <!--  <th class="align-middle" scope="col" style="text-align: center;">Action</th>	-->				 
                          </tr>					
                           </thead>					
                            <tbody>
                               
                               <?php $i=0; ?>
                            <?php foreach($results as $value){ ?>   					  
                             <tr>						
                              
								<td class="align-middle"><?php echo $value['name']?><br> <?php echo $value['clientId']?><br> <?php echo $value['phoneNumber']?></td>					
                                 <td class="align-middle"><?php echo $value['amount']?></td>	
                                 <td class="align-middle"><?php echo $value['type_CR_DR']?></td> 
                                 <td class="align-middle"><?php echo $value['category']?></td>				
                                <td class="align-middle"><?php echo $value['transcationId']?></td>
                                <td class="align-middle"><?php echo $value['razorpayId']?></td>
                                <td class="align-middle"><?php echo $value['createAt']?></td>
                               
                                 
                               <!--  
								<td class="align-middle align-right">
								   <label class="switch">             
												<input type="checkbox" checked><span class="slider round"></span></label> &nbsp;  
								 
								 <a href="view.php?id=<?//php echo $value['userId']; ?>">
									<img src=".././images/Group 28.png">
								</a>
								
								
										</td>-->	
										    
										 </tr>
										 
										 
									 <?php } ?>
										 						  					
								   </tbody>				  
								  </table>	






								 </div>				
								<br>				
							   <div class="pagination users-table-pagination mt-1">				 
                    <div class="page-number">					
                       <p>Items per page</p>					                              
                      <div class="form-group page-drop-size"> 	
											 		<select class  ="form-control" name="state" id="maxRows">
														 <option value="5000">Show ALL Rows</option>
														 <option value="5">5</option>
														 <option value="10">10</option>
														 <option value="15">15</option>
														 <option value="20">20</option>
														 <option value="50">50</option>
														 <option value="70">70</option>
														 <option value="100">100</option>
														</select>												 		
									  	</div>
                   </div>					
	                 <div class="number-of-page"><p>1 - 5  of  12 </p></div>					
	                  <div class='pagination-container number-pn' >
				       <nav>
				         <ul class="pagination">            
                    <li data-page="prev" >
								      <span> <img src=".././images/prev.png"> <span class="sr-only">(current)</span></span>
								    </li>				  
                    <li data-page="next" id="prev">
								       <span> <img src=".././images/next.png"> <span class="sr-only">(current)</span></span>
								    </li>
				        </ul>
				      </nav>
			      </div>


            </div>	

          
            




           </div>
                            </div>
                        </div>
                </div>
                
                
                
                
            </div>
        </div>
    </div>	



	
<?php include './../pages/footer.php'; ?>