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
                      <h3 class="card-title text-white">Kinerja Gaji Pensiunan</h3>
                      <div class="d-inline-block">
                          <h2 class="text-white"><?php echo $gajipensiunan; ?></h2>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="card gradient-2">
                  <div class="card-body">
                      <h3 class="card-title text-white">Kinerja Pengiriman</h3>
                      <div class="d-inline-block">
                          <h2 class="text-white"><?php echo $pengiriman; ?></h2>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="card gradient-3">
                  <div class="card-body">
                      <h3 class="card-title text-white">Kinerja Wesel</h3>
                      <div class="d-inline-block">
                          <h2 class="text-white"><?php echo $wesel; ?></h2>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="card gradient-4">
                  <div class="card-body">
                      <h3 class="card-title text-white">Kinerja Pembayaran</h3>
                      <div class="d-inline-block">
                          <h2 class="text-white"><?php echo $pembayaran; ?></h2>
                      </div>
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="position-relative mb-4">
                <canvas id="team-chart" height="400"></canvas>
              </div>

              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> This year
                </span>

                <span>
                  <i class="fas fa-square text-gray"></i> Last year
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("template/footer.php") ?>
