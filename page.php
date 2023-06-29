<?php
/**
* Веб Студия Symmetry
* Шаблон обычной страницы
* @package WordPress
* @subpackage clean
* <h1><?php the_title(); // Заголовок ?></h1>
*/

get_header(); // Подключаем хедер?>

<div  class="content">
	<center><h1><?php the_title(); // Заголовок ?></h1></center>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // Начало цикла ?>
<?php the_content(); // Содержимое страницы ?>
<?php endwhile; // Конец цикла ?>     
</div> 

<!--Скрипт для лайтбокса-->
<script>
function showLitebox(source){
	//получаем имя изображения, и подменяем директорию с миниатюр на оригиналы
	var src = source.getAttribute("src");
	var filename = getFilename(src);
	var litebox_img = document.getElementById("litebox-img");
	litebox_img.src = "/wp-content/themes/WP_CLEAN/imag/full-1500/"+filename;
	//делаем лайтбокс видимым
	var litebox = document.getElementById("litebox");
	litebox.style.display = "block";
	//местный lazy-load, но через JS
	litebox_img.style.display="none";
	litebox_img.onload = function() {
		litebox_img.style.display="block";
  	}; 
}

function getFilename(fullPath) {
  return fullPath.substring(fullPath.lastIndexOf('/') + 1);
}
	
function hideLitebox(){
	var litebox = document.getElementById("litebox");
	litebox.style.display = "none";
}
</script> 

<script>
(function() {
    // Add event listener
    document.addEventListener("mousemove", parallax);
    const elem = document.querySelector("#parallax");
    // Magic happens here
    function parallax(e) {
        let _w = window.innerWidth/2;
        let _h = window.innerHeight/2;
        let _mouseX = e.clientX;
        let _mouseY = e.clientY;
        let _depth1 = `${50 - (_mouseX - _w) * 0.01}% ${50 - (_mouseY - _h) * 0.01}%`;
        let _depth2 = `${50 - (_mouseX - _w) * 0.02}% ${50 - (_mouseY - _h) * 0.02}%`;
        let _depth3 = `${50 - (_mouseX - _w) * 0.06}% ${50 - (_mouseY - _h) * 0.06}%`;
        let x = `${_depth3}, ${_depth2}, ${_depth1}`;
        console.log(x);
        elem.style.backgroundPosition = x;
    }

})();
</script>

<?php get_footer(); // Подключаем футер ?>