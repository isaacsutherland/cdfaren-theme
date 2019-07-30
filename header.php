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

<div class="navtop">
	<b class="fill"></b>
	<span>Ottawa</span>
	<a href="tel:1-877-851-9099">1-877-851-9099</a>
</div>
<br/>
<?php
echo do_shortcode('[lqp_life_form]');
?>
