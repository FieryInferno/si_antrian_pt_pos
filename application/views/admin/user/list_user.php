<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("template/head.php") ?>


<?php $this->load->view("template/sidebar.php") ?>

<div class="content-body">

	<div class="row page-titles mx-0">
		<div class="col p-md-0">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">List User</a></li>
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
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Daftar User</h4>
						<hr>
						<div class="table-responsive">
							<table class="table table-striped table-bordered zero-configuration">
								<thead>
									<th>Username</th>
									<th>Nama</th>
									<th>Jabatan</th>
									<th>Email</th>
									<th>No. HP</th>
									<th>Foto</th>
									<th>Aksi</th>
								</thead>
								<tbody>
									<?php foreach ($daftaruser->result() as $result) : ?>
										<tr>
											<td><?php echo $result->username ?></td>
											<td><?php echo $result->nama ?></td>
											<td><?php echo $result->jabatan ?></td>
											<td><?php echo $result->email ?></td>
											<td><?php echo $result->no_telp ?></td>
											<td> <img class="mr-3" src="<?php echo base_url('upload/user/' . $result->foto) ?>" height="150px" style="border-radius:10%;" alt=""></td>
											<td>
												<!-- <a href="<?php echo site_url('operator/user/edit/' . $result->id_user); ?>" class="ti-pencil" style="font-size: 3em;"></a> -->
												<a onclick="deleteConfirm('<?php echo site_url('operator/user/delete/' . $result->id_user); ?>')" href="#!" class="ti-trash" style="font-size: 3em;"></a>
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