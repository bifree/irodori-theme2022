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
    $paged = (int) get_query_var('paged');
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',//公開記事のみ
        'orderby' => 'date',//日付順
        'order' => 'DESC',//昇順
        'posts_per_page' => 6,//最大表示数
        'paged' => $paged
    );
      query_posts($categorys[$i]);
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
    <?php
    //ページネーション表示前に$GLOBALS['wp_query']->max_num_pagesに値をセット
    $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
    the_posts_pagination(
      array(
        'end_size'       => '1', // ページ番号リストの両端に表示するページ数
        'mid_size'      => 1, // 現在ページの左右に表示するページ番号の数
        'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
        'prev_text'     => __( '<'), // 「前へ」リンクのテキスト
        'next_text'     => __( '>'), // 「次へ」リンクのテキスト
        'type'          => 'list', // 戻り
      )
    );

    wp_reset_postdata();
    ?>
    <?php get_template_part('sidebar'); ?>
  </div>
</main>

<?php get_footer(); ?>