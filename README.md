# WordPress Plugins Collection

A collection of customized WordPress plugins for various functionalities and features.

## Overview

This repository contains custom WordPress plugins developed for specific use cases. Each plugin is designed to follow WordPress coding standards and best practices.

## Available Plugins

### 1. My Custom Plugin

A comprehensive WordPress plugin demonstrating various plugin development features including:

- Custom shortcodes for dynamic content
- Admin menu integration with settings pages
- Custom post types and taxonomies
- Custom widgets for sidebars
- AJAX functionality
- Full internationalization support
- Security best practices

**Location**: `/my-custom-plugin/`

For detailed documentation, see the [plugin README](my-custom-plugin/README.md).

## Installation

### Installing Individual Plugins

1. Navigate to your WordPress installation directory
2. Go to `wp-content/plugins/`
3. Copy the desired plugin folder from this repository
4. Activate the plugin through the WordPress admin panel

### Example

```bash
# Copy the plugin to your WordPress installation
cp -r my-custom-plugin /path/to/wordpress/wp-content/plugins/

# Then activate it via WordPress admin or WP-CLI
wp plugin activate my-custom-plugin
```

## Development

### Prerequisites

- WordPress 5.0 or higher
- PHP 7.0 or higher
- MySQL 5.6 or higher

### Plugin Structure

Each plugin follows the standard WordPress plugin structure:

```
plugin-name/
├── plugin-name.php          # Main plugin file with headers
├── README.md               # Plugin documentation
├── assets/                 # CSS, JS, and images
│   ├── css/
│   ├── js/
│   └── images/
├── includes/               # PHP includes (if needed)
├── languages/              # Translation files
└── templates/              # Template files (if needed)
```

### Coding Standards

All plugins follow:
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/)
- [WordPress Plugin Handbook](https://developer.wordpress.org/plugins/)
- Security best practices including:
  - Input sanitization
  - Output escaping
  - Nonce verification
  - Capability checks

## Features Common to All Plugins

- **Security**: All plugins implement WordPress security best practices
- **Internationalization**: Full support for translations
- **Hooks & Filters**: Proper use of WordPress hooks for extensibility
- **Documentation**: Comprehensive inline documentation
- **Clean Code**: Well-organized, readable, and maintainable code

## Contributing

Contributions are welcome! If you'd like to contribute:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Development Guidelines

- Follow WordPress coding standards
- Add proper documentation
- Test your changes thoroughly
- Ensure backward compatibility
- Include security best practices

## Testing

Before deploying plugins to production:

1. Test in a local WordPress environment
2. Check for PHP errors and warnings
3. Verify functionality across different themes
4. Test with various WordPress versions
5. Check for conflicts with popular plugins

## Security

If you discover a security vulnerability, please email the repository maintainer directly. Do not create a public issue.

## License

All plugins in this repository are licensed under GPL v2 or later, consistent with WordPress licensing.

```
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
```

## Resources

- [WordPress Plugin Developer Handbook](https://developer.wordpress.org/plugins/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [WordPress Plugin Repository](https://wordpress.org/plugins/)
- [WordPress Security Best Practices](https://developer.wordpress.org/plugins/security/)

## Author

**Adina Parvez**
- GitHub: [@AdinaParvez](https://github.com/AdinaParvez)

## Support

For questions, issues, or feature requests, please open an issue in this repository.

---

Made with ❤️ for the WordPress community
