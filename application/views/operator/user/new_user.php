<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view("admin/_partials/head.php") ?>

</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">


							<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success" role="alert">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						Tambah Pegawai
						<!-- <a href="<?php //echo site_url('operator/user'); 
										?>">
							<i class="fas fa-arrow-left"></i> Kembali
						</a> -->
					</div>

					<div class="card-body">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<form action="<?php echo site_url('operator/user/add'); ?>" method="post" enctype="multipart/form-data">

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Nama Lengkap</label>
													<input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" placeholder="Nama Lengkap">
													<span style="color: red">
														<?php echo form_error('nama'); ?>
													</span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group" id="only-number">
													<label>NIP</label>
													<input type="text" class="form-control" id="number" name="nip" value="<?php echo $nip; ?>" placeholder="NIP">
													<span style="color: red">
														<?php echo form_error('nip'); ?>
													</span>
												</div>
											</div>

										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group" id="only-number2">
													<label>NRP</label>
													<input type="text" class="form-control" id="number2" name="nrp" value="<?php echo $nrp; ?>" placeholder="NRP">
													<span style="color: red">
														<?php echo form_error('nrp'); ?>
													</span>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label for="divisi">Divisi</label>
													<select class="form-control" id="divisi" name="divisi">
														<option value="">Pilih</option>
														<?php foreach ($divisi as $row) : ?>
															<option value="<?php echo $row->divisi; ?>"><?php echo $row->divisi; ?></option>
														<?php endforeach; ?>
													</select>
													<span style="color: red">
														<?php echo form_error('divisi'); ?>
													</span>
												</div>
											</div>


											<div class="col-md-12">
											<div class="text-right">
												<div class="form-group">
													<a href="<?php echo base_url('admin/datapegawai'); ?>">
														<button type="button" class="btn btn-primary pull-right">
															<i class="fas fa-arrow-left"></i> Kembali</button>
													</a>

													<button type="submit" class="btn btn-success pull-right">
														<i class="far fa-save"></i> Simpan
													</button>
												</div>
														</div>

											</div>
											<br>

											<!-- <div class="row">
											<div class="col-md-2">
												<label for="password">Password*</label>
											</div>
											<div class="col-md-1">:</div>
											<div class="col-md-8">
												<input type="password" class="form-control" name="password" placeholder="Password">
												<span style="color: red">
													<?php echo form_error('password'); ?>
												</span>
											</div>
										</div>
										<br>

										<div class="row">
											<div class="col-md-2">
												<label for="nama">Nama Lengkap*</label>
											</div>
											<div class="col-md-1">:</div>
											<div class="col-md-8">
												<input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" placeholder="Nama Lengkap">
												<span style="color: red">
													<?php echo form_error('nama'); ?>
												</span>
											</div>
										</div>
										<br>

										<div class="row">
											<div class="col-md-2">
												<label for="email">Alamat Email*</label>
											</div>
											<div class="col-md-1">:</div>
											<div class="col-md-8">
												<input type="text" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Alamat Email">
												<span style="color: red">
													<?php echo form_error('email'); ?>
												</span>
											</div>
										</div>
										<br>

										<div class="row">
											<div class="col-md-2">
												<label for="tanggal_lahir">Tanggal Lahir*</label>
											</div>
											<div class="col-md-1">:</div>
											<div class="col-md-8">
												<input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>">
												<span style="color: red">
													<?php echo form_error('tanggal_lahir'); ?>
												</span>
											</div>
										</div>
										<br> -->

											<!-- <div class="row">
											<div class="col-md-2">
												<label for="tanggal_lahir">Umur</label>
											</div>
											<div class="col-md-1">:</div>
											<div class="col-md-8">
												<input type="number" class="form-control" name="umur" placeholder="Umur">
											</div>
										</div>
										<br> -->

											<!-- <div class="row">
											<div class="col-md-2">
												<label for="alamat">Alamat Tinggal*</label>
											</div>
											<div class="col-md-1">:</div>
											<div class="col-md-8">
												<textarea class="form-control" name="alamat" placeholder="Alamat Tinggal"><?php echo $alamat; ?></textarea>
												<span style="color: red">
													<?php echo form_error('alamat'); ?>
												</span>
											</div>
										</div>
										<br>

										<div class="row">
											<div class="col-md-2">
												<label for="no_telp">No. Telp*</label>
											</div>
											<div class="col-md-1">:</div>
											<div class="col-md-8">
												<input type="text" class="form-control" name="no_telp" value="<?php echo $no_telp; ?>" placeholder="No. Telephone">
												<span style="color: red">
													<?php echo form_error('no_telp'); ?>
												</span>
											</div>
										</div>
										<br>

										<div class="row">
											<div class="col-md-2">
												<label for="foto">Foto*</label>
											</div>
											<div class="col-md-1">:</div>
											<div class="col-md-8">
												<input type="file" class="form-control-file" name="foto">
												<span style="color: red">
													<?php echo form_error('foto'); ?>
												</span>
											</div>
										</div>
										<br> -->



									</form>
								</div>
								<div class="col-md-3"></div>
							</div>
						</div>
					</div>
				</div>


			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->


		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<?php $this->load->view("pegawai/_partials/js.php") ?>
	<script>
    $(function() {
      $('#only-number').on('keydown', '#number', function(e){
          -1!==$
          .inArray(e.keyCode,[46,8,9,27,13,110,190]) || /65|67|86|88/
          .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
          || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
          && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
      });
    })
</script>
	<script>
    $(function() {
      $('#only-number2').on('keydown', '#number2', function(e){
          -1!==$
          .inArray(e.keyCode,[46,8,9,27,13,110,190]) || /65|67|86|88/
          .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
          || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
          && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
      });
    })
</script>
<script>
    
</script>


</body>

</html>