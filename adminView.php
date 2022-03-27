<?php 
    include_once('controller/config.php');
    $id=$_GET['id'];
	$sql = "SELECT * FROM tbl_report where user_id=$id order by report_name";
    $result = $conn->query($sql);
    
?>
<?php include_once('header.php'); ?>
    <div class="report_del_msg"></div>
    <div class="px-0 py-3 mx-3">
        <div class="row mx-0">
            <div class="col-lg-3 px-1 py-2">
                <div class="statusMsg"></div>
                <form id="fupForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="report_date">Report Date</label>
                        <input type="date" class="form-control" id="report_date" name="report_date" required />
                    </div>
                    <div class="form-group">
                        <label for="evaluation_date">Evaluation Date</label>
                        <input type="date" class=" form-control" id="evaluation_date" name="evaluation_date" required />
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" id="file" name="files[]" multiple required
                            style="border: none; padding-left: 0;" />
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary submitBtn" value="Upload" />
                </form>
            </div>
            <div class="col-lg-9 px-1 py-2 " style="overflow-x:scroll;">
                <div class="text-right px-3">
                    <a class="btn btn-primary my-1 rounded-circle p-0" href="dashboard.php" style="font-size:30px">
                        <i class="fas fa-arrow-circle-left"></i>
                    </a>
                </div>
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Report Number</th>
                            <th scope="col" class="text-center">Instrument</th>
                            <th scope="col" class="text-center">Report Date</th>
                            <th scope="col" class="text-center">Evaluation Date</th>
                            <th scope="col" class="text-center"><i class="fas fa-cogs"></i></th>
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
                                    <a class="report_del btn btn-default" for="<?php echo $row['id']?>" onclick = "reportDel(<?php echo $row['id']?>)"><i class="fas fa-trash-alt"></i></a>
                                    <a class="report_view btn btn-default" id="report_view_<?php echo $row['id']?>" onclick = "reportView(<?php echo $row['id']?>)"  data-toggle="modal" data-target="#Modal"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php } mysqli_close($conn);?>
                    </tbody>
                </table>
            </div>
            <div class="modal fade " id="Modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Report</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body p-0 overflow-auto">
                            <iframe id="admin_iframe" src="" width="100%" height="500px"></iframe>
                        </div>
                    </div>
                </div>
		    </div>
        </div>
        <!-- The Modal -->
		
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
            // Submit form data via Ajax
            $("#fupForm").on('submit', function (e) {
                e.preventDefault();
                var dataString = new FormData(this);
                dataString.append('user_id',"<?php echo $id ?>");
                $.ajax({
                    type: 'POST',
                    url: 'submit.php',
                    data: dataString,
                    dataType: 'json',
                    contentType: false,
                    cash: false,
                    processData: false,
                    beforeSend: function () {
                        $('.submitBtn').attr("disabled", "disabled");
                        $('#fupForm').css("opacity", ".5");
                    },
                    success: function (response) {
                        $('.statusMsg').html('');
                        if (response.status == 1) {
                            $('#fupForm')[0].reset();
                            var temp="";
                            for(var i=0; i<Number(response.value.length); i++){
                                console.log(response.value[i].report_name);
                                (temp += "<tr id = 'tr_"+response.value[i].id+"'><td id='report_name_"+
                                    response.value[i].id+"'>"+response.value[i].report_name+"</td><td>"+
                                    response.value[i].instrument+"</td><td>"+
                                    response.value[i].report_date+"</td><td>"+
                                    response.value[i].evaluation_date+"</td><td class='d-flex'>"+
                                    "<a class='btn btn-default' onclick = 'reportDel("+response.value[i].id+")'><i class='fas fa-trash-alt'></i></a>"+
                                    "<a class='btn btn-default'  onclick = 'reportView("+response.value[i].id+")'  data-toggle='modal' data-target='#Modal'><i class='fas fa-eye'></i></a>"+
                                    "</td></tr>");
                            }
                            $("#example_tbody").html(temp);
                            $('.statusMsg').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success! </strong>'+response.message+'</div>');
                        } else {
                            $('.statusMsg').html('<p class="alert alert-danger">' + response.message + '</p>');
                        }
                        $('#fupForm').css("opacity", "");
                        $(".submitBtn").removeAttr("disabled");
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove(); 
                            });
                        }, 2000);
                    },
                    error: function (response) {
                        $('.statusMsg').html('');
                        if (response.status == 0) {
                            $('.statusMsg').html('<p class="alert alert-danger">' + response.message + '</p>');
                            $('#fupForm').css("opacity", "");
                            $(".submitBtn").removeAttr("disabled");
                        }
                    },
                    done: function (response) {
                        $('.statusMsg').html('<p class="alert alert-danger">' + response.status + '</p>');
                    }
                });
            
            });
            // end
        });
        //iframe view
        function reportView(id){
            $report_src="./uploads/"+$("#report_name_"+id).text()+".pdf";
            $("#admin_iframe").attr("src",$report_src);
        }

        //report delete ajax
        function reportDel(id){
            $.ajax({
                url: "controller/reportDelete.php",
                dataType:'json',
                method:"post",
                data:{id:id},
                success: function(response){
                    if(response.status){
                        $("#tr_"+id).hide();
                        $('.report_del_msg').html('<div class="alert alert-success" role="alert"><strong>Success! </strong>'+response.message+'</div>');
                    }
                    else
                        $('.report_del_msg').html('<div class="alert alert-danger" role="alert"><strong>Warning!</strong>'+response.result+'</div>');
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


