<?php
/*
 * Content display template, used for both single and index/category/search pages.
 * Iconic One uses custom excerpts on search, home, category and tag pages.
 * 
 * @since Iconic One Pro 1.0
 */
?>
<?php $options = get_option('iconiconepro'); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : // for top sticky post with blue border ?>
		<div class="featured-post">
			<?php _e( 'Featured Article', 'themonic' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'themonic' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
					<?php if ( is_single() ) : //for date on single page ?>	
	<div class="clear"></div>
	<div class="below-title-meta">
		<div class="adt">
		<?php _e('By','themonic'); ?>
        <span class="author">
         <?php echo the_author_posts_link(); ?>
        </span>
         <span class="meta-sep">|</span> 
         <?php echo get_the_date(); ?> 
         </div>
		 <div class="adt-comment">
		<span><a class="link-comments" href="<?php  comments_link(); ?>"><?php comments_number(__('0 Comment','themonic'),__('1 Comment'),__('% Comments')); ?></a></span> 
         </div>       
     </div><!-- below title meta end -->
	<div class="clear"></div>		
			<?php endif; // display meta-date on single page() ?>
			</header><!-- .entry-header -->
	<?php if ( is_single() ):?>	
		<?php if($options['below_title_check'] == '1') { // display below title #AD1()?>
			<div class="themonic-ad1"><?php echo $options['below_title_hook']; ?></div>
		<?php } ?>
	<?php endif; ?>
	

	
	<?php if ( is_home() || is_search() || is_category() || is_tag() || is_author() ) : // Display Excerpts for Search, home, category and tag pages ?>
		
		<div class="entry-summary">
				<!-- Ico nic One home page thumbnail with custom excerpt -->
		<div class="excerpt-thumb">
			<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themonic' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					<?php the_post_thumbnail('excerpt-thumbnail', 'class=alignleft'); ?>
				</a>
			<?php endif;?>
		</div>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
				<?php if($options['io_pro_featured_single_post'] == '1') { ?>
					<?php the_post_thumbnail('post-thumbnail'); ?>
				<?php } ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'themonic' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'themonic' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	<?php endif; ?>

			
			<?php if($options['themonic_social_share'] == '1') { // display social sharing buttons() ?>
	<div class="themonic-social-share">
			
          <ul>
			<?php if($options['themonic_facebook'] == '1') { // display facebook () ?>
				<li><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>%2F&amp;send=false&amp;layout=button_count&amp;width=107&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:107px; height:21px;" allowTransparency="true"></iframe></li>
            <?php } ?>
			<?php if($options['themonic_gplus'] == '1') { // display Gplus () ?>
					<li> <script type="text/javascript">
						(function() {
						var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
						po.src = 'https://apis.google.com/js/plusone.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
						})();
						</script>
						<div class="g-plusone" data-size="medium"></div>
					</li>
			<?php } ?>		
             <?php if($options['themonic_twitter'] == '1') { // display twitter () ?>
					<li>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						<a data-lang="en" data-via="" data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" class="twitter-share-button" href="https://twitter.com/share">tweet</a>
					</li>
			<?php } ?>	
			<?php if($options['themonic_pin'] == '1') { // display pinterest () ?>		
						<li>
							<a data-pin-config="none" data-pin-do="buttonBookmark" href="//pinterest.com/pin/create/button/"><img src="//assets.pinterest.com/images/PinExt.png" /></a>
							<script src="//assets.pinterest.com/js/pinit.js"></script>
						</li>
			<?php } ?>
          </ul>
          <div class="clear"></div>
	</div>
			<?php } ?>
		<footer class="entry-meta">
		<div class="categories"><?php the_category(' '); ?></div> <div class="tags"><?php the_tags('',' '); ?></div> 
		<?php edit_post_link( __( 'Edit', 'themonic' ), '<span class="edit-link">', '</span>' ); ?>
		
	<?php if ( is_home() ):?>
			
		<?php if($options['themonic_home_author'] == '1') { // display author ID ?>	
			<div class ="io-home-author-small" >
					<div class="io-home-avatar"><!-- .author-avatar -->
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themonic_author_bio_avatar_size', 24 ) ); ?>
					<div class="io-home-author-name"><?php printf( __( '%s', 'themonic' ), get_the_author() ); ?> </div>
				<div style="display: block; clear: both;"></div>	</div>
				<!-- .author-name-home -->	
			</div>
		<?php } ?>		
		
	<?php endif; ?>		
			
			
		<div class="clear"></div>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themonic_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<?php printf( __( 'Author: %s', 'themonic' ), get_the_author() ); ?> 
		

		<?php if ( get_the_author_meta( 'googleplus' ) ) { ?>
				<a style="text-decoration:none; color:#BB3726;" href="<?php the_author_meta( 'googleplus' ); ?>?rel=author"><i class="icon-google-plus icon-large"></i></a>
			<?php } // End check for G+ ?>
			
			<?php if ( get_the_author_meta( 'twitter' ) ) { ?>
				<a style="text-decoration:none; color:#33CCFF;" href="<?php the_author_meta( 'twitter' ); ?>"><i class="icon-twitter icon-large"></i></a>
			<?php } // End check for Twitter ?>
			
			<?php if ( get_the_author_meta( 'facebook' ) ) { ?>
			<a style="text-decoration:none; color:#3B5998;" href="<?php the_author_meta( 'facebook' ); ?>"><i class="icon-facebook icon-large"></i></a>
			<?php } // End check for Facebook ?>
				<p><?php the_author_meta( 'description' ); ?></p>
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
	<?php if ( is_single() ):?>	
		<?php if($options['below_article_check'] == '1') { // display article title #AD4()?>
			<div class="themonic-ad4"><?php echo $options['below_article_hook']; ?></div>
		<?php } ?>
	<?php endif; ?>