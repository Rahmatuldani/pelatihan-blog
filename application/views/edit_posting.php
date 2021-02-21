<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-4">Edit Postingan</h1>
		<?= form_open_multipart('dashboard/edit/'.$post['post_id']) ?>
		<div class="col-lg-10">
			<div class="form-group">
				<input type="text" class="form-control" name="title" placeholder="Enter Title" value="<?= $post['title'] ?>">
				<?= form_error('title', '<small class="text-danger pl-3">', '</small>') ?>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="subtitle" placeholder="Enter Subtitle" value="<?= $post['subtitle'] ?>">
				<?= form_error('subtitle', '<small class="text-danger pl-3">', '</small>') ?>
			</div>
			<div class="form-group">
				<textarea class="form-control" name="desc" id="desc" rows="12"><?= $post['description'] ?></textarea>
				<?= form_error('desc', '<small class="text-danger pl-3">', '</small>') ?>
			</div>
			<button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Save</button>
			<button type="reset" class="btn btn-warning"><i class="fas fa-redo mr-2"></i>Reset</button>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
