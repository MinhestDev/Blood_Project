<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{


 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Hệ thống hiến máu | Danh sách hiến máu</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				

						<div class="panel-body">
										<form method="post" name="search" class="form-horizontal" onSubmit="return valid();">
											<div class="form-group">
												<label class="col-sm-4 control-label">Tìm kiếm người hiến hoặc tên yêu cầu/ Số điện thoại</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="searchdata" id="searchdata" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="search" type="submit">Tìm kiếm</button>
												</div>
											</div>

										</form>

									</div>
					<div class="col-md-12">

						<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Kết quả gần nhất "<?php echo $sdata;?>" từ khóa </h4>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Thông tin</div>
							<div class="panel-body">
							
								<table border="1" class="table table-responsive">
                                    <thead>
                                         <tr>
                                         	<th>STT</th>
                                          <th>Tên người hiến</th>
                                          <th>Số điện thoại</th>
                                            <th>Tên người yêu cầu</th>
                                            <th>Số điện thoại người yêu cầu</th>
                                            <th>Email người yêu cầu</th>
                                            <th>Yêu cầu hiến máu cho</th>
                                            <th>Tin nhắn yêu cầu</th>
                                            <th>Ngày gửi yêu cầu</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       
                                        <tr><?php
                                          
$sql="SELECT tblbloodrequirer.BloodDonarID,tblbloodrequirer.name,tblbloodrequirer.EmailId,tblbloodrequirer.ContactNumber,tblbloodrequirer.BloodRequirefor,tblbloodrequirer.Message,tblbloodrequirer.ApplyDate,tblblooddonars.id as donid,tblblooddonars.FullName,tblblooddonars.MobileNumber from  tblbloodrequirer join tblblooddonars on tblblooddonars.id=tblbloodrequirer.BloodDonarID where tblblooddonars.FullName like '%$sdata%' || tblblooddonars.MobileNumber like '%$sdata%' || tblbloodrequirer.name like '%$sdata%' || tblbloodrequirer.ContactNumber like '%$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php  echo htmlentities($row->FullName);?></td>
                                            <td><?php  echo htmlentities($row->MobileNumber);?></td>
                                        <td><?php  echo htmlentities($row->name);?></td>
                                             <td><?php  echo htmlentities($row->ContactNumber);?></td>
                                             <td><?php  echo htmlentities($row->EmailId);?></td>
                                          <td><?php  echo htmlentities($row->BloodRequirefor);?></td>
                                          
                     
                 <td><?php  echo htmlentities($row->Message);?> 
                  </td>
                               
                                            <td>
                                              <?php  echo htmlentities($row->ApplyDate);?>  
                                            </td>
                                        </tr>
                                    <?php $cnt=$cnt+1;}} else {?>
                                        <tr>
                                            <th colspan="8" style="color:red;"> Không tìm thấy bản ghi</th>
                                        </tr>
                                    <?php } }?>
                                    </tbody>
                                </table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
