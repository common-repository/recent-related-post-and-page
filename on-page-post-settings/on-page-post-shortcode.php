<?php
defined('ABSPATH') || die();
function weblizar_page_post_r_p_a_r_p( $Id ) {
	ob_start();
	if ( isset( $Id ) ) {
		$RPARP_CPT_Name = "rp_and_rp";
		$AllRPARP       = array( 'p'           => $Id,
			'post_type'   => $RPARP_CPT_Name,
			'orderby'     => 'ASC',
			'post_status' => 'publish'
		);
		$loop           = new WP_Query( $AllRPARP );
		while ( $loop->have_posts() ) : $loop->the_post();
			$ID             = get_the_ID();
			$RPARP_Settings = "R_P_A_R_P_Settings_" . $ID;
			$RPARP_M_sets   = unserialize( get_post_meta( $ID, $RPARP_Settings, true ) );
			foreach ( $RPARP_M_sets as $RPARP_Setting ) {
				$p_o_s_t             = $ID;
				$bottom_bdr_color    = $RPARP_Setting['bottom_bdr_color'];
				$bottom_bdr_size     = $RPARP_Setting['bottom_bdr_size'];
				$bottom_bdr_type     = $RPARP_Setting['bottom_bdr_type'];
				$date_back_Color     = $RPARP_Setting['date_back_Color'];
				$sliding_arrows_size = $RPARP_Setting['sliding_arrows_size'];
				$hover_text_color    = $RPARP_Setting['hover_text_color'];
				$title_link          = $RPARP_Setting['title_link'];
				$img_bdr_color       = $RPARP_Setting['img_bdr_color'];
				$img_bdr_type        = $RPARP_Setting['img_bdr_type'];
				$bdr_size            = $RPARP_Setting['bdr_size'];
				$post_order          = $RPARP_Setting['post_order'];
				$post_sta_tus        = $RPARP_Setting['post_sta_tus'];
				$checkboxvar_page    = $RPARP_Setting['checkboxvar_page'];
				$checkboxvar_post    = $RPARP_Setting['checkboxvar_post'];
				$order_by            = $RPARP_Setting['order_by'];
				$layout              = $RPARP_Setting['layout'];
				$arrow_color         = $RPARP_Setting['arrow_color'];
				$hover_Color         = $RPARP_Setting['hover_Color'];
				$total_post_value    = $RPARP_Setting['total_post_value'];
				$slider_speed        = $RPARP_Setting['slider_speed'];
				$charcter_limit      = $RPARP_Setting['charcter_limit'];
				$char_font_size      = $RPARP_Setting['char_font_size'];
				$char_color          = $RPARP_Setting['char_color'];
				$back_ground_color   = $RPARP_Setting['back_ground_color'];
				$dis_char_lmit       = $RPARP_Setting['dis_char_lmit'];
				$dis_font_size       = $RPARP_Setting['dis_font_size'];
				$dis_text_Color      = $RPARP_Setting['dis_text_Color'];
				$date_font_size      = $RPARP_Setting['date_font_size'];
				$date_font_color     = $RPARP_Setting['date_font_color'];
				$link_text           = $RPARP_Setting['link_text'];
				$link_font_size      = $RPARP_Setting['link_font_size'];
				$link_font_Color     = $RPARP_Setting['link_font_Color'];
				$link_back_Color     = $RPARP_Setting['link_back_Color'];
				$NWT_Font_Style      = $RPARP_Setting['NWT_Font_Style'];
				$nwt_custom_css      = $RPARP_Setting['nwt_custom_css'];
				$Tem_pl_at_e         = $RPARP_Setting['Tem_pl_at_e'];
				$show_hide           = $RPARP_Setting['show_hide'];
				$a                   = uniqid();
				include( "shortcode-files/slidercode.php" );
				if ( $Tem_pl_at_e == '11' ) {
					include( "shortcode-files/shortcode-1.php" );
				}
				
				if ( $Tem_pl_at_e == '14' ) {
					include( "shortcode-files/shortcode-4.php" );
				}
			}
		endwhile;
	} else {
		echo "<div align='center' class='alert alert-danger'>" . esc_html_e( "Sorry! Invalid Shortcode Embedded", 'WL_R_R_P' ) . "</div>";
	}
	wp_reset_query();
	return ob_get_clean();
} ?>