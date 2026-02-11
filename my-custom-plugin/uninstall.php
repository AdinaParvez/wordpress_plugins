<?php
/**
 * Uninstall Script
 * 
 * This file runs when the plugin is uninstalled (deleted).
 * It cleans up all plugin data from the database.
 *
 * @package My_Custom_Plugin
 * @version 1.0.0
 */

// Exit if uninstall not called from WordPress
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

/**
 * Delete plugin options
 */
delete_option('mcp_activation_time');
delete_option('mcp_plugin_version');
delete_option('mcp_enable_feature');

/**
 * Delete custom post type posts
 */
$custom_posts = get_posts(array(
    'post_type' => 'mcp_custom_item',
    'numberposts' => -1,
    'post_status' => 'any'
));

foreach ($custom_posts as $post) {
    wp_delete_post($post->ID, true);
}

/**
 * Delete custom post type (optional - WordPress handles this automatically)
 * Uncomment if you want to explicitly unregister
 */
// unregister_post_type('mcp_custom_item');

/**
 * Clean up transients (if any were used)
 */
delete_transient('mcp_cache_key');

/**
 * Drop custom database tables (if any were created)
 * Example:
 */
/*
global $wpdb;
$table_name = $wpdb->prefix . 'mcp_custom_table';
$wpdb->query("DROP TABLE IF EXISTS $table_name");
*/

/**
 * Clear any cached data
 */
wp_cache_flush();

/**
 * Final cleanup
 * Note: WordPress automatically:
 * - Removes plugin from active plugins list
 * - Deletes plugin files (if uninstalled from admin)
 * - Cleans up plugin-specific cron jobs
 */
