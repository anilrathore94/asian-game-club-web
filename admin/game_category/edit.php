<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $aId = $_GET['id'];
    $resultdata = $con->query("SELECT * from `tbl_game_category` where id = '$aId'");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    }
?>
<!-- ::::::::::::::::::::::::::::::::::::> Fetch Data End <:::::::::::::::::::::::::::::::::::: -->

<!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax Start <::::::::::::::::::::::::::::::::::::::  -->
 
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
<!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax End <::::::::::::::::::::::::::::::::::::::  -->

<h3>Edit Game Category</h3>
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
                    <label>Name</label>
                    <input type="text" class="form-control" value="<?php echo $value['name']  ?>" placeholder="<?php echo $value['name']  ?>" name="name">
                </div>
                <div class="input-group mt-10 pt-10">
                    <label>Price</label>
                    <input type="text" class="form-control" value="<?php echo $value['price']  ?>" placeholder="<?php echo $value['price']  ?>" name="price">
                </div>
                <div class="input-group">
                    <label>time</label>
                    <input type="text" class="form-control" value="<?php echo $value['time']  ?>" placeholder="<?php echo $value['time']  ?>" name="time">
                </div>
                <div class="input-group">
                    <label>Return Amount</label>
                    <input type="text" class="form-control" value="<?php echo $value['returnAmount']  ?>" placeholder="<?php echo $value['returnAmount']  ?>" name="returnAmount">
                </div>
               
               
				  
			          <div class="input-group-btn sub"> 
			          <input type="submit" value="submit" id="btnsubmit">
			             	
			          </div> 
			          
			          
			          
			     	
			     <?php } ?>
		  </form>
		  
		  </div>
		  </div>
		  </div>
           		

	
<?php include './../pages/footer.php'; ?>