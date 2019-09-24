<?php
/*
 * Template Name: Post Template
 * Template Post Type: page, post
 */
get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section><article>
            <div class="block">

			<h1><?php single_post_title(); single_cat_title(); ?></h1>

		<?php while (have_posts()) : the_post(); ?>
            <p><a href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b>, <?php echo apply_filters('the_date', get_the_date(), get_option('date_format', '', '')); ?>:  <?php echo strip_tags(apply_filters('the_excerpt', get_the_excerpt())); ?></a></p>
		<?php endwhile; ?>

            </div>
		</article></section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>
