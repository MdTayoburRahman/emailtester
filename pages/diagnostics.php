<?php

/**
 * @author Md Tayobur Rahman
 * @email - tayoburrahman119@gmail.com
 * @whatsapp -+974 7183 0623 / +880 1717 932348
 * @link - https://mdtayoburrahman.com/
 * @date 2025-06-26
 * @time 12:27
 * @copyright (c) 2025 Md Tayobur Rahman
 * @package diagnostics
 */

// Set page variables
$pageTitle = 'System Diagnostics';
$currentPage = 'diagnostics.php';
$customCSS = ['diagnostics.css'];

// Include header
require_once '../includes/header.php';
?>

<style>
  .main-navigation {
    background: #2d2d2d;
    padding: 10px 0;
    margin-bottom: 20px;
    border-radius: 8px;
  }
  
  .nav-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
  }
  
  .nav-brand h2 {
    color: #00ff00;
    margin: 0;
    text-shadow: 0 0 10px #00ff0050;
  }
  
  .nav-brand .version {
    color: #00ffff;
    font-size: 0.8em;
  }
  
  .nav-menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 20px;
  }
  
  .nav-menu a {
    color: #ffffff;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 4px;
    transition: background 0.3s ease;
  }
  
  .nav-menu a:hover,
  .nav-menu .active a {
    background: #00ff0020;
    color: #00ff00;
  }
  
  body {
    font-family: "Consolas", "Monaco", "Courier New", monospace;
    background: #1a1a1a;
    color: #ffffff;
    margin: 0;
    padding: 0;
    line-height: 1.6;
  }
  
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }
  
  h1 {
    color: #00ff00;
    text-align: center;
    text-shadow: 0 0 10px #00ff0050;
    margin-bottom: 30px;
  }
  
  .diagnostic-section {
    background: #2d2d2d;
    border: 1px solid #00ff00;
    border-radius: 8px;
    margin-bottom: 20px;
    padding: 20px;
  }
  
  .diagnostic-section h2 {
    color: #00ffff;
    margin-top: 0;
    border-bottom: 1px solid #444;
    padding-bottom: 10px;
  }
  
  .status-good {
    color: #00ff00;
    font-weight: bold;
  }
  
  .status-warning {
    color: #ffff00;
    font-weight: bold;
  }
  
  .status-error {
    color: #ff0000;
    font-weight: bold;
  }
  
  .diagnostic-item {
    margin-bottom: 10px;
    padding: 8px;
    background: #1e1e1e;
    border-radius: 4px;
    display: flex;
    justify-content: space-between;
  }
  
  .test-btn {
    background: #00ff00;
    color: #000;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    margin: 5px;
  }
  
  .test-btn:hover {
    background: #00cc00;
  }
  
  .test-results {
    background: #0a0a0a;
    border: 1px solid #333;
    border-radius: 4px;
    padding: 15px;
    margin-top: 10px;
    max-height: 300px;
    overflow-y: auto;
  }
  
  .log-entry {
    margin-bottom: 5px;
    font-size: 0.9em;
  }
  
  .timestamp {
    color: #888;
  }
  
  .system-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 15px;
    margin-top: 20px;
  }
  
  .info-card {
    background: #1e1e1e;
    border: 1px solid #444;
    border-radius: 6px;
    padding: 15px;
  }
  
  .info-card h4 {
    color: #00ffff;
    margin-top: 0;
    margin-bottom: 10px;
  }
  
  .info-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 0.9em;
  }
  
  .info-label {
    color: #ccc;
  }
  
  .info-value {
    color: #fff;
    font-weight: bold;
  }
</style>

<div class="container">
  <h1>🔧 EMAIL VALIDATOR SYSTEM DIAGNOSTICS</h1>

  <!-- Server Information Section -->
  <div class="diagnostic-section">
    <h2>🖥️ Server Information</h2>
    <div class="system-info">
      <div class="info-card">
        <h4>PHP Environment</h4>
        <div class="info-item">
          <span class="info-label">PHP Version:</span>
          <span class="info-value"><?php echo phpversion(); ?></span>
        </div>
        <div class="info-item">
          <span class="info-label">Server Software:</span>
          <span class="info-value"><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></span>
        </div>
        <div class="info-item">
          <span class="info-label">Document Root:</span>
          <span class="info-value"><?php echo $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown'; ?></span>
        </div>
        <div class="info-item">
          <span class="info-label">Server Time:</span>
          <span class="info-value"><?php echo date('Y-m-d H:i:s T'); ?></span>
        </div>
      </div>
      
      <div class="info-card">
        <h4>System Resources</h4>
        <div class="info-item">
          <span class="info-label">Memory Limit:</span>
          <span class="info-value"><?php echo ini_get('memory_limit'); ?></span>
        </div>
        <div class="info-item">
          <span class="info-label">Max Execution Time:</span>
          <span class="info-value"><?php echo ini_get('max_execution_time'); ?>s</span>
        </div>
        <div class="info-item">
          <span class="info-label">Upload Max Size:</span>
          <span class="info-value"><?php echo ini_get('upload_max_filesize'); ?></span>
        </div>
        <div class="info-item">
          <span class="info-label">Current Memory Usage:</span>
          <span class="info-value"><?php echo formatFileSize(memory_get_usage()); ?></span>
        </div>
      </div>
      
      <div class="info-card">
        <h4>Configuration</h4>
        <div class="info-item">
          <span class="info-label">App Version:</span>
          <span class="info-value"><?php echo APP_VERSION; ?></span>
        </div>
        <div class="info-item">
          <span class="info-label">Debug Mode:</span>
          <span class="info-value <?php echo ENABLE_DEBUG ? 'status-good' : 'status-warning'; ?>">
            <?php echo ENABLE_DEBUG ? 'Enabled' : 'Disabled'; ?>
          </span>
        </div>
        <div class="info-item">
          <span class="info-label">SMTP Timeout:</span>
          <span class="info-value"><?php echo SMTP_TIMEOUT; ?>s</span>
        </div>
        <div class="info-item">
          <span class="info-label">Max Batch Size:</span>
          <span class="info-value"><?php echo MAX_BATCH_SIZE; ?></span>
        </div>
      </div>
    </div>
  </div>

  <div class="diagnostic-section">
    <h2>📊 System Status</h2>
    <div id="systemStatus">
      <div class="diagnostic-item">
        <span>Web Server Status:</span>
        <span id="webServerStatus" class="status-warning">Checking...</span>
      </div>
      <div class="diagnostic-item">
        <span>PHP Backend Status:</span>
        <span id="phpStatus" class="status-warning">Checking...</span>
      </div>
      <div class="diagnostic-item">
        <span>API Endpoint:</span>
        <span id="backendStatus" class="status-warning">Checking...</span>
      </div>
      <div class="diagnostic-item">
        <span>Network Status:</span>
        <span id="networkStatus" class="status-warning">Checking...</span>
      </div>
      <div class="diagnostic-item">
        <span>DNS Resolution:</span>
        <span id="dnsStatus" class="status-warning">Checking...</span>
      </div>
    </div>
  </div>

  <div class="diagnostic-section">
    <h2>🧪 Quick Tests</h2>
    <button class="test-btn" onclick="runConnectivityTest()">
      Test Backend Connectivity
    </button>
    <button class="test-btn" onclick="runValidationTest()">
      Test Email Validation
    </button>
    <button class="test-btn" onclick="runPerformanceTest()">
      Performance Test
    </button>
    <button class="test-btn" onclick="runFullDiagnostic()">
      Full System Diagnostic
    </button>
    <div id="testResults" class="test-results" style="display: none"></div>
  </div>

  <div class="diagnostic-section">
    <h2>🌐 Environment Information</h2>
    <div id="environmentInfo"></div>
  </div>

  <div class="diagnostic-section">
    <h2>🔍 Network Analysis</h2>
    <div id="networkAnalysis"></div>
  </div>
</div>

<script>
  let diagnosticLogs = [];

  function log(message, type = "info") {
    const timestamp = new Date().toLocaleTimeString();
    const logEntry = `<div class="log-entry"><span class="timestamp">[${timestamp}]</span> ${message}</div>`;

    const testResults = document.getElementById("testResults");
    testResults.innerHTML += logEntry;
    testResults.style.display = "block";
    testResults.scrollTop = testResults.scrollHeight;

    diagnosticLogs.push({ timestamp, message, type });
  }

  async function checkSystemStatus() {
    // Check web server
    try {
      const response = await fetch(window.location.href);
      document.getElementById("webServerStatus").textContent = "Online";
      document.getElementById("webServerStatus").className = "status-good";
    } catch (error) {
      document.getElementById("webServerStatus").textContent = "Offline";
      document.getElementById("webServerStatus").className = "status-error";
    }

    // Check PHP backend
    try {
      const response = await fetch("../api/validate.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email: "test@example.com" }),
      });

      if (response.ok) {
        document.getElementById("phpStatus").textContent = "Working";
        document.getElementById("phpStatus").className = "status-good";
        document.getElementById("backendStatus").textContent = "Accessible";
        document.getElementById("backendStatus").className = "status-good";
      } else {
        document.getElementById("phpStatus").textContent = "Error";
        document.getElementById("phpStatus").className = "status-error";
        document.getElementById("backendStatus").textContent = "HTTP " + response.status;
        document.getElementById("backendStatus").className = "status-error";
      }
    } catch (error) {
      document.getElementById("phpStatus").textContent = "Error";
      document.getElementById("phpStatus").className = "status-error";
      document.getElementById("backendStatus").textContent = "Not Accessible";
      document.getElementById("backendStatus").className = "status-error";
    }

    // Check network
    document.getElementById("networkStatus").textContent = navigator.onLine
      ? "Online"
      : "Offline";
    document.getElementById("networkStatus").className = navigator.onLine
      ? "status-good"
      : "status-error";

    // DNS test
    try {
      await fetch("https://8.8.8.8", { mode: "no-cors" });
      document.getElementById("dnsStatus").textContent = "Working";
      document.getElementById("dnsStatus").className = "status-good";
    } catch (error) {
      document.getElementById("dnsStatus").textContent = "Limited";
      document.getElementById("dnsStatus").className = "status-warning";
    }
  }

  function displayEnvironmentInfo() {
    const info = document.getElementById("environmentInfo");
    info.innerHTML = `
      <div class="diagnostic-item"><span>Browser:</span><span>${navigator.userAgent}</span></div>
      <div class="diagnostic-item"><span>URL:</span><span>${window.location.href}</span></div>
      <div class="diagnostic-item"><span>Protocol:</span><span>${window.location.protocol}</span></div>
      <div class="diagnostic-item"><span>Host:</span><span>${window.location.host}</span></div>
      <div class="diagnostic-item"><span>Viewport:</span><span>${window.innerWidth}x${window.innerHeight}</span></div>
      <div class="diagnostic-item"><span>Online:</span><span>${navigator.onLine}</span></div>
      <div class="diagnostic-item"><span>Language:</span><span>${navigator.language}</span></div>
      <div class="diagnostic-item"><span>Platform:</span><span>${navigator.platform}</span></div>
      <div class="diagnostic-item"><span>Cookies Enabled:</span><span>${navigator.cookieEnabled}</span></div>
    `;
  }

  function displayNetworkAnalysis() {
    const analysis = document.getElementById("networkAnalysis");
    const connection = navigator.connection || {};

    analysis.innerHTML = `
      <div class="diagnostic-item"><span>Connection Type:</span><span>${
        connection.effectiveType || "Unknown"
      }</span></div>
      <div class="diagnostic-item"><span>Downlink Speed:</span><span>${
        connection.downlink || "Unknown"
      } Mbps</span></div>
      <div class="diagnostic-item"><span>RTT:</span><span>${
        connection.rtt || "Unknown"
      } ms</span></div>
      <div class="diagnostic-item"><span>Data Saver:</span><span>${
        connection.saveData ? "Enabled" : "Disabled"
      }</span></div>
      <div class="diagnostic-item"><span>Memory:</span><span>${
        navigator.deviceMemory || "Unknown"
      } GB</span></div>
    `;
  }

  async function runConnectivityTest() {
    log("🔗 Starting connectivity test...", "info");

    try {
      const startTime = performance.now();
      const response = await fetch("../api/validate.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email: "connectivity-test@example.com" }),
      });
      const endTime = performance.now();

      log(
        `✅ Backend reachable in ${(endTime - startTime).toFixed(2)}ms`,
        "success"
      );
      log(`📊 Status: ${response.status} ${response.statusText}`, "info");

      const contentType = response.headers.get("content-type");
      log(`📄 Content-Type: ${contentType}`, "info");

      if (response.ok) {
        const data = await response.json();
        log(
          `📧 Test validation: ${data.is_valid ? "Success" : "Failed"}`,
          data.is_valid ? "success" : "warning"
        );
      } else {
        const text = await response.text();
        log(`❌ Error response: ${text}`, "error");
      }
    } catch (error) {
      log(`❌ Connectivity test failed: ${error.message}`, "error");
    }
  }

  async function runValidationTest() {
    log("📧 Starting email validation test...", "info");

    const testEmails = [
      "test@gmail.com",
      "invalid-email",
      "user@nonexistent-domain-12345.com",
    ];

    for (const email of testEmails) {
      try {
        log(`🔍 Testing: ${email}`, "info");
        const startTime = performance.now();
        
        const response = await fetch("../api/validate.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ email: email }),
        });
        
        const endTime = performance.now();
        const data = await response.json();
        
        log(
          `📊 ${email}: ${data.is_valid ? "✅ Valid" : "❌ Invalid"} (${(endTime - startTime).toFixed(2)}ms)`,
          data.is_valid ? "success" : "warning"
        );
      } catch (error) {
        log(`❌ Failed to test ${email}: ${error.message}`, "error");
      }
    }
  }

  async function runPerformanceTest() {
    log("⚡ Starting performance test...", "info");

    const iterations = 5;
    const times = [];

    for (let i = 0; i < iterations; i++) {
      try {
        const startTime = performance.now();
        const response = await fetch("../api/validate.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ email: "performance-test@gmail.com" }),
        });
        const endTime = performance.now();
        
        if (response.ok) {
          const time = endTime - startTime;
          times.push(time);
          log(`🔄 Iteration ${i + 1}: ${time.toFixed(2)}ms`, "info");
        }
      } catch (error) {
        log(`❌ Performance test iteration ${i + 1} failed: ${error.message}`, "error");
      }
    }

    if (times.length > 0) {
      const avgTime = times.reduce((a, b) => a + b, 0) / times.length;
      const minTime = Math.min(...times);
      const maxTime = Math.max(...times);
      
      log(`📈 Performance Results:`, "info");
      log(`   Average: ${avgTime.toFixed(2)}ms`, "info");
      log(`   Minimum: ${minTime.toFixed(2)}ms`, "info");
      log(`   Maximum: ${maxTime.toFixed(2)}ms`, "info");
    }
  }

  async function runFullDiagnostic() {
    log("🔧 Starting full system diagnostic...", "info");
    await runConnectivityTest();
    await runValidationTest();
    await runPerformanceTest();
    log("✅ Full diagnostic completed", "success");
  }

  // Initialize on page load
  document.addEventListener("DOMContentLoaded", function () {
    checkSystemStatus();
    displayEnvironmentInfo();
    displayNetworkAnalysis();

    // Update network status periodically
    setInterval(checkSystemStatus, 30000);
  });
</script>

<?php
// Include footer
require_once '../includes/footer.php';
?>
