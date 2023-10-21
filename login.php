<!-- LIKO FERNANDO -->
<!-- 825210137 -->
<!-- MULAI PENGERJAAN RABU, 23 NOVEMBER 2022 PADA PUKUL 15:28 -->
<!doctype html>
<html class="no-js" lang="en">

<!-- Bagian Koneksi-->
<?php 
    #SAMBUNGAN KONEKSI KE DATABASE
    include "includes/config.php";
    ob_start();
    session_start();

    #Bagian Pengecekan Koneksi SQL
    #PENTING JANGAN SAMPAI SALAH TITIK KOMA ATAUPUN TYPO SOALNYA BAKALAN ERROR
    if(isset($_POST["Tombol_Submit"])){
        $useremail = $_POST["inputemail"];
        #PAKAI ENKRIPSI MD5 AGAR LEBIH AMAN HEHEHE
        $userpassword = MD5($_POST["inputkatasandi"]);
        $login_via_sql = mysqli_query($connection, "SELECT * FROM admin
                                            WHERE adminEMAIL = '$useremail'
                                            AND adminPASSWORD = '$userpassword'");
    
    if(mysqli_num_rows($login_via_sql)>0){
        $rowadmin = mysqli_fetch_array($login_via_sql);
        $_SESSION['iduser'] = $rowadmin['$adminID'];
        $_SESSION['useremail'] = $rowadmin['adminEMAIL'];
        header("location:index.php");
    }
    }

?>

<!-- Akhir Dari bagian Koneksi -->



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="images/icon/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/metisMenu.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="css/typography.css">
    <link rel="stylesheet" href="css/default-css.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" class="user">
                    <div class="login-form-head">
                        <h4>Sign In</h4>
                        <p>Selamat Datang, Mulai Sign in and Telusuri apa didalam Project UAS ini</p>
                        <p>Selamat Menelusuri!</p>
                        <!-- Tambahan di Rabu, 23 November 2022 Jam 15.29-->
                    </div>
                    <div class="login-form-body">
                        <!-- Bagian Form Post Hampir Kelupaan Rabu, 23 November 2022 Pukul 16:12 -->
                        <form method="POST" class="user">
                        <!-- Bagian Input Email -->
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="exampleInputEmail1" name="inputemail">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <!-- Bagian Input Password -->
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="inputkatasandi">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <!-- Bagian Remember Me, Sepertinya tidak diperlukan -->
<!--                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div> -->
                            <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" name="Tombol_Submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="register.html">Sign up</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="js/plugins.js"></script>
    <script src="js/scripts.js"></script>
</body>
<?php 
mysqli_close($connection);
ob_end_flush();
?>
</html>