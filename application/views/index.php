<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url()?>upload/logo.png" type="image/png">
    <title>Sistem Informasi Pelayanan Loket di PT. Pos Indonesia</title>
    <link rel="stylesheet" href="<?php echo base_url()?>landingpage/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>landingpage/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>landingpage/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>landingpage/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>landingpage/vendors/animate-css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url()?>landingpage/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>landingpage/css/responsive.css">
</head>

<body>
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                <a class="navbar-brand logo_h" href="<?php echo base_url('home') ?>"><img src="<?php echo base_url() ?>upload/logo.png" width="60" height="40" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('home') ?>">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('home/cekgajipensiunan/') ?>">Cek Gaji Pensiunan</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('home/cekpengiriman/') ?>">Cek Pengiriman</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('home/cekwesel/') ?>">Cek Wesel</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('home/cekpembayaran/') ?>">Cek Pembayaran</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('login') ?>">Login</a></li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <section class="home_banner_area">
        <div class="banner_inner">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" style="padding-top: 7%;">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $bannerhome = $this->slider_model->view_ordering_limit('iklantengah', 'id_slider', 'ASC', 0, 10);
                                $no = 0;
                                foreach ($bannerhome->result_array() as $ban2) {
                                    if ($no == 0) {
                                        ?>
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url()?>upload/slider/<?php echo $ban2['foto']; ?>" alt="<?php echo $ban2['judul']; ?>" class="d-block w-100" width="100%" height="650px" style="border-radius: 5%;  object-fit: contain;" onclick="image(this)" />
                                        </div>
                                    <?php
                                        } else {
                                            ?>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url()?>upload/slider/<?php echo $ban2['foto']; ?>" alt="<?php echo $ban2['judul']; ?>" class="d-block w-100" width="100%" height="650px" style="border-radius: 5%;  object-fit: contain;" onclick="image(this)" />
                                        </div>
                                <?php
                                    }
                                    $no++;
                                }
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4" style="padding-top: 20%;">
                        <div class="banner_content">
                            <h3>Sistem Informasi Antrian</h3>
                            <p>Website Cek Proses Antrian Pelayanan di PT. POS Indonesia</p>
                            <a class="banner_btn" href="<?php echo base_url('home/cekpengiriman/') ?>">Cek Antrian<i class="ti-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    
    <footer class="footer-area">
        <div class="container">
    
            <div class="footer-bottom row align-items-center text-center text-lg-left no-gutters">
                <p class="footer-text m-0 col-lg-8 col-md-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <script>
                        document.write(new Date().getFullYear());
                    </script> Sistem Informasi Antrian
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!-- ================ End footer Area ================= -->





    <script type="text/javascript">
        function image(img) {
            var src = img.src;
            window.open(src);
        }
    </script>
    <script src="landingpage/js/jquery-2.2.4.min.js"></script>
    <script src="landingpage/js/popper.js"></script>
    <script src="landingpage/js/bootstrap.min.js"></script>
    <script src="landingpage/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="landingpage/js/jquery.ajaxchimp.min.js"></script>
    <script src="landingpage/js/waypoints.min.js"></script>
    <script src="landingpage/js/mail-script.js"></script>
    <script src="landingpage/js/contact.js"></script>
    <script src="landingpage/js/jquery.form.js"></script>
    <script src="landingpage/js/jquery.validate.min.js"></script>
    <script src="landingpage/js/mail-script.js"></script>
    <script src="landingpage/js/theme.js"></script>
</body>

</html>