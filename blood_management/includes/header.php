<?php error_reporting(0);
session_start(); ?>
<!-- header -->
    <header>
        <!-- top-bar -->
        <div class="top-bar py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 top-social-agile">
                        <div class="row">
                            <!-- social icons -->
                            <ul class="col-lg-4 col-6 top-right-info text-center">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="mx-3">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                                <li class="ml-3">
                                    <a href="#">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                </li>
                            </ul><?php 
$pagetype="contactus";
$sql = "SELECT * from tblcontactusinfo";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
                            <!-- //social icons -->
                            <div class="col-6 header-top_w3layouts pl-3 text-lg-left text-center">
                                <p class="text-white">
                                    <i class="fas fa-map-marker-alt mr-2"></i><?php  echo $result->Address; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 top-social-agile text-lg-right text-center">
                        <div class="row">
                            <div class="col-lg-7 col-6 top-w3layouts">
                                <p class="text-white">
                                    <i class="far fa-envelope-open mr-2"></i>
                                    <a href="mailto:info@example.com" class="text-white"><?php  echo $result->EmailId; ?></a>
                                </p>
                            </div>
                            <div class="col-lg-5 col-6 header-w3layouts pl-4 text-lg-left">
                                <p class="text-white">
                                    <i class="fas fa-phone mr-2"></i>+<?php  echo $result->ContactNo; ?></p>
                            </div>
                        </div><?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- //top-bar -->

    <!-- header 2 -->
    <div id="home">
        <!-- navigation -->
        <div class="main-top py-1">
            <nav class="navbar navbar-expand-lg navbar-light fixed-navi">
                <div class="container">
                    <!-- logo -->
                    <h1>
                        <a class="navbar-brand font-weight-bold font-italic" href="index.php" style="font-size: 25px">
                            <span>Hiến máu</span> nhân đạo
                            <i class="fas fa-syringe"></i>
                        </a>
                    </h1>
                    <!-- //logo -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item active mt-lg-0 mt-3">
                                <a class="nav-link" href="index.php" style="font-size: 13px">Trang chủ
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="about.php" style="font-size: 13px">Vê chúng tôi</a>
                            </li>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="contact.php" style="font-size: 13px">Liên hệ</a>
                            </li>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="donor-list.php" style="font-size: 13px">Danh sách hiến</a>
                            </li>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="search-donor.php" style="font-size: 13px">Tìm kiếm</a>
                            </li>
                            <?php if (strlen($_SESSION['bbdmsdid']!=0)) {?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Tài khoản của tôi
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="profile.php">Trang cá nhân</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="change-password.php">Đổi mật khẩu</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="request-received.php">Yêu cầu đã nhận</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if (strlen($_SESSION['bbdmsdid']==0)) {?>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="admin/index.php" style="font-size: 13px">Admin</a>
                            </li>
                        </ul>
                        <!-- login -->
                        <a href="login.php" class="login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" >
                            <i class="fas fa-sign-in-alt mr-2"></i>Đăng nhập</a><?php } ?>
                        <!-- //login -->
                    </div>
                </div>
            </nav>
        </div>
        <!-- //navigation -->
        <!-- modal -->
   
        <!-- register -->
        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-2">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="login px-4 mx-auto mw-100">
                            <h5 class="text-center mb-4">Đăng ký ngay</h5>
                            <form action="#" method="post"  name="signup" onsubmit="return checkpass();">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                     <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Họ tên">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="mobileno" id="mobileno" required="true" placeholder="Số điện thoại" maxlength="10" pattern="[0-9]+">
                                </div>
                                
                                <div class="form-group">
                                    <label class="mb-2">Email</label>
                                    <input type="email" name="emailid" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Tuổi</label>
                                    <input type="text" class="form-control" name="age" id="age" placeholder="Tuổi" required="">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Giới tính</label>
                                    <select name="gender" class="form-control" required>
<option value="">Chọn</option>
<option value="Male">Nam</option>
<option value="Female">Nữ</option>
</select>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Nhóm máu</label>
                                    <select name="bloodgroup" class="form-control" required>
<?php $sql = "SELECT * from  tblbloodgroup ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
<?php }} ?>
</select>
                                </div>
                               
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" id="address" required="true" placeholder="Địa chỉ">
                                </div>
                                <div class="form-group">
                                    <label>Tin nhắn</label>
                                    <textarea class="form-control" name="message" required> </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" id="password" required="">
                                </div>
                               
                                <button type="submit" class="btn btn-primary submit mb-4" name="submit">Đăng ký</button>
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //register -->
        <!-- //modal -->
    </div>
    <!-- //header 2 -->