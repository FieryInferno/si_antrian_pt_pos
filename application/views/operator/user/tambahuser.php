<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("template/head.php") ?>


<?php $this->load->view("template/sidebar.php") ?>

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah User</a></li>
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
                        <h4 class="card-title">Tambah User</h4>
                        <hr>
                        <br>
                        <form action="<?php echo site_url('operator/user/tambah'); ?>" method="post" class="form-valide" autocomplete="off" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Username</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" id="val-username" placeholder="Username">
                                        <span style="color: red">
                                            <?php echo form_error('Username'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="nama" class="form-control" name="nama" value="<?php echo $nama; ?>" placeholder="Nama Lengkap">
                                        <span style="color: red">
                                            <?php echo form_error('nama'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jeniskelamin">Jenis Kelamin</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                            <option value="">Pilih</option>
                                            <option value="Laki - laki">Laki - laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <span style="color: red">
                                            <?php echo form_error('jeniskelamin'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <select class="form-control" id="jabatan" name="jabatan">
                                        <option value="">Pilih</option>
                                            <option value="Operator">Operator</option>
                                            <option value="KPC">KPC</option>
                                        </select>
                                        <span style="color: red">
                                            <?php echo form_error('jabatan'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email">
                                        <span style="color: red">
                                            <?php echo form_error('email'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" id="only-number2"><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <label>Nomor Handphone</label>
                                        <input type="text" class="form-control" id="number2" name="no_telp" value="<?php echo $no_telp; ?>" placeholder="Nomor Handphone">
                                        <span style="color: red">
                                            <?php echo form_error('no_telp'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Foto Pegawai</label>
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
    <!-- #/ container -->
</div>
<!--**********************************
Content body end
***********************************-->

</div>

<?php $this->load->view("template/footer.php") ?>