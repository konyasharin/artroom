<?php
/**
* Чистый Шаблон для разработки
* Шаблон вывода постов в категории(рубрике)
* @package WordPress
* @subpackage clean
*/

get_header(); // Подключаем хедер ?>
<div class='content'>
  <div class="media">
	  <h1><?php wp_title(''); // Заголовок категории ?></h1>
  <?php if (have_posts()) : while (have_posts()) : the_post(); // Цикл записей ?>
	  
	  <h3><b><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></b></h3><!-- Заголовок поста + ссылка на него -->
      
	  <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } // Проверяем наличие миниатюры, если есть показываем ?>
      <?php the_excerpt(); // Выводим анонс ?>
      <?php endwhile; // Конец цикла.
      else: echo '<h2>Извините, ничего не найдено...</h2>'; endif; // Если записей нет - извиняемся ?>	 
      <?php // Пагинация
      global $wp_query;
      $big = 999999999;
      echo paginate_links( array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'type' => 'list',
          'prev_text'    => __('&lt; Назад'), 
          'next_text'    => __('Вперед &gt;'),
          'total' => $wp_query->max_num_pages
      ) );
      ?>
  </div>
</div> 
<?php get_footer(); // Подключаем футер ?>