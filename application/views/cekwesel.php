<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="upload/logo.png" type="image/png">
    <title>Sistem Informasi Antrian Pelayanan di PT. Pos Indonesia</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>landingpage/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>landingpage/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>landingpage/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>landingpage/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>landingpage/vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>landingpage/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>landingpage/css/responsive.css">
</head>

<body>
    <!--================Header Menu Area =================-->
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
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('home/ceknamabarangpensiunan/') ?>">Cek Gaji Pensiunan</a></li>
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
    <section class="hero-banner d-flex align-items-center">
        <div class="container text-center">
            <h2>Cek Wesel</h2>
            <br>
            <form class="form-horizontal">
                <div class="form-group">
                    <input name="nowesel" id="nowesel" class="form-control" type="text" placeholder="Masukkan No Wesel">
                </div>
            </form>
        </div>
    </section>
    <section class="blog_area" style="padding-top:25px;padding-bottom:25px;">
        <div class="container">
            <form class="form-horizontal">
                <label class="control-label col-xs-3">Nama</label>
                <div class="form-group">
                    <input name="nama" class="form-control" type="text" placeholder="" readonly>
                </div>
                <label class="control-label col-xs-3">No KTP</label>
                <div class="form-group">
                    <input name="noktp" class="form-control" type="text" placeholder="" readonly>
                </div>
                <label class="control-label col-xs-3">Biaya</label>
                <div class="form-group">
                    <input name="biaya" class="form-control" type="text" placeholder="" readonly>
                </div>
                <label class="control-label col-xs-3">Tanggal Wesel</label>
                <div class="form-group">
                    <input name="tanggalwesel" class="form-control" type="text" placeholder="" readonly>
                </div>
                <!-- <img id="banner" src="" /> -->
            </form>
        </div>
    </section>


    <!-- ================ start footer Area ================= -->
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



    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#nowesel').on('input', function() {

                var nowesel = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('home/getwesel') ?>",
                    dataType: "JSON",
                    data: {
                        nowesel: nowesel
                    },
                    cache: false,
                    success: function(data) {
                        $.each(data, function(nowesel, nama, noktp, biaya, tanggalwesel) {
                            $('[name="nama"]').val(data.nama);
                            $('[name="noktp"]').val(data.noktp);
                            $('[name="biaya"]').val(data.biaya);
                            $('[name="tanggalwesel"]').val(data.tanggalwesel);
                        });

                    }
                });
                return false;
            });

        });
    </script>
    <script type="text/javascript">
        function image(img) {
            var src = img.src;
            window.open(src);
        }
    </script>
    <script src="<?php echo base_url() ?>landingpage/js/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url() ?>landingpage/js/popper.js"></script>
    <script src="<?php echo base_url() ?>landingpage/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>landingpage/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>landingpage/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url() ?>landingpage/js/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>landingpage/js/mail-script.js"></script>
    <script src="<?php echo base_url() ?>landingpage/js/contact.js"></script>
    <script src="<?php echo base_url() ?>landingpage/js/jquery.form.js"></script>
    <script src="<?php echo base_url() ?>landingpage/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>landingpage/js/mail-script.js"></script>
    <script src="<?php echo base_url() ?>landingpage/js/theme.js"></script>
</body>

</html>