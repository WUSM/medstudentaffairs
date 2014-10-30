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
<div id="main" class="student-group clearfix">

    <div id="page-background"></div>

    <div class="wrapper clearfix">
        <div id="page-background-inner"></div>

        <nav id="left-col-student-group">
            <ul id="left-nav">
                <li class="top_level_page"><a href="/student-groups">Student Groups</a></li>
            
                <?php
                    $walker = new Razorback_Walker_Page_Selective_Children();

                    $children = wp_list_pages( array (
                        'sort_column'  => 'menu_order',
                        'title_li'     => '',
                        'child_of'     => 397,
                        'walker'       => $walker,
                        'echo'         => 0
                    ));
                    echo $children;
                ?>

            </ul>
        </nav>

        

        <article<?php echo $class; ?>>
            <?php
                the_title('<h1>', '</h1>');
    if( get_field('photo') ) : ?>
        <img class="group-photo" src="<?php the_field('photo'); ?>">
      <?php endif;
                the_content();
            ?>
    
            <?php if( get_field('contact') )
      {
        ?><h2>Contact</h2>
            <div class="group-contact"><?php
        while( has_sub_field('contact') )
        { 
          $name = get_sub_field('name');
          $email = get_sub_field('email');
          echo '<p>' . $name. ':';
          echo ' <a href="mailto:' . $email . '">' . $email . '</a></p>';
        }
        ?></div><?php
      }
            endwhile;
        endif;
        ?>
            <?php if( get_field('website') ) : ?>
            <h2>Website</h2>
              <p><a target="_blank" href="http://<?php the_field('website'); ?>"><?php the_field('website'); ?></a></p>
              <?php endif; ?> 
    </article>

        <?php get_sidebar( 'right' ); ?>

    </div>

</div>


<?php get_footer(); ?>