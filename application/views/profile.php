<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Identitas</h6>
	</div>
	<div class="card-body">
	<?= form_open_multipart('dashboard/uprofile') ?>
		<div class="col-lg-4">
			<div class="form-group">
				<input type="text" class="form-control" name="username" value="<?= $this->session->userdata('username') ?>">
				<?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
			</div>

			<label for="password" class="form-group mt-5">Change Password</label>
			<div class="form-group mb-5">
				<input type="password" class="form-control" name="password" id="password">
			</div>
			<button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Save</button>
			<button type="reset" class="btn btn-warning"><i class="fas fa-redo mr-2"></i>Reset</button>
		</div>
	</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
