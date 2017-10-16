<?php

zerif_before_testimonials_trigger();



echo '<section class="testimonial" id="testimonials">';

    echo '<h4 class="centralizar"><b>Parceiros<b></h4>'; 

	echo '<div class="container">';

		echo '<div class="row" data-scrollreveal="enter right after 0s over 1s">';

			echo '<div class="col-md-12">';

				$pinterest_style = '';
				$zerif_testimonials_pinterest_style = get_theme_mod('zerif_testimonials_pinterest_style');
				if( isset($zerif_testimonials_pinterest_style) && $zerif_testimonials_pinterest_style != 0 ) {
					$pinterest_style = 'testimonial-masonry';
				}echo '<h4 style="color:#0f47c1;">Empretec</h4>'; 

		echo '</div>';

	echo '</div>';

	zerif_bottom_testimonials_trigger();

echo '</section>';

zerif_after_testimonials_trigger();

?>