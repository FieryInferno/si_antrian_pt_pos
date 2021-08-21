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



				<!-- Notifikasi data berhasil di simpan -->
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- DataTables d-->
				<div class="card mb-3">
					<div class="card-header">
						Detail Pegawai
					</div>

					<div class="card-body">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-10">
									<form  enctype="multipart/form-data">

										<input type="hidden" name="id" value="<?php echo $user->id_user; ?>">

										<!-- <span></span> -->
										<table class="table table-striped">
											<tbody>
												<tr>
													<th scope="row" style="width: 174px;">Username</th>										
													<td>
														: <?php echo $user->username; ?>
													</td>
												</tr>
												<tr>
													<th scope="row">NIP</th>										
													<td>
														: <?php echo $user->nip; ?>
													</td>
												</tr>
												<tr>
													<th scope="row">Nama Lengkap</th>										
													<td>
														: <?php echo $user->nama; ?>
													</td>
												</tr>
												<tr>
													<th scope="row">Jenis Kelamin</th>										
													<td>
														: <?php echo $user->jeniskelamin; ?>
													</td>
												</tr>
												<tr>
													<th scope="row">Email</th>										
													<td>
														: <?php echo $user->email; ?>
													</td>
												</tr>
												<tr>
													<th scope="row">Jabatan</th>										
													<td>
														: <?php echo $user->jabatan; ?>
													</td>
												</tr>									
												<tr>
													<th scope="row">Divisi</th>										
													<td>
														: <?php echo $user->divisi; ?>
													</td>
												</tr>		
												<tr>
													<th scope="row">Asal Instansi</th>										
													<td>
														: <?php echo $user->asalinstansi; ?>
													</td>
												</tr>	
												<tr>
													<th scope="row">Instansi Sekarang</th>										
													<td>
														: <?php echo $user->instansisekarang; ?>
													</td>
												</tr>		
												<tr>
													<th scope="row">Nomor Telepon</th>										
													<td>
														: <?php echo $user->no_telp; ?>
													</td>
												</tr>									
											</tbody>
										</table>

										<div class="text-right">
											<a href="<?php echo site_url('operator/user'); ?>">
												<button type="button" class="btn btn-primary pull-right">
													<i class="fas fa-arrow-left"></i> Kembali</button>
											</a>
										</div>
									</form>
								</div>
								<div class="col-md-2">
									<div class="row">
										<img src="<?php echo base_url('upload/user/'.$user->foto); ?>" width="100%" height="100%">
									</div>
								</div>
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
	<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>