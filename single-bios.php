<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	
			<h1><?php the_title(); ?></h1>


				<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
				?>
				
				<!-- DISPLAY CONTACT INFO -->
				<?php if ( get_post_meta($post->ID, '_hcfw_tel', true) ) { ?>
				<p>Direct phone: <?php echo get_post_meta($post->ID, '_hcfw_tel', true); ?></p>
				<?php } else {} ?>

				<?php if ( get_post_meta($post->ID, '_hcfw_mobile', true) ) { ?>
				<p>Mobile phone: <?php echo get_post_meta($post->ID, '_hcfw_mobile', true); ?></p>
				<?php } else {} ?>
				
				<?php if ( get_post_meta($post->ID, '_hcfw_email', true) ) { ?>				
				<p>Email: <a href="mailto:<?php echo get_post_meta($post->ID, '_hcfw_email', true); ?>"><?php echo get_post_meta($post->ID, '_hcfw_email', true); ?></a></p>
				<?php } else {} ?>
				
				<?php if ( get_post_meta($post->ID, '_hcfw_twitter', true) ) { ?>
				<p>Twitter: <a href="http://twitter.com/<?php echo get_post_meta($post->ID, '_hcfw_twitter', true); ?>" target="_blank">@<?php echo get_post_meta($post->ID, '_hcfw_twitter', true); ?></a></p>
				<?php } else {} ?>
				
				<?php if ( get_post_meta($post->ID, '_hcfw_linkedin', true) ) { ?>
				<p>LinkedIn: <a href="<?php echo get_post_meta($post->ID, '_hcfw_linkedin', true); ?>" target="_blank">LinkedIn</a></p>				<?php } else {} ?>
		
		
				<?php the_content(); ?>

			
			<?php edit_post_link('Edit this entry','','.'); ?>
			
		</article>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>