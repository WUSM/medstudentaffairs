<?php

get_header();

if (have_posts()) :
    while (have_posts()) :
        the_post();
        $class = 'clearfix calendar';
        if (get_the_post_thumbnail() != '') {
            $class .= ' notch';
            echo '<div id="featured-image">';
            the_post_thumbnail();
            echo '</div>';
        }
        ?>

<div id="main" class="<?php echo $class; ?>">

    <div class="wrapper">

        <nav id="left-col">
            <?php get_sidebar(); ?>
        </nav>

        <div id="content" class="clearfix">

            <article>

                <?php
                        the_title('<h1>', '</h1>');
                        the_content();
                    endwhile;
                endif;
                ?>

            </article>

        </div>

    </div>

</div>

<?php get_footer(); ?>