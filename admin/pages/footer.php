
</div> <!-- main content end --> 

</div>

<!--===================================Agent Popup===========================  -->
<div class="modal fade" id="exampleModalagent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">	
  <div class="modal-dialog tabs-cust-w" role="document"> 
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create Agent</h4>
        <span><img src="images/close.png" data-dismiss="modal"></span>
      </div>	  
      <div class="modal-body-form pt-0">
	   <div class="tab">  
        <button class="tablinks active" onclick="openCity(event, 'basicinformation')">Basic Information</button>
        <button class="tablinks" onclick="openCity(event, 'paymentinformation')">Payment Information</button>
        <button class="tablinks" onclick="openCity(event, 'accountinformation')">Account Information</button>
       </div>
       <div id="basicinformation" class="tabcontent active" style="display:block;">
        <form>
		    <div class="row  img-cust">
		        <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="agentid" class="col-form-label">Agent ID</label>
                      <input type="text" class="form-control bg-cust" id="agentid" placeholder="2021-07-14-211625">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Agent Name</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option></option>
                          <option>PURUSHOTAM</option>
                          <option>ROHIT</option>
                          <option>MB Rajawat</option>
                          <option>MOHAN</option>
                        </select>
                    </div>
		            <div class="form-group">
                      <label for="licensenumber" class="col-form-label"> Business License Number</label>
                      <input type="number" class="form-control" id="licensenumber" placeholder="">
                    </div>
		            <div class="form-group">
                      <label for="datePeriod" class="col-form-label">Valid Period of business License</label>
                      <input type="date" class="form-control" id="datePeriod" placeholder="">
                    </div>
		            <div class="form-group">
                      <label for="purchasedate" class="col-form-label"> Name of Legal Person</label>
                      <input type="date" class="form-control" id="purchasedate" placeholder="">
                    </div>
		            <div class="form-group">
                      <label for="issuedate" class="col-form-label"> ID Number of legal person</label>
                      <input type="date" class="form-control" id="issuedate" placeholder="">
                    </div>		  
                </div>
		        <div class="col-lg-6 col-md-6 col-sm-12">
		            <div class="form-group">
                    <label for="image" class="col-form-label"> Business License Upload</label>
					<img id="blah" src="#" alt="your image" />
                    <input type="file" id="upload" class="custom-file-input" onchange="readURL(this);">
                  </div>
                </div>			
            </div>
		    <hr>
		    <div class="row">
		        <div class="col-lg-6 col-md-6 col-sm-12">
		            <div class="form-group">
                      <label for="contacts" class="col-form-label">Contacts</label>
                      <input type="number" class="form-control" id="contacts" placeholder="">
                    </div>
		            <div class="form-group">
                      <label for="mailaddress" class="col-form-label">Mail Address</label>
                      <input type="email" class="form-control" id="mailaddress" placeholder="">
                    </div>		
		        </div>
		        <div class="col-lg-6 col-md-6 col-sm-12">
		            <div class="row">
		                <div class="col-lg-6 col-md-6 col-sm-12">
			                <div class="form-group">
                                <label for="exampleFormControlSelect1">Agency City</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>option1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                            </div>			    			 
		                </div>
			            <div class="col-lg-6 col-md-6 col-sm-12">
			                <div class="form-group">
                                <label for="exampleFormControlSelect1">Agency City</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>option2</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                            </div>
		                </div>
		            </div>
		            <div class="form-group">
                        <label for="contacts" class="col-form-label">Contact Number</label>
                        <input type="number" class="form-control" id="contacts" placeholder="">
                    </div>
		        </div>
		    </div>
        </form>
        </div>	
<!-- ===============================tabs2============================================ -->
        <div id="paymentinformation" class="tabcontent">

        <form>
		    <div class="row  img-cust">
		        <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="name" class="col-form-label">Bank Name</label>
                      <input type="text" class="form-control" id="name" placeholder="">
                    </div>
                    
		            <div class="form-group">
                      <label for="name" class="col-form-label">Bank Account Name</label>
                      <input type="number" class="form-control" id="name" placeholder="">
                    </div>
		            		            	  
                </div>
		        <div class="col-lg-6 col-md-6 col-sm-12">
		           <div class="form-group">
                      <label for="number" class="col-form-label">Bank Account</label>
                      <input type="number" class="form-control" id="number" placeholder="">
                    </div>
                </div>			
            </div>
		    <hr>
		    <div class="row">
		        <div class="col-lg-6 col-md-6 col-sm-12">
		            <div class="form-group">
                      <label for="contacts" class="col-form-label">Alipay Name</label>
                      <input type="number" class="form-control" id="contacts" placeholder="">
                    </div>
		            <div class="form-group">
                      <label for="mailaddress" class="col-form-label">Wechat Name</label>
                      <input type="email" class="form-control" id="mailaddress" placeholder="">
                    </div>		
		        </div>
		        <div class="col-lg-6 col-md-6 col-sm-12">
		           
		            <div class="form-group">
                        <label for="account" class="col-form-label">Alipay Account</label>
                        <input type="text" class="form-control" id="account" placeholder="">
                    </div>
					<div class="form-group">
                        <label for="account" class="col-form-label">Wechat Account</label>
                        <input type="text" class="form-control" id="account" placeholder="">
                    </div>
		        </div>
		    </div>
        </form>
        </div>	
<!-- ===============================tabs3============================================-->
        <div id="accountinformation" class="tabcontent">

        <form>
		    <div class="row  img-cust">
		        <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="loginaccount" class="col-form-label">Login Account</label>
                      <input type="text" class="form-control" id="loginaccount" placeholder="">
                    </div>
					
					<div class="form-group">
                      <label for="nickname" class="col-form-label">Nick Name</label>
                      <input type="text" class="form-control" id="nickname" placeholder="">
                    </div>
                    
		            <div class="form-group">
                      <label for="psw" class="col-form-label"> Password</label>
                      <input type="password" class="form-control" id="psw" placeholder="">
                    </div>
					
					<div class="row">
		                <div class="col-lg-6 col-md-6 col-sm-12">
			                <div class="form-group">
                      <label for="purchasedate" class="col-form-label">Term of Validity</label>
                      <input type="date" class="form-control" id="purchasedate" placeholder="">
                    </div>		    			 
		                </div>
			            <div class="col-lg-6 col-md-6 col-sm-12">
			                <div class="form-group">
                      <label for="issuedate" class="col-form-label">Term of Validity</label>
                      <input type="date" class="form-control" id="issuedate" placeholder="">
                    </div>
		                </div>
		            </div>
		            		  
                </div>
		        <div class="col-lg-6 col-md-6 col-sm-12">
		            <div class="form-group">
                    <label for="image" class="col-form-label">Agent Photo</label>
					<img id="blah" src="#" alt="your image" />
                    <input type="file" id="upload" class="custom-file-input" onchange="readURL(this);">
                  </div>
                </div>			
            </div>
		   
        </form>
        </div>	
     </div>	 
      
        <div class="modal-footer">
          <button type="button" class="btn close-button-cust" data-dismiss="modal">Close</button>
		  <button type="button" class="btn submit-button-cust">Create User</button>
        </div>
    </div>
  </div>
</div>
<!--===================================Agent Popup End=========================== -->
<!--===================================delete Popup=========================== -->
<div class="modal fade" id="exampleModaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  
    <div class="modal-dialog" role="document">    
      <div class="modal-content">      
        <div class="modal-header">         
          <h4 class="modal-title">Delete Popup</h4>        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">          
            <span aria-hidden="true"><img src="images/close.png" data-dismiss="modal"></span>        
          </button>      
        </div>      
        <div class="modal-body">        ...      </div>      
        <div class="modal-footer">        
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>        
          <button type="button" class="btn btn-danger">Delete</button>     
           </div>    
         </div>  
       </div>
     </div>		
<!-- ===================================delete Popup End=========================== -->
 
	<!-- js library -->
	<script type="text/javascript" src="../js/jquery.min.js"></script>	
	<script type="text/javascript" src="../js/popper.min.js"></script>	
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="../js/main.js"></script>	
	<!-- Font Awesome JS -->  
	<script defer src="../js/fontawesom-solid.js"></script>  
	<script defer src="../js/fontawesome.js"></script>
	
	</body>
</html>