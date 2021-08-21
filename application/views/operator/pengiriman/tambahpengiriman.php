<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("template/head.php") ?>


<?php $this->load->view("template/sidebar.php") ?>

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Gaji Pensiunan</a></li>
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
                        <h4 class="card-title">Tambah Pengiriman</h4>
                        <hr>
                        <br>
                        <form action="<?php echo site_url('operator/pengiriman/tambah'); ?>" method="post" class="form-valide" autocomplete="off" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggal Pengiriman</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="date" class="form-control mydatepicker" id="val6" name="tanggalpengiriman" value="<?php echo $tanggalpengiriman; ?>" placeholder="Tanggal Pengiriman">
                                        <span style="color: red">
                                            <?php echo form_error('tanggalpengiriman'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Resi</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="number" class="form-control" name="noresi" autocomplete="off" value="<?php echo $noresi; ?>" id="val1" placeholder="No Resi">
                                        <span style="color: red">
                                            <?php echo form_error('noresi'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Pengirim</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="text" class="form-control" name="namapengirim" value="<?php echo $namapengirim; ?>" id="val2" placeholder="Nama Pengirim">
                                        <span style="color: red">
                                            <?php echo form_error('namapengirim'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No HP Pengirim</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="number" class="form-control" name="nohppengirim" value="<?php echo $nohppengirim; ?>" id="val2" placeholder="No HP Pengirim">
                                        <span style="color: red">
                                            <?php echo form_error('nohppengirim'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Penerima</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="text" class="form-control" name="namapenerima" value="<?php echo $namapenerima; ?>" id="val2" placeholder="Nama Penerima">
                                        <span style="color: red">
                                            <?php echo form_error('namapenerima'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No HP Penerima</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="number" class="form-control" name="nohppenerima" value="<?php echo $nohppenerima; ?>" id="val2" placeholder="No HP Penerima">
                                        <span style="color: red">
                                            <?php echo form_error('nohppenerima'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat Penerima</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="text" class="form-control" name="alamatpenerima" value="<?php echo $alamatpenerima; ?>" id="val2" placeholder="Alamat Penerima">
                                        <span style="color: red">
                                            <?php echo form_error('alamatpenerima'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kota</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <select name="kota" class="form-control" id="Sone" onchange="check()">
                                            <option value="Garut">Garut</option>
                                            <option value="Tasikmalaya">Tasikmalaya</option>
                                            <option value="Ciamis">Ciamis</option>
                                            <option value="Banjar">Banjar</option>
                                            <option value="Bandung">Bandung</option>
                                            <option value="DKI Jakarta">DKI Jakarta</option>
                                            <option value="Sumedang">Sumedang</option>
                                            <option value="Majalengka">Majalengka</option>
                                        </select>
                                        <span style="color: red">
                                            <?php echo form_error('kota'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Barang</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="text" class="form-control" name="namabarang" value="<?php echo $namabarang; ?>" id="val2" placeholder="Nama Barang">
                                        <span style="color: red">
                                            <?php echo form_error('namabarang'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jenis Barang</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <select name="jenisbarang" class="form-control" id="Sone" onchange="check()">
                                            <option value="Surat">Surat</option>
                                            <option value="Barang">Barang</option>
                                        </select>
                                        <span style="color: red">
                                            <?php echo form_error('jenisbarang'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Berat Barang (*KG)</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="number" class="form-control" name="beratbarang" value="<?php echo $beratbarang; ?>" id="val2" placeholder="Berat Barang">
                                        <span style="color: red">
                                            <?php echo form_error('beratbarang'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jumlah Barang</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="number" class="form-control" name="jumlahbarang" value="<?php echo $jumlahbarang; ?>" id="val2" placeholder="Jumlah Barang">
                                        <span style="color: red">
                                            <?php echo form_error('jumlahbarang'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Biaya</label><button type="button" class="btn mb-3 btn-xs btn-danger float-right" data-toggle="popover" title="Harus Di Isi" data-content="Harus Di Isi">Harus Di Isi</button>
                                        <input type="number" class="form-control" name="biaya" value="<?php echo $biaya; ?>" id="val2" placeholder="Biaya">
                                        <span style="color: red">
                                            <?php echo form_error('biaya'); ?>
                                        </span>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/
jquery.min.js"></script>
<?php $this->load->view("template/footer.php") ?>