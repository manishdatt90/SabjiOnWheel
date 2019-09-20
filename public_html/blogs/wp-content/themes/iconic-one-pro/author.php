<?php
/*
 * Author Post Archive pages display template.
 * Read more here: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>

			<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>

			<?php themonic_content_nav( 'nav-above' ); ?>

			<?php
			// If a user has filled out their description, show a bio on their entries.
			if ( get_the_author_meta( 'description' ) ) : ?>
			<div class="io-author-info">
				
				<div class="io-author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themonic_author_bio_avatar_size', 120 ) ); ?>
				</div><!-- .author-avatar -->
				
			
						<div class="io-author-description">
						<h1><?php printf( get_the_author() ); ?></h1>
				
					
					<p><?php the_author_meta( 'description' ); ?></p>
				<div class="io-author-page-icons">	
					<?php if ( get_the_author_meta( 'googleplus' ) ) { ?>
				<a style="text-decoration:none; color:#BB3726;" href="<?php the_author_meta( 'googleplus' ); ?>?rel=author"><i class="icon-google-plus-sign icon-large"></i></a>
			<?php } // End check for G+ ?>
			
			<?php if ( get_the_author_meta( 'twitter' ) ) { ?>
				<a style="text-decoration:none; color:#33CCFF;" href="<?php the_author_meta( 'twitter' ); ?>"><i class="icon-twitter-sign icon-large"></i></a>
			<?php } // End check for Twitter ?>
			
			<?php if ( get_the_author_meta( 'facebook' ) ) { ?>
			<a style="text-decoration:none; color:#3B5998;" href="<?php the_author_meta( 'facebook' ); ?>"><i class="icon-facebook-sign icon-large"></i></a>
			<?php } // End check for Facebook ?>
			</div>
				</div><!-- .author-description	-->
					
		<div style="display: block; clear: both;"></div>
		</div><!-- .author-info -->
			<div class="io-archive-page">
				<p class="archive-title"><?php printf( __( 'Author Archives: %s', 'themonic' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></p>
			
			</div><!-- .archive-header -->
					
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php themonic_content_nav( 'nav-below' ); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>