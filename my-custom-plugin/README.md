# My Custom Plugin

A comprehensive WordPress plugin demonstrating various WordPress plugin development features and best practices.

## Features

- **Custom Shortcodes**: Add dynamic content to posts and pages with customizable shortcodes
- **Admin Menu Integration**: Custom admin pages with settings management
- **Custom Post Types**: Register and manage custom content types
- **Custom Widgets**: Add custom widgets to sidebars and widget areas
- **AJAX Support**: Built-in AJAX functionality for dynamic content updates
- **Internationalization**: Full translation support using WordPress i18n functions
- **Proper Activation/Deactivation Hooks**: Clean setup and teardown processes

## Installation

1. Upload the `my-custom-plugin` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Configure the plugin settings in the WordPress admin panel under 'My Custom Plugin'

## Usage

### Shortcode Usage

The plugin provides a custom shortcode that can be used in posts, pages, or widgets:

```
[custom_welcome name="John Doe" message="Welcome to our website!"]
```

**Parameters:**
- `name` (optional): The name to display in the welcome message. Default: "Guest"
- `message` (optional): Custom welcome message. Default: "Welcome to our website!"

### Admin Features

After activation, you'll find a new menu item "My Custom Plugin" in the WordPress admin sidebar with:

1. **Main Dashboard**: Overview of plugin features and usage instructions
2. **Settings Page**: Configure plugin options and enable/disable features

### Custom Post Type

The plugin registers a custom post type called "Custom Items" which can be accessed from the admin menu. You can:
- Create and manage custom items
- Add featured images, excerpts, and custom fields
- Archive custom items at `/custom-items/`

### Custom Widget

A custom widget is available in **Appearance > Widgets**:
- Add "My Custom Widget" to any widget area
- Configure the widget title
- Display custom content in sidebars

## File Structure

```
my-custom-plugin/
├── my-custom-plugin.php    # Main plugin file
├── assets/
│   ├── css/
│   │   └── style.css       # Plugin styles
│   └── js/
│       └── script.js       # Plugin JavaScript
├── languages/              # Translation files (future)
└── README.md              # This file
```

## Development

### Hooks and Filters

The plugin uses standard WordPress hooks:

**Actions:**
- `plugins_loaded`: Load text domain
- `wp_enqueue_scripts`: Enqueue styles and scripts
- `admin_menu`: Add admin menu items
- `admin_init`: Register settings
- `init`: Register custom post types
- `widgets_init`: Register custom widgets

**Activation/Deactivation:**
- `register_activation_hook`: Plugin activation
- `register_deactivation_hook`: Plugin deactivation

### AJAX Functionality

The plugin includes AJAX support with:
- Security nonce verification
- Admin and front-end AJAX handlers
- Example implementation in JavaScript

### Internationalization

All text strings use WordPress i18n functions:
- `__()`: Translate text
- `_e()`: Translate and echo text
- `esc_html()`: Escape and translate

Text domain: `my-custom-plugin`

## Requirements

- WordPress 5.0 or higher
- PHP 7.0 or higher

## Security

The plugin follows WordPress security best practices:
- Input sanitization with `sanitize_text_field()`
- Output escaping with `esc_html()`, `esc_attr()`, etc.
- Nonce verification for AJAX requests
- Capability checks for admin functions
- Direct file access prevention

## License

This plugin is licensed under the GPL v2 or later.

## Author

**Adina Parvez**
- GitHub: [@AdinaParvez](https://github.com/AdinaParvez)

## Changelog

### 1.0.0 (2024)
- Initial release
- Custom shortcodes
- Admin menu integration
- Custom post types
- Custom widgets
- AJAX functionality
- Full internationalization support

## Support

For issues, questions, or contributions, please visit the [GitHub repository](https://github.com/AdinaParvez/wordpress_plugins).

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.
