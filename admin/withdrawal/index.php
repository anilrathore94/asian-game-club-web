<?php include '../pages/header.php'; ?>

<?php include '../pages/sidemenu.php'; ?>

<?php 
    //$resultdata = $con->query("SELECT tbl_user.name, tbl_user_bank.* from tbl_user_bank left join tbl_user on tbl_user.userId = tbl_user_bank.userId order by tbl_user_bank.userBankId desc ");
    $resultdata = $con->query("select tbl_withdrawal.*, tbl_user.* from `tbl_user` left join tbl_withdrawal on tbl_withdrawal.userId = tbl_user.userId  ");
    $results = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $results[] = $row;
    }
?>

<h3>All Transaction</h3>
					
           <div class="row">
                        
                        <div class="col-sm-12 col-xl-12 col-lg-12">
                            <div class="card user-view">
                               <div>
                                           <form action="/action_page.php" class="cust-searchbar">	
                        				  <div class="input-group">		
                        				 <input type="text" class="form-control" placeholder="Search" name="search">	
                        			     <div class="input-group-btn"> 			
                        			 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>	
                        			  </div> 	
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
                    						
                     						
                       <th class="align-middle" scope="col">Name / Customer Id</th>	
                       
                        <th class="align-middle" scope="col">Phone Number</th>
                        <th class="align-middle" scope="col">Amount</th>
                        <th class="align-middle" scope="col">Status</th>
                        <th class="align-middle" scope="col">Up Dated</th>
                        <th class="align-middle" scope="col">CreateAt</th>  
                        
                         <th class="align-middle" scope="col" style="text-align: center;">Action</th>					 
                          </tr>					
                           </thead>					
                            <tbody>
                               
                               <?php $i=0; ?>
                            <?php foreach($results as $value){ ?>   					  
                             <tr>						
                              
								<td class="align-middle"><?php echo $value['name']?> <?php echo $value['clientId']?></td>
								
                                 <td class="align-middle"><strong><?php echo $value['phoneNumber']?></strong></td>						
                                 <td class="align-middle"><strong><?php echo $value['amount']?></strong></td>	
                                 <td class="align-middle"><strong><?php echo $value['status']?></strong></td> 
                                 <td class="align-middle"><strong><?php echo $value['updated']?></strong></td>				
                               
                                <td class="align-middle"><strong><?php echo $value['createAt']?></strong></td>
                               
                                 
                                 
								<td class="align-middle align-right">
								   <label class="switch">             
												<input type="checkbox" checked><span class="slider round"></span></label> &nbsp;  
								 
								 
								
								
										</td>		
										    
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

 <script type="text/javascript">
        $('input[name=my_checkbox]').click(function(){
    var id=$(this).attr('id');
    var status = $(this).val();
    if(status == 1) {
        status = 0; 
    } else {
        status = 1; 
    }
    //alert(id);
    $.ajax({
            type:'POST',
            url:'updateustaus.php',
            data:'id= ' + id + '&status='+status
        });
    });
    </script>


 <!-- Update Status -->
<?php include '../pages/footer.php'; ?>