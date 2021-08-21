<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("template/head.php") ?>


<?php $this->load->view("template/sidebar.php") ?>

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profil</a></li>
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
            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-4">
                            <img class="mr-3" src="<?php echo base_url('upload/user/' . $user->foto) ?>" width="80" height="80" alt="">
                            <div class="media-body">
                                <h4 class="mb-0"><?php echo $this->session->userdata('nama'); ?></h4>
                            </div>
                        </div>
                        <h4>Ganti Password</h4>
                        <form action="<?php echo site_url('admin/password/index/' . $user->id_user); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Nama Lengkap -->
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" class="form-control" name="password_lama" placeholder="">
                                    <span style="color: red">
                                        <?php echo form_error('password_lama'); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Nama Lengkap -->
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" name="password_baru" placeholder="">
                                    <span style="color: red">
                                        <?php echo form_error('password_baru'); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Nama Lengkap -->
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" name="confirm_password" placeholder="">
                                    <span style="color: red">
                                        <?php echo form_error('confirm_password'); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-danger pull-right">
                                <i class="fa fa-save"></i> Ganti Password
                            </button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo site_url('operator/user/edit_profile/' . $user->id_user); ?>" method="post" class="form-valide" autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $user->id_user; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" id="only-number">
                                        <label>Username</label>
                                        <input type="text" class="form-control" id="number" name="username" value="<?php echo $user->username; ?>" placeholder="Username" readonly>
                                        <span style="color: red">
                                            <?php echo form_error('username'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" id="val-username" placeholder="Nama" value="<?php echo $user->nama; ?>">
                                        <span style="color: red">
                                            <?php echo form_error('nama'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $user->email; ?>">
                                        <span style="color: red">
                                            <?php echo form_error('email'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" id="only-number">
                                        <label>Nomor Telepon</label>
                                        <input type="text" class="form-control" id="number2" name="no_telp" placeholder="No. Telp" value="<?php echo $user->no_telp; ?>">
                                        <span style="color: red">
                                            <?php echo form_error('no_telp'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select class="form-control" id="jabatan" name="jabatan">
                                            <option value="<?php echo $user->jabatan; ?>"><?php echo $user->jabatan; ?></option>
                                            <?php foreach ($jabatan as $row) : ?>
                                                <option value="<?php echo $row->jabatan; ?>"><?php echo $row->jabatan ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span style="color: red">
                                            <?php echo form_error('jabatan'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Divisi</label>
                                        <select class="form-control" id="divisi" name="divisi">
                                            <option value="<?php echo $user->divisi; ?>"><?php echo $user->divisi; ?></option>
                                            <?php foreach ($divisi as $row) : ?>
                                                <option value="<?php echo $row->divisi; ?>"><?php echo $row->divisi ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span style="color: red">
                                            <?php echo form_error('divisi'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Divisi</label>
                                        <input type="text" class="form-control" name="divisi" id="val-username" placeholder="Divisi"  readonly value="<?php echo $user->divisi; ?>">
                                        <span style="color: red">
                                            <?php echo form_error('divisi'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Instansi</label>
                                        <input type="text" class="form-control" name="instansisekarang" id="val-username" placeholder="Instansi"  readonly value="<?php echo $user->instansisekarang; ?>">
                                        <span style="color: red">
                                            <?php echo form_error('instansisekarang'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Asal Instansi</label>
                                        <select class="form-control" id="asalinstansi" name="asalinstansi">
                                            <option value="<?php echo $user->asalinstansi; ?>"><?php echo $user->asalinstansi ?></option>
                                            <?php foreach ($wilayah as $row) : ?>
                                                <option value="<?php echo $row->wilayah; ?>"><?php echo $row->wilayah ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span style="color: red">
                                            <?php echo form_error('asalinstansi'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Instansi</label>
                                        <select class="form-control" id="instansisekarang" name="instansisekarang">
                                            <option value="<?php echo $user->instansisekarang; ?>"><?php echo $user->instansisekarang; ?></option>
                                            <?php foreach ($wilayah as $row) : ?>
                                                <option value="<?php echo $row->wilayah; ?>"><?php echo $row->wilayah ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span style="color: red">
                                            <?php echo form_error('instansisekarang'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" class="form-control-file" name="foto">
                                        <input type="hidden" name="old_image" value="<?php echo $user->foto; ?>">
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