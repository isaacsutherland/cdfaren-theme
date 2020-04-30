<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
<?php

?>
	</head>
	<body <?php body_class(); ?>>

<?php

function transformLogoMenu() {
    $base = get_template_directory_uri();
    $logo = "$base/i/far-logo.png";
    $html = wp_nav_menu(array(
        'theme_location' => 'logo_menu',
        'container' => false,
        'echo' => false,
        'items_wrap' => '%3$s',
    ));
    preg_match('/<a .*?href="(?P<href>.*?)".*?>(?P<label>.*?)<\\/a>/', $html, $m);
    echo sprintf('<a target="_blank" class="logo" href="%s"><img src="%s"><span>%s</span></a>', $m['href'], $logo, $m['label']);
}

transformLogoMenu();

function transformTopMenu() {
    $html = strip_tags(wp_nav_menu(array(
        'theme_location' => 'top_menu',
        'container' => false,
        'items_wrap' => '%3$s',
        'echo' => false,
    )), '<a><br>');
    preg_match_all('/<a .*?href="(?P<href>.*?)".*?>(?P<label>.*?)<\\/a>/', $html, $mm, PREG_SET_ORDER);
    foreach ($mm as $m) {
        preg_match_all('/<br/', $m['label'], $bb, PREG_SET_ORDER);
        if (substr($m['href'], 0, 4) === 'tel:')
            echo sprintf('<a class="tel" href="%s">%s</a>', $m['href'], $m['label']);
        else if (count($bb) >= 1)
            echo sprintf('<a class="link" href="%s">%s</a>', $m['href'], $m['label']);
        else
            echo sprintf('<a class="link oneline" href="%s">%s</a>', $m['href'], $m['label']);
    }
}

?>

<script>
function hasClass(el, cls) { return !!el.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)')); }
function addClass(el, cls) { if (!hasClass(el, cls)) el.className += ' ' + cls; }
function removeClass(el, cls) { if (hasClass(el, cls)) { el.className = el.className.replace(new RegExp('(^' + cls + '(\\s|$))|(\\s' + cls + ')'), ''); } }
function toggleClass(el, cls) { if (hasClass(el, cls)) removeClass(el, cls); else addClass(el, cls); }
</script>
<div class="navtop">
	<b class="fill"></b>
    <a class="ham" href="#">&#9776;</a>
    <?php transformTopMenu() ?>
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
