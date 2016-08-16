<?php
/**
 * @since XXXXX
 */
?>

<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );

$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>

    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class($column); ?>>

		<header class="entry-header">
			<h4 class="entry-title"><?php the_title(); ?></h4>
		</header><!-- .entry-header -->

			<?php
			global $more;
			$more = 0;
			?>

            <div class="front-page entry-content" id="<?php echo $page->post_name; ?>">
            <?php the_content('<p style="text-align:right">> read more</p>'); ?></p>
            </div>

        </article>

    <?php endwhile; ?>

<?php endif; wp_reset_query(); ?>
