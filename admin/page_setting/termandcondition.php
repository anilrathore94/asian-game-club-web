<?php include '../pages/header.php'; ?>

<?php include '../pages/sidemenu.php'; ?>
 
 <?php 
    $title = "Terms And Conditions";
    $resultdata = $con->query("SELECT *  from  `tbl_pages` WHERE `title` = 'Terms And Conditions' ");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    }
?>
 
 <!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax Start <::::::::::::::::::::::::::::::::::::::  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#dataform").on('submit',(function(e) { 
            $("#btnsubmit").hide();
            $("#loader").show();
            e.preventDefault();
            $.ajax({
                url: "api/updatepage.php", 
                type: "POST",
                dataType:"JSON",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                { 
                    $("#btnsubmit").show(); 
                    $("#loader").hide();
                    if(data.status == '200')
                    {
                        swal({
                            title: "Successful",
                            text: data.message,
                            type: "success"
                        }).then(function() {
                           window.location. reload()
                        }); 
                    }
                    else
                    { 
                        swal({
                            title: "Error",
                            text: "Something went wrong",
                            type: "error"
                        }).then(function() {
                           //window.location. reload()
                           
                        });
                        $("#loader").hide();
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
 
 
 

<h3>Terms And Conditions</h3>
<div class="modal-body-form">
					<div class="modal-body-form-content">
					 <form id="dataform" method="post">
					     
					     <?php $i = 1; ?>
                    <?php foreach($result as $value) { ?>     
                        <input type='hidden' value='<?php echo $value['pageId']?>' name='pageId'> 
					     
					  <div class="form-group">
					   
						<textarea  class="form-control" id="description" name="description" placeholder="Description">
						    <?php echo $value['description']?>
						    </textarea>
						 </div>
						 <div class="form-group">
						     <button type="submit" id="btnsubmit" class="btn submit-button-cust">Update</button>
					     </div>
					     <?php } ?>
				 </form>
			    </div>
			   </div>


 <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>

 <!-- Update Status -->
<?php include '../pages/footer.php'; ?>