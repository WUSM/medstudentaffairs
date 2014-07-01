<?php
/*
  Template Name: Home
*/

get_header(); ?>

    <div id="main" class="student-affairs clearfix">

        <nav id="left-col">
            <?php get_sidebar( 'left' ); ?>
        </nav>

	<div id="billboard">
		<ul class="bxslider">
			<?php
				$args = array( 'post_type' => 'header', 'orderby' => 'rand' );
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post(); ?>
						<li>
							<img src="<?php the_field('image'); ?>">
							<p><?php the_title(); ?></p>
						</li>
				<?php }
				} else {
				}
				wp_reset_postdata();
			?>
		</ul>
		<div class="tag"><h1>Supporting medical student<br>well being &amp; development</h1></div>
	</div>

	<div id="home-services" class="clearfix">
		<div class="service-bg clearfix">
		<div class="service-areas clearfix">
		<div class="service-area">
			<div class="service-img-bg"><a href="/services/academic-support/"><p class="explore"><span class="explore-plus">+</span><br>Explore</p><img src="wp-content/themes/medstudentaffairs/_/img/academic.jpg"></a></div>
			<h2>Academic Support</h2>
			<ul>
				<a href="/services/academic-support/learning-support/#tutoring"><li>Tutoring</li></a>
				<a href="/services/academic-support/usmle-preparation/"><li>USMLE Prep</li></a>
				<a href="/services/academic-support/advising/"><li>Career Advising</li></a>
				<a href="/services/academic-support/learning-support/#exam-preparation"><li>Exam Prep</li></a>
				<a href="/services/academic-support/mentoring/"><li>Mentoring/Shadowing</li></a>
				<a href="/services/academic-support/summer-research/"><li>Summer Research</li></a>
				<a href="/services/academic-support/"><p>See All &raquo;</p></a>
			</ul>
		</div><div class="service-area">
			<div class="service-img-bg"><a href="/services/wellness-support/"><p class="explore"><span class="explore-plus">+</span><br>Explore</p><img src="wp-content/themes/medstudentaffairs/_/img/wellness.jpg"></a></div>
			<h2>Wellness Support</h2>
			<ul>
				<a href="/services/wellness-support/#physical-health"><li>Physical Health</li></a>
				<a href="/services/wellness-support/#mental-health"><li>Mental Health</li></a>
				<a href="/services/wellness-support/#spiritual-support"><li>Spiritual Support</li></a>
				<a href="/services/wellness-support/#mental-health"><li>Stress Management</li></a>
				<a href="/services/wellness-support/"><p>See All &raquo;</p></a>
			</ul>
		</div><div class="service-area">
			<div class="service-img-bg"><a href="/services/student-life/"><p class="explore"><span class="explore-plus">+</span><br>Explore</p><img src="wp-content/themes/medstudentaffairs/_/img/student.jpg"></a></div>
			<h2>Student Life</h2>
			<ul>
				<a href="/student-groups/"><li>Student Groups</li></a>
				<a href="/services/student-life/#service-opportunities"><li>Service Opportunities</li></a>
				<a href="/events"><li>Events</li></a>
				<a href="/resources/#safety-security"><li>Safety and Security</li></a>
				<a href="/resources/#transportation"><li>Transportation</li></a>
				<a href="/services/student-life/"><p>See All &raquo;</p></a>
			</ul>
		</div>
		</div>
		</div>
	</div>

        <div id="home-events" class="clearfix">

            <div class="wrapper">
			<div class="events-left">
			<div id="featured-event">
				<div class="featured">Featured Event</div>
			<?php
				$args = array( 'post_type' => 'featured-event', 'posts_per_page' => 1 );
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post(); ?>
						<h1><?php the_title(); ?></h1>
						<p><strong><?php the_field('date'); ?></strong></p>
						<p><?php the_field('about'); ?> <a href="<?php the_field('link'); ?>">Learn More &raquo;</a></p>
					<?php }
				} else { ?><p>No featured event to display at this time.</p>
				<?php }
				wp_reset_postdata();
				?>
				</div>

			
				<?php
				$args = array( 'post_type' => 'announcement', 'posts_per_page' => 1 );
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post(); ?>
						<div id="announcement">
						<?php the_title(); ?> <a href="<?php the_field('link'); ?>">Learn More &raquo;</a>
						</div>
					<?php }
				} else {
				}
				wp_reset_postdata();
				?>
			
			</div>
            <div id="home-calendar">
                <h2 class="calendar">Calendar</h2>

                <?php
                $events = eo_get_events(array(
                    'numberposts'=>3,
                    'event_end_after'=>'today'
                ));
                if ($events) {
                    echo '<ul>';
                    foreach ($events as $event) {
                        printf('<li class="calendar clearfix"><div class="calendar-date"><div class="calendar-month">%s</div><div class="calendar-day">%s</div></div><div class="calendar-title">%s</div></li>',
                            eo_get_the_start('M', $event->ID, null, $event->occurrence_id),
                            eo_get_the_start('j', $event->ID, null, $event->occurrence_id),
                            get_the_title($event->ID)
                        );
                    };
                    echo '</ul>';
                } else { ?>
			<div class="no-calendar-events"><a href="/calendar"><div class="calendar-icon"><img src="wp-content/themes/medstudentaffairs/_/img/calendar.png"></div></a>
			<p>Check back soon for upcoming events such as student group activities, workout sessions, parties, journal clubs, workshops, meetings, commencement, orientation, lunches and cultural events.</p></div>
		<?php } ?>

                <div id="full-calendar"><a href="/calendar/">View Full Calendar &raquo;</a></div>

            </div>

            </div>

        </div>

        <div id="featured-groups">
		<div class="top-featured">
        		<p class="top-groups-featured">Featured Student Groups</p>
			<p class="top-groups-tag">Student-conceived, student-run, school supported</p>
		</div>
        	<ul class="bxslider">
        		<?php
				$posts = get_posts(array(
					'post_type' => 'student-group',
					'meta_query' => array(
						array(
							'key' => 'homepage',
							'value' => '1',
							'compare' => '=='
						)
					),
					'orderby' => 'rand',
					'posts_per_page' => 50
				));
				 
				if( $posts )
				{ ?>
				<?php
					foreach( $posts as $post )
					{ ?>
						<li>
						<?php setup_postdata( $post ); ?>
						
						<div class="groups-image"><img src="<?php the_field('image'); ?>"></div>

						<div class="groups-info">
							<p class="groups-featured">Featured Student Groups</p>
							<p class="groups-tag">Student-conceived, student-run, school supported</p>
							<h1 class="groups-title"><a href="<?php the_permalink(); ?>"><?php the_field('group_name'); ?></a></h1>
							<p class="groups-desc"><?php the_field('excerpt'); ?> <a style="text-transform:uppercase;" href="<?php the_permalink(); ?>">Learn More &raquo;</a></p>
							<p class="groups-all"><a href="student-groups">See All Student Groups &raquo;</a></p>
						</div>
						</li>
						<?php
					}
				 
					wp_reset_postdata();
				}
				 
				?>
				</ul>
				<p class="bottom-groups-all"><a href="student-groups">See All Student Groups &raquo;</a></p>
        </div>

        <div id="halves" class="clearfix">
        	<div id="featured-student">
        		<h1>Congratulations to</h1>
        		<ul class="bxslider students">
        		<?php
				$args = array( 'post_type' => 'featured-student', 'orderby' => 'rand' );
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post(); ?>
						<li>
						<div class="student-photo">
						<?php $attachment_id = get_field('photo');
						$size = "thumbnail";
						$image = wp_get_attachment_image_src( $attachment_id, $size ); ?>
						<img class="student-img" src="<?php echo $image[0]; ?>">
						</div>
						<h2><span class="student-name"><?php the_title(); ?></span> <span class="year"><?php the_field('year'); ?></span></h2>
						<p><?php the_field('about'); ?></p>
						<p class="permalink"><?php the_permalink(); ?></p>

						
						</li>
					<?php }
				} else {
				}
				wp_reset_postdata();
				?>
			</ul>
			<div class="student-share clearfix">
				<p>Share</p>
				<div class="student-share-link">
				</div>
				<div class="nominate">
					<a href="mailto:wiegerta@wustl.edu"><img src="wp-content/themes/medstudentaffairs/_/img/nominate.png"></a>
				</div>
			</div>
			<a class="featured-archive" href="/student"><div>Archive</div></a>
        	</div>
        	<div id="disorientation-guide">
        		<h1>The Dis-Orientation Guide</h1>
        		<p>A student-published guide to the School,<br> St. Louis and life in medical school</p>
        		<div class="guide-inner">
        		<div class="guide-sections">
        			<h2>Sections</h2>
        			<ul>
        				<a href="http://medadmissions.wustl.edu/StudentLife/ourstudentsguidetowusm/Pages/Perspectives.aspx" target="_blank"><li>Perspectives</li></a>
        				<a href="http://medadmissions.wustl.edu/StudentLife/ourstudentsguidetowusm/Pages/MedicalSchoolExperience.aspx" target="_blank"><li>Medical School Experience</li></a>
        				<a href="http://medadmissions.wustl.edu/StudentLife/ourstudentsguidetowusm/Pages/Life.aspx" target="_blank"><li>Life</li></a>
        				<a href="http://medadmissions.wustl.edu/StudentLife/ourstudentsguidetowusm/Pages/Housing.aspx" target="_blank"><li>Housing</li></a>
        				<a href="http://medadmissions.wustl.edu/StudentLife/ourstudentsguidetowusm/Pages/Food.aspx" target="_blank"><li>Food</li></a>
        				<a href="http://medadmissions.wustl.edu/StudentLife/ourstudentsguidetowusm/Pages/Entertainment.aspx" target="_blank"><li>Entertainment</li></a>
        				<a href="http://medadmissions.wustl.edu/StudentLife/ourstudentsguidetowusm/Pages/TravelandOutdoors.aspx" target="_blank"><li>Travel &amp; Outdoors</li></a>
        				<a href="http://medadmissions.wustl.edu/StudentLife/ourstudentsguidetowusm/Pages/Advice.aspx" target="_blank"><li>Advice</li></a>
        				<a href="http://medadmissions.wustl.edu/StudentLife/ourstudentsguidetowusm/Pages/HelpfulPhoneNumbers.aspx" target="_blank"><li>Helpful Phone Numbers</li></a>
        			</ul>
        		</div>
        		<div class="guide-preview">
        			<a href="/wp-content/uploads/2014/06/DIS-O.pdf" target="_blank"><img src="wp-content/themes/medstudentaffairs/_/img/dis-orientation.jpg"></a>
        			<a href="/wp-content/uploads/2014/06/DIS-O.pdf" target="_blank">Download PDF &raquo;</a>
        			<a href="http://medadmissions.wustl.edu/StudentLife/ourstudentsguidetowusm/Pages/OurStudentsGuidetoWUSM.aspx" target="_blank">Read online &raquo;</a>
        		</div>
        		</div>
        	</div>
        </div>
	
	<div id="meet-dean" class="cleafix">
		<div class="meet clearfix">
			<h2>Meet Dean Moscoso</h2>
			<div class="meet-photo">
				<img src="http://medstudentaffairs-test.wustl.edu/wp-content/themes/medstudentaffairs/_/img/moscoso.jpg">
				<p><strong>Lisa Moscoso, MD, PhD</strong></p>
				<p>Assistant Dean for Student Affairs</p>
			</div>
			<div class="meet-text">
				<p>The Office of Student Affairs is dedicated to making sure you have what you need to be happy, healthy and successful. My staff and I are always available to answer questions or point you to the resources you need.</p>
				<a href="mailto:wiegerta@wustl.edu">Contact Us &raquo;</a>
			</div>
		</div>
	</div>

    </div>

<script>
jQuery(document).ready(function(){
  jQuery('.bxslider').bxSlider({
  	adaptiveHeight: false,
  	speed: 800,
  	onSlideBefore: function(currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
  		jQuery('.active-student').removeClass('active-student');
		jQuery('ul.students>li').eq(currentSlideHtmlObject + 1).addClass('active-student');
		var name = jQuery('.active-student .student-name').text();
		var url = jQuery('.active-student .permalink').text();
		var image = jQuery('.active-student img.student-img').attr("src");
  		jQuery('.student-share-link').html('<a href=\"#\" onclick=\"window.open(\'https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=Congratulations to ' + name + ', featured by Washington University School of Medicine\',\'facebook\', \'width=626,height=436\'); return false;\"><img src=\"wp-content/themes/medstudentaffairs/_/img/fb.png\"></a><a href=\"#\" onclick=\"window.open(\'https://twitter.com/share?text=' + name + '%20featured%20by%20Washington%20University%20School%20of%20Medicine&url=' + url + '\',\'twitter\', \'width=550,height=450\'); return false;\"><img src=\"wp-content/themes/medstudentaffairs/_/img/tw.png\"></a><a href=\"#\" onclick=\"window.open(\'http://pinterest.com/pin/create/button/?url=' + url + '&media=' + image + '&description=' + name + ' featured by Washington University School of Medicine\',\'pinterest\', \'width=752,height=320\'); return false;\"><img src=\"wp-content/themes/medstudentaffairs/_/img/pn.png\"></a>');
  	},
  	onSliderLoad: function(currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
  		jQuery('.active-student').removeClass('active-student');
  		jQuery('ul.students>li').eq(1).addClass('active-student');
  		var name = jQuery('.active-student .student-name').text();
		var url = jQuery('.active-student .permalink').text();
		var image = jQuery('.active-student img.student-img').attr("src");
  		jQuery('.student-share-link').html('<a href=\"#\" onclick=\"window.open(\'https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=Congratulations to ' + name + ', featured by Washington University School of Medicine\',\'facebook\', \'width=626,height=436\'); return false;\"><img src=\"wp-content/themes/medstudentaffairs/_/img/fb.png\"></a><a href=\"#\" onclick=\"window.open(\'https://twitter.com/share?text=' + name + '%20featured%20by%20Washington%20University%20School%20of%20Medicine&url=' + url + '\',\'twitter\', \'width=550,height=450\'); return false;\"><img src=\"wp-content/themes/medstudentaffairs/_/img/tw.png\"></a><a href=\"#\" onclick=\"window.open(\'http://pinterest.com/pin/create/button/?url=' + url + '&media=' + image + '&description=' + name + ' featured by Washington University School of Medicine\',\'pinterest\', \'width=752,height=320\'); return false;\"><img src=\"wp-content/themes/medstudentaffairs/_/img/pn.png\"></a>');
  	}
  });
});
</script>

<?php get_footer(); ?>