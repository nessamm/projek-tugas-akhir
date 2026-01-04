# Tailwind CSS Setup

This project now uses **Tailwind CSS** for styling alongside the PHP/CodeIgniter backend.

## Setup Instructions

### 1. Install Dependencies
```bash
npm install
```

### 2. Build CSS
To compile Tailwind CSS:
```bash
npm run build:css
```

This generates `assets/css/output.css` which is linked in your PHP templates.

## Development Workflow

- Edit your HTML/PHP templates to use Tailwind utility classes (e.g., `class="px-4 py-2 bg-blue-600"`)
- Run `npm run build:css` to compile changes
- The compiled CSS file (`assets/css/output.css`) is automatically linked in your PHP views

## File Structure

- `tailwind.config.js` - Tailwind configuration
- `postcss.config.js` - PostCSS configuration
- `build-css.js` - Node.js build script
- `assets/css/tailwind.css` - Source Tailwind directives
- `assets/css/output.css` - Compiled CSS (generated)

## Key Features

- ✅ Full Tailwind CSS utility classes
- ✅ Dark mode support (class-based)
- ✅ Responsive design utilities
- ✅ Custom color theme configuration
- ✅ PHP backend integration maintained

## Dark Mode

The site uses Tailwind's class-based dark mode. Simply add the `dark` class to the `<html>` element to enable dark mode. This is handled automatically by the JavaScript in your PHP templates.

## Customization

Edit `tailwind.config.js` to:
- Add custom colors
- Extend default spacing
- Configure plugins
- Adjust breakpoints

All changes require rebuilding CSS with `npm run build:css`.
