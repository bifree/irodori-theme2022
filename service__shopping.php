<?php
/*Template Name: event*/
?>

<?php get_header(); ?>
<?php get_template_part('page_top'); ?>
<?php get_template_part('tab'); ?>

<div class="main__container">
	<h3 class="page__title">イベント一覧</h3>

	<div class="event">
		<div class="event__box">
			<div class="event__name">
				<h3>レディースファッション買い物同行サービス</h3>
				<p>日程：2021/9/9</p>
				<p>場所：オンライン</p>
				</div>
				<div class="event__btn">
				<a href="" class="btn__service">詳しくみる  <span class="span__blue">>></span></a>
				</div>
		</div>
	</div>
	
	<div class="cat_list">
    <?php
        $categories = get_categories();
        foreach ($categories as $category):
    ?>
    <h2><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo $category->name; ?></a></h2>
    <?php
        $my_query = new WP_Query(
            array(
                'cat' => $category->term_id,
                'posts_per_page' => 3,
            ));
        if ($my_query->have_posts()):
    ?>
    <ul>
    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
    <?php else: ?>
        <p>投稿はありません。</p>
    <?php endif; ?>
    <?php endforeach; ?>
	</div>

</div>

<?php the_content() ?>
<?php get_footer(); ?>
