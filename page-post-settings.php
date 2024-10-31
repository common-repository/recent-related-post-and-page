<?php
defined('ABSPATH') || die();

if ( isset( $_POST['submit'] ) && isset( $_POST['security'] ) ) {
  if ( ! wp_verify_nonce( $_POST['security'], 'nonce_save_sub_option' ) ) {
        die();}

    $page_rp_rp_short_code = sanitize_text_field('page_rp_rp_short_code', $_POST['page_rp_rp_short_code'] );
    $post_rp_rp_short_code = sanitize_text_field('post_rp_rp_short_code', $_POST['post_rp_rp_short_code'] );
    $switch_off_page       = sanitize_text_field( $_POST['switch_off_page'] );
    $switch_off_post       = sanitize_text_field( $_POST['switch_off_post'] );
    $p_p_lbl_text_page     = sanitize_text_field( $_POST['p_p_lbl_text_page'] );
    $p_p_lbl_text_post     = sanitize_text_field( $_POST['p_p_lbl_text_post'] );
    $p_p_bg_color          = sanitize_hex_color( $_POST['p_p_bg_color'] );
    $p_p_color             = sanitize_hex_color( $_POST['p_p_color'] );
    $p_p_lbl_text_font     = sanitize_text_field( $_POST['p_p_lbl_text_font'] );
    $P_P_PGPP_Font_Style   = sanitize_text_field( $_POST['P_P_PGPP_Font_Style'] );

    $ABio_Array[] = array(
      'page_rp_rp_short_code' => $page_rp_rp_short_code,
      'post_rp_rp_short_code' => $post_rp_rp_short_code,
      'switch_off_page'       => $switch_off_page,
      'switch_off_post'       => $switch_off_post,
      'p_p_lbl_text_page'     => $p_p_lbl_text_page,
      'p_p_lbl_text_post'     => $p_p_lbl_text_post,
      'p_p_bg_color'          => $p_p_bg_color,
      'p_p_color'             => $p_p_color,
      'p_p_lbl_text_font'     => $p_p_lbl_text_font,
      'P_P_PGPP_Font_Style'   => $P_P_PGPP_Font_Style,
  );

    update_option( 'rp_rp_info_Settings', serialize( $ABio_Array ) );
}

$ABio_settings = unserialize( get_option( 'rp_rp_info_Settings' ) );


if(!empty($ABio_settings)) {
 $page_rp_rp_short_code = $ABio_settings[0]['page_rp_rp_short_code'];
 $post_rp_rp_short_code = $ABio_settings[0]['post_rp_rp_short_code'];
 $switch_off_page       = $ABio_settings[0]['switch_off_page'];
 $switch_off_post       = $ABio_settings[0]['switch_off_post'];
 $p_p_lbl_text_page     = $ABio_settings[0]['p_p_lbl_text_page'];
 $p_p_lbl_text_post     = $ABio_settings[0]['p_p_lbl_text_post'];
 $p_p_bg_color          = $ABio_settings[0]['p_p_bg_color'];
 $p_p_color             = $ABio_settings[0]['p_p_color'];
 $p_p_lbl_text_font     = $ABio_settings[0]['p_p_lbl_text_font'];
 $P_P_PGPP_Font_Style   = $ABio_settings[0]['P_P_PGPP_Font_Style'];
}

 

wp_enqueue_style( 'rrp-my-style-css', WL_RP_PLUGIN_URL . 'css/my_style.css' );
?>
<?php
wp_register_script( 'rr_post_page_settings_script', false );
wp_enqueue_script( 'rr_post_page_settings_script' );
$js = " ";
ob_start(); ?>
    function page_settings(vol) {
        if (vol == "yes") {
            jQuery(".page_context").show();
        }
        if (vol == "no") {
            jQuery(".page_context").hide();
        }
    }

    function post_settings(vol) {
        if (vol == "yes") {
            jQuery(".post_context").show();
        }
        if (vol == "no") {
            jQuery(".post_context").hide();
        }
    }

    jQuery(document).ready(function () {
        jQuery('input.my-color-picker').wpColorPicker();
    });

    function outputUpdate(vol) {
        jQuery("span.font_size").text(vol);
    }
<?php
$js .= ob_get_clean();
wp_add_inline_script( 'rr_post_page_settings_script', $js ); ?>
<?php require_once( "settings/tooltip.php" ); ?>
<div class="row-fluid pricing-table pricing-three-column"
style="margin-top: 10px; display:block; width:100%; overflow:hidden; background:white; box-shadow: 0 0 5px hsla(0, 0%, 20%, 0.3);padding-bottom:70px">
<form method="post" action="">

    <?php $nonce = wp_create_nonce( 'nonce_save_sub_option' ); ?>
    <input type="hidden" name="security" value="<?php echo esc_attr( $nonce ); ?>">

    <div class="plan-name" style="margin-top:20px;text-align: center;">
        <h2 style="font-weight: bold;font-size: 36px;padding-top: 30px;padding-bottom: 10px;color:#D9534F;"><?php esc_html_e( 'Page/Post settings', 'WL_R_R_P' ); ?></h2>
    </div>
    <table class="form-table" style="margin-left:20px; width: 98%;">
        <tr>
            <td colspan="2"><label class="lbl"> <?php esc_html_e( 'Display Settings', 'WL_R_R_P' ); ?> </label></td>
        </tr>
        <tr>
            <?php if ( ! isset( $switch_off_page ) ) {
             $switch_off_page = "yes";
         } ?>
         <th><?php esc_html_e( 'On page', 'WL_R_R_P' ); ?></th>
         <td>
            <input type="radio" name="switch_off_page" id="switch_off_page"
            value="<?php echo esc_attr('yes');?>" <?php checked( 'yes', $switch_off_page ); ?>
            onclick="page_settings(this.value);"><?php esc_html_e( 'Yes', 'WL_R_R_P' ); ?>
            <a href="#" id="w1_1" data-tooltip="#q1_1"><span class="dashicons dashicons-info info_info"></span></a>
            <input type="radio" name="switch_off_page" id="switch_off_page"
            value="<?php echo esc_attr('no');?>" <?php checked( 'no', $switch_off_page ); ?>
            onclick="page_settings(this.value);"><?php esc_html_e( 'No', 'WL_R_R_P' ); ?>
            <a href="#" id="w1_2" data-tooltip="#q1_2"><span class="dashicons dashicons-info info_info"></span></a>
        </td>
    </tr>
    <?php if ( ! isset( $switch_off_post ) ) {
        $switch_off_post = "yes";
    } ?>
    <th><?php esc_html_e( 'On post', 'WL_R_R_P' ); ?></th>
    <td>
        <input type="radio" name="switch_off_post" id="switch_off_post"
        value="<?php echo esc_attr('yes');?>" <?php checked( 'yes', $switch_off_post ); ?>
        onclick="post_settings(this.value);"><?php esc_html_e( 'Yes', 'WL_R_R_P' ); ?>
        <a href="#" id="w2_1" data-tooltip="#q2_1"><span class="dashicons dashicons-info info_info"></span></a>
        <input type="radio" name="switch_off_post" id="switch_off_post"
        value="<?php echo esc_attr('no');?>" <?php checked( 'no', $switch_off_post ); ?>
        onclick="post_settings(this.value);"><?php esc_html_e( 'No', 'WL_R_R_P' ); ?>
        <a href="#" id="w2_2" data-tooltip="#q2_2"><span class="dashicons dashicons-info info_info"></span></a>
    </td>
</tr>
<tr class="page_context" <?php if ( $switch_off_page == "yes" ) {
    echo esc_attr('style="display: table-row;');
} ?>>
<td colspan="2"><label
    class="lbl"><?php esc_html_e( 'Select Shortcode Style To Display On Page Context ', 'WL_R_R_P' ); ?></label>
</td>
</tr>
<?php if ( ! isset( $page_rp_rp_short_code ) ) {
    $page_rp_rp_short_code = "1";
} ?>
<?php $ABT_CPT_Name = "rp_and_rp";
$ABT_All_Posts      = wp_count_posts( $ABT_CPT_Name )->publish;
global $All_ABTM;
$All_ABTM = array( 'post_type' => $ABT_CPT_Name, 'orderby' => 'ASC', 'posts_per_page' => $ABT_All_Posts );
$All_ABTM = new WP_Query( $All_ABTM );
?>
<tr class="page_context" <?php if ( $switch_off_page == "yes" ) {
    echo esc_attr('style="display: table-row;"');
} ?>>
<th><?php esc_html_e( 'All Shortcode', 'WL_R_R_P' ); ?></th>
<td>
    <select id="page_rp_rp_short_code" name="page_rp_rp_short_code">
        <option value="<?php echo esc_attr('1'); ?>"><?php esc_html_e( "<--Select one-->", 'WL_R_R_P' ); ?></option>
        <?php if ( $All_ABTM->have_posts() ) { ?>
            <?php while ( $All_ABTM->have_posts() ) : $All_ABTM->the_post();
                $PostId    = get_the_ID();
                $PostTitle = get_the_title( $PostId ); ?>
                <option value="<?php echo esc_attr($PostId); ?>" <?php if ( $page_rp_rp_short_code == $PostId ) { echo esc_html('selected="selected"'); } ?>> <?php
                if ( $PostTitle ) {
                    esc_attr($PostTitle);
                } else {
                    esc_html_e( "No Title", 'WL_R_R_P' );
                } ?></option> <?php
            endwhile;
        } else { ?>
            <option> <?php esc_html_e( "Sorry! No Recent Related Post And Page Shortcode Found.", 'WL_R_R_P' ); ?> </option> <?php
        } ?>
    </select>
<a href="#" id="w3" data-tooltip="#q3"><span class="dashicons dashicons-info info_info"></span></a>
</td>
</tr>

<tr class="post_context" <?php if ( $switch_off_post == "yes" ) {
    echo esc_attr('style="display: table-row;"');
} ?>>
<td colspan="2"><label
    class="lbl"><?php esc_html_e( 'Select Shortcode Style To Display On Post Context ', 'WL_R_R_P' ); ?></label>
</td>
</tr>
<?php if ( ! isset( $post_rp_rp_short_code ) ) {
    $post_rp_rp_short_code = "1";
} ?>
<?php $ABT_CPT_Name = "rp_and_rp";
$ABT_All_Posts      = wp_count_posts( $ABT_CPT_Name )->publish;
global $All_ABTM;
$All_ABTM = array( 'post_type' => $ABT_CPT_Name, 'orderby' => 'ASC', 'posts_per_page' => $ABT_All_Posts );
$All_ABTM = new WP_Query( $All_ABTM );
?>
<tr class="post_context" <?php if ( $switch_off_post == "yes" ) {
    echo esc_attr('style="display: table-row;"');
} ?>>
<th><?php esc_html_e( 'All Shortcode', 'WL_R_R_P' ); ?></th>
<td>
    <select id="post_rp_rp_short_code" name="post_rp_rp_short_code">
        <option value="<?php echo esc_attr('1'); ?>"><?php esc_html_e( "<--Select one-->", 'WL_R_R_P' ); ?></option> <?php
            if ( $All_ABTM->have_posts() ) {
                while ( $All_ABTM->have_posts() ) : $All_ABTM->the_post();
                    $PostId    = get_the_ID();
                    $PostTitle = get_the_title( $PostId ); ?>
                    <option value="<?php echo esc_attr($PostId); ?>" <?php if ( $post_rp_rp_short_code == $PostId ) { echo esc_html('selected="selected"'); } ?>><?php
                        if ( $PostTitle ) {
                            echo esc_html($PostTitle);
                        } else {
                            esc_html_e( "No Title", 'WL_R_R_P' );
                        } ?>
                    </option> <?php
                endwhile;
            } else { ?>
                <option> <?php esc_html_e( "Sorry! No Recent Related Post And Page Shortcode Found.", 'WL_R_R_P' ); ?> </option><?php
            } ?>
    </select>
<a href="#" id="w4" data-tooltip="#q4"><span class="dashicons dashicons-info info_info"></span></a>
</td>
</tr>
<tr>
    <td colspan="2"><label
        class="lbl"><?php esc_html_e( 'Recent Related Post And Page label settings', 'WL_R_R_P' ); ?></label>
    </td>
</tr>

<tr>
    <th><?php esc_html_e( 'Label Text For Page', 'WL_R_R_P' ); ?></th>
    <?php if ( ! isset( $p_p_lbl_text_page ) ) {
     $p_p_lbl_text_page = "Recent Pages";
 } ?>
 <td>
    <input type="text" name="p_p_lbl_text_page" id="p_p_lbl_text_page"
    value="<?php echo esc_attr( $p_p_lbl_text_page ); ?>"/>
    <a href="#" id="w5" data-tooltip="#q5"><span class="dashicons dashicons-info info_info"></span></a>
</td>
</tr>
<tr>
    <th><?php esc_html_e( 'Label Text For Post', 'WL_R_R_P' ); ?></th>
    <?php if ( ! isset( $p_p_lbl_text_post ) ) {
     $p_p_lbl_text_post = "Recent Posts";
 } ?>
 <td>
    <input type="text" name="p_p_lbl_text_post" id="p_p_lbl_text_post"
    value="<?php echo esc_attr( $p_p_lbl_text_post ); ?>"/>
    <a href="#" id="w6" data-tooltip="#q6"><span class="dashicons dashicons-info info_info"></span></a>
</td>
</tr>

<tr>
    <th><label><?php esc_html_e( 'Font size', 'WL_R_R_P' ); ?></label></th>
    <td>
        <input class="slider" type="range" min="12" max="32" step="1"
        value="<?php if ( ! isset( $p_p_lbl_text_font ) ) {
         echo esc_attr( $p_p_lbl_text_font = "20" );
         } else {
             echo esc_attr( $p_p_lbl_text_font );
         } ?>" data-orientation="vertical" id="p_p_lbl_text_font" name="p_p_lbl_text_font"
         oninput="outputUpdate(value);"/>
         <span id="p_p_lbl_text_font" name="p_p_lbl_text_font"
         class="font_size rang_span_style"><?php echo esc_attr( $p_p_lbl_text_font ); ?></span>
         <a href="#" id="w7" data-tooltip="#q7"><span class="dashicons dashicons-info info_info"></span></a>
     </td>
 </tr>
 <tr>
    <th><label><?php esc_html_e( 'Background Color', 'WL_R_R_P' ); ?> </label></th>

 <td>
     <input type="text" id="p_p_bg_color" class="color-field" name="p_p_bg_color"  value="<?php if (isset($p_p_bg_color)) { echo esc_attr($p_p_bg_color); } ; ?>"  />

    <a href="#" id="w8" data-tooltip="#q8"><span class="dashicons dashicons-info info_info"></span></a>
</td>
<tr>
    <th><label><?php esc_html_e( 'Font Color', 'WL_R_R_P' ); ?></label></th>

 <td>
    <input type="text" id="p_p_color" class="color-field " name="p_p_color"  value="<?php if (isset($p_p_color)) { echo esc_attr($p_p_color); } ; ?>"  />

    <a href="#" id="w9" data-tooltip="#q9"><span class="dashicons dashicons-info info_info"></span></a>
</td>
</tr>
<tr>
    <th><label><?php esc_html_e( 'Font Family', 'WL_R_R_P' ); ?></label></th>
    <td>    <?php if ( ! isset( $P_P_PGPP_Font_Style ) ) {
      $P_P_PGPP_Font_Style = "Sans";
  } ?>
  <select name="P_P_PGPP_Font_Style" id="P_P_PGPP_Font_Style" class="standard-dropdown">
    <optgroup label="Default Fonts">
        <option value="<?php echo esc_attr('Courier New');?>" <?php selected( $P_P_PGPP_Font_Style, 'Courier New' ); ?>><?php esc_html_e( 'Courier New', 'Verdana' ); ?></option>
        <option value="<?php echo esc_attr('cursive');?>" <?php selected( $P_P_PGPP_Font_Style, 'cursive' ); ?>><?php esc_html_e( 'Cursive', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('fantasy');?>" <?php selected( $P_P_PGPP_Font_Style, 'fantasy' ); ?>><?php esc_html_e( 'Fantasy', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('Georgia');?>" <?php selected( $P_P_PGPP_Font_Style, 'Georgia' ); ?>><?php esc_html_e( 'Georgia', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('Grande');?>"<?php selected( $P_P_PGPP_Font_Style, 'Grande' ); ?>><?php esc_html_e( 'Grande', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('Helvetica Neue');?>" <?php selected( $P_P_PGPP_Font_Style, 'Helvetica Neue' ); ?>><?php esc_html_e( 'Helvetica Neue', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('Impact');?>" <?php selected( $P_P_PGPP_Font_Style, 'Impact' ); ?>><?php esc_html_e( 'Impact', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('Lucida');?>" <?php selected( $P_P_PGPP_Font_Style, 'Lucida' ); ?>><?php esc_html_e( 'Lucida', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('Lucida Console');?>"<?php selected( $P_P_PGPP_Font_Style, 'Lucida Console' ); ?>><?php esc_html_e( 'Lucida Console', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('monospace');?>" <?php selected( $P_P_PGPP_Font_Style, 'monospace' ); ?>><?php esc_html_e( 'Monospace', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('Open Sans');?>" <?php selected( $P_P_PGPP_Font_Style, 'Open Sans' ); ?>><?php esc_html_e( 'Open Sans', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('Palatino');?>" <?php selected( $P_P_PGPP_Font_Style, 'Palatino' ); ?>><?php esc_html_e( 'Palatino', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('sans');?>" <?php selected( $P_P_PGPP_Font_Style, 'sans' ); ?>><?php esc_html_e( 'Sans', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('sans-serif');?>" <?php selected( $P_P_PGPP_Font_Style, 'sans-serif' ); ?>><?php esc_html_e( 'Sans-Serif', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('Tahoma');?>" <?php selected( $P_P_PGPP_Font_Style, 'Tahoma' ); ?>><?php esc_html_e( 'Tahoma', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('Times New Roman');?>" <?php selected( $P_P_PGPP_Font_Style, 'Times New Roman' ); ?>><?php esc_html_e( 'Times New Roman', 'WL_R_R_P' ); ?></option>
        <option value="<?php echo esc_attr('Trebuchet MS');?>" <?php selected( $P_P_PGPP_Font_Style, 'Trebuchet MS' ); ?>><?php esc_html_e( 'Trebuchet MS', 'WL_R_R_P' ); ?></option>
		<option value="<?php echo esc_attr('Verdana');?>" <?php selected( $P_P_PGPP_Font_Style, 'Verdana' ); ?>><?php esc_html_e( 'Verdana', 'WL_R_R_P' ); ?></option>
    </optgroup>
</select>
<a href="#" id="w10" data-tooltip="#q10"><span
    class="dashicons dashicons-info info_info"></span></a>
    <p class="description">
      <?php esc_html_e( 'Choose a caption font style.' ); ?>
  </p>
</td>
</tr>
</tr>
</tr>
<tr>
    <td><input type="submit" name="submit" value="save" id="save" class="button-primary"
       style="font-size: 18px;width:70%;">
   </td>
</tr>
</table>
</form>
</div>