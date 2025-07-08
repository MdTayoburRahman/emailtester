<?php

/**
 * @author Md Tayobur Rahman
 * @email - tayoburrahman119@gmail.com
 * @whatsapp -+974 7183 0623 / +880 1717 932348
 * @link - https://mdtayoburrahman.com/
 * @date 2025-06-26
 * @time 12:27
 * @copyright (c) 2025 Md Tayobur Rahman
 * @package privacy
 */

// Set page variables
$pageTitle = 'Privacy Policy';
$currentPage = 'privacy.php';

// Include header
require_once '../includes/header.php';
?>

<div class="container">
  <header>
    <h1>🔒 Privacy Policy</h1>
    <p>Your privacy is important to us</p>
    <div class="last-updated">
      <small>Last updated: June 26, 2025</small>
    </div>
  </header>

  <div class="privacy-content">
    <div class="privacy-section">
      <h2>1. Information We Collect</h2>
      <p>Email Validator Pro is designed with privacy in mind. When you use our email validation service, we may collect the following information:</p>
      
      <h3>1.1 Email Addresses</h3>
      <ul>
        <li><strong>Email addresses you submit for validation</strong> - These are processed in real-time and are not permanently stored on our servers</li>
        <li><strong>Validation results</strong> - Technical data about the validation process (format, domain, MX records, SMTP status)</li>
      </ul>

      <h3>1.2 Technical Information</h3>
      <ul>
        <li><strong>IP Address</strong> - For security and rate limiting purposes</li>
        <li><strong>Browser Information</strong> - User agent, browser type, and version for compatibility</li>
        <li><strong>Usage Statistics</strong> - Number of validations performed, error rates, performance metrics</li>
        <li><strong>Server Logs</strong> - Standard web server logs for maintenance and security</li>
      </ul>
    </div>

    <div class="privacy-section">
      <h2>2. How We Use Your Information</h2>
      <p>We use the collected information for the following purposes:</p>
      
      <ul>
        <li><strong>Email Validation Service</strong> - To perform the requested email validation checks</li>
        <li><strong>Service Improvement</strong> - To analyze usage patterns and improve our validation algorithms</li>
        <li><strong>Security</strong> - To prevent abuse, spam, and unauthorized access</li>
        <li><strong>Technical Support</strong> - To troubleshoot issues and provide customer support</li>
        <li><strong>Performance Monitoring</strong> - To ensure optimal service performance and uptime</li>
      </ul>
    </div>

    <div class="privacy-section">
      <h2>3. Data Storage and Retention</h2>
      
      <h3>3.1 Email Addresses</h3>
      <ul>
        <li><strong>No Permanent Storage</strong> - Email addresses submitted for validation are processed in real-time and are not permanently stored</li>
        <li><strong>Temporary Processing</strong> - Emails may be temporarily cached for performance optimization (max 24 hours)</li>
        <li><strong>No Database Storage</strong> - We do not maintain a database of submitted email addresses</li>
      </ul>

      <h3>3.2 Technical Data</h3>
      <ul>
        <li><strong>Server Logs</strong> - Retained for 30 days for security and troubleshooting purposes</li>
        <li><strong>Usage Statistics</strong> - Anonymized aggregated data may be retained for service improvement</li>
        <li><strong>Error Logs</strong> - Technical error information retained for 14 days</li>
      </ul>
    </div>

    <div class="privacy-section">
      <h2>4. Data Sharing and Disclosure</h2>
      <p>We are committed to protecting your privacy. We do not sell, trade, or otherwise transfer your personal information to outside parties, except in the following circumstances:</p>
      
      <ul>
        <li><strong>Legal Requirements</strong> - When required by law, court order, or government regulation</li>
        <li><strong>Service Providers</strong> - To trusted third-party services that assist in operating our website (hosting, security, analytics)</li>
        <li><strong>Security Threats</strong> - To protect against fraud, abuse, or security threats</li>
        <li><strong>Business Transfer</strong> - In the event of a merger, acquisition, or sale of assets</li>
      </ul>

      <div class="highlight-box">
        <h4>🛡️ Important Note</h4>
        <p>We never share the actual email addresses you submit for validation with any third parties for marketing or commercial purposes.</p>
      </div>
    </div>

    <div class="privacy-section">
      <h2>5. Security Measures</h2>
      <p>We implement various security measures to protect your information:</p>
      
      <ul>
        <li><strong>Secure Transmission</strong> - All data is transmitted using HTTPS encryption</li>
        <li><strong>Input Validation</strong> - All inputs are validated and sanitized to prevent attacks</li>
        <li><strong>Access Controls</strong> - Limited access to server systems and data</li>
        <li><strong>Regular Updates</strong> - Security patches and software updates are applied regularly</li>
        <li><strong>Monitoring</strong> - Continuous monitoring for security threats and unusual activity</li>
      </ul>
    </div>

    <div class="privacy-section">
      <h2>6. Your Rights and Choices</h2>
      <p>You have the following rights regarding your data:</p>
      
      <h3>6.1 Access and Control</h3>
      <ul>
        <li><strong>No Account Required</strong> - Our service doesn't require user accounts or personal information</li>
        <li><strong>Anonymous Usage</strong> - You can use our service without providing personal details</li>
        <li><strong>Data Deletion</strong> - Since we don't permanently store email addresses, there's no personal data to delete</li>
      </ul>

      <h3>6.2 Opt-Out Options</h3>
      <ul>
        <li><strong>Stop Using Service</strong> - You can stop using our service at any time</li>
        <li><strong>Contact Us</strong> - For any privacy concerns or requests, contact the developer</li>
      </ul>
    </div>

    <div class="privacy-section">
      <h2>7. Cookies and Tracking</h2>
      <p>Our website uses minimal tracking technologies:</p>
      
      <ul>
        <li><strong>No Cookies</strong> - We don't use persistent cookies for tracking</li>
        <li><strong>Session Storage</strong> - Temporary browser storage for application functionality only</li>
        <li><strong>No Analytics</strong> - We don't use third-party analytics services like Google Analytics</li>
        <li><strong>Local Storage</strong> - Used only for saving user preferences (debug mode, timeout settings)</li>
      </ul>
    </div>

    <div class="privacy-section">
      <h2>8. Third-Party Services</h2>
      <p>Our email validation process may involve:</p>
      
      <ul>
        <li><strong>DNS Lookups</strong> - To verify domain existence and MX records</li>
        <li><strong>SMTP Connections</strong> - To test email server connectivity (no emails are sent)</li>
        <li><strong>Public DNS Services</strong> - For domain and MX record resolution</li>
      </ul>

      <p>These technical processes are necessary for email validation and don't involve sharing personal information with third parties.</p>
    </div>

    <div class="privacy-section">
      <h2>9. Children's Privacy</h2>
      <p>Our service is not directed to children under 13 years of age. We do not knowingly collect personal information from children under 13. If you are a parent or guardian and believe your child has provided us with personal information, please contact us immediately.</p>
    </div>

    <div class="privacy-section">
      <h2>10. International Users</h2>
      <p>If you are accessing our service from outside your country, please be aware that your information may be transferred to, stored, and processed in the country where our servers are located. By using our service, you consent to this transfer.</p>
    </div>

    <div class="privacy-section">
      <h2>11. Changes to Privacy Policy</h2>
      <p>We may update this Privacy Policy from time to time. We will notify you of any changes by:</p>
      
      <ul>
        <li>Posting the new Privacy Policy on this page</li>
        <li>Updating the "Last updated" date at the top of this policy</li>
        <li>For significant changes, we may provide additional notice</li>
      </ul>

      <p>Your continued use of the service after any changes indicates your acceptance of the updated Privacy Policy.</p>
    </div>

    <div class="privacy-section contact-section">
      <h2>12. Contact Information</h2>
      <p>If you have any questions about this Privacy Policy or our data practices, please contact:</p>
      
      <div class="contact-details">
        <div class="contact-item">
          <strong>Developer:</strong> Md Tayobur Rahman
        </div>
        <div class="contact-item">
          <strong>Email:</strong> <a href="mailto:tayoburrahman119@gmail.com">tayoburrahman119@gmail.com</a>
        </div>
        <div class="contact-item">
          <strong>Website:</strong> <a href="https://mdtayoburrahman.com/" target="_blank">mdtayoburrahman.com</a>
        </div>
        <div class="contact-item">
          <strong>WhatsApp:</strong> +974 7183 0623 / +880 1717 932348
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.privacy-content {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  line-height: 1.6;
}

.last-updated {
  margin-top: 10px;
  padding: 8px 12px;
  background: #f8f9fa;
  border-radius: 4px;
  text-align: center;
}

.privacy-section {
  background: white;
  padding: 25px;
  margin-bottom: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  border-left: 4px solid #667eea;
}

.privacy-section h2 {
  color: #333;
  margin-bottom: 15px;
  font-size: 1.4em;
  border-bottom: 2px solid #eee;
  padding-bottom: 10px;
}

.privacy-section h3 {
  color: #555;
  margin: 20px 0 10px 0;
  font-size: 1.1em;
}

.privacy-section ul {
  margin: 15px 0;
  padding-left: 20px;
}

.privacy-section li {
  margin-bottom: 8px;
}

.highlight-box {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  padding: 20px;
  border-radius: 8px;
  margin: 20px 0;
}

.highlight-box h4 {
  color: white;
  margin-bottom: 10px;
}

.contact-section {
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  color: white;
}

.contact-section h2 {
  color: white;
  border-bottom-color: rgba(255,255,255,0.3);
}

.contact-details {
  margin-top: 20px;
}

.contact-item {
  margin-bottom: 10px;
  padding: 8px 0;
}

.contact-item a {
  color: white;
  text-decoration: none;
}

.contact-item a:hover {
  text-decoration: underline;
}

@media (max-width: 768px) {
  .privacy-content {
    padding: 10px;
  }
  
  .privacy-section {
    padding: 20px;
  }
}
</style>

<?php
// Include footer
require_once '../includes/footer.php';
?>
