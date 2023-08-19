<?php include '../pages/header.php'; ?>

<?php include '../pages/sidemenu.php'; ?>

<?php 
 
       $resultdata = $con->query("SELECT * from `tbl_app_setting` ");
   
    
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    
    }
?>

<script>
    $(document).ready(function (e) {
        $("#dataform").on('submit',(function(e) {
            // alert("aaaaaaaaa");
            $("#btnsubmit").hide();
            $("#loader").show();
            e.preventDefault();
            $.ajax({
                url: "api/edit-api.php",
                // alert("asa");
                type: "POST",
                dataType:"JSON",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    // console.log(data)
                    $("#btnsubmit").show(); 
                    $("#loader").hide();
                    if(data.status == '200')
                    {
                       // $("#successmessage").show()
                        //$("#dataform")[0].reset(); 
                          Swal.fire({
                              title: "<i>Update Successfully</i>", 
                              html: "<b>New Record Update Successfully</b>",  
                              confirmButtonText: "<u>Ok</u>", 
                            });
                        //  window.location. reload();
                        //  window.location.assign("index.php")
                    }else if(data.status == '205')
                    { 
                        $("#err").show()
                        alert("File size is greater than 2 MB");
                        $("#loader").hide();
                    }
                    else
                    { 
                        $("#err").show()
                    }
                },
                error: function(e) 
                {
                }          
            });
        }));
    });
</script>

<h3>App Settings</h3>
<style>
   .app-setting label{    margin-top: 15px;} 
   .sub{ margin-top: 15px; width:100%;}
</style>
<div class="row app-setting">
                        
                        <div class="col-sm-12 col-xl-12 col-lg-12">
                            <div class="card user-view">

          <form id="dataform" class="cust-searchbar" method="POST">
               <?php foreach($result as $value){ ?>
               <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                <div class="input-group">
                    <label>Referal Url</label>
                    <input type="text" class="form-control" value="<?php echo $value['refelUrl']  ?>" placeholder="<?php echo $value['refelUrl']  ?>" name="refelUrl">
                </div>
                <div class="input-group mt-10 pt-10">
                    <label>App Url</label>
                    <input type="text" class="form-control" value="<?php echo $value['appUrl']  ?>" placeholder="<?php echo $value['appUrl']  ?>" name="appUrl">
                </div>
                <div class="input-group">
                    <label>Razorpay Key</label>
                    <input type="text" class="form-control" value="<?php echo $value['razorpayKey']  ?>" placeholder="<?php echo $value['razorpayKey']  ?>" name="razorpayKey">
                </div>
                <div class="input-group">
                    <label>App Version</label>
                    <input type="text" class="form-control" value="<?php echo $value['appVersion']  ?>" placeholder="<?php echo $value['appVersion']  ?>" name="appVersion">
                </div>
                <div class="input-group">
                    <label>Support Number</label>
                    <input type="text" class="form-control" value="<?php echo $value['supportNumber']  ?>" placeholder="<?php echo $value['supportNumber']  ?>" name="supportNumber">
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="<?php echo $value['email']  ?>" placeholder="<?php echo $value['email']  ?>" name="email">
                </div>
                <div class="input-group">
                    <label>Maintenance</label>
                    <input type="text" class="form-control" value="<?php echo $value['maintenance']  ?>" placeholder="<?php echo $value['maintenance']  ?>" name="maintenance">
                </div>
               
				  
			          <div class="input-group-btn sub"> 
			          <input type="submit" value="submit" id="btnsubmit">
			             	
			          </div> 
			          
			          
			          
			     	
			     <?php } ?>
		  </form>
		  
		  </div>
		  </div>
		  </div>
           		




 <!-- Update Status -->
<?php include '../pages/footer.php'; ?>