<?php get_header(); ?>

<div id="main" class="clearfix">

    <div id="page-background"></div>

    <div class="wrapper clearfix">
        <div id="page-background-inner"></div>

        <?php get_sidebar( 'left' ); ?>

        <article>

            <h1>Featured Students</h1>

            <?php
                $args = array( 'post_type' => 'featured-student' );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) {
                    echo '<ul class="featured-students">';
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                    <li>
                        <p class="date"><?php the_time('F j, Y'); ?></p>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php $attachment_id = get_field('photo');
                        $size = "thumbnail";
                        $image = wp_get_attachment_image_src( $attachment_id, $size ); ?>
                        <img src="<?php echo $image[0]; ?>">
                        <p><?php the_field('year'); ?></p>
                        <p><?php the_field('about'); ?></p>
                    </li>
                    <?php }
                    echo '</ul>';
                } else {
                }
                wp_reset_postdata();
            ?>

        </article>

    </div>

</div>


<?php get_footer(); ?>