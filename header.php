<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
<?php

$base = get_template_directory_uri();
$logo = "$base/i/far-logo.png";

?>
	</head>
	<body <?php body_class(); ?>>

<a class="logo" href="/contact">
    <img src="<?php echo $logo ?>"/>
    <span>Ottawa - Contact Us</span>
</a>

<script>
function hasClass(el, cls) { return !!el.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)')); }
function addClass(el, cls) { if (!hasClass(el, cls)) el.className += ' ' + cls; }
function removeClass(el, cls) { if (hasClass(el, cls)) { el.className = el.className.replace(new RegExp('(^' + cls + '(\\s|$))|(\\s' + cls + ')'), ''); } }
function toggleClass(el, cls) { if (hasClass(el, cls)) removeClass(el, cls); else addClass(el, cls); }
</script>
<div class="navtop">
	<b class="fill"></b>
    <a class="ham" href="#">&#9776;</a>
    <a class="link oneline" href="/">Home</a>
    <a class="link" href="/simplified-life">No Medical<br/> Life Insurance</a>
    <a class="link" href="/critical-illness">Critical Illness<br/> Insurance</a>
    <a class="link" href="/health-and-dental">Health &amp; Dental<br/> Insurance</a>
    <a class="link oneline" href="/travel">Travel Insurance</a>
    <a class="link oneline" href="/about-us">About Us</a>
	<a class="tel" href="tel:1-613-408-7002">1-613-408-7002</a>
</div>
<script>
var ham = document.querySelector('.ham'),
    navtop = document.querySelector('.navtop');
ham.addEventListener('click', function(e) {
    addClass(navtop, 'animateHeight');
    toggleClass(navtop, 'expand');
    setTimeout(() => { removeClass(navtop, 'animateHeight'); }, 250);
    e.preventDefault();
});
</script>
<?php
echo do_shortcode('[lqp_life_form]');
?>
