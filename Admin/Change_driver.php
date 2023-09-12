<?php
session_start();

if(!(isset($_SESSION['email']))){
    header('Location: ../Login/login.php');
}

require_once "../config/database.php";
//require_once "config/session.php";

$sql = "SELECT * FROM `user` LEFT JOIN `admin` ON `user`.`email`=`admin`.`email` WHERE `user`.`email`='".$_SESSION['email']."' ;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$admin_name=$row["name"];

if ($_GET['d_id']) {
    $sql = "SELECT * FROM `driver`,`user` WHERE driver.email = user.email AND `driver`.`driver_no`='".$_GET['d_id']."';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $d_name=$row["name"];
    $d_phone=$row["contact_no"];
    $d_nic=$row["nic"];
    $d_dl=$row["dl_no"];
    $d_mail=$row["email"];
    $d_date=$row["reg_date"];
    $d_status=$row["status"];

}
else {
    header('Location: ../Login/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Driver Details</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-bus-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BTR System</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                System details
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="Bus.php">
                    <i class="fas fa-bus"></i>
                    <span>Bus</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="Schedule.php">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Schedule</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Booking Details
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="Ticket.php">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Ticket</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="Payment.php">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Payment</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users"></i>
                    <span>User Management</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Users:</h6>
                        <a class="collapse-item" href="Customers.php">Customer</a>
                        <a class="collapse-item active" href="Drivers.php">Driver</a>
                        <a class="collapse-item" href="Admins.php">Admin</a>
                    </div>
                </div> 
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="Messages.php">
                    <i class="fas fa-envelope"></i>
                    <span>Message</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="Reports.php">
                    <i class="fas fa-file-alt"></i>
                    <span>Report</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $admin_name ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/Profile/default.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="Profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Driver Details <?=$_GET['d_id']?></h1>
                                </div>
                                <form class="user" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="small mb-1" for="dri_name">Driver Name:</label>
                                            <input type="text" class="form-control form-control-user" id="dri_name" name="dri_name"
                                                value="<?=$d_name?>">
                                        </div> 
                                        <div class="col-sm-6">
                                            <label class="small mb-1" for="phone_number">Contact Number:</label>
                                            <input type="tel" class="form-control form-control-user" id="phone_number" name="phone_number"
                                                value="<?=$d_phone?>">
                                        </div>                                      
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="small mb-1" for="dri_email">Driver Email:</label>
                                        <input type="text" class="form-control form-control-user" id="dri_email" name="dri_email"
                                            value="<?=$d_mail?>" >
                                        </div>
                                        <div class="col-sm-6">
                                        <label class="small mb-1" for="dri_reg">Driver Registered Date:</label>
                                            <input type="date" class="form-control form-control-user" id="dri_reg" name="dri_reg"
                                                value="<?=$d_date?>" >
                                        </div>                                       
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="small mb-1" for="dri_nic">Driver NIC Number:</label>
                                        <input type="text" class="form-control form-control-user" id="dri_nic" name="dri_nic"
                                                value="<?=$d_nic?>" maxlength="12" >
                                        </div>
                                        <div class="col-sm-6">
                                        <label class="small mb-1" for="dri_dl">Driver Driving Licence Number:</label>
                                        <input type="text" class="form-control form-control-user" id="dri_dl" name="dri_dl"
                                                value="<?=$d_dl?>" maxlength="8">
                                        </div>                                       
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="large mb-1" for="Current_State">Driver Status: <?=$d_status?></label>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    
                                    <input type="submit" class="btn btn-warning" value="Change" id="delete" name="delete">
                                    <input type="submit" class="btn btn-secondary" value="Cancel" id="cancel" name="cancel">
                                </form>        
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Bus Ticket Reservation System 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../Login/login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    if($d_status=="Not Working"){
        echo "<script>alert('Already Deactivated');document.location='Drivers.php'</script>";
    }
    else{
        $status=$_POST['status'];
        $d_id=$_GET['d_id'];
        $sql="UPDATE `driver` SET `status` = 'Working' WHERE `driver`.`driver_id` = '$d_id'";
        $conn->query($sql);
        echo "<script>alert('Successfully Updated');document.location='Drivers.php'</script>";  
}
    }

if (isset($_POST['delete'])) {
    $d_id=$_GET['d_id'];
    
    $sql = "SELECT `sch_status` FROM `driver`,`bus`,`schedule` WHERE driver.driver_no = bus.driver_id AND schedule.bus_id = bus.plate_number AND `driver`.`driver_no`='$d_id';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    is_null($row["sch_status"]) ? $sch_s="Not Assigned" : $sch_s = $row["sch_status"];

    if ($sch_s=="Ongoing") {
        echo "<script>alert('Cannot Change Driver. Driver is in a Schedule');document.location='Drivers.php'</script>";
    } else{

        $chd_name=$_POST['dri_name'];
        $chd_phone=$_POST['phone_number'];
        $chd_nic=$_POST['dri_nic'];
        $chd_dl=$_POST['dri_dl'];
        $chd_mail=$_POST['dri_email'];
        $chd_date=$_POST['dri_reg'];

        $sql="UPDATE `user` SET `name` = '$chd_name', `contact_no` = '$chd_phone', `email` = '$chd_mail', `password` = 'driverdefault', `reg_date` = '$chd_date' WHERE `user`.`email` = '$d_mail'";
        $conn->query($sql);

        $sql="UPDATE `driver` SET `email` = '$chd_mail', `nic` = '$chd_nic', `dl_no` = '$chd_dl' WHERE `driver`.`driver_no` = '$d_id'";
        $conn->query($sql);
        echo "<script>alert('Successfully change driver');document.location='Drivers.php'</script>";
    }
}
if (isset($_POST['cancel'])) {
    echo "<script>window.location.href='Drivers.php';</script>";
}
?>