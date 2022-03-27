<?php
	session_start();
	include_once('controller/config.php');
    $id=$_SESSION['id'];
	$sql = "SELECT * FROM tbl_report where user_id=$id order by report_name";
    $result = $conn->query($sql);
?>
<?php include_once('header2.php');?>

	<div class="content px-1 py-3">
		<div class="d-flex mr-3">
			<div class="mb-3 d-flex ml-auto">
				<button type="button" class="btn btn-primary py-2 px-3 font-weight-bold" id="gd_btn">
					Rastreablilidade <i class="fab fa-google-drive"></i>
				</button>
				<span class="input-group-icon" id="basic-addon1"></span>
			</div>
		</div>
		
		<div class="overflow-auto pt-2">
			<table id="userpanel_tbl" class="table table-striped">
				<thead>
					<tr>
						<th scope="col" class="text-center">N. Certificado</th>
						<th scope="col" class="text-center">Instrumento</th>
						<th scope="col" class="text-center">Data da Calibração</th>
						<th scope="col" class="text-center">Vencimento da Calibração</th>
						<th scope="col" class="text-center"></th>
					</tr>
				</thead>
				<tbody id="example_tbody">
					<?php while($row = mysqli_fetch_array($result)){?>
						<tr id = "tr_<?php echo $row['id']?>">
							<td scope="row" align="center" id="report_name_<?php echo $row['id']?>"><?php echo $row['report_name']?></td>
							<td align="center"><?php echo $row['instrument']?></td>
							<td align="center"><?php echo $row['report_date']?></td>
							<td align="center"><?php echo $row['evaluation_date']?></td>
							<td align="center" class="d-flex">
								<a class="report_view btn btn-default" id="report_view_<?php echo $row['report_name']?>" onclick = "userReportView('<?php echo $row['report_name']?>')"  data-toggle="modal" data-target="#userpanel_modal"><i class="fas fa-eye"></i></a>
							</td>
						</tr>
					<?php } mysqli_close($conn);?>
				</tbody>
			</table>
		</div>
		<div class="modal fade " id="userpanel_modal">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Report</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body p-0 overflow-auto">
						<iframe id="user_iframe" src="" width="100%" height="500px"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#userpanel_tbl').DataTable();
			$("#gd_btn").click(function(){
				window.location.href="https://drive.google.com/drive/folders/1bHYUi8w17Z3WU80864k4oOnNEE8ATj_Q";
			});
		});
		function userReportView(name){
			console.log(name);
			$report_src="./uploads/"+name+".pdf";
			$("#user_iframe").attr("src",$report_src);
		}
	</script>
<?php include_once('footer.php');?>