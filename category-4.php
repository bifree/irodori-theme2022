<?php
/*Template Name: 活動報告*/
// カテゴリー：活動報告
?>

<?php get_header(); ?>
<?php get_template_part('overlay'); ?>
<?php get_template_part('page_top__blog'); ?>
<div class="tab">
	<p><a href="">HOME</a> > 活動報告</p>
</div>

<main>

<div class="container_center d-flex">
  <div class="main__bar">
    <h2 class="category__title">
    活動報告
    </h2>

    <div class="blog--boxies article__list">
    <?php
    $categorys = array(4);
    for ($i=0; $i<count($categorys); $i++) :
    ?>

    <?php
    query_posts('showposts=5&cat='.$categorys[$i]);
    if (have_posts()) : while (have_posts()) : the_post();
    ?>

    <div class="blog__box">
      <div class="thumbnail">
      <?php the_post_thumbnail( 'medium' ); ?>
      </div>
      <div class="tags__date">
        <span class="category__activity">
          <?php the_category(); ?>
        </span>
        <span class="small">
          <i class="far fa-clock"></i><?php echo get_the_date('Y.n.j'); ?>
        </span>
      </div>
      <span class="small ">
        <?php the_tags( '<i class="fas fa-tag"></i>', ' 、 ' ); ?>
      </span>
      <hr>
      <h3 class="article--title">
        <a href=<?php the_permalink(); ?>><?php the_title(); ?></a>
      </h3>
    </div>

    <?php endwhile; ?>
    <?php else: ?>
    <?php echo esc_html(get_catname($categorys[$i]))."はまだありません。"; ?>

    <?php endif; ?>
    <?php endfor; ?>
    </div>

  </div>
  <?php get_template_part('sidebar'); ?>
</div>

</main>

<?php get_footer(); ?>