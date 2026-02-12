<?php

get_header();?>

<main id="primary" class="site-main container">

<?php
$args = array('post_type' => 'book', 'post_per_page' => -1 );
$query = new WP_query($args);


if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

    get_template_part( 'template-parts/content', 'page' );

endwhile;
endif;
?>
</main>
