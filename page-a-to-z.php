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
<div id="main" class="clearfix">

    <div id="page-background"></div>

    <div class="wrapper clearfix">
    	<div id="page-background-inner"></div>

        <?php get_sidebar( 'left' ); ?>

        <article<?php echo $class; ?>>
            <?php
                    the_title('<h1>', '</h1>');
                    the_content();
                endwhile;
            endif;
            ?>
	<div class="groups-a-to-z">
	<?php
		$args = array( 'post_type' => 'student-group', 'posts_per_page' => 500, 'orderby'=> 'title', 'order' => 'ASC' );
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
			echo '<ul class="student-groups">';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
			echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
			}
			echo '</ul>';
		} else {
		}
		wp_reset_postdata();
	?>
	</div>
	</article>

        <?php get_sidebar( 'right' ); ?>

    </div>

</div>


<?php get_footer(); ?>