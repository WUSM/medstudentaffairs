<?php

    get_header();

    if (have_posts()) :
        while (have_posts()) :
            the_post();
            $class = '';
            if (get_the_post_thumbnail() != '') {
                $class = ' class="notch"';
                echo '<div id="featured-image">';
                the_post_thumbnail();
                echo '</div>';
            }
?>
<div id="main" class="featured-student-single clearfix">

    <div id="page-background"></div>

    <div class="wrapper">

        <?php get_sidebar( 'left' ); ?>

        <article<?php echo $class; ?>>
            <h1>Featured Student</h1>
            <?php
                    the_title('<h2>', '</h2>');
                    $attachment_id = get_field('photo');
                    $size = "thumbnail";
                    $image = wp_get_attachment_image_src( $attachment_id, $size ); ?>
                    <img src="<?php echo $image[0]; ?>">
                    <p><?php the_field('year'); ?></p>
                    <p><?php the_field('about'); ?></p>
                <?php endwhile;
            endif;
            ?>

        </article>

        <?php get_sidebar( 'right' ); ?>

    </div>

</div>


<?php get_footer(); ?>