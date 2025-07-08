# Email Validator Pro - Organized Structure

A professional, well-structured email validation tool built with PHP, HTML, CSS, and JavaScript.

## 📁 Project Structure

```
email tester/
├── api/                      # API endpoints
│   └── validate.php         # Email validation API
├── assets/                  # Static assets
│   ├── css/
│   │   └── style.css       # Main stylesheet
│   └── js/
│       └── script.js       # Main JavaScript
├── includes/                # PHP includes and utilities
│   ├── config.php          # Configuration settings
│   └── functions.php       # Common functions and utilities
├── pages/                   # Application pages
│   ├── index.php           # Main application page
│   ├── diagnostics.php     # System diagnostics page
│   └── test.php            # API testing page
├── logs/                    # Log files (auto-created)
├── cache/                   # Cache directory (auto-created)
├── backups/                 # Backup directory (auto-created)
├── uploads/                 # Upload directory (auto-created)
├── index.php               # Entry point (redirects to pages/index.php)
├── health.php              # Health check endpoint
├── .htaccess               # Apache configuration
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

- **Modern Design**: Responsive, mobile-friendly interface
- **Navigation System**: Clean navigation between pages
- **Real-time Feedback**: Instant validation results
- **Export Options**: Copy to clipboard and download reports
- **Debug Mode**: Advanced debugging and diagnostics
- **Progress Tracking**: Visual feedback for long operations

### System Features

- **Modular Architecture**: Well-organized, maintainable code
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
   C:\xampp\htdocs\email-validator\

   # For WAMP
   C:\wamp64\www\email-validator\

   # For Linux/Apache
   /var/www/html/email-validator/
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
   - Open: `http://localhost/email-validator/`
   - Direct access: `http://localhost/email-validator/pages/`
   - Or: `http://your-server.com/email-validator/`

## 📄 Page Overview

### 🏠 Main Page (`pages/index.php`)

- Primary email validation interface
- Advanced options panel
- Batch testing capabilities
- Real-time results display
- Export functionality (copy to clipboard, download reports)

### 🔧 Diagnostics (`pages/diagnostics.php`)

- System status monitoring
- Server information display
- Performance testing
- Network analysis
- Troubleshooting tools

### 🧪 API Test (`pages/test.php`)

- API endpoint testing
- Error handling verification
- Performance benchmarking
- Custom email testing
- Batch operation testing

### 🏥 Health Check (`health.php`)

- JSON endpoint for system monitoring
- File structure validation
- Quick health status overview

## 🌐 Access URLs

### Direct Access

- **Main Application**: `/pages/index.php`
- **Diagnostics**: `/pages/diagnostics.php`
- **API Testing**: `/pages/test.php`
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
define('ASSETS_PATH', '/email tester/assets');
define('API_PATH', '/email tester/api');

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

## 🛠️ API Documentation

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
- Create new pages using the template system

### Configuration

- Update `includes/config.php` for global settings
- Modify `includes/functions.php` for utility functions

## 🔍 Troubleshooting

### Common Issues

1. **API Not Responding**

   - Check PHP error logs
   - Verify file permissions
   - Test via `/pages/diagnostics.php`

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

### Debug Mode

- Enable in `includes/config.php`: `define('ENABLE_DEBUG', true);`
- View detailed logs in browser console
- Use diagnostics page for system analysis

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
- Use `/pages/diagnostics.php` for detailed analysis
- Test API endpoints via `/pages/test.php`
- Review PHP error logs
- Monitor server resources

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
- Improved project structure and maintainability
- Enhanced navigation system
- Updated API path handling
- Added comprehensive health monitoring
