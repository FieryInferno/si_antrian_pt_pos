<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php
    if ($this->session->userdata('level') == '1') {
        $title = "KPC - ";
        $titlesidebar = "KPC";
    } elseif ($this->session->userdata('level') == '2') {
        $title = "Operator - ";
        $titlesidebar = "OPERATOR";
    }
    ?>
    <title><?php echo $title; ?>Sistem Informasi Pelayanan Loket</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>upload/logo.png">
    <link href="<?php echo base_url() ?>quixlab/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>quixlab/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>quixlab/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="<?php echo base_url() ?>quixlab/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>quixlab/plugins/toastr/css/toastr.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>quixlab/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>quixlab/css/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>quixlab/plugins/summernote/dist/summernote.css" rel="stylesheet">
    <link href="https://github.com/FortAwesome/Font-Awesome/blob/master/web-fonts-with-css/css/fontawesome.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>quixlab/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>quixlab/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <style>
        .Scroll {
            height: 300px;
            overflow-y: scroll;
        }

        .link-tidak-aktif {
            pointer-events: none;
            cursor: default;
        }
    </style>
</head>
<?php
$id = $this->session->userdata('id_user');
$data['user'] = $this->user_model->getById($id);
if (!$data['user']) show_404();
?>
<?php $this->load->view("template/modal.php")

?>

<body>

    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                   
                    <span class="brand-title text-white">
                        <img src="<?php echo base_url() ?>upload/logo.png" width="50" height="35" alt=""> &ensp;<strong> <?php echo $titlesidebar; ?></strong>
                    </span>
                </a>
            </div>
        </div>
        <div class="header ">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="<?php echo base_url('upload/user/' . $data['user']->foto) ?>" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">

                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url('operator/user/edit_profile/'); ?>"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#keluar">
                                                <i class="icon-key"></i>
                                                <span>Keluar</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>