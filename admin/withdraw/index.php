<?php include '../pages/header.php'; ?>

<?php include '../pages/sidemenu.php'; ?>

<?php 
    $results = array(); 
           $search =  $_GET['search'];
         $resultdata = $con->query("select tbl_withdrawal.*, tbl_user.* from `tbl_withdrawal` left join tbl_user on tbl_withdrawal.userId = tbl_user.userId where tbl_user.clientId like '%$search%' or tbl_user.name like '%$search%' or tbl_user.phoneNumber like '%$search%'  or tbl_user.mycouponcode like '%$search%'  or tbl_user.refcouponcode like '%$search%' or tbl_withdrawal.amount like '%$search%'  or tbl_withdrawal.status like '%$search%'  or tbl_withdrawal.createAt like '%$search%'  or tbl_withdrawal.updated like '%$search%' ");

    while($row = mysqli_fetch_array($resultdata)) {
        $results[] = $row;
    }
    
     
?>
<script>
    function getval(sel)
{
 window.location.href = "https://asiangameclub.com/admin/transaction/index.php?category="+sel.value; 
}


</script>
<h3>Withdraw Request</h3>
					
           <div class="row">
                        
                        <div class="col-sm-12 col-xl-12 col-lg-12">
                            
                            <div class="card user-view">
                           <!--    <div>-->
                           <!--                <form action="/action_page.php" class="cust-searchbar">	-->
                        			<!--	  <div class="input-group">	-->
                        			<!--       <select name="category" onchange="getval(this);">-->
                        			<!--           <option value="">Select One</option>-->
                        			<!--           <option value="Recharge">Recharge</option>-->
                        			<!--           <option value="Withdrawal">Withdrawal</option>-->
                        			<!--           <option value="Wallet">Wallet</option>-->
                        			<!--           <option value="Fund">Fund</option>-->
                        			<!--       </select>-->
                        			<!--     <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>	-->
                        			<!--  </div> 	-->
                        			 
                        			<!--</form> -->
                           <!-- </div>-->
                            <form action="../withdraw/index.php" class="cust-searchbar">	
				  <div class="input-group">		
				 <input type="text" class="form-control" placeholder="Search" name="search">	
			    <!-- <div class="input-group-btn"> -->			
			   <!-- <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button> -->	
			  <!-- </div> -->		
			 </div>	
			</form>	
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
                        <th class="align-middle" scope="col">Type CR / DR</th>
                        <th class="align-middle" scope="col">Category</th>
                        <th class="align-middle" scope="col">TranscationId</th>  
                        <th class="align-middle" scope="col">RazorpayId</th>
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
                                 <td class="align-middle"><strong><?php echo $value['type_CR_DR']?></strong></td> 
                                 <td class="align-middle"><strong><?php echo $value['category']?></strong></td>				
                                <td class="align-middle"><strong><?php echo $value['transcationId']?></strong></td>
                                <td class="align-middle"><strong><?php echo $value['razorpayId']?></strong></td>
                                <td class="align-middle"><strong><?php echo $value['createAt']?></strong></td>
                               
                                 
                    
								<td class="align-middle align-right">
								   <label class="switch">  <input type="checkbox" name="my_checkbox" id="checkbox1"><span class="slider round"></span></label> &nbsp;  
								 
							<!--	 <a href="view.php?id=<?php //echo $value['userId']; ?>">
									<img src=".././images/Group 28.png">
								</a>-->
									</td> 
										    
										 </tr>
										 
										 
									 <?php } ?>
										 						  					
								   </tbody>				  
								  </table>	

<script>
/*

$('#checkbox1').click(function () {
    if ($(this).attr('checked')) {
        alert('is checked');
    } else {
        alert('is not checked');
    }
})






    $(document).ready(function() {
    //set initial state.
    $('#textbox1').val(this.checked);

    $('#checkbox1').change(function() {
        if(this.checked) {
            var returnVal = confirm("Are you sure?");
            $(this).prop("checked", returnVal);
        }
        $('#textbox1').val(this.checked);        
    });
});*/
</script>




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
        $('#checkbox1').change(function(){
    var id=$(this).attr('id');
    var status = $(this).val();
    if(status == 1) {
        status = 0; 
    } else {
        status = 1; 
    }
    alert(id);
    $.ajax({
            type:'POST',
            url:'api/update-staus.php',
            data:'id= ' + id + '&status='+status
        });
    });
    </script>


 <!-- Update Status -->
<?php include '../pages/footer.php'; ?>