<?php
/**
* Чистый Шаблон для разработки
* Шаблон футера
* @package WordPress
* @subpackage clean
*/

	wp_footer(); // Необходимо для нормальной работы плагинов
?>
	<div class="footer__background">
		<footer class="footer">
			<div class="footer__wrapper">
				<div class="footer__logo"><?php the_custom_logo()?></div>
				<div class="footer__tel">
					<img src="<?php echo get_template_directory_uri() . '/imeg/tel.png' ?>" alt="map">
					<?php the_field('telephone') ?>
				</div>
				<div class="footer__email">
					<img src="<?php echo get_template_directory_uri() . '/imeg/email.png' ?>" alt="map">
					<?php the_field('email')?>
				</div>
				<div class="footer__address">
					<img src="<?php echo get_template_directory_uri() . '/imeg/map.png' ?>" alt="map">
					<?php the_field('address')?>
				</div>
				<div class="footer__social">
					<a href="<?php the_field('vklink')?>"><img src="<?php echo get_template_directory_uri() . '/imeg/vk.png'?>" alt="vk"></a>
					<a href="<?php the_field('telegramlink')?>"><img src="<?php echo get_template_directory_uri() . '/imeg/telegram.png'?>" alt="telegram"></a>
					<a href="<?php the_field('whatsapplink')?>"><img src="<?php echo get_template_directory_uri() . '/imeg/whatsapp.png'?>" alt="whatsapp"></a>

				</div>
			</div>
			<div class="footer__license">
				<span>© Artroom Gatchina - Творческие мастер-классы в Гатчине</span>
				<span><a href="https://websymmetry.ru/">Сделано в WebSymmetry</a></span>
				<span>Политика конфиденциальности</span>
			</div>
		</footer>
	</div>


</body>
</html>