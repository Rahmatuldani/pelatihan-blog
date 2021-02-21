<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= base_url('assets') ?>/img/home-bg.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1><?= $title ?></h1>
					<span class="subheading">Start to create your own blogs</span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
		<?php foreach($post as $p) : ?>
			<div class="post-preview">
				<a href="<?= base_url('home/posting/').$p['post_id'] ?>">
					<h2 class="post-title">
						<?= $p['title'] ?>
					</h2>
					<h3 class="post-subtitle">
						<?= $p['subtitle'] ?>
            		</h3>
				</a>
				<p class="post-meta">Posted by
					<a href="#"><?= $p['username'] ?></a>
					on <?= date('F j, Y', strtotime($p['updated_at'])) ?>
				</p>
			</div>
			<hr>
		<?php endforeach ?>
		</div>
	</div>
</div>

<hr>
