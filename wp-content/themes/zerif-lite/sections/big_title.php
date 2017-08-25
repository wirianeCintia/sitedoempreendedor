<?php

	$zerif_parallax_img1 = get_theme_mod('zerif_parallax_img1',get_template_directory_uri() . '/images/background1.jpg');
	$zerif_parallax_img2 = get_theme_mod('zerif_parallax_img2',get_template_directory_uri() . '/images/background2.png');
	$zerif_parallax_use = get_theme_mod('zerif_parallax_show');

	if ( $zerif_parallax_use == 1 && (!empty($zerif_parallax_img1) || !empty($zerif_parallax_img2)) ) {
		echo '<ul id="parallax_move">';
				if( !empty($zerif_parallax_img1) ) { 
				echo '<li class="layer layer1" data-depth="0.10" style="background-image: url(' . $zerif_parallax_img1 . ');"></li>';
			}
			if( !empty($zerif_parallax_img2) ) { 
				echo '<li class="layer layer2" data-depth="0.20" style="background-image: url(' . $zerif_parallax_img2 . ');"></li>';
			}

		echo '</ul>';
		}

	echo '<div class="header-content-wrap">';

		echo '<div class="container">';

		$zerif_bigtitle_title = get_theme_mod('zerif_bigtitle_title',__('SITE DO EMPREENDEDOR'));

		if( !empty($zerif_bigtitle_title) ):

			echo '<h1 class="intro-text">'.$zerif_bigtitle_title.'</h1>';

		endif;


	echo '<h3 style="color:white;">BEM VINDO! Quer ser um vencedor? Leia nosso conteúdo</h3>';
echo '<h3 style="color:white;">e inspire-se para identificar o caminho que o ajudará a ser vitorioso.</h3>';       

		

		$zerif_bigtitle_redbutton_label = get_theme_mod('zerif_bigtitle_redbutton_label',__('QUEM SOMOS','zerif-lite'));

		$zerif_bigtitle_redbutton_url = get_theme_mod('zerif_bigtitle_redbutton_url', esc_url( home_url( '/' ) ).'#focus');

		$zerif_bigtitle_greenbutton_label = get_theme_mod('zerif_bigtitle_greenbutton_label',__("PROPÓSITO",'zerif-lite'));

		$zerif_bigtitle_greenbutton_url = get_theme_mod('zerif_bigtitle_greenbutton_url',esc_url( home_url( '/' ) ).'#focus');

$zerif_bigtitle_botaoneutro_label = get_theme_mod('zerif_bigtitle_botaoneutro_label',__("COLUNISTAS",'zerif-lite'));

		$zerif_bigtitle_botaoneutro_url = get_theme_mod('zerif_bigtitle_botaoneutro_url',esc_url( home_url( '/' ) ).'#focus');



		if( (!empty($zerif_bigtitle_redbutton_label) && !empty($zerif_bigtitle_redbutton_url)) || (!empty($zerif_bigtitle_greenbutton_label) && !empty($zerif_bigtitle_greenbutton_url))):

			echo '<div class="buttons">';

				if ( !empty($zerif_bigtitle_redbutton_label) && !empty($zerif_bigtitle_redbutton_url) ):

					echo '<a href="/sitedoempreendedor-nexti/quem-somos-2/ "'.$zerif_bigtitle_redbutton_url.'" class="btn btn-primary custom-button red-btn">'.$zerif_bigtitle_redbutton_label.'</a>';

				endif;

				if ( !empty($zerif_bigtitle_greenbutton_label) && !empty($zerif_bigtitle_greenbutton_url) ):

					echo '<a href="/sitedoempreendedor-nexti/proposito/"'.$zerif_bigtitle_greenbutton_url.'" class="btn btn-primary custom-button green-btn">'.$zerif_bigtitle_greenbutton_label.'</a>';

				endif;

				if ( !empty($zerif_bigtitle_botaoneutro_label) && !empty($zerif_bigtitle_redbutton_url) ):

					echo '<a href="/sitedoempreendedor-nexti/colunistas/"'.$zerif_bigtitle_botaoneutro_url.'" class="btn btn-primary custom-button red-btn">'.$zerif_bigtitle_botaoneutro_label.'</a>';

				endif;

			echo '</div>';

		endif;

		echo '</div>';

	echo '</div><!-- .header-content-wrap -->';
		echo '<div class="clear"></div>';

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

</div>
