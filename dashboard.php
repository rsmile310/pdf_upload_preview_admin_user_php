<?php
	include_once('controller/config.php');
	$sql = "SELECT * FROM tbl_user where ISNULL(role) order by name";
    $result = $conn->query($sql);
?>
<?php include_once('header2.php');?>
	<div class="user_del_msg"></div>
	<div class="content px-1 py-3" style="overflow-x:scroll;">
		<!-- Button to Open the Modal -->
		<div class="text-right px-3">
			<button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#myModal">
				Register
			</button>
		</div>
		<table id="example" class="table table-striped " style="width:100%">
			<thead>
				<tr>
					<th class="text-center">Name</th>
					<th class="text-center">Email</th>
					<th class="text-center">Password</th>
					<th class="text-center"><i class="fas fa-cogs"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($result)){?>
					<tr id="user_tr_<?php echo $row['id']?>">
						<td align="center"><?php echo $row['name']?></td>
						<td align="center"><?php echo $row['email']?></td>
						<td align="center"><?php echo base64_decode($row['pass'])?></td>
						<td align="center">
							<a class="report_del btn btn-default" onclick = "userDel(<?php echo $row['id']?>)"><i class="fas fa-trash-alt"></i></a>
							<a class="btn btn-default"  href="adminView.php?id=<?php echo $row['id']?>"><i class="fas fa-eye"></i></a>
						</td>
					</tr>
				<?php } mysqli_close($conn);?>
			</tbody>
		</table>

		<!-- The Modal -->
		<div class="modal fade " id="myModal">
			<div class="modal-dialog col-lg-5 col-xl-5  mx-auto">
			<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Register</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body p-0">
						<div class="card card-signin flex-row p-0">
							<div class="card-body">
								<div class="statusMsg"></div>
								<form id="register_form" class="form-signin" enctype="multipart/form-data" autocomplete="off">
									<div class="form-label-group">
										<input type="text" id="register_name" name="register_name" class="form-control" placeholder="Username" autocomplete="false" required autofocus="">
										<label for="register_name">Username</label>
									</div>

									<div class="form-label-group">
										<input type="email" id="register_email" name="register_email" class="form-control" placeholder="Email address" required>
										<label for="register_email">Email address</label>
									</div>
									<div class="form-label-group">
										<input type="password" id="register_pass" name="register_pass" class="form-control" placeholder="Password" required>
										<label for="register_pass">Password</label>
									</div>
									
									<div class="form-label-group">
										<input type="password" id="register_confirm_pass" name="register_confirm_pass" class="form-control" placeholder="Confirm Password" required>
										<label for="register_confirm_pass">Confirm password</label>
									</div>
									<!-- <button class="w-50 mx-auto btn btn-sm btn-primary btn-block text-uppercase"  id="btn_res">Register</button> -->
									<input type="submit" name="submit" class="w-50 mx-auto btn btn-primary submitBtn btn-block text-uppercase" value="SUBMIT"/>
								</form>
							</div>
						</div>
					</div>
			</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			// confirm password validation start
			var register_pass = $("#register_pass");
			var register = $("#register_confirm_pass");
			function validatePassword(){
				if(register_pass.val() != register.val()) {
					register.get(0).setCustomValidity("Passwords don't match!");
				} 
				else {
					register.get(0).setCustomValidity('');
				}
			}
			
			$("#register_pass").change(function(){
				validatePassword();
			});
		
			register.keyup(function(){
				validatePassword();
			});
			// end

			// clients register start
			$("#register_form").on('submit', function(e){
				e.preventDefault();
				$.ajax({
					url: "controller/register.php",
					dataType:'json',
					method:"post",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					beforeSend: function(){
						$('.submitBtn').attr("disabled","disabled");
						$('#register_form').css("opacity",".5");
					},
					success: function(response){
						console.log(response);
						$('.statusMsg').html('');
						if(response.status == 1){
							$('#register_form')[0].reset();
							$('.statusMsg').html('<div class="alert alert-success" role="alert"><strong>Success! </strong>'+response.result+'</div>');
							setTimeout(window.location.reload(),3000);
						}else{
							$('.statusMsg').html('<div class="alert alert-danger" role="alert"><strong>Warning!</strong>'+response.result+'</div>');
						}
						$('#register_form').css("opacity","");
                		$(".submitBtn").removeAttr("disabled");

						window.setTimeout(function() {
							$(".alert").fadeTo(500, 0).slideUp(500, function(){
								$(this).remove(); 
							});
						}, 2000);
					}
				});
			});
			// end
			$('#example').DataTable();
		});
		function userDel(id){
            $.ajax({
                url: "controller/userDelete.php",
                dataType:'json',
                method:"post",
                data:{id:id},
                success: function(response){
                    if(response.status){
                        $("#user_tr_"+id).hide();
                        $('.user_del_msg').html('<div class="alert alert-success" role="alert"><strong>Success! </strong>'+response.message+'</div>');
                    }
                    else
                        $('.user_del_msg').html('<div class="alert alert-danger" role="alert"><strong>Warning!</strong>'+response.result+'</div>');
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                        });
                    }, 2000)
                }
            });
        }
	</script>
<?php include_once('footer.php');?>