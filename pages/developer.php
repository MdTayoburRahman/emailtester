<?php

/**
 * @author Md Tayobur Rahman
 * @email - tayoburrahman119@gmail.com
 * @whatsapp -+974 7183 0623 / +880 1717 932348
 * @link - https://mdtayoburrahman.com/
 * @date 2025-06-26
 * @time 12:27
 * @copyright (c) 2025 Md Tayobur Rahman
 * @package developer
 */

// Set page variables
$pageTitle = 'Developer Info';
$currentPage = 'developer.php';

// Include header
require_once '../includes/header.php';
?>

<div class="container">
  <header>
    <h1>👨‍💻 Developer Information</h1>
    <p>About the developer behind Email Validator Pro</p>
  </header>

  <div class="developer-info">
    <div class="developer-card">
      <div class="developer-avatar">
        <div class="avatar-placeholder">
          <span class="avatar-initials">MTR</span>
        </div>
      </div>
      
      <div class="developer-details">
        <h2>Md Tayobur Rahman</h2>
        <p class="developer-title">Full Stack Developer & Software Engineer</p>
        
        <div class="contact-info">
          <div class="contact-item">
            <span class="contact-icon">📧</span>
            <a href="mailto:tayoburrahman119@gmail.com">tayoburrahman119@gmail.com</a>
          </div>
          
          <div class="contact-item">
            <span class="contact-icon">📱</span>
            <span>WhatsApp: +974 7183 0623 / +880 1717 932348</span>
          </div>
          
          <div class="contact-item">
            <span class="contact-icon">🌐</span>
            <a href="https://mdtayoburrahman.com/" target="_blank">mdtayoburrahman.com</a>
          </div>
          
          <div class="contact-item">
            <span class="contact-icon">📅</span>
            <span>Project Date: June 26, 2025</span>
          </div>
        </div>
      </div>
    </div>

    <div class="project-info">
      <h3>🚀 About This Project</h3>
      <div class="project-details">
        <p><strong>Email Validator Pro v2.0.0</strong> is a professional email validation tool built with modern web technologies.</p>
        
        <h4>🛠️ Technologies Used:</h4>
        <ul class="tech-list">
          <li><span class="tech-badge">PHP 8.2+</span> Backend processing and validation</li>
          <li><span class="tech-badge">JavaScript ES6+</span> Interactive frontend functionality</li>
          <li><span class="tech-badge">HTML5/CSS3</span> Modern responsive design</li>
          <li><span class="tech-badge">Apache</span> Web server configuration</li>
          <li><span class="tech-badge">JSON API</span> RESTful communication</li>
        </ul>

        <h4>✨ Key Features:</h4>
        <ul class="feature-list">
          <li>Real-time email format validation</li>
          <li>Domain existence verification</li>
          <li>MX record lookup and validation</li>
          <li>SMTP server connectivity testing</li>
          <li>Batch email processing</li>
          <li>Advanced debugging and diagnostics</li>
          <li>Professional UI/UX design</li>
          <li>Secure and optimized codebase</li>
        </ul>

        <h4>🏗️ Architecture:</h4>
        <ul class="architecture-list">
          <li><strong>Modular Design:</strong> Clean separation of concerns</li>
          <li><strong>RESTful API:</strong> Standardized communication protocol</li>
          <li><strong>Responsive Layout:</strong> Mobile-first approach</li>
          <li><strong>Security First:</strong> Input validation and sanitization</li>
          <li><strong>Performance Optimized:</strong> Efficient processing and caching</li>
        </ul>
      </div>
    </div>

    <div class="copyright-info">
      <h3>📄 Copyright & License</h3>
      <div class="copyright-details">
        <p><strong>Copyright © 2025 Md Tayobur Rahman</strong></p>
        <p>All rights reserved. This project is developed and maintained by Md Tayobur Rahman.</p>
        <p>For licensing inquiries or commercial use, please contact the developer.</p>
      </div>
    </div>

    <div class="skills-showcase">
      <h3>💼 Developer Skills</h3>
      <div class="skills-grid">
        <div class="skill-category">
          <h4>Backend Development</h4>
          <ul>
            <li>PHP (Laravel, CodeIgniter)</li>
            <li>Node.js & Express</li>
            <li>Python (Django, Flask)</li>
            <li>Database Design (MySQL, PostgreSQL)</li>
          </ul>
        </div>
        
        <div class="skill-category">
          <h4>Frontend Development</h4>
          <ul>
            <li>JavaScript (ES6+, React, Vue)</li>
            <li>HTML5 & CSS3 (SCSS, Tailwind)</li>
            <li>Responsive Web Design</li>
            <li>Progressive Web Apps</li>
          </ul>
        </div>
        
        <div class="skill-category">
          <h4>DevOps & Tools</h4>
          <ul>
            <li>Git & Version Control</li>
            <li>Apache & Nginx</li>
            <li>Docker & Containerization</li>
            <li>Cloud Services (AWS, Digital Ocean)</li>
          </ul>
        </div>
        
        <div class="skill-category">
          <h4>Specializations</h4>
          <ul>
            <li>Email Systems & SMTP</li>
            <li>API Development</li>
            <li>Security Implementation</li>
            <li>Performance Optimization</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="contact-cta">
      <h3>🤝 Let's Connect</h3>
      <p>Interested in working together or have questions about this project?</p>
      <div class="cta-buttons">
        <a href="mailto:tayoburrahman119@gmail.com" class="cta-btn primary">Send Email</a>
        <a href="https://mdtayoburrahman.com/" target="_blank" class="cta-btn secondary">Visit Website</a>
      </div>
    </div>
  </div>
</div>

<style>
.developer-info {
  max-width: 900px;
  margin: 0 auto;
  padding: 20px;
}

.developer-card {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  padding: 30px;
  border-radius: 15px;
  margin-bottom: 30px;
  display: flex;
  align-items: center;
  gap: 30px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.developer-avatar {
  flex-shrink: 0;
}

.avatar-placeholder {
  width: 120px;
  height: 120px;
  background: rgba(255,255,255,0.2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 3px solid rgba(255,255,255,0.3);
}

.avatar-initials {
  font-size: 36px;
  font-weight: bold;
  color: white;
}

.developer-details h2 {
  margin: 0 0 10px 0;
  font-size: 2.2em;
  font-weight: 600;
}

.developer-title {
  font-size: 1.2em;
  opacity: 0.9;
  margin-bottom: 20px;
}

.contact-info {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.contact-item {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 1.1em;
}

.contact-icon {
  font-size: 1.2em;
}

.contact-item a {
  color: white;
  text-decoration: none;
}

.contact-item a:hover {
  text-decoration: underline;
}

.project-info, .copyright-info, .skills-showcase, .contact-cta {
  background: white;
  padding: 25px;
  border-radius: 10px;
  margin-bottom: 20px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.project-info h3, .copyright-info h3, .skills-showcase h3, .contact-cta h3 {
  color: #333;
  margin-bottom: 20px;
  font-size: 1.4em;
}

.tech-list, .feature-list, .architecture-list {
  list-style: none;
  padding: 0;
}

.tech-list li, .feature-list li, .architecture-list li {
  padding: 8px 0;
  border-bottom: 1px solid #eee;
}

.tech-badge {
  background: #667eea;
  color: white;
  padding: 3px 8px;
  border-radius: 4px;
  font-size: 0.85em;
  font-weight: 600;
  margin-right: 10px;
}

.skills-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  margin-top: 20px;
}

.skill-category {
  background: #f8f9fa;
  padding: 20px;
  border-radius: 8px;
  border-left: 4px solid #667eea;
}

.skill-category h4 {
  color: #667eea;
  margin-bottom: 15px;
  font-size: 1.1em;
}

.skill-category ul {
  list-style: none;
  padding: 0;
}

.skill-category li {
  padding: 5px 0;
  color: #555;
}

.contact-cta {
  text-align: center;
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  color: white;
}

.contact-cta h3 {
  color: white;
}

.cta-buttons {
  display: flex;
  gap: 15px;
  justify-content: center;
  margin-top: 20px;
}

.cta-btn {
  padding: 12px 25px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  transition: transform 0.2s;
}

.cta-btn.primary {
  background: white;
  color: #f5576c;
}

.cta-btn.secondary {
  background: rgba(255,255,255,0.2);
  color: white;
  border: 2px solid white;
}

.cta-btn:hover {
  transform: translateY(-2px);
}

@media (max-width: 768px) {
  .developer-card {
    flex-direction: column;
    text-align: center;
  }
  
  .cta-buttons {
    flex-direction: column;
  }
  
  .skills-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<?php
// Include footer
require_once '../includes/footer.php';
?>
