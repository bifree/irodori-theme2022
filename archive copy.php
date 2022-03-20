<?php
/*Template Name: event*/
?>

<?php get_header(); ?>
<?php get_template_part('page_top'); ?>
<?php get_template_part('overlay'); ?>
<?php get_template_part('tab'); ?>

<div class="main__container">
	<h3 class="page__title">イベント一覧</h3>

<div class="event">
	<?php
	$cat_posts = get_posts(array(
			‘post_type’ => ‘post’, // 投稿タイプ
			‘category’ => 1, // カテゴリIDを番号で指定する場合
			‘category_name’ => ‘スラッグ’, // カテゴリをスラッグで指定する場合
			‘posts_per_page’ => 6, // 表示件数
			‘orderby’ => ‘date’, // 表示順の基準
			‘order’ => ‘DESC’ // 昇順・降順
	));
	global $post;
	if($cat_posts): foreach($cat_posts as $post): setup_postdata($post); ?>
	<div class="event__box">
		<div class="event__name">
			<a href="<?php the_permalink() ?>"><h3><?php the_title(); ?></h3></a>
			<p>日程：2021-9-11(土) 13:00〜17:30</p>
			<p>場所：新宿</p>
			</div>
			<div class="event__btn">
			<a href="<?php the_permalink() ?>" class="btn__service">詳しくみる  <span class="span__blue">>></span></a>
			</div>
	</div>
	<?php endforeach; endif; wp_reset_postdata(); ?>
</div>

</div>

<?php get_footer(); ?>
