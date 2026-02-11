# Translation Files

This directory contains translation files for the My Custom Plugin.

## Creating Translations

1. **Generate POT file** (if you have WP-CLI installed):
   ```bash
   wp i18n make-pot . languages/my-custom-plugin.pot
   ```

2. **Create language-specific PO files**:
   - Use a tool like Poedit to translate the POT file
   - Save as `my-custom-plugin-{locale}.po`
   - Example: `my-custom-plugin-es_ES.po` for Spanish

3. **Compile to MO files**:
   - Poedit automatically generates MO files
   - Or use msgfmt: `msgfmt -o my-custom-plugin-es_ES.mo my-custom-plugin-es_ES.po`

## Supported Text Domain

The plugin uses the text domain: `my-custom-plugin`

## File Naming Convention

- POT file: `my-custom-plugin.pot` (template)
- PO files: `my-custom-plugin-{locale}.po` (translations)
- MO files: `my-custom-plugin-{locale}.mo` (compiled)

## Common Locales

- Spanish (Spain): `es_ES`
- French (France): `fr_FR`
- German (Germany): `de_DE`
- Portuguese (Brazil): `pt_BR`
- Japanese: `ja`
- Chinese (Simplified): `zh_CN`

## Resources

- [WordPress I18n Documentation](https://developer.wordpress.org/plugins/internationalization/)
- [Poedit Editor](https://poedit.net/)
- [GlotPress](https://wordpress.org/plugins/glotpress/) - Translation management
