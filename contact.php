<?php
/*Template Name: contact*/
?>

<?php get_header(); ?>
<?php get_template_part('overlay'); ?>
<?php get_template_part('page_top__contact'); ?>
<?php get_template_part('tab'); ?>

<div class="container_center">
	<h3 class="contact__h3">よくある質問</h3>

	<p class="contact__p">よくお問い合わせいただく内容とその回答を掲載しています。 お問い合わせ前に、一度こちらもご確認ください。</p>

	<dl class="question__d">
		<div class="question__">
			<dt>イベントの申し込みはどこからできますか？</dt>
			<dd><p>
			お申し込みしたいイベントのご案内に従ってお申し込みください。イベントの詳細は「イベント一覧」のページから確認できます。
			</p></dd>
		</div>
	</dl>

	<h3 class="contact__h3">お問い合わせ</h3>

	<p class="contact__p">当団体は、お客様から提供された個人情報をお問い合わせ対応またはイベント対応の目的で利用させていただきます。利用目的以外で第三者に開示することはありません。個人情報の取扱いに関する方針については、当団体ホームページの<a href="https://irodori-odori.com/privacy-policy" class="contact__a">「プライバシーポリシー」</a>をご覧ください。</p>
</div>
<?php the_content() ?>
<?php get_footer(); ?>
