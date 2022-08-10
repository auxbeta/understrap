<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="col-lg-6 col-sm-12 padded">

	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<div class="portfoliobg padded">

			<header class="entry-header centered">
		
				<?php
				the_title(
					sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>'
				);
				?>
				<div class="portfolio-date">
					
					<?php $date = get_post_meta($post->ID, '_custom_date_meta_key', true); if($date != ''){echo date("F j, Y", strtotime($date));} ?>
					
				</div>
	
				<?php if ( 'portfolio' === get_post_type() ) : ?>
	
					<div class="entry-meta">
						<?php  ?>
	<!-- 					<?php understrap_posted_on(); ?> -->
					</div><!-- .entry-meta -->
		
				<?php endif; ?>
		
			</header><!-- .entry-header -->
		
			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
		
			<div class="entry-content">
		
				<?php
				the_excerpt();
				understrap_link_pages();
				?>
		
			</div><!-- .entry-content -->
		
			<footer class="entry-footer">
			
			</footer><!-- .entry-footer -->

		</div>

	</article><!-- #post-## -->

</div>