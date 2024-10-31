<?php
defined('ABSPATH') || die();
if ( isset( $_REQUEST['post'] ) ) {
	$postid = $_REQUEST['post'];
} else {
	$postid = $post->ID;
}
$NWT_Setting  = "R_P_A_R_P_Settings_" . $postid;
$NWT_Settings = unserialize( get_post_meta( $postid, $NWT_Setting, true ) );
if ( isset( $NWT_Settings[0] ) ) {
	$Tem_pl_at_e   = $NWT_Settings[0]['Tem_pl_at_e'];
	$img_bdr_type  = $NWT_Settings[0]['img_bdr_type'];
	$bdr_size      = $NWT_Settings[0]['bdr_size'];
	$img_bdr_color = $NWT_Settings[0]['img_bdr_color'];
	$layout        = $NWT_Settings[0]['layout'];
}
if ( ! isset( $Tem_pl_at_e ) ) {
	$Tem_pl_at_e = "11";
}
?>
<?php 
wp_register_style( 'rr_temp_settings_style', false );
wp_enqueue_style( 'rr_temp_settings_style' );
$css = " ";
ob_start(); ?>

    .text_in_put {
        width: 80%;
    }

    #upload_image {
        display: none;
    }

    .text_in_put {
        width: 80%;
    }

    #upload_image {
        display: none;
    }

    .rang_span_style {
        width: auto;
        height: 30px;
        margin: auto;
        display: inline-block;
        border: 2px solid gray;
        vertical-align: middle;
        border-radius: 8px;
        background-color: #FFFFFF;
        text-align: center;
        font-size: 20px;
        margin-left: 20px;
        margin-bottom: 20px;
        padding: 5px 10px;
    }
<?php
$css .= ob_get_clean();
wp_add_inline_style( 'rr_temp_settings_style', $css ); ?>

<?php
wp_register_style( 'rr_temp_settings_style1', false );
wp_enqueue_style( 'rr_temp_settings_style1' );
$css = " ";
ob_start(); ?> 
    .lbl_temp {
        font-size: 15px;
        font-family: Courier New;
        margin-right: 0px;
        font-weight: bold;
    }

    label > input {
        display: none;
    }

    label > input + span {
        cursor: pointer;
        border: 5px solid transparent;
    }

    label > input:checked + span {
        display: inline;
        background: #2580a2 url("<?php echo esc_url(WL_RP_PLUGIN_URL.'settings/images/hover.png'); ?>") right center no-repeat;
        padding-right: 30px;
        border: 3px solid #000;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 30px;
    }

    li {
        padding-bottom: 10px;
        color: #fff;
        margin: 0;
        padding: 12px 0px;
    }

    #temp_menu {
        font-style: italic;
    }

    #cssmenu {
        background: #333;
        list-style: none;
        margin: 0;
        padding: 0;
        float: left;
        height: auto;
        width: auto;
        margin-right: 150px;
    }

    .slidecontainer {
        width: 100%;
    }

    .slider {
        -webkit-appearance: none;
        width: 40%;
        height: 10px;
        border-radius: 5px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #000;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #000;
        cursor: pointer;
    }
<?php
$css .= ob_get_clean();
wp_add_inline_style( 'rr_temp_settings_style1', $css ); ?>

<?php require_once( "tooltip.php" ); ?>
<div align="center">
<div id='cssmenu' align="center">
    <ul id="temp_menu">
        <li>
            <label class="lbl_temp arrow-left ">
                <input id="Tem_pl_at_e" name="Tem_pl_at_e" type="radio" value="<?php echo esc_attr( '11' );?>"
                onclick=" dis_play_ed(this.value);" <?php checked( '11', $Tem_pl_at_e ); ?> checked
                style="display:none;"/>
                <span><?php esc_html_e( 'Template 1', 'WL_R_R_P' ); ?></span>
            </label>
        </li>

        <li>
            <label class="lbl_temp">
                <input id="Tem_pl_at_e" name="Tem_pl_at_e" type="radio" value="<?php echo esc_attr( '14' );?>"
                onclick="dis_play_ed(this.value);" <?php checked( '14', $Tem_pl_at_e ); ?>
                style="display:none;"/>
                <span> <?php esc_html_e( 'Template 2', 'WL_R_R_P' ); ?></span>
            </label>
        </li>
    </ul>
</div>

<?php //Template Style 1 ?>
<div id="t_m_p_l_1">
    <table>
        <tr>
            <th>
                <span style=" font-size: 30px;font-family: Courier New;"> <?php esc_html_e( 'Template Style 1', 'WL_R_R_P' ); ?></span>
            </th>
        </tr>
        <tr>
            <th>&nbsp;</th>
        </tr>
        <tr>
            <td>
                <img src="<?php echo esc_url(WL_RP_PLUGIN_URL . 'settings/images/template-1.png'); ?>" width="90%" height="auto"/>
            </td>
        </tr>
    </table>
</div>

<?php //Template Style 4 ?>
<div id="t_m_p_l_4">
    <table>
        <tr>
            <th>
                <span style=" font-size: 30px;font-family: Courier New;"> <?php esc_html_e( 'Template Style 2', 'WL_R_R_P' ); ?></span>
            </th>
        </tr>
        <tr>
            <th>&nbsp;</th>
        </tr>
        <tr>
            <td>
                <img src="<?php echo esc_url(WL_RP_PLUGIN_URL . 'settings/images/template-2.png'); ?>" width="90%" height="auto"/>
            </td>
        </tr>

    </table>
</div>
</div>

<table class="form-table">
    <tr class="template_table">
        <th><label><?php esc_html_e( 'Featured Images Border Style', 'WL_R_R_P' ); ?></label></th>
        <td> <?php if ( ! isset( $img_bdr_type ) ) {
            $img_bdr_type = "solid";
        } ?>
        <select name="img_bdr_type" id="img_bdr_type">
            <?php $options_bdr_type = array( 'none', 'dotted', 'solid' );
            foreach ( $options_bdr_type as $option_bdr_type_img ) {
               echo '<option
               value="' . esc_attr( $option_bdr_type_img ) . '"
               id="' . esc_attr( $option_bdr_type_img ) . '"',
               $img_bdr_type == $option_bdr_type_img ? ' selected="selected"' : '', '>',
               $option_bdr_type_img, '</option>';
           }
           ?>
       </select>
       <a href="#" class="e4" data-tooltip="#f4"><span class="dashicons dashicons-info info_info"></span></a>
   </td>
</tr>
<tr class="template_table">
    <th><label><?php esc_html_e( 'Featured Images Border Size', 'WL_R_R_P' ); ?></label></th>
    <td>
        <input class="slider" type="range" min="0" max="10" step="1" value="<?php if ( ! isset( $bdr_size ) ) {
            echo esc_attr( $bdr_size = "5" );
            } else {
                echo esc_attr( $bdr_size );
            } ?>" data-orientation="vertical" id="bdr_size" name="bdr_size" oninput="output_img_bdr(value);"/>
            <span class="img_border_span rang_span_style" id="img_bdr_span_value"
            name="img_bdr_span_value"><?php echo esc_attr( $bdr_size ); ?></span>
            <a href="#" class="e5" data-tooltip="#f5"><span class="dashicons dashicons-info info_info"></span></a>
        </td>
    </tr>
    <tr class="template_table">
        <th><label><?php esc_html_e( 'Featured Images Border Color', 'WL_R_R_P' ); ?></label></th>
       
     <td>
        <input type="text" id="img_bdr_color" class="color-field" name="img_bdr_color"  value="<?php if (isset($img_bdr_color)) { echo esc_attr($img_bdr_color);
        } ; ?>"  />
       
        <a href="#" class="e6" data-tooltip="#f6"><span class="dashicons dashicons-info info_info"></span></a>
    </td>
</tr>


<tr class="template_table">
    <th><label><?php esc_html_e( 'Featured Images Layout Style', 'WL_R_R_P' ); ?></label></th>
    <?php if ( ! isset( $layout ) ) {
     $layout = "50";
 } ?>
 <td>
    <input type="radio" name="layout" id="layout"
    value="<?php echo esc_attr('50');?>" <?php checked( '50', $layout ); ?> ><?php esc_html_e( 'In Circle', 'WL_R_R_P' ); ?>
    <a href="#" class="e7" data-tooltip="#f7"><span class="dashicons dashicons-info info_info"></span></a>
    <input type="radio" name="layout" id="layout"
    value="<?php echo esc_attr('0');?>" <?php checked( '0', $layout ); ?> ><?php esc_html_e( 'In Square', 'WL_R_R_P' ); ?>
    <a href="#" class="e8" data-tooltip="#f8"><span class="dashicons dashicons-info info_info"></span></a>
</td>
</tr>

</table>
<div style="clear: both;"></div>
<?php
wp_register_script( 'rr_temp_settings_script', false );
wp_enqueue_script( 'rr_temp_settings_script');
$js = " ";
ob_start(); ?>
    jQuery("#t_m_p_l_1").hide();
    jQuery("#t_m_p_l_4").hide();

    function dis_play_ed(vol) {
        if (vol == "11") {
            jQuery("#t_m_p_l_1").show();
            jQuery("#t_m_p_l_4").hide();
            jQuery("#show_di_v").hide();
            jQuery("tr.template_table").show();
            jQuery("tr.bg_img_height").hide();


        }
        else if (vol == "14") {
            jQuery("#t_m_p_l_4").show();
            jQuery("#t_m_p_l_1").hide();
            jQuery("#show_di_v").hide();
            jQuery("tr.template_table").show();
            jQuery("tr.bg_img_height").hide();
        }

    }

    var Layout = jQuery('input[name=Tem_pl_at_e]:checked').val();
    if (Layout == "11") {
        jQuery("tr.template_1_settings").show();
        jQuery("div#t_m_p_l_1").show()
    }
    
    if (Layout == "14") {
        jQuery("tr.template_4_settings").show();
        jQuery("div#t_m_p_l_4").show()
    }
    function output_img_bdr(vol) {
        jQuery("span.img_border_span").text(vol);
    }

    function back_image_size(vol) {
        jQuery("span.back_image_span").text(vol);
    }
<?php
$js .= ob_get_clean();
wp_add_inline_script( 'rr_temp_settings_script', $js ); ?>