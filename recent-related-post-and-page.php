<?php
/**
 * Plugin Name: Recent Related Post And Page
 * Version: 1.5.1
 * Description: Display the Recent, Related posts and pages with beautifully designs layouts and increase your post views. keep your audience on your site for longer by helping them discover the right content at the right time.
 * Author: Weblizar
 * Author URI: https://weblizar.com/
 * Plugin URI: https://wordpress.org/plugins/recent-related-post-and-page/
 */

defined('ABSPATH') || die();
define("WL_RP_PLUGIN_URL", plugin_dir_url(__FILE__));
define("WL_R_R_P", "WL_R_R_P");

add_filter('widget_text', 'do_shortcode');
add_action('plugins_loaded', 'WL_R_P_R_P_F');
/**
 * Load plugin text domain
 */
function WL_R_P_R_P_F()
{
    load_plugin_textdomain('WL_R_R_P', false, plugin_basename(dirname(__FILE__)) . '/languages');
}

add_action('admin_menu', 'r_p_a_r_p_submenu_Settings_Page');

function r_p_a_r_p_submenu_Settings_Page()
{
    add_submenu_page('edit.php?post_type=rp_and_rp', 'Author Settings ', 'Page/Post settings', 'administrator', 'recent-related-post-and-page', 'weblizar_r_p_a_r_p_settings_function');
    add_submenu_page('edit.php?post_type=rp_and_rp', 'Help and Support ', 'Help and Support', 'administrator', 'recent-related-post-and-page_pro', 'weblizar_r_p_a_r_p_pro_page_function');
}

function weblizar_r_p_a_r_p_pro_page_function()
{
    require_once("recent-related-post-and-page-pro-help-and-support.php");
    wp_enqueue_style('rrpap-custom-css', WL_RP_PLUGIN_URL . 'css/rrpap-custom.css');
}

function weblizar_r_p_a_r_p_settings_function()
{
    wp_enqueue_script('jquery');
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('upload_media_widget', WL_RP_PLUGIN_URL . 'js/upload-media.js', array('jquery'), true, true);
    wp_enqueue_style('rp-color-picker-css', WL_RP_PLUGIN_URL . 'css/color-picker.css');
    wp_enqueue_script('post_page_rp_rp-tool-tip-js', WL_RP_PLUGIN_URL . 'tooltip/jquery.darktooltip.min.js', array('jquery'));
    wp_enqueue_style('post_page_rp_rp-tool-tip-css', WL_RP_PLUGIN_URL . 'tooltip/darktooltip.min.css');
    require_once("page-post-settings.php");
}


function weblizar_RP_RP_Plugin_Scripts()
{
    //js scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('rp_and_rp-jquery-slider', WL_RP_PLUGIN_URL . 'js/jquery.easy-ticker.js', array('jquery'), '', true);
    wp_enqueue_script('rprp-jquery-sliderPro-js', WL_RP_PLUGIN_URL . 'js/jquery.easing.min.js', array('jquery'), '', true);
    wp_enqueue_script('rpost_and_rpost-jquery-slide', WL_RP_PLUGIN_URL . 'js/jquery.easy-ticker.min.js', array('jquery'), '1.1.0', true);
}

add_action('wp_enqueue_scripts', 'weblizar_RP_RP_Plugin_Scripts');

class RP_RP_FREE
{
    public function __construct()
    {
        if (is_admin()) {
            add_action('init', array(&$this, 'rp_rp_shortcode'));
            add_action('add_meta_boxes', array(&$this, 'Add_all_recent_post_meta_boxes'), 1);
            add_action('admin_enqueue_scripts', array(&$this, 'my_rp_rp_style_files'), 1);
            add_action('save_post', array(&$this, 'Nwt_Save_meta_box_save'), 9, 1);
        }
    }

    public function my_rp_rp_style_files($hook)
    {
        if ($hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php') {
            return;
        }
        wp_enqueue_script('jquery');
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('theme-preview');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', WL_RP_PLUGIN_URL . 'js/upload-media.js', array('jquery'), true, true);
        wp_enqueue_style('rp-color-picker-css', WL_RP_PLUGIN_URL . 'css/color-picker.css');
        wp_enqueue_style('thickbox');
        wp_enqueue_script('rp_and_rp-jquery-slider_1', WL_RP_PLUGIN_URL . 'js/jquery.easy-ticker.js', array('jquery'), true, true);
        wp_enqueue_script('rprp-jquery-sliderPro-js_2', WL_RP_PLUGIN_URL . 'js/jquery.easing.min.js', array('jquery'), true, true);
        wp_enqueue_script('rpost_and_rpost-jquery-slide_3', WL_RP_PLUGIN_URL . 'js/jquery.easy-ticker.min.js', array('jquery'), true, true);

        //font awesome css
        wp_enqueue_style('font awesome', WL_RP_PLUGIN_URL . 'css/all.min.css');

        //tool-tip js & css
        wp_enqueue_script('rp_rp-tool-tip-js', WL_RP_PLUGIN_URL . 'tooltip/jquery.darktooltip.min.js', array('jquery'));
        wp_enqueue_style('rp_rp-tool-tip-css', WL_RP_PLUGIN_URL . 'tooltip/darktooltip.min.css');

        // enqueue style and script of code mirror
        wp_enqueue_style('rp_rp_codemirror-css', WL_RP_PLUGIN_URL . 'css/codemirror/codemirror.css');
        wp_enqueue_style('rp_rp_blackboard', WL_RP_PLUGIN_URL . 'css/codemirror/blackboard.css');
        wp_enqueue_style('rp_rp_show-hint-css', WL_RP_PLUGIN_URL . 'css/codemirror/show-hint.css');

        wp_enqueue_script('rp_rp_codemirror-js', WL_RP_PLUGIN_URL . 'css/codemirror/codemirror.js', array('jquery'));
        wp_enqueue_script('rp_rp_css-js', WL_RP_PLUGIN_URL . 'css/codemirror/rp_rp-css.js', array('jquery'));
        wp_enqueue_script('rp_rp_css-hint-js', WL_RP_PLUGIN_URL . 'css/codemirror/css-hint.js', array('jquery'));
    }

    // Register Custom Post Type
    public function rp_rp_shortcode()
    {
        $labels = array(
            'name' => esc_html__('Recent Related Post And Page', 'post type general name', 'rp_and_rp'),
            'singular_name' => esc_html__('Recent Related Post And Page', 'post type singular name', 'rp_and_rp'),
            'menu_name' => esc_html__('RR Post And Page', 'rp_and_rp'),
            'add_new' => esc_html__('Add New', 'rp_and_rp'),
            'add_new_item' => esc_html__('Add New', 'rp_and_rp'),
            'edit_item' => esc_html__('Edit Recent Related Post And Page', 'rp_and_rp'),
            'new_item' => esc_html__('New Recent Related Post And Page', 'rp_and_rp'),
            'view_item' => esc_html__('View Recent Related Post And Page', 'rp_and_rp'),
            'search_items' => esc_html__('Search Recent Related Post And Page', 'rp_and_rp'),
            'not_found' => esc_html__('No data found', 'rp_and_rp'),
            'not_found_in_trash' => esc_html__('No data found in Trash', 'rp_and_rp'),
            'parent_item_colon' => esc_html__('Parent Recent Related Post And Page:', 'rp_and_rp'),
            'all_items' => esc_html__('All Shortcode', 'rp_and_rp'),
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'supports' => array('title'),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 65,
            'menu_icon' => 'dashicons-feedback',
            'show_in_nav_menus' => false,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => false,
            'capability_type' => 'post'
        );
        register_post_type('rp_and_rp', $args);
        add_filter('manage_edit-rp_and_rp_columns', array(&$this, 'rp_and_rp_columns'));
        add_action('manage_rp_and_rp_posts_custom_column', array(&$this, 'rp_and_rp_manage_columns'), 10, 2);
    }

    public function rp_and_rp_columns($columns)
    {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => esc_html('Recent Related Post And Page'),
            'shortcode' => esc_html('Recent Related Post And Page Shortcode'),
            'author' => esc_html('Author'),
            'date' => esc_html('Date')
        );

        return $columns;
    }

    public function rp_and_rp_manage_columns($column, $post_id)
    {
        global $post;
        switch ($column) {
            case 'shortcode':
                echo '<input type="text" value="[RRPP id=' . $post_id . ']" readonly="readonly" />';
                break;
            default:
                break;
        }
    }

    //add metaboxes
    public function Add_all_recent_post_meta_boxes()
    {
        add_meta_box(esc_html__(' Add Images', 'WL_R_R_P'), esc_html__('Select Template', 'WL_R_R_P'), array(
        &
            $this,
            'post_image_meta_box_setting_function'
        ), 'rp_and_rp', 'normal', 'low');

        add_meta_box(esc_html__('Add settings', 'WL_R_R_P'), esc_html__('Add settings', 'WL_R_R_P'), array(
        &
            $this,
            'post_data_meta_box_setting_function'
        ), 'rp_and_rp', 'normal', 'low');

        add_meta_box(esc_html__('Recent Related Post And Page Box', 'WL_R_R_P'), esc_html__(' Recent Related Post And Page Shortcode', 'WL_R_R_P'), array(
        &
            $this,
            'shotcode_meta_box_function'
        ), 'rp_and_rp', 'side', 'low');

        add_meta_box(esc_html__('Recent Related Post And Page Pro', 'WL_R_R_P'), esc_html__('Related Recent Post And Page Preview Box', 'WL_R_R_P'), array(
        &
            $this,
            'rp_rp_preview_box'
        ), 'rp_and_rp', 'side', 'low');

        add_meta_box(esc_html__('Recent Related Post And Page Widget', 'WL_R_R_P'), esc_html__('Recent Related Post And Page Widget', 'WL_R_R_P'), array(
        &
            $this,
            'rp_rp_use_widget_meta_box'
        ), 'rp_and_rp', 'side', 'low');
    }

    //add setting page of general settings
    public function post_image_meta_box_setting_function($post)
    {
        require("settings/template-settings.php");
    }

    public function post_data_meta_box_setting_function($post)
    {
        require("settings/general-settings.php");
    }

    //display short code on custom post type page
    public function shotcode_meta_box_function()
    { ?>
        <p><?php esc_html_e("Use below shortcode in any Page/Post to publish your Recent Related Post And Page", 'WL_R_R_P'); ?>
        </p>
        <input readonly="readonly" type="text" value="<?php echo esc_attr("[RRPP id=" . get_the_ID() . "]"); ?>">
        <?php
    }

    public function rp_rp_preview_box()
    {
        if (isset($_REQUEST['post'])) {
            echo '<div style="text-align:center;padding:10px 0;">' . '<h3 align="center">' . esc_html__('Click here to preview', 'WL_R_R_P') . '</h3>' . '<input alt="#TB_inline?height=800&amp;width=750&amp;inlineId=A_B_t_Popup1" title="About me shortcode and widget pro preview" class="button-primary thickbox" type="button" value="Preview" /></div>';
            $ABT = $_REQUEST['post'];
            echo '<div id="A_B_t_Popup1"  style="width:100%;height:100%;display:none"> <h2>' . esc_html__('Preview', 'WL_R_R_P') . '</h2>' . do_shortcode('[RRPP id="' . $ABT . '"]') . '</div>';
        } else {
            echo '<h4 align="center">' . esc_html__('Please publish first to preview', 'WL_R_R_P') . '</h4>';
        }
    }

    public function rp_rp_use_widget_meta_box()
    {
        ?>
        <div>
            <p><?php esc_html_e("To activate widget into any widget area", 'WL_R_R_P'); ?></p>
            <p align="center"><a class="button button-primary button-hero"
                    href="<?php get_site_url(); ?>./widgets.php"><?php esc_html_e("Click Here", 'WL_R_R_P'); ?></a>.
            </p>
            <p><?php esc_html_e("Find", 'WL_R_R_P') ?>
                <b><?php esc_html_e("Recent Related Post And Page Widget", 'WL_R_R_P'); ?></b>
                <?php esc_html_e("and place it to your widget area. Select any Shortcode for the dropdown and save changes.", 'WL_R_R_P'); ?>
            </p>
        </div>
        <?php
    }

    //save data in database
    public function Nwt_Save_meta_box_save($PostID)
    {
        if (isset($_POST['post_order']) && isset($_POST['post_sta_tus'])) {
            $show_hide = sanitize_text_field($_POST['show_hide']);
            $bottom_bdr_color = sanitize_hex_color($_POST['bottom_bdr_color']);
            $bottom_bdr_size = absint($_POST['bottom_bdr_size']);
            $bottom_bdr_type = sanitize_text_field($_POST['bottom_bdr_type']);
            $date_back_Color = sanitize_hex_color($_POST['date_back_Color']);
            $sliding_arrows_size = absint($_POST['sliding_arrows_size']);
            $hover_text_color = sanitize_hex_color($_POST['hover_text_color']);
            $title_link = sanitize_text_field($_POST['title_link']);
            $img_bdr_color = sanitize_hex_color($_POST['img_bdr_color']);
            $img_bdr_type = sanitize_text_field($_POST['img_bdr_type']);
            $bdr_size = absint($_POST['bdr_size']);
            $layout = sanitize_text_field($_POST['layout']);
            $arrow_color = sanitize_hex_color($_POST['arrow_color']);
            $slider_speed = sanitize_text_field($_POST['slider_speed']);
            $hover_Color = sanitize_hex_color($_POST['hover_Color']);
            $total_post_value = sanitize_text_field($_POST['total_post_value']);
            $checkboxvar_post = sanitize_text_field($_POST['checkboxvar_post']);
            $checkboxvar_page = sanitize_text_field($_POST['checkboxvar_page']);
            $order_by = sanitize_text_field($_POST['order_by']);
            $post_sta_tus = sanitize_text_field($_POST['post_sta_tus']);
            $post_order = sanitize_text_field($_POST['post_order']);
            $charcter_limit = sanitize_text_field($_POST['charcter_limit']);
            $char_font_size = absint($_POST['char_font_size']);
            $char_color = sanitize_hex_color($_POST['char_color']);
            $back_ground_color = sanitize_hex_color($_POST['back_ground_color']);
            $dis_char_lmit = sanitize_text_field($_POST['dis_char_lmit']);
            $dis_font_size = absint($_POST['dis_font_size']);
            $dis_text_Color = sanitize_hex_color($_POST['dis_text_Color']);
            $date_font_size = absint($_POST['date_font_size']);
            $date_font_color = sanitize_hex_color($_POST['date_font_color']);
            $link_text = sanitize_text_field($_POST['link_text']);
            $link_font_size = absint($_POST['link_font_size']);
            $link_font_Color = sanitize_hex_color($_POST['link_font_Color']);
            $link_back_Color = sanitize_hex_color($_POST['link_back_Color']);
            $NWT_Font_Style = sanitize_text_field($_POST['NWT_Font_Style']);
            $nwt_custom_css = sanitize_text_field($_POST['nwt_custom_css']);

            $Tem_pl_at_e = sanitize_text_field($_POST['Tem_pl_at_e']);
            $NWTArray[] = array(

                'bottom_bdr_color' => $bottom_bdr_color,
                'bottom_bdr_size' => $bottom_bdr_size,
                'bottom_bdr_type' => $bottom_bdr_type,
                'date_back_Color' => $date_back_Color,
                'sliding_arrows_size' => $sliding_arrows_size,
                'hover_text_color' => $hover_text_color,
                'title_link' => $title_link,
                'img_bdr_color' => $img_bdr_color,
                'img_bdr_type' => $img_bdr_type,
                'bdr_size' => $bdr_size,
                'layout' => $layout,
                'arrow_color' => $arrow_color,
                'slider_speed' => $slider_speed,
                'hover_Color' => $hover_Color,
                'total_post_value' => $total_post_value,
                'checkboxvar_post' => $checkboxvar_post,
                'checkboxvar_page' => $checkboxvar_page,
                'order_by' => $order_by,
                'post_sta_tus' => $post_sta_tus,
                'post_order' => $post_order,
                'charcter_limit' => $charcter_limit,
                'char_font_size' => $char_font_size,
                'char_color' => $char_color,
                'back_ground_color' => $back_ground_color,
                'dis_char_lmit' => $dis_char_lmit,
                'dis_font_size' => $dis_font_size,
                'dis_text_Color' => $dis_text_Color,
                'date_font_size' => $date_font_size,
                'date_font_color' => $date_font_color,
                'link_text' => $link_text,
                'link_font_size' => $link_font_size,
                'link_font_Color' => $link_font_Color,
                'link_back_Color' => $link_back_Color,
                'NWT_Font_Style' => $NWT_Font_Style,
                'nwt_custom_css' => $nwt_custom_css,
                'show_hide' => $show_hide,
                'Tem_pl_at_e' => $Tem_pl_at_e,
            );
            $R_P_A_R_P_Settings_ = "R_P_A_R_P_Settings_" . $PostID;
            update_post_meta($PostID, $R_P_A_R_P_Settings_, serialize($NWTArray));
        }
    }
}

//create object of About_me_shorcode_and_widget class
global $RP_RP_FREE;
$RP_RP_FREE = new RP_RP_FREE();
require_once("recent-related-post-and-page-shortcode.php");
require_once("recent-related-post-and-page-widget-code.php");
//add media button fuction
add_action('media_buttons', 'weblizar_rp_rp_add_rpg_custom_button');
add_action('admin_footer', 'weblizar_rp_rp_add_rpg_inline_popup_content');
function weblizar_rp_rp_add_rpg_custom_button()
{
    $context = '';
    $container_id = 'RPRP';
    $title = esc_html__('Select  Recent Related Post And Page Shortcode to insert with content', 'WL_R_R_P');
    $context = '<a class="button button-primary thickbox"  title="' . esc_html__("Select Recent Related Post And Page Shortcode to insert into content", 'WL_R_R_P') . '"
	href="#TB_inline?width=400&inlineId=' . $container_id . '">
	' . esc_html__(" Related & Recent Posts", 'WL_R_R_P') . '
	</a>';

    echo esc_attr($context);
}

function weblizar_rp_rp_add_rpg_inline_popup_content()
{ ?>
    <?php
    wp_register_script('rr_post_page_script', false);
    wp_enqueue_script('rr_post_page_script');
    $js = " ";
    ob_start(); ?>
    jQuery(document).ready(function () {
    jQuery('#RP_RP_insert').on('click', function () {
    var id = jQuery('#rp_rp_post option:selected').val();
    window.send_to_editor('<p>[RRPP id=' + id + ']</p>');
    tb_remove();
    })
    });
    <?php
    $js .= ob_get_clean();
    wp_add_inline_script('rr_post_page_script', $js); ?>

    <div id="RPRP" style="display:none;">
        <?php $all_posts = wp_count_posts('rp_and_rp')->publish;
        if (!$all_posts == null) { ?>
            <h3><?php esc_html_e('Select Recent Related Post And Page Shortcode To Insert Into Post', 'WL_R_R_P'); ?></h3>
            <select id="rp_rp_post">
                <?php
                global $wpdb;
                $shortcodegallerys = $wpdb->get_results("SELECT post_title, ID FROM $wpdb->posts WHERE post_status = 'publish'	AND post_type='rp_and_rp' ");

                foreach ($shortcodegallerys as $shortcodegallery) {
                    if ($shortcodegallery->post_title) {
                        $title_var = $shortcodegallery->post_title;
                    } else {
                        $title_var = "(no title)";
                    }
                    echo "<option value='" . $shortcodegallery->ID . "'>" . $title_var . "</option>";
                } ?>
            </select>
            <button class='button primary'
                id='RP_RP_insert'><?php esc_html_e('Insert Recent Related Post And Page Shortcode', 'WL_R_R_P'); ?></button>
        <?php } else { ?>
            <h1 align="center"><?php esc_html_e('No Shortcode Found', 'WL_R_R_P'); ?></h1><?php
        }
        ?>
    </div>
    <?php
}

function weblizar_Load_related_post_and_page_info_after_post_content($content)
{
    if (is_single() && get_post_type($post = get_post()) == "post") {
        $ABio_settings = unserialize(get_option('rp_rp_info_Settings'));
        $use_post = isset($ABio_settings[0]['post_rp_rp_short_code']) ? $ABio_settings[0]['post_rp_rp_short_code'] : null;
        $switch_off_post = isset($ABio_settings[0]['switch_off_post']) ? $ABio_settings[0]['switch_off_post'] : null;
        if ($switch_off_post == 'yes') {
            if ($use_post) {
                $content .= weblizar_page_post_r_p_a_r_p($use_post);
            }
        }
    }

    return $content;
}

add_filter("the_content", "weblizar_Load_related_post_and_page_info_after_post_content", 20);

function weblizar_Load_related_post_and_page_info_after_page_content($content)
{
    if (!is_single() && get_post_type($post = get_post()) == "page") {
        $ABio_settings = unserialize(get_option('rp_rp_info_Settings'));
        if (isset($ABio_settings[0]['page_rp_rp_short_code']) && isset($ABio_settings[0]['switch_off_page'])) {
            $use_page = $ABio_settings[0]['page_rp_rp_short_code'];
            $switch_off_page = $ABio_settings[0]['switch_off_page'];
            if ($switch_off_page == 'yes') {
                if ($use_page) {
                    $content .= weblizar_page_post_r_p_a_r_p($use_page);
                }
            }
        }
    }

    return $content;
}

add_filter("the_content", "weblizar_Load_related_post_and_page_info_after_page_content", 20);
require_once("on-page-post-settings/on-page-post-shortcode.php");

// Add settings link on plugin page
function rrpp_settings_link($links)
{
    $rrpp_settings_link = '<a href="edit.php?post_type=rp_and_rp">' . esc_html__('Settings', 'WL_R_R_P') . '</a>';
    $rrpp_pro_link = '<a style="font-weight:700; color:#e35400" target="_blank" href="https://weblizar.com/plugins/recent-related-post-and-page-pro/">' . esc_html__('Get Premium', 'WL_R_R_P') . '</a>';
    array_unshift($links, $rrpp_pro_link, $rrpp_settings_link);

    return $links;
}

$rrpp_plugin_name = plugin_basename(__FILE__);
add_filter("plugin_action_links_$rrpp_plugin_name", 'rrpp_settings_link');