<?php get_header(); ?>
<?php get_header(); ?>
<?php get_template_part('overlay'); ?>
<?php get_template_part('page_top__blog'); ?>
<?php get_template_part('tab'); ?>

<main>

<div class="container_center d-flex">
    <div class="main__bar article__list d-flex">
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

<!– ループはじめ –>

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

<!– ループおわり –>

<?php endforeach; endif; wp_reset_postdata(); ?>
    </div>
    <div class="sidebar">
        <?php get_template_part('sidebar'); ?>
    </div>
</div>

</main>

<?php get_footer(); ?>