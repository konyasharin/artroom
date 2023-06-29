<?php

/**
 * Чистый Шаблон для разработки
 * Функции шаблона
 * @package WordPress
 * @subpackage clean
 */
register_nav_menus(array( // Регистрируем 2 меню
    'top' => 'Верхнее меню',
    'left' => 'Нижнее'
));
add_theme_support('post-thumbnails'); // Включаем поддержку миниатюр
set_post_thumbnail_size(254, 190); // Задаем размеры миниатюре

if (function_exists('register_sidebar'))
    register_sidebar(); // Регистрируем сайдбар

function the_breadcrumb()
{
    if (!is_front_page()) {
        echo '<a href="';
        echo get_option('Главная');
        echo '">Главная';
        echo "</a> » ";
        if (is_category() || is_single()) {
            the_category(' ');
            if (is_single()) {
                echo " » ";
                the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        }
    } else {
        echo 'Home';
    }
}



add_action('wp_footer', 'wpmidia_activate_masked_input');
function wpmidia_activate_masked_input(){
?>
<script type="text/javascript">
jQuery( function($){
$(".tel").mask("+7 (999) 999-9999");
});
</script>
<?php
}

/*-----------------ЛайтБокс-------------------*/
add_filter('the_content', 'addrellightbox');
function addrellightbox($content) {
       global $post;
       $pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
       $replacement = '<a$1href=$2$3.$4$5 rel="lightbox" title="'.$post->post_title.'"$6>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}


function load_fancybox_on_about_page() {
    if ( is_page( 'home' ) ) {
        wp_enqueue_script( 'jquery' );
        wp_enqueue_style( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', array(), '3.5.7', 'all' );
        wp_enqueue_script( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array( 'jquery' ), '3.5.7', true );
        wp_add_inline_script( 'fancybox', '
            jQuery(document).ready(function($) {
                $(".wp-block-image a").attr("data-fancybox", "images");
                $(".wp-block-image a").fancybox({
                    buttons: [
                        "close"
                    ],
                    loop: true
                });
            });
        ' );
        wp_enqueue_style('childhood-style', get_template_directory_uri() . "/css/swiper-bundle.min.css");
        wp_enqueue_script("artroom-swiper", get_template_directory_uri() . "/js/swiper-bundle.min.js", array(), null, true);
        wp_enqueue_script("artroom-scripts", get_template_directory_uri() . "/js/script.js", array(), null, true);
    }
}
add_action( 'wp_enqueue_scripts', 'load_fancybox_on_about_page' );



// Скрываем часть текста
add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
	global $post;
	return '<a href="'. get_permalink($post) . '">&nbsp; Читать дальше>>></a>';
}

add_filter( 'excerpt_length', function(){
	return 20;
} );


/*-----------------Woocommerc-------------------*/
function discount($product)
{
    if ($product->sale_price) {
        $value = round((($product->regular_price - $product->sale_price) / $product->regular_price) * 1);
        return $value;
    }
}

add_action('woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 10);

// атрибуты перед описанием
function productShoes()
{
    global $product;
    do_action('woocommerce_product_additional_information', $product);
}


// Определяем место вывода атрибута
add_action('woocommerce_single_product_summary', 'productShoes', 15);

add_filter('woocommerce_output_related_products_args', 'jk_related_products_args');
function jk_related_products_args($args)
{

    $args['posts_per_page'] = 6; // количество "Похожих товаров"
    $args['columns'] = 3; // количество колонок
    return $args;
}

wp_enqueue_script('jquery');

wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.js');
wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css');
wp_enqueue_style('slick-theme', get_template_directory_uri() . '/css/slick-theme.css');

function get_tags_in_cat($cat_id)
{
    $posts = get_posts(array('category' => $cat_id, 'numberposts' => -1));
    $tags = array();

    foreach ($posts as $post) {
        $post_tags = get_the_tags($post->ID);
        if (!empty($post_tags))
            foreach ($post_tags as $tag)
                $tags[$tag->term_id] = $tag->name;
    }
    asort($tags);
    return $tags;
}




add_theme_support('custom-logo'); //добавление поддержки изменения лого на сайте