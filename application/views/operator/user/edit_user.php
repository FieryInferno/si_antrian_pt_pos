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
					<div class="alert alert-primary" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						Edit Data Pegawai
						<!-- <a href="<?php //echo site_url('operator/user'); 
										?>">
							<i class="fas fa-arrow-left"></i> Kembali
						</a> -->
					</div>

					<div class="card-body">
						<div class="col-md-12">
							<div class="row">

								<div class="col-md-2">
									<div class="row">
										<img src="<?php echo base_url('upload/user/' . $user->foto); ?>" class="rounded" alt="100x100" width="100%" style="height: 100%;">

									</div>
									<div class="row"><br></div>
								</div>
								<br>
								<div class="col-md-8">
									<form action="<?php echo site_url('operator/user/edit/' . $user->id_user); ?>" method="post" enctype="multipart/form-data">

										<input type="hidden" name="id" value="<?php echo $user->id_user; ?>">

										<div class="row">
											<div class="col-md-12">
												<!-- Nama Lengkap -->
												<div class="form-group" id="only-number">
													<label>NIP</label>

													<input type="text" class="form-control" name="nip" placeholder="Nip" value="<?php echo $user->nip; ?>" readonly>
													<span style="color: red">
														<?php echo form_error('nip'); ?>
													</span>
												</div>
											</div>

										</div>


										<div class="row">
											<div class="col-md-12">
												<!-- Nama Lengkap -->
												<div class="form-group">
													<label>Nama</label>
													<input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $user->nama; ?>" readonly>
													<span style="color: red">
														<?php echo form_error('nama'); ?>
													</span>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12">
												<!-- Nama Lengkap -->
												<div class="form-group">
													<label>Email</label>
													<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $user->email; ?>" readonly>
													<span style="color: red">
														<?php echo form_error('email'); ?>
													</span>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12">
												<!-- Nama Lengkap -->
												<div class="form-group">
													<label>Jabatan</label>
													<textarea class="form-control" name="jabatan" placeholder="jabatan" readonly><?php echo $user->jabatan; ?></textarea>
													<span style="color: red">
														<?php echo form_error('jabatan'); ?>
													</span>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12">
												<!-- Nama Lengkap -->
												<div class="form-group">
													<label>Divisi</label>
													<textarea class="form-control" name="divisi" placeholder="divisi" readonly><?php echo $user->divisi; ?></textarea>
													<!-- <input type="text" class="form-control" name="alamat" placeholder="Address" value="<?php echo $user->divisi; ?>"> -->
													<span style="color: red">
														<?php echo form_error('divisi'); ?>
													</span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<!-- Nama Lengkap -->
												<div class="form-group">
													<label>Asal Instansi</label>
													<input type="text" class="form-control" name="asalinstansi" placeholder="asalinstansi" value="<?php echo $user->asalinstansi; ?>" readonly>
													<span style="color: red">
														<?php echo form_error('asalinstansi'); ?>
													</span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<!-- Nama Lengkap -->
												<div class="form-group">
													<label>Instansi Sekarang</label>
													<input type="text" class="form-control" name="instansisekarang" placeholder="instansisekarang" value="<?php echo $user->instansisekarang; ?>" readonly>
													<span style="color: red">
														<?php echo form_error('instansisekarang'); ?>
													</span>
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-md-12">
												<!-- Nama Lengkap -->
												<div class="form-group" id="only-number">
													<label>Nomor Handphone</label>
													<input type="text" class="form-control" name="no_telp" placeholder="Nomor Handphone" value="<?php echo $user->no_telp; ?>" readonly>
													<span style="color: red">
														<?php echo form_error('no_telp'); ?>
													</span>
												</div>
											</div>
										</div>

										<!-- <div class="row">
											<div class="col-md-3">
												<label for="foto">Foto*</label>												
											</div>
											<div class="col-md-1">:</div>
											<div class="col-md-8">
												<input type="file" class="form-control-file" name="foto">
												<input type="hidden" name="old_image" value="<?php echo $user->foto; ?>">
												<div class="invalid-feedback">
													<?php echo form_error('foto') ?>
												</div>
											</div>
										</div> -->

										<div class="row">
											<div class="col-md-12">
												<!-- Nama Lengkap -->
												<div class="form-group">
													<label>Atur Hak Akses</label>
													<div class="form-group">
														<select class="form-control" id="level" name="level">
															<option value="">Pilih</option>
															<option value="4">Super (Kepala Kejati)</option>
															<option value="1">High (Asisten Pengawas)</option>
															<option value="3">Medium (Asisten Bidang, Kepala Tata Usaha, Koordinator)</option>
															<option value="2">Low (Pegawai Umum)</option>
														</select>
														<span style="color: red">
															<?php echo form_error('level'); ?>
														</span>
													</div>
												</div>
											</div>
										</div>
										<!-- <input type="submit" value="Save" name="btn" class="btn btn-success"> -->


										<div class="text-right">
											<a href="<?php echo site_url('admin/datapegawai'); ?>">
												<button type="button" class="btn btn-primary pull-right">
													<i class="fas fa-arrow-left"></i> Kembali</button>
											</a>

											<button type="submit" class="btn btn-success pull-right">
												<i class="far fa-save"></i> Save
											</button>
										</div>
								</div>
								</form>
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
		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>