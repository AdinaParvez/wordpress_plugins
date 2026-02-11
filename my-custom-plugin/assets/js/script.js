/**
 * My Custom Plugin JavaScript
 * Version: 1.0.0
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        
        /**
         * Initialize plugin
         */
        function init() {
            console.log('My Custom Plugin initialized');
            setupEventListeners();
        }
        
        /**
         * Setup event listeners
         */
        function setupEventListeners() {
            // Example: Add click event to welcome boxes
            $('.mcp-welcome-box').on('click', function() {
                $(this).toggleClass('active');
            });
        }
        
        /**
         * AJAX Example Function
         */
        function performAjaxAction(data) {
            $.ajax({
                url: mcpAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'mcp_action',
                    nonce: mcpAjax.nonce,
                    data: data
                },
                success: function(response) {
                    if (response.success) {
                        console.log('AJAX Success:', response.data);
                    } else {
                        console.error('AJAX Error:', response.data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Request Failed:', error);
                }
            });
        }
        
        /**
         * Utility function: Show notification
         */
        function showNotification(message, type) {
            type = type || 'info';
            
            var $notification = $('<div class="mcp-notification mcp-notification-' + type + '">')
                .text(message)
                .appendTo('body')
                .fadeIn(300);
            
            setTimeout(function() {
                $notification.fadeOut(300, function() {
                    $(this).remove();
                });
            }, 3000);
        }
        
        /**
         * Make functions available globally if needed
         */
        window.mcpPlugin = {
            performAjaxAction: performAjaxAction,
            showNotification: showNotification
        };
        
        // Initialize the plugin
        init();
    });
    
})(jQuery);
