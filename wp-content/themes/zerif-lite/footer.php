<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 */
?>

</div><!-- .site-content -->

<?php zerif_before_footer_trigger(); ?>

<footer id="footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

	<?php zerif_footer_widgets_trigger(); ?>

	<div class="container">

		<?php zerif_top_footer_trigger(); ?>

		<?php
			$footer_sections = 0;
			if ( current_user_can( 'edit_theme_options' ) ) {
				$zerif_address = get_theme_mod( 'zerif_address',sprintf( '<a href="%1$s">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_address' ) ), __( 'Company address','zerif-lite' ) ) );
				$zerif_address_icon = get_theme_mod( 'zerif_address_icon', get_template_directory_uri().'/images/map25-redish.png' );
			} else {
				$zerif_address = get_theme_mod( 'zerif_address' );
				$zerif_address_icon = get_theme_mod( 'zerif_address_icon' );
			}
			if ( current_user_can( 'edit_theme_options' ) ) {
				$zerif_email = get_theme_mod( 'zerif_email',sprintf( '<a href="%1$s">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_email' ) ), __( 'youremail@site.com','zerif-lite' ) ) );
				$zerif_email_icon = get_theme_mod( 'zerif_email_icon', get_template_directory_uri().'/images/envelope4-green.png' );
			} else {
				$zerif_email = get_theme_mod( 'zerif_email' );
				$zerif_email_icon = get_theme_mod( 'zerif_email_icon' );
			}
			if ( current_user_can( 'edit_theme_options' ) ) {
				$zerif_phone = get_theme_mod( 'zerif_phone',sprintf( '<a href="%1$s">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_phone' ) ), __( '0 332 548 954','zerif-lite' ) ) );
				$zerif_phone_icon = get_theme_mod( 'zerif_phone_icon', get_template_directory_uri().'/images/telephone65-blue.png' );
			} else {
				$zerif_phone = get_theme_mod( 'zerif_phone' );
				$zerif_phone_icon = get_theme_mod( 'zerif_phone_icon' );
			}

			$zerif_socials_facebook = get_theme_mod( 'zerif_socials_facebook' );
			$zerif_socials_twitter = get_theme_mod( 'zerif_socials_twitter' );
			$zerif_socials_linkedin = get_theme_mod( 'zerif_socials_linkedin' );
			$zerif_socials_behance = get_theme_mod( 'zerif_socials_behance' );
			$zerif_socials_dribbble = get_theme_mod( 'zerif_socials_dribbble' );
			$zerif_socials_instagram = get_theme_mod( 'zerif_socials_instagram' );
			$zerif_accessibility = get_theme_mod('zerif_accessibility');
			$zerif_copyright = get_theme_mod('zerif_copyright');
			$zerif_powered_by = true;
			if( ! empty( $zerif_address ) || ! empty( $zerif_address_icon ) ) {
				$footer_sections ++;
			}
			if( ! empty( $zerif_email ) || ! empty( $zerif_email_icon ) ) {
				$footer_sections ++;
			}
			if( ! empty( $zerif_phone ) || ! empty( $zerif_phone_icon ) ) {
				$footer_sections ++;
			}
			if( ! empty( $zerif_socials_facebook ) || ! empty( $zerif_socials_twitter ) || ! empty( $zerif_socials_linkedin ) || ! empty( $zerif_socials_behance ) || ! empty( $zerif_socials_dribbble ) ||
			! empty( $zerif_copyright ) || ! empty( $zerif_powered_by ) || ! empty( $zerif_socials_instagram ) ) {
				$footer_sections ++;
			}
			if( $footer_sections == 1 ) {
				$footer_class = 'col-md-4';
			} elseif( $footer_sections == 2 ) {
				$footer_class = 'col-md-4';
			} elseif( $footer_sections == 3 ) {
				$footer_class = 'col-md-4';
			} elseif( $footer_sections == 4 ) {
				$footer_class = 'col-md-4';
			} else {
				$footer_class = 'col-md-4' ;
			}
			if( ! empty( $footer_class ) ) {

							//echo '</div>';						
				/* COMPANY ADDRESS */
				echo '<div class= "row">';
				if( ! empty( $zerif_address_icon ) || ! empty( $zerif_address ) ) {
					echo '<div class="'.$footer_class.' company-details">';

							if( ! empty( $zerif_address ) ) {
							echo '<div class="zerif-footer-address">';
								echo wp_kses_post( $zerif_address );
							echo '</div>';
						} else if( is_customize_preview() ) {
							echo '<div class="zerif-footer-address zerif_hidden_if_not_customizer"></div>';
						}

						if( ! empty( $zerif_address_icon ) ) {
							echo '<a href="/sitedoempreendedor-nexti/emprentec/">
'							;echo '<div class="icon-top red-text">';
								 echo '<img src="'.esc_url( $zerif_address_icon ).'" alt="" />';
								 echo '</a>';
							echo '</div>';
						}
					
					echo '</div>';
				}

                		echo '<div class="'.$footer_class.'company-details">';
                		
                		echo '<div class = "col-md-4 centerdados">';
                		//echo '<div class= "imgnew">';
				//echo '<div class = "col-md-4">';
                	
						echo '<h6 style="color:black;">CONTATO</h6>';
							//echo '</div>';
						echo '<h6 style="color:black;"> &#9993 contatos@sitedoempreendedor</h6>';
							//echo '</div>';
						echo '<h6 style="color:black;"> &#9990 +55 55 5555-5555</h6>';
						echo '</div>';		
					echo '</div>';

				if( ! empty( $zerif_email_icon) || ! empty( $zerif_email) ) {
					echo '<div class="'.$footer_class.' company-details">';
					    if( ! empty( $zerif_email) ) {
							echo '<div class="zerif-footer-email centralizaletra">';
								echo wp_kses_post( $zerif_email );
							echo '</div>';
						} else if( is_customize_preview() ) {
							echo '<div class="zerif-footer-email zerif_hidden_if_not_customizer"></div>';
						}

						if( ! empty( $zerif_email_icon) ) {
							echo '<div class="icon-top green-text imgtamanho imgcenter">';
								echo '<img src="'.esc_url($zerif_email_icon).'" alt="" />';
							echo '</div>';
						}
						
					echo '</div>';
				}
}

			// open link in a new tab when checkbox "accessibility" is not ticked
			$attribut_new_tab = (isset($zerif_accessibility) && ($zerif_accessibility != 1) ? ' target="_blank"' : '' );

				
		
		?>
		<?php zerif_bottom_footer_trigger(); ?>


	</div> <!-- / END CONTAINER -->


</footer> <!-- / END FOOOTER  -->

</div><!-- .mobile-bg-fix-wrap -->

<?php
/*
 *  Fix for sections with widgets not appearing anymore after the hide button is selected for each section
 * */
if ( is_customize_preview() ) {
	if ( is_active_sidebar( 'sidebar-ourfocus' ) ) {
		echo '<div class="zerif_hidden_if_not_customizer">';
			dynamic_sidebar( 'sidebar-ourfocus' );
		echo '</div>';
	}
	if ( is_active_sidebar( 'sidebar-aboutus' ) ) {
		echo '<div class="zerif_hidden_if_not_customizer">';
			dynamic_sidebar( 'sidebar-aboutus' );
		echo '</div>';
	}
	if ( is_active_sidebar( 'sidebar-ourteam' ) ) {
		echo '<div class="zerif_hidden_if_not_customizer">';
			dynamic_sidebar( 'sidebar-ourteam' );
		echo '</div>';
	}
	if ( is_active_sidebar( 'sidebar-testimonials' ) ) {
		echo '<div class="zerif_hidden_if_not_customizer">';
			dynamic_sidebar( 'sidebar-testimonials' );
		echo '</div>';
	}
}
?>

<?php wp_footer(); ?>

<?php zerif_bottom_body_trigger(); ?>

</body>

</html>








