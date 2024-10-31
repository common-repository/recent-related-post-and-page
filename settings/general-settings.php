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
    $show_hide           = $NWT_Settings[0]['show_hide'];
    $bottom_bdr_color    = $NWT_Settings[0]['bottom_bdr_color'];
    $bottom_bdr_size     = $NWT_Settings[0]['bottom_bdr_size'];
    $bottom_bdr_type     = $NWT_Settings[0]['bottom_bdr_type'];
    $date_back_Color     = $NWT_Settings[0]['date_back_Color'];
    $sliding_arrows_size = $NWT_Settings[0]['sliding_arrows_size'];
    $hover_text_color    = $NWT_Settings[0]['hover_text_color'];
    $title_link          = $NWT_Settings[0]['title_link'];
    $post_order          = $NWT_Settings[0]['post_order'];
    $post_sta_tus        = $NWT_Settings[0]['post_sta_tus'];
    $checkboxvar_page    = $NWT_Settings[0]['checkboxvar_page'];
    $checkboxvar_post    = $NWT_Settings[0]['checkboxvar_post'];
    $order_by            = $NWT_Settings[0]['order_by'];
    $arrow_color         = $NWT_Settings[0]['arrow_color'];
    $slider_speed        = $NWT_Settings[0]['slider_speed'];
    $hover_Color         = $NWT_Settings[0]['hover_Color'];
    $total_post_value    = $NWT_Settings[0]['total_post_value'];
    $charcter_limit      = $NWT_Settings[0]['charcter_limit'];
    $char_font_size      = $NWT_Settings[0]['char_font_size'];
    $char_color          = $NWT_Settings[0]['char_color'];
    $back_ground_color   = $NWT_Settings[0]['back_ground_color'];
    $dis_char_lmit       = $NWT_Settings[0]['dis_char_lmit'];
    $dis_font_size       = $NWT_Settings[0]['dis_font_size'];
    $dis_text_Color      = $NWT_Settings[0]['dis_text_Color'];
    $date_font_size      = $NWT_Settings[0]['date_font_size'];
    $date_font_color     = $NWT_Settings[0]['date_font_color'];
    $link_text           = $NWT_Settings[0]['link_text'];
    $link_font_size      = $NWT_Settings[0]['link_font_size'];
    $link_font_Color     = $NWT_Settings[0]['link_font_Color'];
    $link_back_Color     = $NWT_Settings[0]['link_back_Color'];
    $NWT_Font_Style      = $NWT_Settings[0]['NWT_Font_Style'];
    $nwt_custom_css      = $NWT_Settings[0]['nwt_custom_css'];
}
wp_enqueue_style( 'rrp-my-style-css', WL_RP_PLUGIN_URL . 'css/my_style.css' );
?>


<?php
wp_register_script( 'rr_general_settings_script', false );
wp_enqueue_script( 'rr_general_settings_script');
$js = " ";
ob_start(); ?>
    jQuery(document).ready(function () {
        var editor = CodeMirror.fromTextArea(document.getElementById("nwt_custom_css"), {
            lineNumbers: true,
            styleActiveLine: true,
            matchBrackets: true,
            hint: true,
            theme: 'blackboard',
            lineWrapping: true,
            extraKeys: {"Ctrl-Space": "autocomplete"},
        });
    });
<?php
$js .= ob_get_clean();
wp_add_inline_script( 'rr_general_settings_script', $js ); ?>

<?php
wp_register_script( 'rr_general_settings_script1', false );
wp_enqueue_script( 'rr_general_settings_script1');
$js = " ";
ob_start(); ?>
    jQuery(document).ready(function () {
        jQuery('.my-color-picker').wpColorPicker();
    });

    function outputUpdate(vol) {
        jQuery("span.volum").text(vol);
    }

    function title_limit(vol) {
        jQuery("span.title_limit").text(vol);
    }

    function date_limit(vol) {
        jQuery("span.date_limit").text(vol);
    }

    function description_limit(vol) {
        jQuery("span.dis_limit").text(vol);
    }

    function outputUpdate_title(vol) {
        jQuery("span.ti_tle").text(vol);
    }

    function outputUpdate_des(vol) {
        jQuery("span.discri_ption").text(vol);
    }

    function outputUpdate_date(vol) {
        jQuery("span.date_font_size").text(vol);
    }

    function outputUpdate_link(vol) {
        jQuery("span.link_font").text(vol);
    }

    function total_post(vol) {
        jQuery("span.total_post_span").text(vol);
    }

    function total_post_slide(vol) {
        jQuery("span.total_post_slide_span").text(vol);
    }

    function slider_speed_function(vol) {
        jQuery("span.slider_speed_span").text(vol);
    }

    function slider_arrow_size(vol) {
        jQuery("span.slider_arrow_span").text(vol);
    }

    function border_bottom_bdr(vol) {
        jQuery("span.bottom_border_span").text(vol);
    }

    function displayed_text(vol) {
        if (vol == "slow") {
            jQuery("#speed_slider").hide();
        }
        if (vol == "medium") {
            jQuery("#speed_slider").hide();
        }
        if (vol == "fast") {
            jQuery("#speed_slider").hide();
        }
        if (vol == "custom") {
            jQuery("#speed_slider").show();
        }
    }

    function date_text_hide(vol) {
        if (vol == "show") {
            jQuery("tr.my_date_option").show();
        }
        if (vol == "hide") {
            jQuery("tr.my_date_option").hide();
        }
    }
<?php
$js .= ob_get_clean();
wp_add_inline_script( 'rr_general_settings_script1', $js ); ?>

<?php require_once( "tooltip.php" ); ?>
<table class="form-table">
    <tr>
        <td colspan="2"><label class="lbl"><?php esc_html_e( 'General option', 'WL_R_R_P' ); ?></label></td>
    </tr>
    <tr>
        <th><label><?php esc_html_e( 'Post Order', 'WL_R_R_P' ); ?></label></th>
        <?php if ( ! isset( $post_order ) ) {
            $post_order = "ASC";
        } ?>
        <td>
            <select style="width:50%;" name="post_order" id="post_order" class="widefat">
                <option value="<?php echo esc_attr( 'ASC' );?>" <?php selected( $post_order, 'ASC' ); ?>><?php echo esc_html('Ascending'); ?></option>
                <option value="<?php echo esc_attr( 'DESC' );?>" <?php selected( $post_order, 'DESC' ); ?>><?php echo esc_html('Descending'); ?></option>
            </select>
            <a href="#" id="a1" data-tooltip="#b1"><span class="dashicons dashicons-info info_info"></span></a>
        </td>
    </tr>
    <tr>
        <th><label><?php esc_html_e( 'Post Status', 'WL_R_R_P' ); ?></label></th>
        <?php if ( ! isset( $post_sta_tus ) ) {
            $post_sta_tus = "publish";
        } ?>
        <td>
            <select class="widefat" id="post_sta_tus" name="post_sta_tus" style="width:50%;">
                <option value="<?php echo esc_attr( 'publish' );?>" <?php selected( $post_sta_tus, 'publish' ); ?> ><?php echo esc_html('Published'); ?></option>
                <option value="<?php echo esc_attr( 'pending' );?>" <?php selected( $post_sta_tus, 'pending' ); ?>><?php echo esc_html('Pending'); ?></option>
                <option value="<?php echo esc_attr( 'private' );?>" <?php selected( $post_sta_tus, 'private' ); ?>><?php echo esc_html('Private'); ?></option>
            </select>
            <a href="#" id="a2" data-tooltip="#b2"><span class="dashicons dashicons-info info_info"></span></a>
            <p class="description">
                <b>
                    <?php esc_html_e( 'Note: Please Select Post Type .', 'WL_R_R_P' ) ?>
                </b>
            </p>
        </td>
    </tr>
    <tr>
        <th><label><?php esc_html_e( 'Post Types', 'WL_R_R_P' ); ?></label></th>

        <td>
            <?php if ( ! isset( $checkboxvar_post ) && ! isset( $checkboxvar_page ) ) {
                $checkboxvar_post = "post";
            } ?>
            <?php if ( ! isset( $checkboxvar_post ) ) {
                $checkboxvar_post = "";
            } ?>
            <input name="checkboxvar_post" value="<?php echo esc_attr( '0' );?>" type="hidden">
            <input type="checkbox" name="checkboxvar_post" id="checkboxvar_post" value="<?php echo esc_attr( 'post' );?>" <?php checked( 'post', $checkboxvar_post ); ?> ><?php esc_html_e( 'Post', 'WL_R_R_P' ); ?>
            <a href="#" id="a3_1" data-tooltip="#b3_1"><span class="dashicons dashicons-info info_info"></span></a>
            <?php if ( ! isset( $checkboxvar_page ) ) {
                $checkboxvar_page = "";
            } ?>
            <input name="checkboxvar_page" value="<?php echo esc_attr( '0' );?>" type="hidden">
            <input type="checkbox" name="checkboxvar_page" id="checkboxvar_page" value="<?php echo esc_attr( 'page' );?>" <?php checked( 'page', $checkboxvar_page ); ?> ><?php esc_html_e( 'Page', 'WL_R_R_P' ); ?>
            <a href="#" id="a3_2" data-tooltip="#b3_2"><span class="dashicons dashicons-info info_info"></span></a>
            <p class="description">
                <b>
                    <?php esc_html_e( 'Note: Please Select atleast one .', 'WL_R_R_P' ) ?>
                </b>
            </p>
        </td>
    </tr>
    <tr>
        <th><label><?php esc_html_e( 'Order By', 'WL_R_R_P' ); ?></label></th>
        <?php if ( ! isset( $order_by ) ) {
            $order_by = "title";
        } ?>
        <td><select class="widefat" id="order_by" name="order_by" style="width:50%;">
            <option value="<?php echo esc_attr( 'date' );?>" <?php selected( $order_by, 'date' ); ?>><?php echo esc_html('Date'); ?></option>
            <option value="<?php echo esc_attr( 'modified' );?>" <?php selected( $order_by, 'modified' ); ?>><?php echo esc_html('Recently Modified'); ?></option>
        </select>
        <a href="#" id="a4" data-tooltip="#b4"><span class="dashicons dashicons-info info_info"></span></a>
    </td>
</tr>

<tr>
    <td colspan="2"><label class="lbl"><?php esc_html_e( 'Slider Display Options', 'WL_R_R_P' ); ?></label></td>
</tr>
<tr>
    <th><label><?php esc_html_e( 'Total Posts To Show', 'WL_R_R_P' ); ?></label></th>
    <td>
        <input class="slider" type="range" min="1" max="10" step="1"
        value="<?php if ( ! isset( $total_post_value ) ) {
            echo esc_attr($total_post_value = "5");
            } else {
                echo esc_attr($total_post_value);
            } ?>" data-orientation="vertical" id="total_post_value" name="total_post_value"
            oninput="total_post(value);"/>
            <span id="name_set_span_value" name="name_set_span_value"
            class="total_post_span rang_span_style"><?php echo esc_html($total_post_value); ?></span>
            <a href="#" id="a5" data-tooltip="#b5"><span class="dashicons dashicons-info info_info"></span></a>
        </td>
    </tr>
    <tr>
        <th><label><?php esc_html_e( 'Sliding Arrow Color', 'WL_R_R_P' ); ?></label></th>
    
        <td>
            <input type="text" id="arrow_color" class="color-field" name="arrow_color"  value="<?php if (isset($arrow_color)) { esc_html_e($arrow_color);
            } ; ?>"  />

            <a href="#" id="a9" data-tooltip="#b9"><span class="dashicons dashicons-info info_info"></span></a>
        </td>
    </tr>

    <tr>
        <th><label><?php esc_html_e( 'Sliding Arrow Size', 'WL_R_R_P' ); ?></label></th>
        <td>
            <input class="slider" type="range" min="10" max="50" step="1"
            value="<?php if ( ! isset( $sliding_arrows_size ) ) {
                echo esc_attr($sliding_arrows_size = "50");
                } else {
                    echo esc_attr($sliding_arrows_size); } ?>" data-orientation="vertical" id="sliding_arrows_size" name="sliding_arrows_size"
                oninput="slider_arrow_size(value);"/>
                <span id="name_set_span_value" name="name_set_span_value"
                class="slider_arrow_span rang_span_style"><?php esc_html_e($sliding_arrows_size); ?> </span>
                <a href="#" id="a10" data-tooltip="#b10"><span class="dashicons dashicons-info info_info"></span></a>
            </td>
        </tr>
        <tr>
            <th><label><?php esc_html_e( 'Slider Speed', 'WL_R_R_P' ); ?></label></th>
            <?php if ( ! isset( $slider_speed ) ) {
                $slider_speed = "medium";
            } else {
                $slider_speed;
            } ?>
            <td>
                <input type="radio" name="slider_speed" id="slider_speed"
                value="<?php echo esc_attr( 'slow' );?>" <?php checked( 'slow', $slider_speed ); ?>
                onclick="displayed_text(this.value);"> <?php esc_html_e( 'Slow', 'WL_R_R_P' ); ?>
                <input type="radio" name="slider_speed" id="slider_speed"
                value="<?php echo esc_attr( 'medium' );?>" <?php checked( 'medium', $slider_speed ); ?>
                onclick="displayed_text(this.value);"> <?php esc_html_e( 'Medium', 'WL_R_R_P' ); ?>
                <a href="#" id="a11" data-tooltip="#b11"><span class="dashicons dashicons-info info_info"></span></a>
            </td>
        </tr>

        <tr>
            <td colspan="2"><label class="lbl"><?php esc_html_e( 'BackgroundColor', 'WL_R_R_P' ); ?></label></td>
        </tr>
        <tr>
            <th><label><?php esc_html_e( 'BackgroundColor', 'WL_R_R_P' ); ?></label></th>
          
            <td>
                 <input type="text" id="back_ground_color" class="color-field" name="back_ground_color"  value="<?php if (isset($back_ground_color)) { echo esc_attr($back_ground_color);
            } ; ?>"  />

                <a href="#" id="a12" data-tooltip="#b12"><span class="dashicons dashicons-info info_info"></span></a>
            </td>
        </tr>
        <tr>
            <td colspan="2"><label class="lbl"><?php esc_html_e( 'Title option', 'WL_R_R_P' ); ?></label></td>
        </tr>
        <tr>
            <th><label><?php esc_html_e( 'Use Title As Link ', 'WL_R_R_P' ); ?></label></th>
            <?php if ( ! isset( $title_link ) ) {
                $title_link = "yes";
            } else {
                $title_link;
            } ?>
            <td>
                <input type="radio" name="title_link" id="title_link"
                value=" <?php echo esc_attr( 'yes' );?>" <?php checked( 'yes', $title_link ); ?> ><?php esc_html_e( 'Yes', 'WL_R_R_P' ); ?>
                <a href="#" id="a13_1" data-tooltip="#b13_1"><span class="dashicons dashicons-info info_info"></span></a>
                <input type="radio" name="title_link" id="title_link"
                value="<?php echo esc_attr( 'no' );?>" <?php checked( 'no', $title_link ); ?>><?php esc_html_e( 'No', 'WL_R_R_P' ); ?>
                <a href="#" id="a13_2" data-tooltip="#b13_2"><span class="dashicons dashicons-info info_info"></span></a>
            </td>
        </tr>
        <tr>
            <th><label><?php esc_html_e( 'Number Of Letters In Title', 'WL_R_R_P' ); ?></label></th>
            <td>
                <input class="slider" type="range" min="0" max="50" step="1"
                value="<?php if ( ! isset( $charcter_limit ) ) {
                    echo esc_attr($charcter_limit = "30");
                    } else {
                        echo esc_attr($charcter_limit);
                    } ?>" data-orientation="vertical" id="charcter_limit" name="charcter_limit"
                    oninput="title_limit(value);"/>
                    <span id="name_set_span_value" name="name_set_span_value"
                    class="title_limit rang_span_style"><?php echo esc_html($charcter_limit); ?></span>
                    <a href="#" id="a14" data-tooltip="#b14"><span class="dashicons dashicons-info info_info"></span></a>
                </td>
            </tr>
            <tr>
                <th><label><?php esc_html_e( 'Font size', 'WL_R_R_P' ); ?></label></th>
                <td>
                    <input class="slider" type="range" min="8" max="32" step="1"
                    value="<?php if ( ! isset( $char_font_size ) ) {
                        echo esc_attr($char_font_size = "24");
                        } else {
                            echo esc_attr($char_font_size);
                        } ?>" data-orientation="vertical" id="char_font_size" name="char_font_size"
                        oninput="outputUpdate_title(value);"/>
                        <span id="name_set_span_value" name="name_set_span_value"
                        class="ti_tle rang_span_style"><?php echo esc_html($char_font_size); ?></span>
                        <a href="#" id="a15" data-tooltip="#b15"><span class="dashicons dashicons-info info_info"></span></a>
                    </td>
                </tr>
                <tr>
                    <th><label><?php esc_html_e( 'Font Text Color', 'WL_R_R_P' ); ?></label></th>
                   
                    <td>
                        
                        <input type="text" id="char_color" class="color-field" name="char_color"  value="<?php if (isset($char_color)) { echo esc_attr($char_color); } ; ?>"  />
                       
                        <a href="#" id="a16" data-tooltip="#b16"><span class="dashicons dashicons-info info_info"></span></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><label class="lbl"><?php esc_html_e( 'Description option', 'WL_R_R_P' ); ?></label></td>
                </tr>
                <tr>
                    <th><label><?php esc_html_e( 'Number Of Letters In Description', 'WL_R_R_P' ); ?></label></th>
                    <td>
                        <input class="slider" type="range" min="0" max="200" step="1"
                        value="<?php if ( ! isset( $dis_char_lmit ) ) {
                            echo esc_attr($dis_char_lmit = "200");
                            } else {
                                echo esc_attr($dis_char_lmit);
                            } ?>" data-orientation="vertical" id="dis_char_lmit" name="dis_char_lmit"
                            oninput=" description_limit(value);"/>
                            <span id="name_set_span_value" name="name_set_span_value" class="dis_limit rang_span_style"
                            style="width:35px;"><?php echo esc_html($dis_char_lmit); ?></span>
                            <a href="#" id="a17" data-tooltip="#b17"><span class="dashicons dashicons-info info_info"></span></a>
                        </td>
                    </tr>
                    <tr>
                        <th><label><?php esc_html_e( 'Font Size', 'WL_R_R_P' ); ?></label></th>
                        <td>
                            <input class="slider" type="range" min="8" max="24" step="1" value="<?php if ( ! isset( $dis_font_size ) ) {
                                echo esc_attr($dis_font_size = "16");
                                } else {
                                    echo esc_attr($dis_font_size);
                                } ?>" data-orientation="vertical" id="dis_font_size" name="dis_font_size"
                                oninput="outputUpdate_des(value);"/>
                                <span id="name_set_span_value" name="name_set_span_value"
                                class="discri_ption rang_span_style"><?php echo esc_html($dis_font_size) ?></span>
                                <a href="#" id="a18" data-tooltip="#b18"><span class="dashicons dashicons-info info_info"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <th><label><?php esc_html_e( 'Font Text Color', 'WL_R_R_P' ); ?></label></th>
                           
                            <td>
                                <input type="text" id="dis_text_Color" class="color-field" name="dis_text_Color"  value="<?php if (isset($dis_text_Color)) { echo esc_attr($dis_text_Color);
                                } ; ?>"  />
                                
                                <a href="#" id="a19" data-tooltip="#b19"><span class="dashicons dashicons-info info_info"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><label class="lbl"><?php esc_html_e( 'Date option', 'WL_R_R_P' ); ?></label></td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'Date', 'WL_R_R_P' ); ?></th>
                            <?php if ( ! isset( $show_hide ) ) {
                                $show_hide = "show";
                            } ?>
                            <td>
                                <input type="radio" name="show_hide" id="show_hide" value="<?php echo esc_attr( 'show' );?>" <?php checked( 'show', $show_hide ); ?>
                                onclick="date_text_hide(this.value);"><?php esc_html_e( 'Yes', 'WL_R_R_P' ); ?>
                                <a href="#" id="a20_1" data-tooltip="#b20_1"><span class="dashicons dashicons-info info_info"></span></a>
                                <input type="radio" name="show_hide" id="show_hide" value="<?php echo esc_attr( 'hide' );?>" <?php checked( 'hide', $show_hide ); ?>
                                onclick="date_text_hide(this.value);"><?php esc_html_e( 'No', 'WL_R_R_P' ); ?>
                                <a href="#" id="a20_2" data-tooltip="#b20_2"><span class="dashicons dashicons-info info_info"></span></a>
                            </td>
                        </tr>
                        <tr class="my_date_option" <?php if ( $show_hide == "hide" ) {
                            echo  esc_attr("style='display: none;'");
                        } ?>>
                        <th><label><?php esc_html_e( 'Font size', 'WL_R_R_P' ); ?></label></th>
                        <td>
                            <input class="slider" type="range" min="12" max="32" step="1"
                            value="<?php if ( ! isset( $date_font_size ) ) {
                                echo esc_attr($date_font_size = "14");
                                } else {
                                    echo esc_attr($date_font_size);
                                } ?>" data-orientation="vertical" id="date_font_size" name="date_font_size"
                                oninput="outputUpdate(value);"/>
                                <span id="name_set_span_value" name="name_set_span_value"
                                class="volum rang_span_style"><?php echo esc_html($date_font_size); ?></span>
                                <a href="#" id="a21" data-tooltip="#b21"><span class="dashicons dashicons-info info_info"></span></a>
                            </td>
                        </tr>
                        <tr class="my_date_option" <?php if ( $show_hide == "hide" ) {
                            echo esc_attr("style='display: none;'");
                        } ?>>
                        <th><label><?php esc_html_e( 'Font Text Color', 'WL_R_R_P' ); ?></label></th>
                       
                        <td>
                            <input type="text" id="date_font_color" class="color-field" name="date_font_color"  value="<?php if (isset($date_font_color)) { echo esc_attr($date_font_color);
                            } ; ?>"  />
                            <a href="#" id="a22" data-tooltip="#b22"><span class="dashicons dashicons-info info_info"></span></a>
                        </td>
                    </tr>
                    <tr class="my_date_option" <?php if ( $show_hide == "hide" ) {
                        echo esc_attr("style='display: none;'");
                    } ?>>
                    <th><label><?php esc_html_e( 'BackgroundColor', 'WL_R_R_P' ); ?></label></th>
                   
                    <td>
                        <input type="text" id="date_back_Color" class="color-field" name="date_back_Color"  value="<?php if (isset($date_back_Color)) { echo esc_attr($date_back_Color);
                            } ; ?>"  />
                       
                        <a href="#" id="a23" data-tooltip="#b23"><span class="dashicons dashicons-info info_info"></span></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><label class="lbl"><?php esc_html_e( 'Link option', 'WL_R_R_P' ); ?></label></td>
                </tr>
                <tr>
                    <th><label> <?php esc_html_e( 'Text', 'WL_R_R_P' ); ?></label></th>
                    <td>
                        <input class="widefat" id="link_text" name="link_text" type="text"
                        value="<?php if ( ! isset( $link_text ) ) {
                            echo esc_attr($link_text = "Read More");
                            } else {
                                echo esc_attr($link_text);
                            } 
                            ?>" style="width:50%;" maxlength="20"/>
                            <a href="#" id="a25" data-tooltip="#b25"><span class="dashicons dashicons-info info_info"></span></a>
                            <b><p class="description"><?php esc_html_e( 'Maximum charcter Limit 20.', 'WL_R_R_P' ) ?></p></b>
                        </td>
                    </tr>
                    <tr>
                        <th><label><?php esc_html_e( 'Font size', 'WL_R_R_P' ); ?></label></th>
                        <td>
                            <input class="slider" type="range" min="8" max="32" step="1"
                            value="<?php if ( ! isset( $link_font_size ) ) {
                                echo esc_attr($link_font_size = "14");
                                } else {
                                    echo esc_attr($link_font_size);
                                } ?>" data-orientation="vertical" id="link_font_size" name="link_font_size"
                                oninput="outputUpdate_link(value);"/>
                                <span id="name_set_span_value" name="name_set_span_value"
                                class="link_font rang_span_style"><?php echo esc_html($link_font_size); ?></span>
                                <a href="#" id="a26" data-tooltip="#b26"><span class="dashicons dashicons-info info_info"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <th><label><?php esc_html_e( 'Font Text Color', 'WL_R_R_P' ); ?></label></th>
                            <?php if ( ! isset( $link_font_Color ) ) {
                                $link_font_Color = "#FFFFFF";
                            } ?>
                            <td>
                                 <input type="text" id="link_font_Color" class="color-field" name="link_font_Color"  value="<?php if (isset($link_font_Color)) { echo esc_attr($link_font_Color);
                            } ; ?>"  />
                               
                                <a href="#" id="a27" data-tooltip="#b27"><span class="dashicons dashicons-info info_info"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <th><label><?php esc_html_e( 'BackgroundColor', 'WL_R_R_P' ); ?></label></th>
                           
                            <td>
                                <input type="text" id="link_back_Color" class="color-field" name="link_back_Color"  value="<?php if (isset($link_back_Color)) { echo esc_attr($link_back_Color);
                            } ; ?>"  />
                                
                                <a href="#" id="a28" data-tooltip="#b28"><span class="dashicons dashicons-info info_info"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <th><label><?php esc_html_e( 'BackgroundColor On Hover', 'WL_R_R_P' ); ?></label></th>

                            <?php if ( ! isset( $hover_Color ) ) {
                                $hover_Color = "#FFFFFF";
                            } ?>
                            <td>
                                 <input type="text" id="hover_Color" class="color-field" name="hover_Color"  value="<?php if (isset($hover_Color)) { echo esc_attr($hover_Color);
                            } ; ?>"  />
                                
                                <a href="#" id="a29" data-tooltip="#b29"><span class="dashicons dashicons-info info_info"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <th><label><?php esc_html_e( 'Font Text Color On Hover', 'WL_R_R_P' ); ?></label></th>

                           
                            <td>
                                <input type="text" id="hover_text_color" class="color-field" name="hover_text_color"  value="<?php if (isset($hover_text_color)) { echo esc_attr($hover_text_color);
                            } ; ?>"  />
                               
                                <a href="#" id="a30" data-tooltip="#b30"><span class="dashicons dashicons-info info_info"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><label class="lbl"><?php esc_html_e( ' Bottom Border option', 'WL_R_R_P' ); ?></label></td>
                        </tr>
                        <tr>
                            <th><label><?php esc_html_e( 'Border Style', 'WL_R_R_P' ); ?></label></th>
                            <td> <?php if ( ! isset( $bottom_bdr_type ) ) {
                                $bottom_bdr_type = "none";
                            } ?>
                            <select name="bottom_bdr_type" id="bottom_bdr_type">
                                <?php $options_bdr_type = array( 'none', 'dotted', 'solid' );
                                foreach ( $options_bdr_type as $option_bdr_type_img ) {
                                    echo '<option
                                    value="' . esc_attr( $option_bdr_type_img ) . '"
                                    id="' . esc_attr( $option_bdr_type_img ) . '"',
                                    $bottom_bdr_type == $option_bdr_type_img ? ' selected="selected"' : '', '>',
                                    $option_bdr_type_img, '</option>';
                                }
                                ?>
                            </select>
                            <a href="#" id="a32" data-tooltip="#b32"><span class="dashicons dashicons-info info_info"></span></a>
                        </td>
                    </tr>
                    <tr>
                        <th><label><?php esc_html_e( 'Border Size', 'WL_R_R_P' ); ?></label></th>
                        <td>
                            <input class="slider" type="range" min="1" max="10" step="1"
                            value="<?php if ( ! isset( $bottom_bdr_size ) ) {
                                echo esc_attr( $bottom_bdr_size = "3" );
                                } else {
                                    echo esc_attr( $bottom_bdr_size ); } ?>" data-orientation="vertical" id="bottom_bdr_size" name="bottom_bdr_size"
                                oninput="border_bottom_bdr(value);"/>
                                <span class="bottom_border_span rang_span_style" id="img_bdr_span_value"
                                name="img_bdr_span_value"><?php echo esc_html( $bottom_bdr_size ); ?></span>
                                <a href="#" id="a33" data-tooltip="#b33"><span class="dashicons dashicons-info info_info"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <th><label><?php esc_html_e( 'Border Color', 'WL_ABTM_TXT_DM' ); ?></label></th>
                           
                            <td>
                                <input type="text" id="bottom_bdr_color" class="color-field" name="bottom_bdr_color" value="<?php if (isset($bottom_bdr_color)) { echo esc_attr($bottom_bdr_color);
                            } ; ?>"  />
                                
                                <a href="#" id="a34" data-tooltip="#b34"><span class="dashicons dashicons-info info_info"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><label class="lbl"><?php esc_html_e( 'Font Family', 'WL_R_R_P' ); ?></label></td>
                        </tr>

                        <tr>
                            <th><label><?php esc_html_e( 'Font Family', 'WL_ABTM_TXT_DM' ); ?></label></th>
                            <td>    <?php if ( ! isset( $NWT_Font_Style ) ) {
                                $NWT_Font_Style = "Sans";
                            } ?>
                            <select name="NWT_Font_Style" id="NWT_Font_Style" class="standard-dropdown">
                                <optgroup label="Default Fonts">
                    <option value="<?php echo esc_attr('Arial Black');?>" <?php selected( $NWT_Font_Style, 'Arial Black' ); ?>><?php echo esc_html('Arial Black'); ?> </option>
                    <option value="<?php echo esc_attr('Courier New');?>" <?php selected( $NWT_Font_Style, 'Courier New' ); ?>><?php echo esc_html('Courier New'); ?></option>
                    <option value="<?php echo esc_attr( 'cursive' );?>"   <?php selected( $NWT_Font_Style, 'cursive' ); ?>><?php echo esc_html('Cursive'); ?></option>
                    <option value="<?php echo esc_attr( 'fantasy' );?>"   <?php selected( $NWT_Font_Style, 'fantasy' ); ?>><?php echo esc_html('Fantasy'); ?></option>
                    <option value="<?php echo esc_attr( 'Georgia' );?>"   <?php selected( $NWT_Font_Style, 'Georgia' ); ?>><?php echo esc_html('Georgia'); ?></option>
                    <option value="<?php echo esc_attr( 'Grande' );?>"    <?php selected( $NWT_Font_Style, 'Grande' ); ?>><?php echo esc_html('Grande'); ?></option>
                    <option value="<?php echo esc_attr( 'Helvetica Neue ' );?>" <?php selected( $NWT_Font_Style, 'Helvetica Neue' ); ?>><?php echo esc_html('Helvetica Neue'); ?></option>
                    <option value="<?php echo esc_attr( 'Impact' );?>" <?php selected( $NWT_Font_Style, 'Impact' ); ?>><?php echo esc_html('Impact'); ?></option>
                    <option value="<?php echo esc_attr( 'Lucida' );?>" <?php selected( $NWT_Font_Style, 'Lucida' ); ?>><?php echo esc_html('Lucida'); ?></option>
                    <option value="<?php echo esc_attr( 'Lucida Console ' );?>"<?php selected( $NWT_Font_Style, 'Lucida Console' ); ?>><?php echo esc_html('Lucida Console'); ?></option>
                    <option value="<?php echo esc_attr( 'monospace' );?>" <?php selected( $NWT_Font_Style, 'monospace' ); ?>><?php echo esc_html('Monospace'); ?></option>
                    <option value="<?php echo esc_attr( 'Open Sans' );?>" <?php selected( $NWT_Font_Style, 'Open Sans' ); ?>><?php echo esc_html('Open Sans'); ?></option>
                    <option value="<?php echo esc_attr( 'Palatino' );?>" <?php selected( $NWT_Font_Style, 'Palatino' ); ?>><?php echo esc_html('Palatino'); ?></option>
                    <option value="<?php echo esc_attr( 'sans' );?>" <?php selected( $NWT_Font_Style, 'sans' ); ?>><?php echo esc_html('Sans'); ?></option>
                    <option value="<?php echo esc_attr( 'sans-serif' );?>" <?php selected( $NWT_Font_Style, 'sans-serif' ); ?>><?php echo esc_html('Sans-Serif'); ?></option>
                    <option value="<?php echo esc_attr( 'Tahoma' );?>" <?php selected( $NWT_Font_Style, 'Tahoma' ); ?>><?php echo esc_html('Tahoma'); ?></option>
                    <option value="<?php echo esc_attr( 'Times New Roman' );?>"<?php selected( $NWT_Font_Style, 'Times New Roman' ); ?>><?php echo esc_html('Times New Roman'); ?></option>
                    <option value="<?php echo esc_attr( 'Trebuchet MS' );?>" <?php selected( $NWT_Font_Style, 'Trebuchet MS' ); ?>><?php echo esc_html('Trebuchet MS'); ?> </option>
                    <option value="<?php echo esc_attr( 'Verdana' );?>" <?php selected( $NWT_Font_Style, 'Verdana' ); ?>><?php echo esc_html('Verdana'); ?></option></optgroup>

    </select>
    <a href="#" id="a35" data-tooltip="#b35"><span class="dashicons dashicons-info info_info"></span></a>
    <p class="description">
        <?php esc_html_e( 'Choose a caption font style.', 'WL_R_R_P' ) ?>
    </p>
</td>
</tr>
<tr>
    <td colspan="2">
        <label class="lbl"><?php esc_html_e( 'Custom CSS', 'WL_R_R_P' ); ?></label></td>
    </tr>
    <tr>
        <th><label><?php esc_html_e( 'Custom CSS', 'WL_R_R_P' ); ?></label></th>
        <td>
            <textarea class="widefat" id="nwt_custom_css" name="nwt_custom_css" style="width:50%;height: 125px;"
            placeholder="<?php esc_html_e( 'Enter custom css here', 'WL_R_R_P' ) ?>"><?php if ( ! isset( $nwt_custom_css ) ) {
                echo esc_html($nwt_custom_css = "");
            } else {
                echo esc_html($nwt_custom_css);
            } ?></textarea>
            <a href="#" id="a36" data-tooltip="#b36"><span class="dashicons dashicons-info info_custom"></span></a>
            <p class="description">
                <?php esc_html_e( 'Enter any custom css you want to apply on this gallery.', 'WL_R_R_P' ) ?><br>
            </p>
            <p class="custnote"><?php echo esc_html('Note: Please Do Not Use'); ?>  <b><?php echo esc_html('Style'); ?></b><?php echo esc_html('Tag With Custom CSS'); ?> </p>
        </td>
    </tr>
</table>
<?php
wp_register_script( 'rr_general_settings_script2', false );
wp_enqueue_script( 'rr_general_settings_script2');
$js = " ";
ob_start(); ?>
    jQuery(document).ready(function ($) {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() < 200) {
                jQuery('#smoothup').fadeOut();
            } else {
                jQuery('#smoothup').fadeIn();
            }
        });
        jQuery('#smoothup').on('click', function () {
            jQuery('html, body').animate({scrollTop: 0}, 'fast');
            return false;
        });
    });
<?php
$js .= ob_get_clean();
wp_add_inline_script( 'rr_general_settings_script2', $js );