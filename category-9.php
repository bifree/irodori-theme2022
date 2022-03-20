<?php
/*Template Name: kategori*/
// カテゴリ：未分類
?>

<?php get_header(); ?>
<?php get_header(); ?>
<?php get_template_part('overlay'); ?>
<?php get_template_part('page_top__blog'); ?>
<?php get_template_part('tab'); ?>

<main>

  <div class="container_center d-flex">
    <div class="main__bar article__list d-flex">
      <?php
      $categorys = array(9);
      for ($i=0; $i<count($categorys); $i++) :
      ?>

      <?php
      query_posts('showposts=5&cat='.$categorys[$i]);
      if (have_posts()) : while (have_posts()) : the_post();
      ?>

      <div class="blog__box">
        <div class="thumbnail">
          <img src="" alt="">
        </div>
        <div class="tags__date">
          <span class="category__event">
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
    <?php get_template_part('sidebar'); ?>
  </div>

</main>

<?php get_footer(); ?>