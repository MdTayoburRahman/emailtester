# Email Validator Pro - Organized Structure

A professional, well-structured email validation tool built with PHP, HTML, CSS, and JavaScript.

## 📁 Project Structure

```
emailtester/
├── api/                      # API endpoints
│   └── validate.php         # Email validation API
├── assets/                  # Static assets
│   ├── css/
│   │   └── style.css       # Main stylesheet
│   ├── js/
│   │   └── script.js       # Main JavaScript
│   ├── images/             # Icons, favicons, and images
│   │   └── README-ICONS.md # Icon requirements guide
│   └── manifest.json       # Progressive Web App manifest
├── includes/                # PHP includes and utilities
│   ├── config.php          # Configuration settings
│   ├── config.local.php    # Local configuration (if exists)
│   ├── functions.php       # Common functions and utilities
│   ├── header.php          # Header template with navigation
│   └── footer.php          # Footer template with links
├── pages/                   # Application pages
│   ├── index.php           # Main application page
│   ├── test.php            # API testing page
│   ├── developer.php       # Developer information
│   ├── privacy.php         # Privacy policy
│   └── terms.php           # Terms of service
├── logs/                    # Log files (auto-created)
├── uploads/                 # Upload directory (auto-created)
├── index.php               # Entry point (redirects to pages/index.php)
├── health.php              # Health check endpoint
└── README.md               # This documentation
```

## 🚀 Features

### Core Functionality

- **Email Format Validation**: Comprehensive syntax checking
- **Domain Verification**: DNS record validation
- **MX Record Lookup**: Mail exchange server verification
- **SMTP Testing**: Real server connectivity testing
- **Batch Processing**: Multiple email validation
- **Performance Metrics**: Detailed timing and statistics

### User Interface

- **Modern Design**: Responsive, mobile-friendly interface with beautiful footer
- **Template System**: Modular header and footer templates
- **SEO Optimized**: Comprehensive meta tags, Open Graph, Twitter Cards
- **Progressive Web App**: PWA-ready with manifest and service worker support
- **Multi-Platform Icons**: Complete favicon and icon set for all devices
- **Navigation System**: Clean navigation between pages
- **Real-time Feedback**: Instant validation results
- **Export Options**: Copy to clipboard and download reports
- **Debug Mode**: Advanced debugging capabilities
- **Progress Tracking**: Visual feedback for long operations

### System Features

- **Modular Architecture**: Well-organized, maintainable code with template separation
- **Template System**: Reusable header and footer components
- **SEO Excellence**: Complete meta tag optimization for search engines
- **Social Media Ready**: Open Graph and Twitter Card integration
- **PWA Support**: Progressive Web App capabilities with offline support ready
- **Schema.org Markup**: Structured data for enhanced search results
- **Configuration Management**: Centralized settings
- **Error Handling**: Comprehensive error management
- **Security Features**: Input sanitization and validation
- **Performance Optimization**: Efficient processing and caching ready
- **Extensible Design**: Easy to add new features

## 🔧 Installation & Setup

### Prerequisites

- **Web Server**: Apache, Nginx, or similar
- **PHP**: Version 7.0 or higher
- **Extensions**: Standard PHP extensions (no special requirements)
- **Internet Connection**: For DNS/SMTP testing

### Quick Setup

1. **Download/Clone** the project to your web server directory

   ```bash
   # For XAMPP
   C:\xampp\htdocs\emailtester\

   # For WAMP
   C:\wamp64\www\emailtester\

   # For Linux/Apache
   /var/www/html/emailtester/
   ```

2. **Set Permissions** (Linux/Mac only)

   ```bash
   chmod 755 *.php
   chmod 755 api/*.php
   chmod 755 includes/*.php
   chmod 755 pages/*.php
   chmod -R 755 assets/
   ```

3. **Configure Settings** (optional)

   - Edit `includes/config.php` to customize settings
   - Adjust timeouts, limits, and feature flags as needed

4. **Access the Application**
   - Open: `http://localhost/emailtester/`
   - Direct access: `http://localhost/emailtester/pages/`
   - Or: `http://your-server.com/emailtester/`

## 📄 Page Overview

### 🏠 Main Page (`pages/index.php`)

- Primary email validation interface
- Advanced options panel
- Batch testing capabilities
- Real-time results display
- Export functionality (copy to clipboard, download reports)

### 🧪 API Test (`pages/test.php`)

- API endpoint testing
- Error handling verification
- Performance benchmarking
- Custom email testing
- Batch operation testing

### 👨‍💻 Developer Info (`pages/developer.php`)

- Developer contact information
- Project details and technical specifications
- Professional profile and links

### 🔒 Privacy Policy (`pages/privacy.php`)

- Data protection policies
- User privacy rights
- Information collection practices

### 📄 Terms of Service (`pages/terms.php`)

- Service usage terms
- Legal agreements
- User responsibilities

### 🏥 Health Check (`health.php`)

- JSON endpoint for system monitoring
- File structure validation
- Quick health status overview

## 🌐 Access URLs

### Direct Access

- **Main Application**: `/pages/index.php`
- **API Testing**: `/pages/test.php`
- **Developer Info**: `/pages/developer.php`
- **Privacy Policy**: `/pages/privacy.php`
- **Terms of Service**: `/pages/terms.php`
- **Health Check**: `/health.php`

### Root Redirect

- **Root URL**: `/` (automatically redirects to `/pages/index.php`)

## ⚙️ Configuration

### Main Settings (`includes/config.php`)

```php
// Application Information
define('APP_NAME', 'Email Validator Pro');
define('APP_VERSION', '2.0.0');

// Paths
define('ASSETS_PATH', '/emailtester/assets');
define('API_PATH', '/emailtester/api');

// Timeouts & Limits
define('SMTP_TIMEOUT', 10);        // SMTP connection timeout
define('MAX_BATCH_SIZE', 100);     // Maximum emails per batch
define('API_TIMEOUT', 10);         // API request timeout

// Features
define('FEATURE_BATCH_TESTING', true);
define('FEATURE_ADVANCED_ANALYSIS', true);
define('FEATURE_EXPORT_REPORTS', true);
```

### Security Settings

- Input sanitization enabled by default
- CORS headers configurable
- Rate limiting ready (configurable)
- CSRF protection ready for future enhancement

## � SEO & PWA Features

### Search Engine Optimization

- **Complete Meta Tags**: Title, description, keywords, author, robots
- **Open Graph Protocol**: Facebook and social media optimization
- **Twitter Cards**: Enhanced Twitter sharing with rich previews
- **LinkedIn Optimization**: Professional network sharing optimization
- **Schema.org Markup**: Structured data for rich search results
- **Canonical URLs**: Prevent duplicate content issues
- **Language and Locale**: Proper internationalization tags
- **Mobile Optimization**: Mobile-first responsive design
- **Performance Tags**: DNS prefetch and preconnect for speed

### Progressive Web App (PWA)

- **Web App Manifest**: Complete PWA configuration
- **Multi-Platform Icons**: Icons for all devices and platforms
- **App-like Experience**: Standalone display mode support
- **Offline Ready**: Service worker implementation ready
- **App Shortcuts**: Quick actions from home screen
- **Theme Integration**: Platform-specific theming
- **Installation Prompts**: Add to home screen functionality

### Favicon & Icons

- **Complete Icon Set**: 15+ icon sizes for all platforms
- **High-Resolution Support**: Retina and high-DPI displays
- **Platform Specific**: Apple Touch Icons, Android Chrome, Microsoft Tiles
- **Fallback Support**: Progressive enhancement for older browsers
- **Brand Consistency**: Unified visual identity across platforms

## �🛠️ API Documentation

### Endpoint

```
POST /api/validate.php
Content-Type: application/json
```

### Request Format

```json
{
  "email": "test@example.com"
}
```

### Response Format

```json
{
  "email": "test@example.com",
  "format_valid": true,
  "domain_exists": true,
  "mx_records": true,
  "mx_servers": ["mx1.example.com", "mx2.example.com"],
  "smtp_check": true,
  "smtp_details": "Connection successful",
  "is_valid": true,
  "validation_time": 1234.5,
  "detailed_info": {
    "domain_info": {
      "domain": "example.com",
      "tld": "com",
      "length": 11
    }
  }
}
```

### Status Codes

- `200`: Successful validation
- `400`: Bad request (invalid input)
- `500`: Server error

## 🎨 Customization

### Styling

- Modify `assets/css/style.css` for visual changes
- Responsive design with mobile-first approach
- CSS custom properties for easy theming

### Functionality

- Add new validation rules in `api/validate.php`
- Extend features in `assets/js/script.js`
- Create new pages using the header/footer template system
- Customize header in `includes/header.php`
- Modify footer in `includes/footer.php`

### Configuration

- Update `includes/config.php` for global settings
- Modify `includes/functions.php` for utility functions
- Use `includes/header.php` and `includes/footer.php` for page templates

## 🔍 Troubleshooting

### Common Issues

1. **API Not Responding**

   - Check PHP error logs
   - Verify file permissions
   - Test via `/pages/test.php`

2. **SMTP Connection Failed**

   - Check firewall settings (port 25)
   - Verify internet connectivity
   - Some ISPs block SMTP

3. **Performance Issues**

   - Increase PHP memory limit
   - Adjust timeout settings
   - Check network connectivity

4. **Navigation Issues**
   - Ensure pages are in `/pages/` directory
   - Check relative path configuration
   - Verify asset paths in includes
   - Ensure header/footer templates are properly included

### Debug Mode

- Enable in `includes/config.php`: `define('ENABLE_DEBUG', true);`
- View detailed logs in browser console
- Use test page for API analysis
- Check header/footer template rendering

## 🚦 Performance

### Optimization Tips

- Enable caching (configurable)
- Adjust timeout values based on needs
- Use batch processing for multiple emails
- Monitor server resources

### Benchmarks

- Average validation time: 1-3 seconds
- Memory usage: ~5MB per request
- Concurrent requests: Handled by web server
- Batch processing: Up to 100 emails (configurable)

## 🔐 Security

### Built-in Protection

- Input sanitization and validation
- XSS prevention
- SQL injection safe (no database queries)
- CSRF token support (ready for implementation)
- Directory traversal protection

### Best Practices

- Keep PHP updated
- Use HTTPS in production
- Monitor access logs
- Implement rate limiting if needed

## 📈 Future Enhancements

### Planned Features

- Database logging and history
- User authentication system
- API key management
- Advanced reporting and analytics
- Email reputation checking
- Domain categorization
- Webhook notifications

### Extensibility

- Plugin system architecture
- Custom validation rules
- Third-party service integration
- Multi-language support

## 📞 Support

### Resources

- Check `/health.php` for system status
- Test API endpoints via `/pages/test.php`
- Review PHP error logs
- Monitor server resources
- Verify template includes are working properly

### Common Solutions

- Restart web server if needed
- Check file permissions
- Verify network connectivity
- Update PHP configuration

## 📝 License

This project is open source and available under the MIT License.

---

**Email Validator Pro v2.0.0** - Professional Email Validation Made Simple

### 🔄 Recent Updates

- Organized pages into `/pages/` directory
- Implemented modular header and footer template system
- **Added comprehensive SEO optimization** with meta tags, Open Graph, Twitter Cards
- **Implemented Progressive Web App (PWA) features** with manifest and multi-platform icons
- **Enhanced social media integration** with rich previews and structured data
- **Added complete favicon and icon set** for all platforms and devices
- Removed diagnostics page for streamlined navigation
- Enhanced navigation system with modern footer design
- Updated API path handling
- Added comprehensive health monitoring
- Improved project structure and maintainability
