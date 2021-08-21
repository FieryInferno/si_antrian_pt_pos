<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label"></li>
            <?php if ($this->session->userdata('level') == '1') { ?>
                <li>
                    <a href="<?php echo site_url('operator/overview'); ?>" aria-expanded="false">
                        <i class="fa fa-home"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('operator/gajipensiunan/'); ?>" aria-expanded="false">
                        <i class="fa fa-dollar"></i><span class="nav-text">Gaji Pensiunan</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('operator/pengiriman/'); ?>" aria-expanded="false">
                        <i class="fa fa-share"></i><span class="nav-text">Pengiriman</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('operator/wesel/'); ?>" aria-expanded="false">
                        <i class="fa fa-eye"></i><span class="nav-text">Wesel</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('operator/pembayaran/'); ?>" aria-expanded="false">
                        <i class="fa fa-list"></i><span class="nav-text">Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('grafik'); ?>" aria-expanded="false">
                        <i class="fa fa-list"></i><span class="nav-text">grafik</span>
                    </a>
                </li>
            <?php } ?>
            <!-- Operator -->
            <?php if ($this->session->userdata('level') == '2') { ?>
                <li>
                    <a href="<?php echo site_url('operator/overview'); ?>" aria-expanded="false">
                        <i class="fa fa-home"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-dollar"></i> <span class="nav-text">Gaji Pensiunan</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo site_url('operator/gajipensiunan/'); ?>">Daftar Gaji Pensiunan</a></li>
                        <li><a href="<?php echo site_url('operator/gajipensiunan/tambah/'); ?>">Input Gaji Pensiunan</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-share"></i><span class="nav-text">Pengiriman</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo site_url('operator/pengiriman/'); ?>">Daftar Pengiriman</a></li>
                        <li><a href="<?php echo site_url('operator/pengiriman/tambah/'); ?>">Input Pengiriman</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-eye"></i><span class="nav-text">Wesel</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo site_url('operator/wesel/'); ?>">Daftar Wesel</a></li>
                        <li><a href="<?php echo site_url('operator/wesel/tambah/'); ?>">Input Wesel</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-list"></i><span class="nav-text">Pembayaran</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo site_url('operator/pembayaran/'); ?>">Daftar Pembayaran</a></li>
                        <li><a href="<?php echo site_url('operator/pembayaran/tambah/'); ?>">Input Pembayaran</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('grafik'); ?>" aria-expanded="false">
                        <i class="fa fa-list"></i><span class="nav-text">grafik</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-users"></i><span class="nav-text">Manajemen User</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo site_url('operator/user/'); ?>">Daftar User</a></li>
                        <li><a href="<?php echo site_url('operator/user/tambah/'); ?>">Tambah User</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-gear"></i> <span class="nav-text">Pengaturan</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo site_url('operator/slider/tambah/'); ?>">Berita Depan</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>