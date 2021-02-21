<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= base_url('assets/') ?>img/post-bg.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="post-heading">
					<h1><?= $post['title'] ?></h1>
					<h2 class="subheading"><?= $post['subtitle'] ?></h2>
					<span class="meta">Posted by
						<a href="#"><?= $post['username'] ?></a>
						on <?= date('F j, Y', strtotime($post['updated_at'])) ?></span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Post Content -->
<article>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<p><?= $post['description'] ?></p>
			</div>
		</div>
	</div>
</article>

<hr>
