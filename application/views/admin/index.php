<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("template/head.php") ?>
  <?php $this->load->view("template/sidebar.php") ?>
  <div class="content-body">
    <div class="container-fluid mt-3">
      <div class="row">
          <div class="col-lg-3 col-sm-6">
              <div class="card gradient-1">
                  <div class="card-body">
                      <h3 class="card-title text-white">Jumlah Gaji Pensiunan</h3>
                      <div class="d-inline-block">
                          <h2 class="text-white"><?php echo $jumlah_gajipensiunan; ?></h2>
                      </div>
                      <hr>
                      <a href="<?php echo site_url('asdatun/gajipensiunan/'); ?>" class="btn btn-light btn-block">Lihat Detail</a>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="card gradient-2">
                  <div class="card-body">
                      <h3 class="card-title text-white">Jumlah Pengiriman</h3>
                      <div class="d-inline-block">
                          <h2 class="text-white"><?php echo $jumlah_pengiriman; ?></h2>
                      </div>
                      <hr>
                      <a href="<?php echo site_url('asdatun/pengiriman/'); ?>" class="btn btn-light btn-block">Lihat Detail</a>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="card gradient-3">
                  <div class="card-body">
                      <h3 class="card-title text-white">Jumlah Disposisi</h3>
                      <div class="d-inline-block">
                          <h2 class="text-white"><?php echo $jumlah_disposisi; ?></h2>
                      </div>
                      <hr>
                      <a href="<?php echo site_url('disposisi/daftarasdatundisposisi/'); ?>" class="btn btn-light btn-block">Lihat Detail</a>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="card gradient-4">
                  <div class="card-body">
                      <h3 class="card-title text-white">Jumlah Gaji Pensiunan Selesai</h3>
                      <div class="d-inline-block">
                          <h2 class="text-white"><?php echo $jumlah_gajipensiunanselesai; ?></h2>
                      </div>
                      <hr>
                      <a href="<?php echo site_url('disposisi/daftarasdatundisposisi/'); ?>" class="btn btn-light btn-block">Lihat Detail</a>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body bg-success">
                    <div class="text-center text-white">
                        <h3 class="text-white">Selamat Datang, <?php echo $this->session->userdata('jabatan'); ?></h3>
                        <h3 class="text-white"> <?php echo  ucwords(strtolower($this->session->userdata('instansisekarang'))); ?></h3>
                        <h3 class="text-white"><?php echo ucwords($this->session->userdata('nama')); ?></h3>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("template/footer.php") ?>