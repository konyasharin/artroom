<?php
/**
* Чистый Шаблон для разработки
* Шаблон главной страницы
* @package WordPress
* @subpackage Oliviya
*/

get_header(); ?>
<div class="content">
    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile; ?>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>