<?php
/**
 * The template for the Portfolio Custom Post Type
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<div class="row">

					<?php
					if ( have_posts() ) {
						?>
						<header class="page-header">
							<?php
							get_the_post_thumbnail( $post_id ); 
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							?>
						</header><!-- .page-header -->
						<?php
						// Start the loop.
						while ( have_posts() ) {
							the_post();
	
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							 get_template_part( 'loop-templates/content', 'portfolio-arch' );
						}
					} 
					?>
					
				</div><!-- .row -->
				
			</main><!-- #main -->
			<?php
			// Display the pagination component.
			understrap_pagination();
			?>


	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
