<?php include '../pages/header.php'; ?>

<?php include '../pages/sidemenu.php'; ?>

<?php 
   $search =  $_GET['search'];
   if($search != null){
      
      $resultdata = $con->query("select * from tbl_user  where clientId like '%$search%' or name like '%$search%' or phoneNumber like '%$search%'  or mycouponcode like '%$search%'  or refcouponcode like '%$search%' ");
   }else{
       $resultdata = $con->query("SELECT * from `tbl_user` ");
   }
    
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    }
?>

<h3>Active Users</h3>
<!--<div><button type="button" class="btn add-search" data-toggle="modal" data-target="#myModal" ><i class="fas fa-plus"></i> &nbsp; Create Admin</button></div>
             <style type="text/css">
               .search-admin {
                 margin-top: 25px;
                  border-bottom: 1px solid #dee3ff;
                   padding-bottom: 10px;
                    }
                    </style>	-->
                   <form action="../manage_user/index.php" class="cust-searchbar">	
				  <div class="input-group">		
				 <input type="text" class="form-control" placeholder="Search" name="search">	
			    <!-- <div class="input-group-btn"> -->			
			   <!-- <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button> -->	
			  <!-- </div> -->		
			 </div>	
			</form>					
            <div class="users-table mt-4 mb-4">				 
              <div class="table-responsive">				  
                <table  class="table hover data-table-export nowrap" id= "table-id">					
                  <thead>
                      
                     					  
                    <tr>						
                    						
                     						
                       <th class="align-middle" scope="col">Name</th>	
                       <th class="align-middle" scope="col">Customer Id</th>
                        <th class="align-middle" scope="col">Phone Number</th>
                        <th class="align-middle" scope="col">Wallet</th>
                        <th class="align-middle" scope="col">Own Code</th>
                        <th class="align-middle" scope="col">Ref Code</th>
                        <th class="align-middle" scope="col">Reg.date</th>
                       <th class="align-middle" scope="col" style="text-align: center;">Action</th>				 
                          </tr>					
                           </thead>					
                            <tbody>
                               
                               <?php $i=0; ?>
                            <?php foreach($result as $value){ ?>   					  
                             <tr>						
                              
								<td class="align-middle"><?php echo $value['name']?></td>
								<td class="align-middle"><?php echo $value['clientId']?></td>
                                 <td class="align-middle"><?php echo $value['phoneNumber']?></td>						
                                 <td class="align-middle"><?php echo $value['wallet']?></td>	
                                 <td class="align-middle"><?php echo $value['mycouponcode']?></td> 
                                 <td class="align-middle"><?php echo $value['refcouponcode']?></td>				
                                <td class="align-middle"><?php echo $value['createAt']?></td>
                                
                                
                               
                                 
                                 
								<td class="align-middle align-right">
								   <label class="switch">             
												<input type="checkbox" checked><span class="slider round"></span></label> &nbsp;  
								 
								 <a href="view.php?id=<?php echo $value['userId']; ?>">
									<img src=".././images/view.png">
								</a>
								
								
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