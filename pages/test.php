<?php

/**
 * @author Md Tayobur Rahman
 * @email - tayoburrahman119@gmail.com
 * @whatsapp -+974 7183 0623 / +880 1717 932348
 * @link - https://mdtayoburrahman.com/
 * @date 2025-06-26
 * @time 12:27
 * @copyright (c) 2025 Md Tayobur Rahman
 * @package test
 */

// Set page variables
$pageTitle = 'API Test';
$currentPage = 'test.php';

// Include header
require_once '../includes/header.php';
?>

<style>
  .test-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }
  
  .test-header {
    text-align: center;
    color: white;
    margin-bottom: 40px;
  }
  
  .test-header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
  }
  
  .test-section {
    background: white;
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  }
  
  .test-section h2 {
    color: #333;
    margin-bottom: 20px;
    font-size: 1.5rem;
  }
  
  .test-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin: 10px 10px 10px 0;
  }
  
  .test-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
  }
  
  .test-result {
    margin-top: 20px;
    padding: 20px;
    border-radius: 8px;
    font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
    font-size: 0.9rem;
    max-height: 400px;
    overflow-y: auto;
  }
  
  .result-success {
    background: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
  }
  
  .result-error {
    background: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
  }
  
  .result-info {
    background: #d1ecf1;
    border: 1px solid #bee5eb;
    color: #0c5460;
  }
  
  pre {
    margin: 0;
    white-space: pre-wrap;
    word-wrap: break-word;
  }
  
  .endpoint-info {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 6px;
    padding: 15px;
    margin-bottom: 20px;
  }
  
  .endpoint-info code {
    background: #e9ecef;
    padding: 2px 6px;
    border-radius: 3px;
    font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
  }
  
  .status-indicator {
    display: inline-block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin-right: 8px;
  }
  
  .status-online {
    background: #28a745;
  }
  
  .status-offline {
    background: #dc3545;
  }
  
  .status-warning {
    background: #ffc107;
  }
</style>

<div class="test-container">
  <div class="test-header">
    <h1>Email Validator API Test</h1>
    <p>Test and debug the email validation API endpoint</p>
  </div>

  <div class="test-section">
    <h2>📡 API Endpoint Information</h2>
    <div class="endpoint-info">
      <p><strong>Endpoint URL:</strong> <code><?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/api/validate.php'; ?></code></p>
      <p><strong>Method:</strong> <code>POST</code></p>
      <p><strong>Content-Type:</strong> <code>application/json</code></p>
      <p><strong>Request Body:</strong> <code>{"email": "test@example.com"}</code></p>
    </div>
    
    <div id="apiStatus">
      <span class="status-indicator status-warning"></span>
      <span>API Status: Checking...</span>
    </div>
  </div>

  <div class="test-section">
    <h2>🧪 Quick API Tests</h2>
    <button class="test-btn" onclick="testBasicFetch()">Test Basic Connectivity</button>
    <button class="test-btn" onclick="testValidEmail()">Test Valid Email</button>
    <button class="test-btn" onclick="testInvalidEmail()">Test Invalid Email</button>
    <button class="test-btn" onclick="testBatchEmails()">Test Multiple Emails</button>
    <button class="test-btn" onclick="testErrorHandling()">Test Error Handling</button>
    
    <div id="testResult" style="display: none;"></div>
  </div>

  <div class="test-section">
    <h2>🔍 Custom Email Test</h2>
    <div style="margin-bottom: 20px;">
      <label for="customEmail" style="display: block; margin-bottom: 10px; font-weight: 600;">Enter Email to Test:</label>
      <input type="email" id="customEmail" placeholder="Enter email address..." 
             style="width: 70%; padding: 12px; border: 2px solid #e1e5e9; border-radius: 6px; font-size: 1rem;">
      <button class="test-btn" onclick="testCustomEmail()" style="margin-left: 10px;">Test Email</button>
    </div>
    <div id="customResult" style="display: none;"></div>
  </div>

  <div class="test-section">
    <h2>📊 Performance Metrics</h2>
    <button class="test-btn" onclick="runPerformanceTest()">Run Performance Test</button>
    <div id="performanceResult" style="display: none;"></div>
  </div>
</div>

<script>
  let testResults = [];

  function displayResult(elementId, data, type = 'info') {
    const resultDiv = document.getElementById(elementId);
    let className = 'result-info';
    
    if (type === 'success') className = 'result-success';
    else if (type === 'error') className = 'result-error';
    
    resultDiv.innerHTML = `<div class="test-result ${className}"><pre>${JSON.stringify(data, null, 2)}</pre></div>`;
    resultDiv.style.display = 'block';
    
    // Auto-scroll to result
    resultDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }

  function logTest(testName, result, duration) {
    testResults.push({
      test: testName,
      result: result,
      duration: duration,
      timestamp: new Date().toISOString()
    });
  }

  async function checkApiStatus() {
    try {
      const response = await fetch('../api/validate.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: 'status-check@example.com' })
      });
      
      const statusDiv = document.getElementById('apiStatus');
      if (response.ok) {
        statusDiv.innerHTML = '<span class="status-indicator status-online"></span><span>API Status: Online ✅</span>';
      } else {
        statusDiv.innerHTML = '<span class="status-indicator status-warning"></span><span>API Status: Issues Detected ⚠️</span>';
      }
    } catch (error) {
      const statusDiv = document.getElementById('apiStatus');
      statusDiv.innerHTML = '<span class="status-indicator status-offline"></span><span>API Status: Offline ❌</span>';
    }
  }

  async function testBasicFetch() {
    const startTime = performance.now();
    
    try {
      console.log("Testing basic fetch to validate.php...");
      console.log("Current URL:", window.location.href);
      
      const response = await fetch("../api/validate.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ email: "test@gmail.com" }),
      });

      const endTime = performance.now();
      const duration = Math.round(endTime - startTime);

      console.log("Response status:", response.status);
      console.log("Response ok:", response.ok);

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const data = await response.json();
      console.log("Response data:", data);

      logTest('Basic Connectivity', 'success', duration);
      displayResult('testResult', {
        status: 'SUCCESS',
        message: 'API is responding correctly',
        duration: duration + 'ms',
        response: data
      }, 'success');

    } catch (error) {
      const endTime = performance.now();
      const duration = Math.round(endTime - startTime);
      
      console.error("Fetch error:", error);
      logTest('Basic Connectivity', 'error', duration);
      displayResult('testResult', {
        status: 'ERROR',
        message: error.message,
        duration: duration + 'ms'
      }, 'error');
    }
  }

  async function testValidEmail() {
    const email = 'test@gmail.com';
    const startTime = performance.now();
    
    try {
      const response = await fetch('../api/validate.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: email })
      });
      
      const endTime = performance.now();
      const duration = Math.round(endTime - startTime);
      const data = await response.json();
      
      logTest('Valid Email Test', data.is_valid ? 'success' : 'warning', duration);
      displayResult('testResult', {
        test: 'Valid Email Test',
        email: email,
        duration: duration + 'ms',
        result: data
      }, data.is_valid ? 'success' : 'error');
      
    } catch (error) {
      displayResult('testResult', { error: error.message }, 'error');
    }
  }

  async function testInvalidEmail() {
    const email = 'invalid-email-format';
    const startTime = performance.now();
    
    try {
      const response = await fetch('../api/validate.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: email })
      });
      
      const endTime = performance.now();
      const duration = Math.round(endTime - startTime);
      const data = await response.json();
      
      logTest('Invalid Email Test', !data.is_valid ? 'success' : 'warning', duration);
      displayResult('testResult', {
        test: 'Invalid Email Test',
        email: email,
        duration: duration + 'ms',
        result: data
      }, !data.is_valid ? 'success' : 'error');
      
    } catch (error) {
      displayResult('testResult', { error: error.message }, 'error');
    }
  }

  async function testBatchEmails() {
    const emails = [
      'test@gmail.com',
      'invalid-email',
      'user@nonexistent-domain-12345.com',
      'admin@google.com'
    ];
    
    const results = [];
    const startTime = performance.now();
    
    for (const email of emails) {
      try {
        const response = await fetch('../api/validate.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ email: email })
        });
        
        const data = await response.json();
        results.push({ email, result: data.is_valid, details: data });
        
      } catch (error) {
        results.push({ email, error: error.message });
      }
    }
    
    const endTime = performance.now();
    const duration = Math.round(endTime - startTime);
    
    logTest('Batch Email Test', 'completed', duration);
    displayResult('testResult', {
      test: 'Batch Email Test',
      totalEmails: emails.length,
      duration: duration + 'ms',
      results: results
    }, 'info');
  }

  async function testErrorHandling() {
    const testCases = [
      { description: 'Empty email', data: { email: '' } },
      { description: 'Missing email field', data: {} },
      { description: 'Invalid JSON', data: 'invalid-json', isInvalidJson: true }
    ];
    
    const results = [];
    
    for (const testCase of testCases) {
      try {
        const body = testCase.isInvalidJson ? testCase.data : JSON.stringify(testCase.data);
        
        const response = await fetch('../api/validate.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: body
        });
        
        const responseText = await response.text();
        let data;
        
        try {
          data = JSON.parse(responseText);
        } catch {
          data = { rawResponse: responseText };
        }
        
        results.push({
          test: testCase.description,
          status: response.status,
          response: data
        });
        
      } catch (error) {
        results.push({
          test: testCase.description,
          error: error.message
        });
      }
    }
    
    logTest('Error Handling Test', 'completed', 0);
    displayResult('testResult', {
      test: 'Error Handling Test',
      results: results
    }, 'info');
  }

  async function testCustomEmail() {
    const email = document.getElementById('customEmail').value.trim();
    
    if (!email) {
      displayResult('customResult', { error: 'Please enter an email address' }, 'error');
      return;
    }
    
    const startTime = performance.now();
    
    try {
      const response = await fetch('../api/validate.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: email })
      });
      
      const endTime = performance.now();
      const duration = Math.round(endTime - startTime);
      const data = await response.json();
      
      logTest('Custom Email Test', data.is_valid ? 'success' : 'invalid', duration);
      displayResult('customResult', {
        email: email,
        duration: duration + 'ms',
        validation: data
      }, data.is_valid ? 'success' : 'error');
      
    } catch (error) {
      displayResult('customResult', { error: error.message }, 'error');
    }
  }

  async function runPerformanceTest() {
    const iterations = 10;
    const email = 'performance-test@gmail.com';
    const times = [];
    const results = [];
    
    displayResult('performanceResult', { message: 'Running performance test...', iterations: iterations }, 'info');
    
    for (let i = 0; i < iterations; i++) {
      const startTime = performance.now();
      
      try {
        const response = await fetch('../api/validate.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ email: email })
        });
        
        const endTime = performance.now();
        const duration = endTime - startTime;
        times.push(duration);
        
        const data = await response.json();
        results.push({ iteration: i + 1, duration: Math.round(duration), success: response.ok });
        
      } catch (error) {
        results.push({ iteration: i + 1, error: error.message });
      }
    }
    
    const avgTime = times.length > 0 ? times.reduce((a, b) => a + b, 0) / times.length : 0;
    const minTime = times.length > 0 ? Math.min(...times) : 0;
    const maxTime = times.length > 0 ? Math.max(...times) : 0;
    
    logTest('Performance Test', 'completed', Math.round(avgTime));
    displayResult('performanceResult', {
      test: 'Performance Test',
      iterations: iterations,
      averageTime: Math.round(avgTime) + 'ms',
      minimumTime: Math.round(minTime) + 'ms',
      maximumTime: Math.round(maxTime) + 'ms',
      successRate: (results.filter(r => r.success).length / iterations * 100).toFixed(1) + '%',
      detailedResults: results
    }, 'success');
  }

  // Add enter key support for custom email test
  document.addEventListener('DOMContentLoaded', function() {
    checkApiStatus();
    
    document.getElementById('customEmail').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        testCustomEmail();
      }
    });
  });
</script>

<?php
// Include footer
require_once '../includes/footer.php';
?>
