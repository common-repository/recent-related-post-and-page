<?php
defined('ABSPATH') || die(); $a; ?>
<?php 
wp_register_style( 'rr_page_short_style', false );
wp_enqueue_style( 'rr_page_short_style' );
$css = " ";
ob_start(); ?>
    slider_div_<?php echo esc_attr($p_o_s_t); ?>.vticker_<?php echo esc_attr($p_o_s_t).$a; ?> {
        border: 10px solid black;
        width: auto;
    }
    #up_<?php echo esc_attr($p_o_s_t)?>.carousel-control-up {
        position: absolute !important;
        top: 40% !important;
        left: 0px !important;
        font-size: <?php echo esc_attr($sliding_arrows_size); ?>px !important;
        color: <?php echo esc_attr($arrow_color)?> !important;
        border: none !important;
        text-decoration: none !important;
    }
    #down_<?php echo esc_attr($p_o_s_t);?>.carousel-control-down {
        left: auto;
        right: 0px !important;
        position: absolute !important;
        top: 40% !important;
        font-size: <?php echo esc_attr($sliding_arrows_size); ?>px !important;
        color: <?php echo esc_attr($arrow_color)?> !important;
        border: none !important;
        text-decoration: none !important;
    }
    a {
        box-shadow: 0 0px 0 0 currentColor !important;
    }
    a:focus {
        outline: none !important;
    }
<?php
$css .= ob_get_clean();
wp_add_inline_style( 'rr_page_short_style', $css ); ?>

<?php
wp_register_script( 'rr_page_short_script', false );
wp_enqueue_script( 'rr_page_short_script' );
$js = " ";
ob_start(); ?>
    jQuery(document).ready(function () {

        jQuery('.vticker_<?php echo esc_attr( $p_o_s_t ) . $a; ?>').easyTicker({
            direction: 'up',
            easing: 'linear',
            speed: '<?php echo esc_attr($slider_speed); ?>',
            interval: 3000,
            height: 'auto',
            visible: 1,
            mousePause: 0,
            controls: {
                up: '.upper_<?php echo esc_attr( $p_o_s_t ) . $a?>',
                down: '.downer_<?php echo esc_attr( $p_o_s_t ) . $a?>',
                toggle: '.toggle',
            }
        }).data('easyTicker');
    });
<?php
$js .= ob_get_clean();
wp_add_inline_script( 'rr_page_short_script', $js ); ?>