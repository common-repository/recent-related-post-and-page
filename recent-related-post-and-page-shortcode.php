<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
add_shortcode( 'RRPP', 'weblizar_r_p_a_r_p' );
function weblizar_r_p_a_r_p( $Id ) {
	ob_start();

	if ( isset( $Id['id'] ) ) {
		$RRPP_CPT_Name = 'rp_and_rp';
		$AllRRPP       = array(
			'p'           => $Id['id'],
			'post_type'   => $RRPP_CPT_Name,
			'orderby'     => 'ASC',
			'post_status' => 'publish',
		);
		$loop          = new WP_Query( $AllRRPP );
		while ( $loop->have_posts() ) :
			$loop->the_post();
			$ID            = get_the_ID();
			$RRPP_Settings = 'R_P_A_R_P_Settings_' . $ID;
			$RRPP_M_sets   = unserialize( get_post_meta( $ID, $RRPP_Settings, true ) );
			foreach ( $RRPP_M_sets as $RRPP_Setting ) {
				$p_o_s_t             = $ID;
				$bottom_bdr_color    = $RRPP_Setting['bottom_bdr_color'];
				$bottom_bdr_size     = $RRPP_Setting['bottom_bdr_size'];
				$bottom_bdr_type     = $RRPP_Setting['bottom_bdr_type'];
				$date_back_Color     = $RRPP_Setting['date_back_Color'];
				$sliding_arrows_size = $RRPP_Setting['sliding_arrows_size'];
				$hover_text_color    = $RRPP_Setting['hover_text_color'];
				$title_link          = $RRPP_Setting['title_link'];
				$img_bdr_color       = $RRPP_Setting['img_bdr_color'];
				$img_bdr_type        = $RRPP_Setting['img_bdr_type'];
				$bdr_size            = $RRPP_Setting['bdr_size'];
				$post_order          = $RRPP_Setting['post_order'];
				$post_sta_tus        = $RRPP_Setting['post_sta_tus'];
				$checkboxvar_page    = $RRPP_Setting['checkboxvar_page'];
				$checkboxvar_post    = $RRPP_Setting['checkboxvar_post'];
				$order_by            = $RRPP_Setting['order_by'];
				$layout              = $RRPP_Setting['layout'];
				$arrow_color         = $RRPP_Setting['arrow_color'];
				$hover_Color         = $RRPP_Setting['hover_Color'];
				$total_post_value    = $RRPP_Setting['total_post_value'];
				$slider_speed        = $RRPP_Setting['slider_speed'];
				$charcter_limit      = $RRPP_Setting['charcter_limit'];
				$char_font_size      = $RRPP_Setting['char_font_size'];
				$char_color          = $RRPP_Setting['char_color'];
				$back_ground_color   = $RRPP_Setting['back_ground_color'];
				$dis_char_lmit       = $RRPP_Setting['dis_char_lmit'];
				$dis_font_size       = $RRPP_Setting['dis_font_size'];
				$dis_text_Color      = $RRPP_Setting['dis_text_Color'];
				$date_font_size      = $RRPP_Setting['date_font_size'];
				$date_font_color     = $RRPP_Setting['date_font_color'];
				$link_text           = $RRPP_Setting['link_text'];
				$link_font_size      = $RRPP_Setting['link_font_size'];
				$link_font_Color     = $RRPP_Setting['link_font_Color'];
				$link_back_Color     = $RRPP_Setting['link_back_Color'];
				$NWT_Font_Style      = $RRPP_Setting['NWT_Font_Style'];
				$nwt_custom_css      = $RRPP_Setting['nwt_custom_css'];
				$Tem_pl_at_e         = $RRPP_Setting['Tem_pl_at_e'];
				$show_hide           = $RRPP_Setting['show_hide'];

				$a = uniqid();
				include 'shortcode-files/slidercode.php';
				if ( $Tem_pl_at_e == '11' ) {
					include 'shortcode-files/shortcode-1.php';
				}

				if ( $Tem_pl_at_e == '12' ) {
					echo "<div align='center' style='color: #b94a48;background-color: #f2dede; border-color: #b94a48;margin: 0px; display: block;height: 100px;'>
					<div style='position: relative;  top: 40%;font-weight: bolder;font-size: 100%;'>Sorry! Template Style 2 Available In Pro Plugin <br> Only  Template Style 1 And Template Style 4 Available In This Plugin  </div>
					</div>";
				}

				if ( $Tem_pl_at_e == '13' ) {
					echo "<div align='center' style='color: #b94a48;background-color: #f2dede; border-color: #b94a48;margin: 0px; display: block;height: 100px;'>
					<div style='position: relative;  top: 40%;font-weight: bolder;font-size: 100%;'>Sorry! Template Style 3 Available In Pro Plugin <br> Only Template Style 1 And Template Style 4 Available In This Plugin</div>
					</div>";
				}

				if ( $Tem_pl_at_e == '14' ) {
					include 'shortcode-files/shortcode-4.php';
				}

				if ( $Tem_pl_at_e == '15' ) {
					echo "<div align='center' style='color: #b94a48;background-color: #f2dede; border-color: #b94a48;margin: 0px; display: block;height: 100px;'>
					<div style='position: relative;  top: 40%;font-weight: bolder;font-size: 100%;'>Sorry! Template Style 5 Available In Pro Plugin <br> Only Template Style 1 And Template Style 4 Available In This Plugin</div>
					</div>";
				}

				if ( $Tem_pl_at_e == '16' ) {
					echo "<div align='center' style='color: #b94a48;background-color: #f2dede; border-color: #b94a48;margin: 0px; display: block;height: 100px;'>
					<div style='position: relative;  top: 40%;font-weight: bolder;font-size: 100%;'>Sorry! Template Style 6 Available In Pro Plugin<br> Only Template Style 1 And Template Style 4 Available In This Plugin</div>
					</div>";
				}

				if ( $Tem_pl_at_e == '17' ) {
					echo "<div align='center' style='color: #b94a48;background-color: #f2dede; border-color: #b94a48;margin: 0px; display: block;height: 100px;'>
					<div style='position: relative;  top: 40%;font-weight: bolder;font-size: 100%;'>Sorry! Template Style 7 Available In Pro Plugin<br> Only Template Style 1 And Template Style 4 Available In This Plugin</div>
					</div>";
				}

				if ( $Tem_pl_at_e == '18' ) {
					echo "<div align='center' style='color: #b94a48;background-color: #f2dede; border-color: #b94a48;margin: 0px; display: block;height: 100px;'>
					<div style='position: relative;  top: 40%;font-weight: bolder;font-size: 100%;'>Sorry! Template Style 8 Available In Pro Plugin<br> Only Template Style 1 And Template Style 4 Available In This Plugin</div>
					</div>";
				}
			}
		endwhile;
	} else {
		echo "<div align='center' class='alert alert-danger'>" . esc_html__( 'Sorry! Invalid Shortcode Embedded', 'WL_R_P_R_P ' ) . '</div>';
	}
	wp_reset_query();

	return ob_get_clean();
}
