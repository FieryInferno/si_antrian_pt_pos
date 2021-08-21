<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("template/head.php") ?>


<?php $this->load->view("template/sidebar.php") ?>

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Wesel</a></li>
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
                        <h4 class="card-title">Tambah Wesel</h4>
                        <hr>
                        <br>
                        <form action="<?php echo site_url('operator/wesel/tambah'); ?>" method="post" class="form-valide" autocomplete="off" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggal Wesel</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="date" class="form-control mydatepicker" id="val6" name="tanggalwesel" value="<?php echo $tanggalwesel; ?>" placeholder="Tanggal Wesel">
                                        <span style="color: red">
                                            <?php echo form_error('tanggalwesel'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Wesel</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="text" class="form-control" name="nowesel" autocomplete="off" value="<?php echo $nowesel; ?>" id="val1" placeholder="No Wesel">
                                        <span style="color: red">
                                            <?php echo form_error('nowesel'); ?>
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
                                        <label>No KTP</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="text" class="form-control" name="noktp" value="<?php echo $noktp; ?>" id="val3" placeholder="No KTP">
                                        <span style="color: red">
                                            <?php echo form_error('noktp'); ?>
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