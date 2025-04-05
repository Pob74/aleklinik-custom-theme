# Aledjurklinik WordPress Theme

A modern, responsive WordPress theme built for veterinary clinics, specifically designed for Aledjurklinik. The theme utilizes Tailwind CSS for styling and Advanced Custom Fields (ACF) for content management.

## Features

- **Modern Design**: Built with Tailwind CSS for a clean, responsive layout
- **Flexible Content Management**: Integrated with Advanced Custom Fields (ACF) for easy content updates
- **Specialized Sections**:
  - Opening Hours management for both Horse and Small Animal clinics
  - Booking system integration
  - Location information
  - Contact details with emergency information
  - Social media integration

## Requirements

- WordPress 5.0 or higher
- Advanced Custom Fields PRO plugin
- PHP 7.4 or higher

## Installation

1. Upload the `klinik-test` folder to the `/wp-content/themes/` directory
2. Install and activate the required plugins:
   - Advanced Custom Fields PRO
3. Go to Appearance > Themes in your WordPress admin panel
4. Activate the "Aledjurklinik" theme

## Theme Settings

### ACF Options Pages

The theme includes several ACF option pages for managing content:

1. **Opening Hours**

   - Separate sections for Horse and Small Animal clinics
   - Customizable days and times

2. **Booking Information**

   - Phone booking hours
   - Contact numbers for different departments

3. **Location Information**

   - Clinic name
   - Address
   - Postal code and city

4. **Contact Information**
   - Emergency contact numbers
   - Email addresses
   - Veterinarian phone hours

### Customization

The theme uses Tailwind CSS for styling. To customize:

1. **Colors and Typography**

   - Edit the `tailwind.config.js` file
   - Modify the theme colors and fonts

2. **Layout and Components**
   - Templates are located in the theme root directory
   - Components can be found in the components directory

## Development

### Build Process

1. Install dependencies:

```bash
npm install
```

2. For development:

```bash
npm run dev
```

3. For production:

```bash
npm run build
```

### File Structure

```
klinik-test/
├── components/         # Theme components
├── assets/            # Theme assets (images, js, css)
├── functions.php      # Theme functions
├── header.php         # Header template
├── footer.php         # Footer template
├── index.php         # Main template file
└── style.css         # Theme stylesheet
```

## Support

For support and questions, please contact the theme developer or create an issue in the repository.

## Credits

- Built with [Tailwind CSS](https://tailwindcss.com/)
- Powered by [WordPress](https://wordpress.org/)
- Uses [Advanced Custom Fields PRO](https://www.advancedcustomfields.com/pro/)
