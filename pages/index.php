

<?php

/**
 * @author Md Tayobur Rahman
 * @email - tayoburrahman119@gmail.com
 * @whatsapp -+974 7183 0623 / +880 1717 932348
 * @link - https://mdtayoburrahman.com/
 * @date 2025-06-26
 * @time 12:27
 * @copyright (c) 2025 Md Tayobur Rahman
 * @package index
 */

// Set page variables
$pageTitle = 'Email Validator';
$currentPage = 'index.php';

// Include header
require_once '../includes/header.php';
?>

<div class="container">
  <header>
    <h1>Email Address Tester</h1>
    <p>Validate email addresses and check if they're working</p>
  </header>

  <div class="email-tester">
    <!-- Main Email Testing Form -->
    <form id="emailForm">
      <div class="input-group">
        <label for="email">Email Address:</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="Enter email address to test"
          required
        />
        <button type="submit" id="testBtn">
          <span class="btn-text">Test Email</span>
          <span class="loader" id="loader"></span>
        </button>
      </div>
    </form>

    <!-- Advanced Options Panel -->
    <div class="advanced-options">
      <button type="button" id="toggleAdvanced" class="toggle-btn">
        🔧 Advanced Options
      </button>
      <div id="advancedPanel" class="advanced-panel" style="display: none">
        <div class="option-group">
          <label>
            <input type="checkbox" id="enableDebugging" checked /> Enable
            Debug Mode
          </label>
          <label>
            <input type="checkbox" id="showNetworkDetails" checked /> Show
            Network Details
          </label>
          <label>
            <input type="checkbox" id="enableTimeout" /> Custom Timeout:
            <input
              type="number"
              id="timeoutValue"
              value="10"
              min="5"
              max="60"
              style="width: 60px"
            />
            seconds
          </label>
        </div>

        <!-- Batch Testing -->
        <div class="batch-testing">
          <h4>Batch Email Testing</h4>
          <textarea
            id="batchEmails"
            placeholder="Enter multiple emails (one per line)&#10;example1@domain.com&#10;example2@domain.com"
          ></textarea>
          <button type="button" id="batchTestBtn">Test All Emails</button>
        </div>
      </div>
    </div>

    <!-- Debug Information Panel -->
    <div class="debug-panel" id="debugPanel" style="display: none">
      <h3>🐛 Debug Information</h3>
      <div class="debug-content">
        <div class="debug-section">
          <h4>Request Details</h4>
          <div id="requestDetails"></div>
        </div>
        <div class="debug-section">
          <h4>Network Status</h4>
          <div id="networkStatus"></div>
        </div>
        <div class="debug-section">
          <h4>Console Logs</h4>
          <div id="consoleLogs"></div>
        </div>
      </div>
    </div>

    <div class="results" id="results" style="display: none">
      <h3>📊 Validation Results</h3>
      <div class="result-item">
        <span class="label">Email Format:</span>
        <span class="value" id="formatResult"></span>
      </div>
      <div class="result-item">
        <span class="label">Domain Exists:</span>
        <span class="value" id="domainResult"></span>
      </div>
      <div class="result-item">
        <span class="label">MX Record:</span>
        <span class="value" id="mxResult"></span>
      </div>
      <div class="result-item">
        <span class="label">SMTP Check:</span>
        <span class="value" id="smtpResult"></span>
      </div>
      <div class="result-item">
        <span class="label">Overall Status:</span>
        <span class="value" id="overallResult"></span>
      </div>
      <div class="result-item">
        <span class="label">Validation Time:</span>
        <span class="value" id="validationTime"></span>
      </div>
      <div class="result-details" id="resultDetails"></div>

      <!-- Advanced Result Details -->
      <div class="advanced-results" id="advancedResults">
        <h4>🔍 Detailed Analysis</h4>
        <div class="analysis-grid">
          <div class="analysis-item">
            <strong>Email Pattern:</strong>
            <span id="emailPattern"></span>
          </div>
          <div class="analysis-item">
            <strong>Domain Type:</strong>
            <span id="domainType"></span>
          </div>
          <div class="analysis-item">
            <strong>Provider:</strong>
            <span id="emailProvider"></span>
          </div>
          <div class="analysis-item">
            <strong>Risk Level:</strong>
            <span id="riskLevel"></span>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="action-buttons" id="actionButtons" style="display: none">
        <button
          type="button"
          id="copyToClipboardBtn"
          class="action-btn copy-btn"
        >
          📋 Copy Results to Clipboard
        </button>
        <button
          type="button"
          id="downloadReportBtn"
          class="action-btn download-btn"
        >
          📄 Download Report
        </button>
      </div>
    </div>

    <!-- Batch Results -->
    <div class="batch-results" id="batchResults" style="display: none">
      <h3>📈 Batch Test Results</h3>
      <div class="batch-summary" id="batchSummary"></div>
      <div class="batch-details" id="batchDetails"></div>
    </div>

    <div
      class="error-message"
      id="errorMessage"
      style="display: none"
    ></div>
  </div>

  <div class="features">
    <h3>What we check:</h3>
    <ul>
      <li>✓ Email format validation</li>
      <li>✓ Domain existence check</li>
      <li>✓ MX record verification</li>
      <li>✓ SMTP server connectivity</li>
      <li>✓ Real-time validation</li>
    </ul>
  </div>
</div>

<?php
// Include footer
require_once '../includes/footer.php';
?>
