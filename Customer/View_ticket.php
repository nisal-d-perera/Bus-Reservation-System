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
$cus_name = $row["name"];

if ($_GET['t_id']) {
    $sql = "SELECT * FROM `customer`,`user`,`schedule`,`ticket` WHERE customer.customer_no = ticket.customer_id AND ticket.sch_id = schedule.schedule_id AND user.email = customer.email AND`ticket_id`='".$_GET['t_id']."';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $ticket_id = $row['ticket_id'];
    $c_name=$row["name"];
    $c_id=$row["customer_no"];
    $c_email=$row["email"];
    $p_name=$row["pass_name"];
    $p_age=$row["pass_age"];
    $p_phone=$row["pass_phone"];
    $cur_date=$row["curr_date"];
    $booking_date=$row["booking_date"];
    $tic_seat=$row["seat"];
    $tic_amount=$row["amount"];
    $tic_status=$row["tic_status"];
   
    $ts_scid = $row["schedule_id"];
    $ts_bus = $row["bus_id"];
    $ts_route = $row["route"];
    $ts_st = $row["start"];
    $ts_end = $row["end"];
    $ts_stt = $row["arrival_time"];
    $ts_dt = $row["depature_time"];
    $ts_dis = $row["distance"];
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

    <title>My Tickets</title>

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

                <!-- Begin Page Content -->
                <div class="container-fluid">


                </div>
                <!-- /.container-fluid -->
                <div class="container-fluid">
                  
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-12 col-md-9">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-6 d-none d-lg-block ">
                                            <br>
                                            <center>
                                                <div class="img-profile" id=qrcode></div>
                                                <input id="text" type="hidden" value="<?php echo $ticket_id ?>"  />
                                                <?php echo $ticket_id ?>
                                                
                                                
                                            </center>
                                            <br>
                                            <hr>
                                            <br>
                                            <div class="text-center">
                                                <h1 class="h3 text-gray-900 mb-2">Customer Details</h1>
                                            </div>
                                            <br>
                                            <div class="mb-3 ">
                                                <h5>*    Customer Id : <?php echo $c_id ?></h5><br>
                                                <h5>*    Customer Name : <?php echo $c_name ?></h5><br>
                                                <h5>*    Customer Email : <?php echo $c_email ?></h5>
                                            </div>
                                            <hr>
                                            <br>
                                            <div class="text-center">
                                                <h1 class="h3 text-gray-900 mb-2">Passenger Details</h1>
                                            </div>
                                                <br>
                                            <div class="mb-3 ">
                                                <h5>*    Passenger Name : <?php echo $p_name ?></h5><br>
                                                <h5>*    Passenger Age : <?php echo $p_age ?></h5><br>
                                                <h5>*    Passenger Phone Number : <?php echo $p_phone ?></h5>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h3 text-gray-900 mb-2">Trip Details</h1>
                                                </div>
                                                <br>
                                                <form method="POST">
                                                    <div class="mb-3">
                                                        <h5>Schedule ID : 0<?=$ts_scid?></h5>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>Route Number : <?=$ts_route?></h5>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>From : <?=$ts_st?></h5> 
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>To : <?=$ts_end?></h5>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>Total Distance : <?=$ts_dis?> KM</h5>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>Departure Time : <?=$ts_dt?></h5>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>Arrival Time : <?=$ts_stt?></h5>
                                                    </div>
                                                </form>
                                                <hr>
                                                <div class="text-center">
                                                    <h1 class="h3 text-gray-900 mb-2">Ticket Details</h1>
                                                </div>
                                                <br>
                                                <form method="POST">
                                                    <div class="mb-3">
                                                        <h5>Ticket ID : 0<?=$_GET['t_id']?></h5>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>Bus Number : <?=$ts_bus?></h5>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>Seat Number : <?=$tic_seat?></h5> 
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>Booked Date : <?=$cur_date?></h5>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>Booking Date : <?=$booking_date?> KM</h5>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>Total Amount : Rs. <?=$tic_amount?>.00</h5>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>Ticket Status : <?=$tic_status?></h5>
                                                    </div>
                                                    
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs@gh-pages/qrcode.min.js"></script>
    <script>
        var qrcode = new QRCode("qrcode");
        function makeCode() {
            var elText = document.getElementById("text");
            if (!elText.value) {
                alert("Input a text");
                elText.focus();
                return;
            }
            qrcode.makeCode(elText.value);
        }
        makeCode();
        $("#text").
            on("blur", function () {
                makeCode();
            }).
            on("keydown", function (e) {
                if (e.keyCode == 13) {
                    makeCode();
                }
            });
    </script>
</body>

</html>