<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $aId = $_GET['userId'];
    $resultdata = $con->query("SELECT * from `tbl_user` where userId = '$aId'");
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

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Form</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Plan Add</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary" href="index.php" role="button">
								<i class="icon-copy ion-ios-arrow-back"></i> Back 
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- horizontal Basic Forms Start -->
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Edit Plan Form</h4>
					</div>
				</div>
				<form  id="dataform" method="post">
                    <?php $i = 1; ?>
                    <?php foreach($result as $value) { ?>     
                        <input type='hidden' value='<?php echo $value['planId']?>' name='planId'>    
                        
                        
                        <div class="form-group">
						<label>Plan Type</label>
						<input class="form-control" type="text" name="type" id="type" value='<?php echo $value['type']?>' placeholder="Plan Type">
					</div> 
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" type="text" name="title" id="title" value='<?php echo $value['title']?>' placeholder="Title">
					</div> 
					<div class="form-group">
						<label>Description</label>
						<input class="form-control" type="text" name="description" id="description" value='<?php echo $value['description']?>' placeholder="Description">
					</div> 
					<div class="form-group">
						<label>Price</label>
						<input class="form-control" type="text" name="price" id="price" value='<?php echo $value['price']?>' placeholder="Price">
					</div> 
					<div class="form-group">
						<label>Selling Price</label>
						<input class="form-control" type="text" name="sellingprice" id="sellingprice" value='<?php echo $value['sellingprice']?>' placeholder="Selling Price">
					</div> 
					<div class="form-group">
						<label>Count</label>
						<input class="form-control" type="text" name="count" id="count" value='<?php echo $value['count']?>' placeholder="Count">
					</div> 
                        
                        
                        
                        
                        
                        
                        
                         
                        <div class="form-group">                                              
                             <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button> 
                            <!-- <button type="submit" id="btnsubmit">Add</button> -->
                        </div>
                        <span id="loader" style="display:none"><img src="./../vendors/images/loader.gif" height="50" width="50"/></span>
                    <?php } ?>
                </form>
			</div>
			<!-- horizontal Basic Forms End -->
		</div>
	</div>
</div>
	
<?php include './../pages/footer.php'; ?>