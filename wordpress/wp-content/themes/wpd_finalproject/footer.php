<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPD_Homework
 */

?>

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <?php dynamic_sidebar('footer-1')?>
            </div>
            <div class="col-4 middle">
                <?php dynamic_sidebar('footer-2')?>
            </div>
            <div class="col-4">
                <?php dynamic_sidebar('footer-3')?>
            </div>
        </div>
    </div>
    <!--		<div class="site-info">-->
    <!--			<a href="--><?php //echo esc_url( __( 'https://wordpress.org/', 'kb_homework' ) ); ?><!--">-->
    <!--				--><?php
    //				/* translators: %s: CMS name, i.e. WordPress. */
    //				printf( esc_html__( 'Proudly powered by %s', 'kb_homework' ), 'WordPress' );
    //				?>
    <!--			</a>-->
    <!--			<span class="sep"> | </span>-->
    <!--				--><?php
    //				/* translators: 1: Theme name, 2: Theme author. */
    //				printf( esc_html__( 'Theme: %1$s by %2$s.', 'kb_homework' ), 'kb_homework', '<a href="http://underscores.me/">Katherine Botabara</a>' );
    //				?>
    <!--		</div>< .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
