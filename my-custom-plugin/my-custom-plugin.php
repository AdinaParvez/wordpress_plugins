<?php
/**
 * Plugin Name: My Custom Plugin
 * Plugin URI: https://github.com/AdinaParvez/wordpress_plugins
 * Description: A customized WordPress plugin with various features including shortcodes, admin menus, and custom functionality.
 * Version: 1.0.0
 * Author: Adina Parvez
 * Author URI: https://github.com/AdinaParvez
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: my-custom-plugin
 * Domain Path: /languages
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('MCP_VERSION', '1.0.0');
define('MCP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MCP_PLUGIN_URL', plugin_dir_url(__FILE__));
define('MCP_PLUGIN_FILE', __FILE__);

/**
 * Plugin Activation Hook
 */
function mcp_activate_plugin() {
    // Set default options
    add_option('mcp_activation_time', current_time('mysql'));
    add_option('mcp_plugin_version', MCP_VERSION);
    
    // Flush rewrite rules
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'mcp_activate_plugin');

/**
 * Plugin Deactivation Hook
 */
function mcp_deactivate_plugin() {
    // Clean up options if needed
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'mcp_deactivate_plugin');

/**
 * Load plugin text domain for translations
 */
function mcp_load_textdomain() {
    load_plugin_textdomain('my-custom-plugin', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'mcp_load_textdomain');

/**
 * Enqueue plugin styles and scripts
 */
function mcp_enqueue_scripts() {
    // Enqueue CSS
    wp_enqueue_style('mcp-styles', MCP_PLUGIN_URL . 'assets/css/style.css', array(), MCP_VERSION);
    
    // Enqueue JavaScript
    wp_enqueue_script('mcp-scripts', MCP_PLUGIN_URL . 'assets/js/script.js', array('jquery'), MCP_VERSION, true);
    
    // Localize script for AJAX
    wp_localize_script('mcp-scripts', 'mcpAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('mcp_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'mcp_enqueue_scripts');

/**
 * Register custom shortcode
 * Usage: [custom_welcome name="John"]
 */
function mcp_custom_welcome_shortcode($atts) {
    $atts = shortcode_atts(array(
        'name' => 'Guest',
        'message' => 'Welcome to our website!'
    ), $atts);
    
    $output = '<div class="mcp-welcome-box">';
    $output .= '<h3>' . esc_html($atts['message']) . '</h3>';
    $output .= '<p>Hello, ' . esc_html($atts['name']) . '!</p>';
    $output .= '</div>';
    
    return $output;
}
add_shortcode('custom_welcome', 'mcp_custom_welcome_shortcode');

/**
 * Add custom admin menu
 */
function mcp_add_admin_menu() {
    add_menu_page(
        __('My Custom Plugin', 'my-custom-plugin'),
        __('My Custom Plugin', 'my-custom-plugin'),
        'manage_options',
        'my-custom-plugin',
        'mcp_admin_page',
        'dashicons-admin-plugins',
        30
    );
    
    add_submenu_page(
        'my-custom-plugin',
        __('Settings', 'my-custom-plugin'),
        __('Settings', 'my-custom-plugin'),
        'manage_options',
        'my-custom-plugin-settings',
        'mcp_settings_page'
    );
}
add_action('admin_menu', 'mcp_add_admin_menu');

/**
 * Admin page callback
 */
function mcp_admin_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <div class="mcp-admin-content">
            <h2><?php _e('Welcome to My Custom Plugin', 'my-custom-plugin'); ?></h2>
            <p><?php _e('This is a customized WordPress plugin with various features.', 'my-custom-plugin'); ?></p>
            
            <div class="card">
                <h3><?php _e('Features', 'my-custom-plugin'); ?></h3>
                <ul>
                    <li><?php _e('Custom shortcodes for content', 'my-custom-plugin'); ?></li>
                    <li><?php _e('Admin menu integration', 'my-custom-plugin'); ?></li>
                    <li><?php _e('Custom post types support', 'my-custom-plugin'); ?></li>
                    <li><?php _e('AJAX functionality', 'my-custom-plugin'); ?></li>
                </ul>
            </div>
            
            <div class="card">
                <h3><?php _e('Shortcode Usage', 'my-custom-plugin'); ?></h3>
                <p><?php _e('Use the following shortcode in your posts or pages:', 'my-custom-plugin'); ?></p>
                <code>[custom_welcome name="Your Name" message="Custom Message"]</code>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Settings page callback
 */
function mcp_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('mcp_settings_group');
            do_settings_sections('my-custom-plugin-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

/**
 * Register plugin settings
 */
function mcp_register_settings() {
    register_setting('mcp_settings_group', 'mcp_enable_feature');
    
    add_settings_section(
        'mcp_main_section',
        __('Main Settings', 'my-custom-plugin'),
        'mcp_main_section_callback',
        'my-custom-plugin-settings'
    );
    
    add_settings_field(
        'mcp_enable_feature',
        __('Enable Feature', 'my-custom-plugin'),
        'mcp_enable_feature_callback',
        'my-custom-plugin-settings',
        'mcp_main_section'
    );
}
add_action('admin_init', 'mcp_register_settings');

/**
 * Settings section callback
 */
function mcp_main_section_callback() {
    echo '<p>' . __('Configure your plugin settings below:', 'my-custom-plugin') . '</p>';
}

/**
 * Settings field callback
 */
function mcp_enable_feature_callback() {
    $value = get_option('mcp_enable_feature', '1');
    echo '<input type="checkbox" name="mcp_enable_feature" value="1" ' . checked(1, $value, false) . ' />';
    echo '<label>' . __('Enable custom feature', 'my-custom-plugin') . '</label>';
}

/**
 * Register custom post type
 */
function mcp_register_custom_post_type() {
    $labels = array(
        'name' => __('Custom Items', 'my-custom-plugin'),
        'singular_name' => __('Custom Item', 'my-custom-plugin'),
        'add_new' => __('Add New', 'my-custom-plugin'),
        'add_new_item' => __('Add New Custom Item', 'my-custom-plugin'),
        'edit_item' => __('Edit Custom Item', 'my-custom-plugin'),
        'new_item' => __('New Custom Item', 'my-custom-plugin'),
        'view_item' => __('View Custom Item', 'my-custom-plugin'),
        'search_items' => __('Search Custom Items', 'my-custom-plugin'),
        'not_found' => __('No custom items found', 'my-custom-plugin'),
        'not_found_in_trash' => __('No custom items found in trash', 'my-custom-plugin')
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'custom-items'),
        'capability_type' => 'post',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon' => 'dashicons-star-filled'
    );
    
    register_post_type('mcp_custom_item', $args);
}
add_action('init', 'mcp_register_custom_post_type');

/**
 * AJAX handler example
 */
function mcp_ajax_handler() {
    check_ajax_referer('mcp_nonce', 'nonce');
    
    $response = array(
        'success' => true,
        'message' => __('AJAX request successful!', 'my-custom-plugin')
    );
    
    wp_send_json_success($response);
}
add_action('wp_ajax_mcp_action', 'mcp_ajax_handler');
add_action('wp_ajax_nopriv_mcp_action', 'mcp_ajax_handler');

/**
 * Add custom widget
 */
class MCP_Custom_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'mcp_custom_widget',
            __('My Custom Widget', 'my-custom-plugin'),
            array('description' => __('A custom widget from My Custom Plugin', 'my-custom-plugin'))
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo '<p>' . __('This is a custom widget!', 'my-custom-plugin') . '</p>';
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('New title', 'my-custom-plugin');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php _e('Title:', 'my-custom-plugin'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" 
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        return $instance;
    }
}

/**
 * Register custom widget
 */
function mcp_register_widgets() {
    register_widget('MCP_Custom_Widget');
}
add_action('widgets_init', 'mcp_register_widgets');
