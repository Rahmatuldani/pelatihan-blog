<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Postingan</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Title</th>
						<th>Sub Title</th>
						<th>Description</th>
						<th>Created</th>
						<th>Updated</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Title</th>
						<th>Sub Title</th>
						<th>Description</th>
						<th>Created</th>
						<th>Updated</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($post as $d) : ?>
						<tr>
							<th><?= $d['title'] ?></th>
							<th><?= $d['subtitle'] ?></th>
							<th><?= substr_replace($d['description'], '...', 30) ?></th>
							<th><?= date('j F Y', strtotime($d['created_at'])) ?></th>
							<th><?= date('j F Y', strtotime($d['updated_at'])) ?></th>
							<th>
								<a href="<?= base_url('dashboard/edit/'.$d['post_id']) ?>" class="btn btn-info btn-circle">
									<i class="fas fa-edit"></i>
                                </a>
								<a href="<?= base_url('dashboard/delete/'.$d['post_id']) ?>" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a>
							</th>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
