<?php

/**
 * Footer template file
 * Contains the page footer with scripts
 *
 * @author Md Tayobur Rahman
 * @email - tayoburrahman119@gmail.com
 * @whatsapp -+974 7183 0623 / +880 1717 932348
 * @link - https://mdtayoburrahman.com/
 * @date 2025-06-26
 * @time 12:27
 * @copyright (c) 2025 Md Tayobur Rahman
 */

// Include config if not already included
if (!defined('ASSETS_PATH')) {
    require_once 'config.php';
}

// Set default custom JS if not provided
$customJS = isset($customJS) ? $customJS : [];
?>

<!-- Main Footer -->
<footer class="main-footer">
    <div class="footer-container">
        <!-- Footer Top Section -->
        <div class="footer-top">
            <div class="footer-section">
                <h3>Email Validator</h3>
                <p>Professional email validation service for businesses and developers. Validate email addresses in real-time with comprehensive checks.</p>
                <div class="footer-stats">
                    <div class="stat-item">
                        <span class="stat-number">1M+</span>
                        <span class="stat-label">Emails Validated</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">99.9%</span>
                        <span class="stat-label">Accuracy Rate</span>
                    </div>
                </div>
            </div>

            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="index.php">🏠 Home</a></li>
                    <li><a href="test.php">🧪 API Testing</a></li>
                    <li><a href="developer.php">👨‍💻 Developer Info</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Legal & Support</h4>
                <ul class="footer-links">
                    <li><a href="privacy.php">🔒 Privacy Policy</a></li>
                    <li><a href="terms.php">📄 Terms of Service</a></li>
                    <li><a href="mailto:support@emailvalidator.com">📧 Support</a></li>
                    <li><a href="mailto:contact@emailvalidator.com">💬 Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Developer</h4>
                <div class="developer-info">
                    <p><strong>Md Tayobur Rahman</strong></p>
                    <div class="developer-links">
                        <a href="mailto:tayoburrahman119@gmail.com" title="Email">📧</a>
                        <a href="https://wa.me/+9747183063" title="WhatsApp">📱</a>
                        <a href="https://mdtayoburrahman.com/" title="Website" target="_blank">🌐</a>
                        <a href="https://linkedin.com/in/mdtayoburrahman" title="LinkedIn" target="_blank">💼</a>
                    </div>
                    <p class="contact-info">
                        <small>📞 +974 7183 0623 / +880 1717 932348</small>
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <div class="copyright">
                    <p>&copy; <?php echo date('Y'); ?> Email Validator. All rights reserved.</p>
                    <p class="version">Version <?php echo defined('APP_VERSION') ? APP_VERSION : '1.0.0'; ?> | Built with ❤️</p>
                </div>
                <div class="footer-badges">
                    <span class="badge">✅ Secure</span>
                    <span class="badge">⚡ Fast</span>
                    <span class="badge">🎯 Accurate</span>
                    <span class="badge">🔄 Real-time</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer Styles -->
<style>
.main-footer {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: #ffffff;
    margin-top: 50px;
    position: relative;
    overflow: hidden;
}

.main-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #ffeaa7);
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-top {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    padding: 50px 0 30px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-section h3 {
    color: #4ecdc4;
    margin-bottom: 15px;
    font-size: 24px;
    font-weight: bold;
}

.footer-section h4 {
    color: #ffeaa7;
    margin-bottom: 15px;
    font-size: 18px;
    font-weight: 600;
}

.footer-section p {
    line-height: 1.6;
    margin-bottom: 15px;
    opacity: 0.9;
}

.footer-stats {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 24px;
    font-weight: bold;
    color: #4ecdc4;
}

.stat-label {
    display: block;
    font-size: 12px;
    opacity: 0.8;
    margin-top: 5px;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 10px;
}

.footer-links a {
    color: #ffffff;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    padding: 5px 0;
}

.footer-links a:hover {
    color: #4ecdc4;
    transform: translateX(5px);
}

.developer-info {
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 10px;
    backdrop-filter: blur(10px);
}

.developer-links {
    display: flex;
    gap: 15px;
    margin: 15px 0;
}

.developer-links a {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 18px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.developer-links a:hover {
    background: #4ecdc4;
    border-color: #ffffff;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(78, 205, 196, 0.4);
}

.contact-info {
    margin-top: 10px;
}

.footer-bottom {
    padding: 20px 0;
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.copyright p {
    margin: 0;
    opacity: 0.8;
}

.version {
    font-size: 14px;
    color: #4ecdc4;
}

.footer-badges {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.badge {
    background: rgba(255, 255, 255, 0.1);
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(5px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-top {
        grid-template-columns: 1fr;
        gap: 30px;
        padding: 30px 0 20px;
    }
    
    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-stats {
        justify-content: center;
    }
    
    .developer-links {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .footer-container {
        padding: 0 15px;
    }
    
    .footer-badges {
        justify-content: center;
    }
}

/* Animation for footer links */
.footer-links a {
    position: relative;
    overflow: hidden;
}

.footer-links a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: -100%;
    width: 100%;
    height: 2px;
    background: #4ecdc4;
    transition: left 0.3s ease;
}

.footer-links a:hover::after {
    left: 0;
}

/* Floating animation for badges */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
}

.badge:nth-child(1) { animation: float 3s ease-in-out infinite; animation-delay: 0s; }
.badge:nth-child(2) { animation: float 3s ease-in-out infinite; animation-delay: 0.5s; }
.badge:nth-child(3) { animation: float 3s ease-in-out infinite; animation-delay: 1s; }
.badge:nth-child(4) { animation: float 3s ease-in-out infinite; animation-delay: 1.5s; }
</style>

<!-- Default JavaScript -->
<script src="<?php echo ASSETS_PATH; ?>/js/script.js"></script>

<!-- Custom JavaScript files -->
<?php foreach ($customJS as $js): ?>
    <script src="<?php echo ASSETS_PATH; ?>/js/<?php echo $js; ?>"></script>
<?php endforeach; ?>

</body>
</html>
