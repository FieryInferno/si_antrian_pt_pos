<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("template/head.php") ?>


<?php $this->load->view("template/sidebar.php") ?>

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Slider</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Slider</h4>
                        <hr>
                        <br>
                        <form action="<?php echo site_url('operator/slider/tambah'); ?>" method="post" class="form-valide" autocomplete="off" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Slider</label>
                                        <input type="text" class="form-control" name="judul" id="val-username" placeholder="Judul Slider">
                                        <span style="color: red">
                                            <?php echo form_error('judul'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Foto Slider</label>
                                        <input type="file" class="form-control-file" name="foto">
                                        <div class="invalid-feedback">
                                            <?php echo form_error('foto') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success pull-right">
                                    <i class="fa fa-save"></i> Simpan

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Slider</h4>
                        <hr>
                        <br>
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table" width="100%" cellspacing="0">
                                <tbody>
                                    <?php foreach ($bannerslider->result() as $result) : ?>
                                        <tr>
                                            <td>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <h2 class=""><?php echo $result->judul; ?></h2>
                                                                <h4 class=""> <?php
                                                                                $tanggaldanwaktu = new DateTime($result->tgl_posting);
                                                                                $tanggal = $tanggaldanwaktu->format("Y-m-d");
                                                                                $waktu = $tanggaldanwaktu->format("H:i:s");
                                                                                echo nama_hari($tanggal) . ' ' . tgl_indo($tanggal) . ' ' . $waktu;
                                                                                ?>
                                                                </h4>
                                                            </div>
                                                            <div class="col-md-4">
                                                               <img src="<?php echo base_url('upload/slider/'.$result->foto)?>" width="100%" class="rounded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-lg btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <div class="dropdown-menu btn-block text-center">

                                                            <a onclick="deleteConfirm('<?php echo site_url('operator/slider/delete/' . $result->id_slider); ?>')" href="#!" style="font-size: 1.2em;" class="ti-trash">Hapus</a>
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