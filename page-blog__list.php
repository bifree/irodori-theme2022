<?php
/*Template Name: blog*/
?>

<?php get_header(); ?>
<?php get_template_part('overlay'); ?>
<?php get_template_part('page_top__blog'); ?>
<?php get_template_part('tab'); ?>

<div class="container_center d-flex">
  <div class="main__bar">
    <h2 class="category__title">
    すべての記事
    </h2>
    <div class="blog--boxies article__list">
    <?php
    $categorys = array(4);
    for ($i=0; $i<count($categorys); $i++) :
    ?>

    <?php
    query_posts($categorys[$i]);
    if (have_posts()) : while (have_posts()) : the_post();
    ?>

    <div class="blog__box">
      <div class="thumbnail">
      <?php the_post_thumbnail( 'medium' ); ?>
      </div>
      <div class="tags__date">
		  <span class="<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>" style=""><?php the_category(); ?></span>
<!--         <span class="category__activity">
          <?php the_category(); ?>
        </span> -->
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

    
    <div class="sidebar">
        <?php get_template_part('sidebar'); ?>
    </div>
    </div>
<div class="container_center mh-100">
<?php get_template_part('contact_btn'); ?>
</div>

<?php get_footer(); ?>