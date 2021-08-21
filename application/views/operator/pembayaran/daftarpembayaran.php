<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("template/head.php") ?>
<?php $this->load->view("template/sidebar.php") ?>
<div class="content-body">
  <div class="row page-titles mx-0">
    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Pembayaran</a></li>
      </ol>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-sm-6">
        <div class="card gradient-3">
          <div class="card-body">
            <h3 class="card-title text-white">Jumlah Pembayaran</h3>
            <div class="d-inline-block">
              <h2 class="text-white"><?php echo $jumlah_pembayaran; ?> Buah</h2>
            </div>
            <span class="float-right opacity-5" style="font-size: 2em;"><i class="fa fa-file"></i></span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <?php if ($this->session->flashdata('success')) : ?>
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button> <strong><?php echo $this->session->flashdata('success'); ?></strong>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('gagal')) : ?>
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button> <strong><?php echo $this->session->flashdata('gagal'); ?></strong>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Daftar Pembayaran</h4>
            <hr>
            <form action="<?php echo site_url('laporan/pdfpembayaran'); ?>" method="post" target="_blank">
              <div class="row">
                <div class="col-6">
                  <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="<?php echo $date; ?>" placeholder="Tanggal">
                </div>
                <div class="col-6">
                  <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="<?php echo $tanggal_akhir; ?>" placeholder="Tanggal">
                </div>
              </div>
              <hr>
              <button type="submit" class="btn btn-danger btn-block float-right" onclick="fun()">Tampilkan</button>
              <button type="submit" class="btn btn-danger btn-block float-right"><i class="fa fa-file-pdf-o"></i> Unduh Laporan</button>
            </form>
            <div class="table-responsive">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table" width="100%" cellspacing="0">
                  <tbody>
                    <?php foreach ($pembayaran->result() as $result) : ?>
                      <tr>
                        <td>
                          <div class="card">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-8">
                                  <h4 class="">No Virtual : <?php echo $result->novirtual; ?></h4>
                                  <hr>
                                  <h4 class="">Nama : <?php echo $result->nama; ?></h4>
                                  <hr>
                                  <h2 class="">Judul : <?php echo $result->judul; ?></h2>
                                  <hr>
                                  <h4 class="">Tanggal : 
                                    <?php
                                      $tanggaldanwaktu  = new DateTime($result->tanggalpembayaran);
                                      $tanggal          = $tanggaldanwaktu->format("Y-m-d");
                                      $waktu            = $tanggaldanwaktu->format("H:i:s");
                                      echo nama_hari($tanggal) . ' ' . tgl_indo($tanggal);
                                    ?>
                                  </h4>
                                  <hr>
                                  <h4>Biaya : <?php echo $result->biaya; ?></h4>
                                </div>
                              </div>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-primary btn-lg btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                              <div class="dropdown-menu btn-block text-center">
                                <a onclick="deleteConfirm('<?php echo site_url('operator/pembayaran/delete/' . $result->idpembayaran); ?>')" href="#!" style="font-size: 1.2em;" class="ti-trash">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- #/ container -->
  </div>
    <!--**********************************
Content body end
***********************************-->
</div>
<?php $this->load->view("template/footer.php") ?>
<script>
  function fun(a) {
    var tanggal_awal  = document.getElementById("tanggal_awal").value;
    var tanggal_akhir = document.getElementById("tanggal_akhir").value;
    location.href="<?php echo base_url('operator/pembayaran/index'); ?>/" + tanggal_awal + "/" + tanggal_akhir
  }
  
    function confirm_modal(delete_url, title) {
        jQuery('#modal_delete_m_n').modal('show', {
            backdrop: 'static',
            keyboard: false
        });
        jQuery("#modal_delete_m_n .grt").text(title);
        document.getElementById('delete_link_m_n').setAttribute("href", delete_url);
        document.getElementById('delete_link_m_n').focus();
    }
</script>