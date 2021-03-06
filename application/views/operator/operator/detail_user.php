<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view("operator/_partials/head.php") ?>

</head>

<body id="page-top">

	<?php $this->load->view("operator/_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("operator/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("operator/_partials/breadcrumb.php") ?>

				<!-- Notifikasi data berhasil di simpan -->
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						Detail Data User
					</div>

					<div class="card-body">
						<!-- Success validation error -->
						<!-- <div class="form_error">
							echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
						</div> -->

						<!-- Failed validation error -->
						<!-- <div class="invalid-feedback">
							echo form_error('username'); ?>
						</div> -->

						<form enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $user->id; ?>">

							<!-- <span></span> -->
							<table class="table table-striped">
								<tbody>
									<tr>
										<th scope="row">Username</th>
										<td>:</td>
										<td>
											<?php echo $user->username; ?>
										</td>
									</tr>
									<tr>
										<th scope="row">Email</th>
										<td>:</td>
										<td>
											<?php echo $user->email; ?>
										</td>
									</tr>
									<tr>
										<th scope="row">Address</th>
										<td>:</td>
										<td>
											<?php echo $user->address; ?>
										</td>
									</tr>
									<tr>
										<th scope="row">Mobile phone</th>
										<td>:</td>
										<td>
											<?php echo $user->mobile; ?>
										</td>
									</tr>
								</tbody>
							</table>

							<div class="text-right">
								<a href="<?php echo site_url('operator/users'); ?>">
									<button type="button" class="btn btn-default pull-right">
										<i class="fas fa-arrow-left"></i> Back</button>
								</a>
							</div>
						</form>
					</div>
				</div>

				<div class="card-footer small text-muted">
					* required fields
				</div>
			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("operator/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<?php $this->load->view("operator/_partials/scrolltop.php") ?>
	<?php $this->load->view("operator/_partials/modal.php") ?>
	<?php $this->load->view("operator/_partials/js.php") ?>

</body>

</html>