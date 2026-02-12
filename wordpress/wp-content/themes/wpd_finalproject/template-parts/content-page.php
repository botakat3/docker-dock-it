<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WPD_FinalProject
 */

?>

    <div class="col">
        <div class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <article >
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->
                <?php wpd_finalproject_post_thumbnail(); ?>
                <a href="<?= the_permalink()?>">Read More</a>
                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpd_finalproject' ),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->

        </div>
    </div>



	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'wpd_finalproject' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->		<?php wpd_finalproject_entry_footer(); ?>

    <?php endif; ?>
