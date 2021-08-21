<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("template/head.php") ?>


<?php $this->load->view("template/sidebar.php") ?>

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Pembayaran</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button> <strong><?php echo $this->session->flashdata('success'); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('gagal')) : ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button> <strong><?php echo $this->session->flashdata('gagal'); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Pembayaran</h4>
                        <hr>
                        <br>
                        <form action="<?php echo site_url('operator/pembayaran/tambah'); ?>" method="post" class="form-valide" autocomplete="off" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggal Pembayaran</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="date" class="form-control mydatepicker" id="val6" name="tanggalpembayaran" value="<?php echo $tanggalpembayaran; ?>" placeholder="Tanggal Pembayaran">
                                        <span style="color: red">
                                            <?php echo form_error('tanggalpembayaran'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Virtual</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="text" class="form-control" name="novirtual" autocomplete="off" value="<?php echo $novirtual; ?>" id="val1" placeholder="No Virtual">
                                        <span style="color: red">
                                            <?php echo form_error('novirtual'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" id="val2" placeholder="Nama">
                                        <span style="color: red">
                                            <?php echo form_error('nama'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Pembayaran</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="text" class="form-control" name="judul" value="<?php echo $judul; ?>" id="val3" placeholder="Judul Pembayaran">
                                        <span style="color: red">
                                            <?php echo form_error('judul'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Biaya</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="text" class="form-control" name="biaya" value="<?php echo $biaya; ?>" id="val3" placeholder="Biaya">
                                        <span style="color: red">
                                            <?php echo form_error('biaya'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success pull-right" id="validasi">
                                    <i class="fa fa-save"></i> Simpan

                            </div>
                        </form>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/
jquery.min.js"></script>
<?php $this->load->view("template/footer.php") ?>