<?php
session_start();

if(!(isset($_SESSION['email']))){
    header('Location: ../Login/login.php');
}

require_once "../config/database.php";
//require_once "config/session.php";

$sql = "SELECT * FROM `user` LEFT JOIN `customer` ON `user`.`email`=`customer`.`email` WHERE `user`.`email`='".$_SESSION['email']."' ;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cus_name=$row["name"];
$cus_id=$row["customer_no"];
$date = date("Y-m-d");

if ($_GET['s_id']) {
    $sql = "SELECT * FROM `schedule` WHERE `schedule`.`schedule_id` = '".$_GET['s_id']."' ;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $bus_id = $row["bus_id"]; 
    $amount = $row["amount"]; 
    $from= $row["start"];
    $to = $row["end"];
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

    <title>Ticket Reservation</title>

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

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                My Details
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-ticket-alt"></i>
                    <span>My Ticket</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="Profile.php">
                    <i class="fas fa-user"></i>
                    <span>Profile</span></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 large"><?= $cus_name ?> <i class="fas fa-chevron-down"></i></span>
                                
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

                <!-- /.container-fluid -->
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Reservation Details for Schedule Number <?=$_GET['s_id']?></h1>
                                </div>
                                <form method="post">
                                    <div class="form-group">
                                        <label class="large mb-1" for="route">Passenger Name:</label>
                                        <input type="text" class="form-control form-control-user" id="p_name" name="p_name"
                                            required="">                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="large mb-1" for="route">Passenger age:</label>
                                            <input type="number" class="form-control form-control-user"
                                            id="p_age" name="p_age" min="12" max="100" placeholder="12 to 100" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="large mb-1" for="route">Passenger Contact Number:</label>
                                            <input type="tel" class="form-control form-control-user"
                                            id="p_phone" name="p_phone" placeholder="07X-XXXXXXX" pattern="[0]{1}[7]{1}[0-9]{1}-[0-9]{7}" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <img src="img/bus.png" alt="">                                       
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="large mb-1" for="route">Seat Number:</label>
                                            <input type="number" class="form-control form-control-user" id="p_seat" name="p_seat"
                                                placeholder="1 to 25" min="1" max="25" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="large mb-1" for="route">Date of Booking:</label>
                                            <input type="date" class="form-control form-control-user"
                                                id="p_date" name="p_date" min="<?=$date?>" required="">
                                        </div>
                                    </div>
                                    <br>  
                                    <div class="text-center">                                  
                                        <input type="submit" class="btn btn-success" value="Reserve" id="reserve" name="reserve">

                                    </div>
                                </form>    
                            </div>
                        </div>
                    </div>
                </div>
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
if (isset($_POST['reserve'])) {

    $p_name = $_POST['p_name'];
    $p_age=$_POST['p_age'];
    $p_phone=$_POST['p_phone'];
    $p_seat = $_POST['p_seat'];
    $p_date = $_POST['p_date'];
    $s_id = $_GET['s_id'];

    $sql = "SELECT `seat` FROM `ticket` WHERE `ticket`.`sch_id` = '$s_id' AND  `ticket`.`booking_date` = '$p_date' AND `ticket`.`seat` = '$p_seat';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    is_null($row["seat"]) ? $seat_status = "free" : $seat_status = "booked";

    if($seat_status == "free"){
        
        $tic_id = "TIC/". $p_date . "/" . $bus_id . "/" . $p_seat;
        $pay_id = "pay-".$tic_id;
        

        $sql="INSERT INTO `ticket`( `ticket_id`, `customer_id`, `sch_id`, `pass_name`, `pass_age`, `pass_phone`, `curr_date`,`booking_date`, `seat`, `tic_status`) 
                VALUES ('$tic_id','$cus_id','$s_id','$p_name','$p_age','$p_phone','$date','$p_date','$p_seat','Confirm')";
        $conn->query($sql);

        $sql="INSERT INTO `payment`(  `payment_id`,`ticket_id`, `token`, `amount`, `date`) 
                VALUES ('$pay_id','$tic_id','Token from gateway','$amount','$date')";
        $conn->query($sql);

        echo "<script>alert('Successfully Reserved Your Ticket. Thank You');document.location='index.php'</script>";
    }
    else{
        echo "<script>alert('Seat already booked. Try another seat');document.location='search.php?from=".$from." & to=".$to."'</script>";
    }
}
?>