
<?php include_once('header.php');?>
	<div class="content px-1 py-3">
		<div class="row">
			<div class="col-lg-5 col-xl-5  mx-auto">
			<div class="card card-signin my-5">
				<div class="modal-header text-center">
					<h4 class="modal-title text-center"> Certificados Online </h4>
				</div>
				<div class="card-body">
					<div class="statusMsg"></div>
					<form class="form-signin" id="login_form">
						<div class="form-label-group">
							<input type="email" id="login_email" name="login_email" class="form-control" placeholder="Email address" required="">
							<label for="login_email">Email address</label>
						</div>
						<div class="form-label-group">
							<input type="password" id="login_pass" name="login_pass" class="form-control" placeholder="Password" required="">
							<label for="login_pass">Password</label>
						</div>
						<button type="submit" class="w-50 btn btn-primary btn-block text-uppercase mx-auto" id="login_btn">Log In</button>
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
	<script>
		$("document").ready(function(){
			$("#login_form").on('submit', function(e){
				e.preventDefault();
				$.ajax({
					url: "controller/login.php",
					dataType:'json',
					method:"post",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					beforeSend: function(){
						$('.submitBtn').attr("disabled","disabled");
						$('#login_form').css("opacity",".5");
					},
					success: function(response){
						$('.statusMsg').html('');
						if(response.status == 1){
							if(response.role)
								window.location.href="dashboard.php"
							else
								window.location.href="userpanel.php"
						}else{
							$('.statusMsg').html('<div class="alert alert-danger" role="alert"><strong>Warning!</strong>'+response.message+'</div>');
						}
						$('#login_form').css("opacity","");
                		$(".submitBtn").removeAttr("disabled");
						window.setTimeout(function() {
							$(".alert").fadeTo(500, 0).slideUp(500, function(){
								$(this).remove(); 
							});
						}, 2000);
					}
				});
			});
			

		// $(".alert-warning").remove();
		// if(!$("#email").val()) {
		//   $("#alert").append("<div class='alert alert-warning'><strong>Warning!</strong><br/>You should insert email.</div>");
		// } 
		// else if (!$("#pwd").val()) {
		//   $("#alert").append("<div class='alert alert-warning'><strong>Warning!</strong><br/>You should insert password.</div>");
		// } 
			
			// $("#login_btn").click(function(){
			// 	if(!$("#login_pass").val()){
			// 		alert("Input password correctly!");
			// 	}
			// 	if(!$("#inputEmail").val()){
			// 		alert("Input email correctly!");
			// 	}
			// 	else{
			// 		$.ajax({
			// 			url: 'controller/login.php',
			// 			method:'post',
			// 			dataType: 'json',
			// 			data:{
			// 				email:$("#inputEmail").val(),
			// 				pass:$("#login_pass").val()
			// 			},
			// 			success:function(result){
			// 				if(result=="true"){
			// 					alert("success login");
			// 					window.location.href = "price.php";
			// 				}
								
			// 				else{
			// 					alert("unregistered user!");
			// 					window.location.href = "register.php";
			// 				}
								
							
			// 			}
			// 		});   
			// 	}
					
			// });
		});
	
	</script> 
<?php include_once('footer.php');?> 



