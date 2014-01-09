<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class('post') ?> id="post-<?php the_ID(); ?>">

		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		
			<?php the_content(); ?>
				
		</article>

	<?php endwhile; ?>

	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

<?php get_footer(); ?>
