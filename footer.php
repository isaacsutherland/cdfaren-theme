<?php
function transformBottomMenu() {
    $html = strip_tags(wp_nav_menu(array(
        'theme_location' => 'bottom_menu',
        'container' => false,
        'items_wrap' => '%3$s',
        'echo' => false,
    )), '<a><br>');
    preg_match_all('/<a .*?href="(?P<href>.*?)".*?>(?P<label>.*?)<\\/a>/', $html, $mm, PREG_SET_ORDER);
    for ($i=0; $i<count($mm); $i++) {
        $m = $mm[$i];
        preg_match_all('/<br/', $m['label'], $bb, PREG_SET_ORDER);
        if (substr($m['href'], 0, 4) === 'tel:')
            echo sprintf('<a class="tel" href="%s">%s</a>', $m['href'], $m['label']);
        else if (count($bb) >= 1)
            echo sprintf('<a class="link" href="%s" target="_blank">%s</a>', $m['href'], $m['label']);
        else
            echo sprintf('<a class="link oneline" href="%s" target="_blank">%s</a>', $m['href'], $m['label']);
        if ($i < count($mm) - 1)
            echo ', ';
    }
}
?>

<div class="bottom-menu">
    <span>Apply now for</span>
    <?php transformBottomMenu(); ?></div>

<?php wp_footer(); ?>
	</body>
</html>
