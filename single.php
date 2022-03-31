<?php get_header(); ?>
<?php get_template_part('overlay'); ?>
<?php get_template_part('page_top'); ?>
<?php get_template_part('tab'); ?>

<div class="container_center d-flex">
  <div class="main__bar">
		<div class="main__bar__top">
			<div class="article__category">
				<?php the_category(); ?>disp
			</div>
			<div class="tags">
				<p class="tag__p"><?php the_tags( '<i class="fas fa-tag"></i>', ' 、 ' ); ?> <i class="far fa-clock"></i><?php echo get_the_date('Y.n.j'); ?></p>
			</div>
		</div>
		<div class="article__title">
			<h1 class="article--title"><?php the_title(); ?></h1>
		</div>
		<div class="article__text">
			<?php the_content(); ?>
		</div>
  </div>
  <div class="sidebar">
    <?php get_template_part('sidebar'); ?>
  </div>
</div>

<!-- <div class="related">
	<div class="container_center">
	<h2>関連記事はこちら</h2>
	<div class="d-flex">
		<div class="blog__box">
			<div class="thumbnail">
				<img src="" alt="">
			</div>
			<span class="category__event">
				イベント情報
			</span>
			<span class="small">
				2020.07.20
			</span>
			<span class="small ">
				タグタグタグ
			</span>
			<hr>
			<h3>レディースファッション買い物同行サービス</h3>
		</div>
	<div class="blog__box">
		<div class="thumbnail">
			<img src="" alt="">
		</div>
		<span class="category__event">
			イベント情報
		</span>
		<span class="small">
			2020.07.20
		</span>
		<span class="small ">
			タグタグタグ
		</span>
		<hr>
		<h3>レディースファッション買い物同行サービス</h3>
	</div>
	<div class="blog__box">
		<div class="thumbnail">
			<img src="" alt="">
		</div>
		<span class="category__event">
			イベント情報
		</span>
		<span class="small">
			2020.07.20
		</span>
		<span class="small ">
			タグタグタグ
		</span>
		<hr>
		<h3>レディースファッション買い物同行サービス</h3>
	</div>
	</div>
	</div>
</div>-->

<?php get_footer(); ?>

<?php get_template_directory_uri(); ?>