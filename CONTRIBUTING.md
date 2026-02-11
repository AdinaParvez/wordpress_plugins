# Contributing to WordPress Plugins Collection

Thank you for your interest in contributing to this WordPress plugins collection! This document provides guidelines and instructions for contributing.

## Code of Conduct

By participating in this project, you agree to maintain a respectful and inclusive environment for all contributors.

## How to Contribute

### Reporting Bugs

If you find a bug, please create an issue with:

1. A clear, descriptive title
2. Steps to reproduce the issue
3. Expected behavior
4. Actual behavior
5. WordPress version, PHP version, and relevant environment details
6. Screenshots if applicable

### Suggesting Features

Feature suggestions are welcome! Please create an issue with:

1. A clear description of the feature
2. Use case and benefits
3. Possible implementation approach (if you have ideas)

### Contributing Code

1. **Fork the Repository**
   ```bash
   git clone https://github.com/AdinaParvez/wordpress_plugins.git
   cd wordpress_plugins
   ```

2. **Create a Feature Branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

3. **Make Your Changes**
   - Follow WordPress coding standards
   - Add proper documentation
   - Test thoroughly

4. **Commit Your Changes**
   ```bash
   git add .
   git commit -m "Add feature: brief description"
   ```

5. **Push to Your Fork**
   ```bash
   git push origin feature/your-feature-name
   ```

6. **Create a Pull Request**
   - Provide a clear description of changes
   - Reference any related issues
   - Include testing instructions

## Coding Standards

### WordPress Standards

All code must follow [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/):

- **PHP**: Follow WordPress PHP Coding Standards
- **JavaScript**: Follow WordPress JavaScript Coding Standards
- **CSS**: Follow WordPress CSS Coding Standards
- **HTML**: Follow WordPress HTML Coding Standards

### Security Best Practices

Always implement:

1. **Input Sanitization**
   ```php
   $clean_data = sanitize_text_field($_POST['user_input']);
   ```

2. **Output Escaping**
   ```php
   echo esc_html($user_data);
   echo esc_attr($attribute);
   echo esc_url($url);
   ```

3. **Nonce Verification**
   ```php
   if (!wp_verify_nonce($_POST['nonce'], 'action_name')) {
       wp_die('Security check failed');
   }
   ```

4. **Capability Checks**
   ```php
   if (!current_user_can('manage_options')) {
       wp_die('Unauthorized access');
   }
   ```

5. **Prepared SQL Statements**
   ```php
   $wpdb->prepare("SELECT * FROM table WHERE id = %d", $id);
   ```

### Code Documentation

- Add PHPDoc blocks for all functions and classes
- Include inline comments for complex logic
- Document hooks and filters
- Provide usage examples for public functions

Example:
```php
/**
 * Get user data by ID
 *
 * @since 1.0.0
 * @param int $user_id The user ID to retrieve
 * @return array|false User data array or false on failure
 */
function get_user_data($user_id) {
    // Function implementation
}
```

### Testing

Before submitting:

1. Test in a clean WordPress installation
2. Test with debug mode enabled: `define('WP_DEBUG', true);`
3. Check for PHP errors and warnings
4. Test with different themes
5. Verify compatibility with popular plugins

### Plugin Structure

Follow this structure for new plugins:

```
plugin-name/
├── plugin-name.php          # Main file with plugin headers
├── README.md               # Plugin documentation
├── uninstall.php           # Cleanup on uninstall (optional)
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── script.js
│   └── images/
├── includes/               # PHP class files
│   ├── class-admin.php
│   └── class-frontend.php
├── languages/              # Translation files
│   └── plugin-name.pot
└── templates/              # Template files
    └── template.php
```

### Plugin Headers

Always include proper plugin headers:

```php
<?php
/**
 * Plugin Name: Your Plugin Name
 * Plugin URI: https://github.com/AdinaParvez/wordpress_plugins
 * Description: Brief description of your plugin
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://github.com/YourUsername
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: your-plugin-name
 * Domain Path: /languages
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
```

## Internationalization (i18n)

Make all strings translatable:

```php
// Single line
__('Translate this', 'text-domain');

// With echo
_e('Translate and echo', 'text-domain');

// With variables
sprintf(__('Hello %s', 'text-domain'), $name);
```

## Git Commit Messages

Write clear commit messages:

- Use present tense ("Add feature" not "Added feature")
- Use imperative mood ("Move cursor to..." not "Moves cursor to...")
- First line: brief summary (50 chars or less)
- Blank line, then detailed description if needed
- Reference issues: "Fixes #123" or "Relates to #456"

Examples:
```
Add custom widget for displaying recent posts

Add user role management feature

Fix XSS vulnerability in admin page
Fixes #123

Update documentation for shortcode usage
```

## Review Process

1. All contributions will be reviewed by maintainers
2. We may request changes or clarifications
3. Once approved, changes will be merged
4. Contributors will be credited

## Questions?

If you have questions about contributing:

1. Check existing issues and discussions
2. Review WordPress documentation
3. Create a new issue with the "question" label

## License

By contributing, you agree that your contributions will be licensed under the same license as the project (GPL v2 or later for WordPress plugins).

## Recognition

Contributors will be recognized in:
- The project README
- Release notes
- Plugin credits (where applicable)

Thank you for contributing to make this project better! 🎉
