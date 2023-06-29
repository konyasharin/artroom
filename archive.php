<?php
/*
Theme Name: Symmetry
Theme URI: http://websymmetry.ru/
Description: Чистый шаблон WordPress
Author: olegternovoi@yandex.ru
Author URI: * https://vk.com/oleg_ternovoy
*/

get_header();
?>
<div class="background-site"> 
	<div class='content'>
		<div class="media">
			<?php if (have_posts()) while (have_posts()) : the_post(); ?>
			<h3><b><?php the_title(); ?></b></h3>
			<p><?php the_excerpt(); ?></p>
			<div class="flexbox betwen">
            <span class="date"><?php echo get_the_date() ?></span>
            <a href="<?php the_permalink(); ?>">подробнее</a>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
