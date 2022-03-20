<?php
/*Template Name: blog*/
?>

<?php get_header(); ?>
<?php get_template_part('overlay'); ?>
<?php get_template_part('page_top__blog'); ?>
<?php get_template_part('tab'); ?>

<div class="container_center d-flex">
    <div class="main__bar">
        <h2 class="waiting__h2">公開準備中</h2>
        <p class="waiting__p">現在ページの準備を進めています。<br>
        今しばらくお待ちくださいませ。</p> 
    </div>
    <div class="sidebar">
        <?php get_template_part('sidebar'); ?>
    </div>
</div>
<div class="container_center mh-100">
<?php get_template_part('contact_btn'); ?>
</div>

<?php get_footer(); ?>