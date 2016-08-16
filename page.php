<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */

get_header(); ?>

	<div id="content" class="site-content">

		<div class="page-header">
			<div class="container">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</div>

		<?php echo onepress_breadcrumb(); ?>

		<div id="content-inside" class="container right-sidebar">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // End of the loop. ?>
<!--Child Page Thumbnails Start-->
<?
$child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order", 'OBJECT');

if ( $child_pages ) :
    foreach ( $child_pages as $pageChild ) :
        setup_postdata( $pageChild );
        $thumbnail = get_the_post_thumbnail($pageChild->ID, 'thumbnail');
        if($thumbnail == "") continue; // Skip pages without a thumbnail
?>
        <div class="child-thumb">
          <a href="<?= get_permalink($pageChild->ID) ?>" rel="bookmark" title="<?= $pageChild->post_title ?>">
            <?= $pageChild->post_title ?><br /><?= $thumbnail ?>
          </a>
        </div>
<?
    endforeach;
endif;
?>
<div style="clear:left;"></div>
<!--Child Page Thumbnails End-->
				</main><!-- #main -->
				
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>

