document.addEventListener("DOMContentLoaded", function () {
  const emailForm = document.getElementById("emailForm");
  const emailInput = document.getElementById("email");
  const testBtn = document.getElementById("testBtn");
  const loader = document.getElementById("loader");
  const results = document.getElementById("results");
  const errorMessage = document.getElementById("errorMessage");

  // Advanced feature elements
  const toggleAdvanced = document.getElementById("toggleAdvanced");
  const advancedPanel = document.getElementById("advancedPanel");
  const debugPanel = document.getElementById("debugPanel");
  const enableDebugging = document.getElementById("enableDebugging");
  const showNetworkDetails = document.getElementById("showNetworkDetails");
  const batchTestBtn = document.getElementById("batchTestBtn");
  const batchEmails = document.getElementById("batchEmails");
  const batchResults = document.getElementById("batchResults");

  // Action buttons
  const copyToClipboardBtn = document.getElementById("copyToClipboardBtn");
  const downloadReportBtn = document.getElementById("downloadReportBtn");
  const actionButtons = document.getElementById("actionButtons");

  // Debug logging system
  const debugLogs = [];
  let requestStartTime = 0;
  let networkMetrics = {};

  // Initialize advanced features
  initializeAdvancedFeatures();

  // Real-time email format validation
  emailInput.addEventListener("input", function () {
    const email = this.value;
    if (email && !isValidEmailFormat(email)) {
      this.style.borderColor = "#dc3545";
    } else {
      this.style.borderColor = "#28a745";
    }
  });

  emailForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const email = emailInput.value.trim();

    if (!email) {
      showError("Please enter an email address");
      return;
    }

    if (!isValidEmailFormat(email)) {
      showError("Please enter a valid email format");
      return;
    }

    await testEmail(email);
  });

  // Action button event listeners
  if (copyToClipboardBtn) {
    copyToClipboardBtn.addEventListener("click", function () {
      copyResultsToClipboard();
    });
  }

  if (downloadReportBtn) {
    downloadReportBtn.addEventListener("click", function () {
      downloadValidationReport();
    });
  }

  function isValidEmailFormat(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  async function testEmail(email) {
    const requestId = Date.now();
    requestStartTime = performance.now();

    try {
      logDebug(`Starting email validation for: ${email}`, "info");

      // Show loading state
      setLoadingState(true);
      hideError();
      hideResults();

      // Update debug info if enabled
      if (enableDebugging && enableDebugging.checked) {
        updateDebugDisplay();
      }

      // Send request to PHP backend with enhanced error tracking
      const baseUrl =
        window.location.origin +
        window.location.pathname
          .replace(/\/[^/]*$/, "/")
          .replace(/\/pages\/$/, "/");
      const url = baseUrl + "api/validate.php";

      logDebug(`Request URL: ${url}`, "info");
      logDebug(`Request payload: ${JSON.stringify({ email: email })}`, "info");

      const fetchStartTime = performance.now();
      const response = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ email: email }),
      });

      const fetchEndTime = performance.now();
      const networkTime = fetchEndTime - fetchStartTime;

      logDebug(
        `Network request completed in ${networkTime.toFixed(2)}ms`,
        "info"
      );
      logDebug(
        `Response status: ${response.status} ${response.statusText}`,
        "info"
      );
      logDebug(
        `Response headers: ${JSON.stringify([...response.headers.entries()])}`,
        "info"
      );

      if (!response.ok) {
        const errorText = await response.text();
        logDebug(`Response error text: ${errorText}`, "error");

        const diagnosis = diagnoseError(
          new Error(`HTTP ${response.status}: ${errorText}`),
          {
            url,
            status: response.status,
            statusText: response.statusText,
            networkTime: networkTime.toFixed(2) + "ms",
          }
        );

        throw new Error(
          `HTTP error! status: ${response.status} - ${errorText}`
        );
      }

      const responseText = await response.text();
      logDebug(`Raw response: ${responseText}`, "info");

      let data;
      try {
        data = JSON.parse(responseText);
      } catch (parseError) {
        logDebug(`JSON parse error: ${parseError.message}`, "error");
        diagnoseError(parseError, { responseText, url });
        throw new Error("Invalid JSON response from server");
      }

      if (data.error) {
        logDebug(`Server returned error: ${data.error}`, "error");
        throw new Error(data.error);
      }

      const totalTime = performance.now() - requestStartTime;
      trackPerformance(requestStartTime, performance.now(), "email_validation");

      logDebug(
        `Email validation completed successfully in ${totalTime.toFixed(2)}ms`,
        "info"
      );
      logDebug(`Validation result: ${JSON.stringify(data, null, 2)}`, "info");

      // Enhance data with additional analysis
      const enhancedData = {
        ...data,
        pattern_analysis: analyzeEmailPattern(email),
        provider_info: getEmailProvider(email),
        risk_assessment: calculateRiskLevel(data),
        performance_metrics: {
          total_time: totalTime.toFixed(2) + "ms",
          network_time: networkTime.toFixed(2) + "ms",
          processing_time: (totalTime - networkTime).toFixed(2) + "ms",
        },
      };

      displayResults(enhancedData);
    } catch (error) {
      const totalTime = performance.now() - requestStartTime;

      logDebug(
        `Email validation failed after ${totalTime.toFixed(2)}ms: ${
          error.message
        }`,
        "error"
      );

      // Track failed performance
      if (networkMetrics.email_validation) {
        networkMetrics.email_validation.errors++;
      }

      const diagnosis = diagnoseError(error, {
        email,
        totalTime: totalTime.toFixed(2) + "ms",
        requestId,
      });

      // Show detailed error with suggestions
      let errorMessage = `Failed to validate email: ${error.message}`;
      if (diagnosis.suggestions.length > 0) {
        errorMessage += `\n\nSuggestions:\n• ${diagnosis.suggestions.join(
          "\n• "
        )}`;
      }

      showError(errorMessage);
    } finally {
      setLoadingState(false);
    }
  }

  function setLoadingState(loading) {
    if (loading) {
      testBtn.classList.add("loading");
      testBtn.disabled = true;
      emailInput.disabled = true;
    } else {
      testBtn.classList.remove("loading");
      testBtn.disabled = false;
      emailInput.disabled = false;
    }
  }

  function displayResults(data) {
    logDebug("Displaying results with enhanced data", "info");

    // Update result values
    updateResultItem(
      "formatResult",
      data.format_valid,
      data.format_valid ? "Valid" : "Invalid"
    );
    updateResultItem(
      "domainResult",
      data.domain_exists,
      data.domain_exists ? "Exists" : "Not Found"
    );
    updateResultItem(
      "mxResult",
      data.mx_records,
      data.mx_records ? "Found" : "Not Found"
    );
    updateResultItem(
      "smtpResult",
      data.smtp_check,
      getSmtpStatusText(data.smtp_check)
    );
    updateResultItem(
      "overallResult",
      data.is_valid,
      data.is_valid ? "Valid Email" : "Invalid Email"
    );

    // Update validation time
    const validationTimeElement = document.getElementById("validationTime");
    if (validationTimeElement) {
      const timeValue = data.performance_metrics
        ? data.performance_metrics.total_time
        : data.validation_time
        ? data.validation_time + "ms"
        : "N/A";
      validationTimeElement.textContent = timeValue;
      validationTimeElement.className = "value info";
    }

    // Update basic details
    const detailsElement = document.getElementById("resultDetails");
    let detailsHtml = "";

    if (data.mx_records && data.mx_servers && data.mx_servers.length > 0) {
      detailsHtml += `<strong>MX Servers:</strong> ${data.mx_servers.join(
        ", "
      )}<br>`;
    }

    if (data.smtp_details) {
      detailsHtml += `<strong>SMTP Details:</strong> ${data.smtp_details}<br>`;
    }

    detailsElement.innerHTML = detailsHtml;

    // Update advanced analysis
    updateAdvancedAnalysis(data);

    // Add performance metrics if available
    if (data.performance_metrics) {
      addPerformanceMetrics(data.performance_metrics);
    }

    // Show results
    results.style.display = "block";
    results.scrollIntoView({ behavior: "smooth", block: "nearest" });

    // Store current validation data for export
    window.currentValidationData = data;

    // Show action buttons
    if (actionButtons) {
      actionButtons.style.display = "flex";
    }

    logDebug("Results displayed successfully", "info");
  }

  // Update advanced analysis section
  function updateAdvancedAnalysis(data) {
    const emailPattern = document.getElementById("emailPattern");
    const domainType = document.getElementById("domainType");
    const emailProvider = document.getElementById("emailProvider");
    const riskLevel = document.getElementById("riskLevel");

    if (emailPattern && data.pattern_analysis) {
      emailPattern.textContent = data.pattern_analysis;
      emailPattern.className = `analysis-value ${data.pattern_analysis.toLowerCase()}`;
    }

    if (domainType) {
      const domain = data.email ? data.email.split("@")[1] : "";
      const tld = domain.split(".").pop();
      domainType.textContent = getTLDDescription(tld);
    }

    if (emailProvider && data.provider_info) {
      emailProvider.textContent = data.provider_info;
    }

    if (riskLevel && data.risk_assessment) {
      riskLevel.textContent = data.risk_assessment.level;
      riskLevel.style.color = data.risk_assessment.color;
      riskLevel.style.fontWeight = "bold";
    }
  }

  // Add performance metrics display
  function addPerformanceMetrics(metrics) {
    const detailsElement = document.getElementById("resultDetails");

    const performanceHtml = `
      <div class="performance-metrics">
        <h5>⚡ Performance Metrics</h5>
        <div class="metric-item">
          <span>Total Time:</span>
          <span>${metrics.total_time}</span>
        </div>
        <div class="metric-item">
          <span>Network Time:</span>
          <span>${metrics.network_time}</span>
        </div>
        <div class="metric-item">
          <span>Processing Time:</span>
          <span>${metrics.processing_time}</span>
        </div>
      </div>
    `;

    detailsElement.innerHTML += performanceHtml;
  }

  // Get TLD description
  function getTLDDescription(tld) {
    const tldDescriptions = {
      com: "Commercial",
      org: "Organization",
      net: "Network",
      edu: "Educational",
      gov: "Government",
      mil: "Military",
      int: "International",
      biz: "Business",
      info: "Information",
      name: "Personal",
      pro: "Professional",
    };

    return tldDescriptions[tld] || `Country/Generic (${tld.toUpperCase()})`;
  }

  function updateResultItem(elementId, isValid, text) {
    const element = document.getElementById(elementId);
    element.textContent = text;
    element.className = "value " + getStatusClass(isValid);
  }

  function getStatusClass(status) {
    if (status === true) return "valid";
    if (status === false) return "invalid";
    if (status === "warning") return "warning";
    return "info";
  }

  function getSmtpStatusText(status) {
    switch (status) {
      case true:
        return "Connectable";
      case false:
        return "Not Connectable";
      case "timeout":
        return "Timeout";
      case "warning":
        return "Partial Success";
      default:
        return "Unknown";
    }
  }

  function showError(message) {
    errorMessage.textContent = message;
    errorMessage.style.display = "block";
    hideResults();
  }

  function hideError() {
    errorMessage.style.display = "none";
  }

  function hideResults() {
    results.style.display = "none";
    if (actionButtons) {
      actionButtons.style.display = "none";
    }
  }

  // Initialize advanced features
  function initializeAdvancedFeatures() {
    // Toggle advanced panel
    toggleAdvanced.addEventListener("click", function () {
      const isHidden = advancedPanel.style.display === "none";
      advancedPanel.style.display = isHidden ? "block" : "none";
      this.textContent = isHidden
        ? "🔧 Hide Advanced Options"
        : "🔧 Advanced Options";
    });

    // Enable/disable debug mode
    enableDebugging.addEventListener("change", function () {
      debugPanel.style.display = this.checked ? "block" : "none";
      if (this.checked) {
        logDebug("Debug mode enabled");
        updateNetworkStatus();
      }
    });

    // Batch testing
    batchTestBtn.addEventListener("click", performBatchTest);

    // Initialize debug mode if enabled
    if (enableDebugging.checked) {
      debugPanel.style.display = "block";
      logDebug("Debug mode initialized");
      updateNetworkStatus();
    }
  }

  // Enhanced debug logging system
  function logDebug(message, type = "info") {
    const timestamp = new Date().toLocaleTimeString();
    const logEntry = {
      timestamp,
      message,
      type,
      url: window.location.href,
      userAgent: navigator.userAgent.substring(0, 50) + "...",
    };

    debugLogs.push(logEntry);

    if (enableDebugging && enableDebugging.checked) {
      updateDebugDisplay();
    }

    // Also log to browser console with more details
    const consoleMethod =
      type === "error" ? "error" : type === "warn" ? "warn" : "log";
    console[consoleMethod](
      `[Email Validator ${timestamp}] ${message}`,
      logEntry
    );
  }

  // Update debug display panel
  function updateDebugDisplay() {
    const requestDetails = document.getElementById("requestDetails");
    const networkStatus = document.getElementById("networkStatus");
    const consoleLogs = document.getElementById("consoleLogs");

    // Update request details
    if (requestDetails) {
      requestDetails.innerHTML = `
        <div><strong>Current URL:</strong> ${window.location.href}</div>
        <div><strong>User Agent:</strong> ${navigator.userAgent.substring(
          0,
          100
        )}...</div>
        <div><strong>Timestamp:</strong> ${new Date().toISOString()}</div>
        <div><strong>Network Status:</strong> ${
          navigator.onLine ? "Online" : "Offline"
        }</div>
        <div><strong>Connection:</strong> ${
          navigator.connection ? navigator.connection.effectiveType : "Unknown"
        }</div>
      `;
    }

    // Update network status
    updateNetworkStatus();

    // Update console logs (show last 10)
    if (consoleLogs) {
      const recentLogs = debugLogs.slice(-10);
      consoleLogs.innerHTML = recentLogs
        .map(
          (log) =>
            `<div class="log-entry log-${log.type}">
          [${log.timestamp}] ${log.message}
        </div>`
        )
        .join("");
    }
  }

  // Network status monitoring
  function updateNetworkStatus() {
    const networkStatus = document.getElementById("networkStatus");
    if (!networkStatus) return;

    const connectionInfo = navigator.connection || {};
    const isOnline = navigator.onLine;

    networkStatus.innerHTML = `
      <div class="network-info">
        <span class="status-indicator ${
          isOnline ? "status-online" : "status-offline"
        }"></span>
        <strong>Connection:</strong> ${isOnline ? "Online" : "Offline"}
      </div>
      <div><strong>Effective Type:</strong> ${
        connectionInfo.effectiveType || "Unknown"
      }</div>
      <div><strong>Downlink:</strong> ${
        connectionInfo.downlink || "Unknown"
      } Mbps</div>
      <div><strong>RTT:</strong> ${connectionInfo.rtt || "Unknown"} ms</div>
      <div><strong>Save Data:</strong> ${
        connectionInfo.saveData ? "Enabled" : "Disabled"
      }</div>
    `;
  }

  // Enhanced email format validation with detailed analysis
  function analyzeEmailPattern(email) {
    const patterns = {
      Business: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
      Personal:
        /^[a-zA-Z0-9._%+-]+@(gmail|yahoo|hotmail|outlook|aol)\.(com|net|org)$/i,
      Educational: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]*\.(edu|ac\.[a-z]{2})$/i,
      Government: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]*\.(gov|mil)$/i,
      Temporary:
        /^[a-zA-Z0-9._%+-]+@(10minutemail|tempmail|guerrillamail|mailinator)\./i,
    };

    for (const [type, pattern] of Object.entries(patterns)) {
      if (pattern.test(email)) {
        return type;
      }
    }
    return "Unknown";
  }

  // Get email provider information
  function getEmailProvider(email) {
    const domain = email.split("@")[1]?.toLowerCase();
    const providers = {
      "gmail.com": "Google Gmail",
      "yahoo.com": "Yahoo Mail",
      "hotmail.com": "Microsoft Hotmail",
      "outlook.com": "Microsoft Outlook",
      "aol.com": "AOL Mail",
      "icloud.com": "Apple iCloud",
      "protonmail.com": "ProtonMail",
      "yandex.com": "Yandex Mail",
    };
    return providers[domain] || "Unknown Provider";
  }

  // Calculate risk level
  function calculateRiskLevel(data) {
    let score = 0;

    if (!data.format_valid) score += 40;
    if (!data.domain_exists) score += 30;
    if (!data.mx_records) score += 20;
    if (!data.smtp_check) score += 10;

    if (score === 0) return { level: "Very Low", color: "#28a745" };
    if (score <= 20) return { level: "Low", color: "#ffc107" };
    if (score <= 50) return { level: "Medium", color: "#fd7e14" };
    if (score <= 80) return { level: "High", color: "#dc3545" };
    return { level: "Very High", color: "#6f42c1" };
  }

  // Performance metrics tracking
  function trackPerformance(startTime, endTime, requestType = "validation") {
    const duration = endTime - startTime;

    if (!networkMetrics[requestType]) {
      networkMetrics[requestType] = {
        requests: 0,
        totalTime: 0,
        avgTime: 0,
        minTime: Infinity,
        maxTime: 0,
        errors: 0,
      };
    }

    const metric = networkMetrics[requestType];
    metric.requests++;
    metric.totalTime += duration;
    metric.avgTime = metric.totalTime / metric.requests;
    metric.minTime = Math.min(metric.minTime, duration);
    metric.maxTime = Math.max(metric.maxTime, duration);

    logDebug(`Performance: ${requestType} took ${duration}ms`, "info");

    return metric;
  }

  // Enhanced error handling with detailed diagnostics
  function diagnoseError(error, context = {}) {
    const diagnosis = {
      error: error.message,
      type: error.name,
      context,
      timestamp: new Date().toISOString(),
      userAgent: navigator.userAgent,
      url: window.location.href,
      online: navigator.onLine,
      suggestions: [],
    };

    // Error-specific suggestions
    if (error.message.includes("Failed to fetch")) {
      diagnosis.suggestions.push("Check if XAMPP server is running");
      diagnosis.suggestions.push("Verify PHP file exists and is accessible");
      diagnosis.suggestions.push("Check for CORS issues");
      diagnosis.suggestions.push("Ensure network connectivity");
    } else if (error.message.includes("HTTP error")) {
      diagnosis.suggestions.push("Check server logs for PHP errors");
      diagnosis.suggestions.push("Verify request format and headers");
      diagnosis.suggestions.push("Check file permissions");
    } else if (error.message.includes("JSON")) {
      diagnosis.suggestions.push(
        "Server may be returning HTML instead of JSON"
      );
      diagnosis.suggestions.push("Check PHP error logs");
      diagnosis.suggestions.push("Verify Content-Type headers");
    }

    logDebug(`Error diagnosed: ${JSON.stringify(diagnosis, null, 2)}`, "error");
    return diagnosis;
  }

  // Batch email testing functionality
  async function performBatchTest() {
    const emails = batchEmails.value
      .split("\n")
      .map((email) => email.trim())
      .filter((email) => email && isValidEmailFormat(email));

    if (emails.length === 0) {
      showError("Please enter valid email addresses for batch testing");
      return;
    }

    logDebug(`Starting batch test for ${emails.length} emails`);

    batchTestBtn.disabled = true;
    batchTestBtn.textContent = `Testing ${emails.length} emails...`;

    const results = [];
    const batchStartTime = performance.now();

    // Show batch results panel
    batchResults.style.display = "block";
    document.getElementById("batchSummary").innerHTML = `
      <div class="batch-stat">
        <span class="number">0</span>
        <span class="label">Completed</span>
      </div>
      <div class="batch-stat">
        <span class="number">${emails.length}</span>
        <span class="label">Total</span>
      </div>
      <div class="batch-stat">
        <span class="number">0</span>
        <span class="label">Valid</span>
      </div>
      <div class="batch-stat">
        <span class="number">0</span>
        <span class="label">Invalid</span>
      </div>
    `;

    // Test emails sequentially to avoid overwhelming the server
    for (let i = 0; i < emails.length; i++) {
      try {
        const email = emails[i];
        logDebug(`Testing email ${i + 1}/${emails.length}: ${email}`);

        const result = await testEmailSilent(email);
        results.push({ email, result, status: "completed" });

        updateBatchProgress(results, emails.length);

        // Small delay to prevent overwhelming the server
        await new Promise((resolve) => setTimeout(resolve, 100));
      } catch (error) {
        results.push({
          email: emails[i],
          result: null,
          status: "error",
          error: error.message,
        });
        logDebug(`Error testing ${emails[i]}: ${error.message}`, "error");
      }
    }

    const batchEndTime = performance.now();
    trackPerformance(batchStartTime, batchEndTime, "batch_test");

    displayBatchResults(results);

    batchTestBtn.disabled = false;
    batchTestBtn.textContent = "Test All Emails";

    logDebug(`Batch test completed: ${results.length} emails processed`);
  }

  // Silent email testing (for batch operations)
  async function testEmailSilent(email) {
    const baseUrl =
      window.location.origin +
      window.location.pathname
        .replace(/\/[^/]*$/, "/")
        .replace(/\/pages\/$/, "/");
    const url = baseUrl + "api/validate.php";

    const response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ email: email }),
    });

    if (!response.ok) {
      throw new Error(`HTTP ${response.status}`);
    }

    return await response.json();
  }

  // Update batch progress display
  function updateBatchProgress(results, total) {
    const completed = results.length;
    const valid = results.filter((r) => r.result && r.result.is_valid).length;
    const invalid = completed - valid;

    document.getElementById("batchSummary").innerHTML = `
      <div class="batch-stat">
        <span class="number">${completed}</span>
        <span class="label">Completed</span>
      </div>
      <div class="batch-stat">
        <span class="number">${total}</span>
        <span class="label">Total</span>
      </div>
      <div class="batch-stat">
        <span class="number">${valid}</span>
        <span class="label">Valid</span>
      </div>
      <div class="batch-stat">
        <span class="number">${invalid}</span>
        <span class="label">Invalid</span>
      </div>
    `;
  }

  // Display batch test results
  function displayBatchResults(results) {
    const batchDetails = document.getElementById("batchDetails");

    batchDetails.innerHTML = results
      .map((item) => {
        const statusClass =
          item.status === "error"
            ? "invalid"
            : item.result && item.result.is_valid
            ? "valid"
            : "invalid";
        const statusText =
          item.status === "error"
            ? "Error"
            : item.result && item.result.is_valid
            ? "Valid"
            : "Invalid";

        return `
        <div class="batch-item">
          <span class="batch-email">${item.email}</span>
          <span class="value ${statusClass}">${statusText}</span>
        </div>
      `;
      })
      .join("");
  }

  // Copy validation results to clipboard
  function copyResultsToClipboard() {
    if (!window.currentValidationData) {
      showError("No validation data available to copy");
      return;
    }

    const data = window.currentValidationData;
    const currentTime = new Date().toLocaleString();

    let clipboardText = `EMAIL VALIDATION REPORT\n`;
    clipboardText += `Generated: ${currentTime}\n`;
    clipboardText += `==============================\n\n`;

    clipboardText += `Email Address: ${data.email}\n`;
    clipboardText += `Format Valid: ${data.format_valid ? "Yes" : "No"}\n`;
    clipboardText += `Domain Exists: ${data.domain_exists ? "Yes" : "No"}\n`;
    clipboardText += `MX Records: ${data.mx_records ? "Found" : "Not Found"}\n`;
    clipboardText += `SMTP Check: ${getSmtpStatusText(data.smtp_check)}\n`;
    clipboardText += `Overall Status: ${data.is_valid ? "VALID" : "INVALID"}\n`;
    clipboardText += `Validation Time: ${data.validation_time}ms\n\n`;

    if (data.mx_servers && data.mx_servers.length > 0) {
      clipboardText += `MX Servers:\n`;
      data.mx_servers.forEach((server, index) => {
        clipboardText += `  ${index + 1}. ${server}\n`;
      });
      clipboardText += `\n`;
    }

    if (data.smtp_details) {
      clipboardText += `SMTP Details:\n${data.smtp_details}\n\n`;
    }

    if (data.detailed_info && data.detailed_info.domain_info) {
      const domainInfo = data.detailed_info.domain_info;
      clipboardText += `Domain Information:\n`;
      clipboardText += `  Domain: ${domainInfo.domain || "N/A"}\n`;
      clipboardText += `  TLD: ${domainInfo.tld || "N/A"}\n`;
      clipboardText += `  Length: ${domainInfo.length || "N/A"} characters\n`;
      clipboardText += `  Has Hyphen: ${
        domainInfo.has_hyphen ? "Yes" : "No"
      }\n`;
      clipboardText += `  Punycode: ${domainInfo.punycode ? "Yes" : "No"}\n`;
    }

    clipboardText += `\nReport generated by Email Validator\n`;

    // Copy to clipboard
    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard
        .writeText(clipboardText)
        .then(() => {
          showTemporaryMessage(copyToClipboardBtn, "✅ Copied!", "copy-btn");
        })
        .catch(() => {
          fallbackCopyToClipboard(clipboardText);
        });
    } else {
      fallbackCopyToClipboard(clipboardText);
    }
  }

  // Fallback copy method for older browsers
  function fallbackCopyToClipboard(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = "fixed";
    textArea.style.left = "-999999px";
    textArea.style.top = "-999999px";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try {
      const successful = document.execCommand("copy");
      if (successful) {
        showTemporaryMessage(copyToClipboardBtn, "✅ Copied!", "copy-btn");
      } else {
        showError("Failed to copy to clipboard");
      }
    } catch (err) {
      showError("Copy to clipboard not supported");
    }

    document.body.removeChild(textArea);
  }

  // Download validation report as text file
  function downloadValidationReport() {
    if (!window.currentValidationData) {
      showError("No validation data available to download");
      return;
    }

    const data = window.currentValidationData;
    const currentTime = new Date();
    const timestamp = currentTime
      .toISOString()
      .replace(/[:.]/g, "-")
      .slice(0, -5);
    const filename = `email-validation-report-${timestamp}.txt`;

    let reportContent = `EMAIL VALIDATION REPORT\n`;
    reportContent += `Generated: ${currentTime.toLocaleString()}\n`;
    reportContent += `Email Validator Tool\n`;
    reportContent += `==============================\n\n`;

    reportContent += `BASIC VALIDATION RESULTS\n`;
    reportContent += `------------------------\n`;
    reportContent += `Email Address: ${data.email}\n`;
    reportContent += `Format Valid: ${data.format_valid ? "Yes" : "No"}\n`;
    reportContent += `Domain Exists: ${data.domain_exists ? "Yes" : "No"}\n`;
    reportContent += `MX Records: ${data.mx_records ? "Found" : "Not Found"}\n`;
    reportContent += `SMTP Check: ${getSmtpStatusText(data.smtp_check)}\n`;
    reportContent += `Overall Status: ${
      data.is_valid ? "VALID EMAIL" : "INVALID EMAIL"
    }\n`;
    reportContent += `Validation Time: ${data.validation_time}ms\n\n`;

    if (data.mx_servers && data.mx_servers.length > 0) {
      reportContent += `MX SERVERS\n`;
      reportContent += `----------\n`;
      data.mx_servers.forEach((server, index) => {
        reportContent += `${index + 1}. ${server}\n`;
      });
      reportContent += `\n`;
    }

    if (data.smtp_details) {
      reportContent += `SMTP DETAILS\n`;
      reportContent += `------------\n`;
      reportContent += `${data.smtp_details}\n\n`;
    }

    if (data.detailed_info && data.detailed_info.domain_info) {
      const domainInfo = data.detailed_info.domain_info;
      reportContent += `DOMAIN INFORMATION\n`;
      reportContent += `------------------\n`;
      reportContent += `Domain: ${domainInfo.domain || "N/A"}\n`;
      reportContent += `Top Level Domain: ${domainInfo.tld || "N/A"}\n`;
      reportContent += `Domain Length: ${
        domainInfo.length || "N/A"
      } characters\n`;
      reportContent += `Contains Hyphen: ${
        domainInfo.has_hyphen ? "Yes" : "No"
      }\n`;
      reportContent += `Subdomain Count: ${domainInfo.subdomain_count || 0}\n`;
      reportContent += `Is Numeric: ${domainInfo.is_numeric ? "Yes" : "No"}\n`;
      reportContent += `Punycode: ${domainInfo.punycode ? "Yes" : "No"}\n`;

      if (
        domainInfo.dns_record_types &&
        Object.keys(domainInfo.dns_record_types).length > 0
      ) {
        reportContent += `\nDNS RECORD TYPES\n`;
        reportContent += `----------------\n`;
        Object.entries(domainInfo.dns_record_types).forEach(([type, count]) => {
          reportContent += `${type}: ${count} record(s)\n`;
        });
      }
      reportContent += `\n`;
    }

    if (data.performance_metrics) {
      reportContent += `PERFORMANCE METRICS\n`;
      reportContent += `-------------------\n`;
      reportContent += `Total Time: ${data.performance_metrics.total_time}\n`;
      reportContent += `Network Time: ${data.performance_metrics.network_time}\n`;
      reportContent += `Processing Time: ${data.performance_metrics.processing_time}\n\n`;
    }

    reportContent += `TECHNICAL INFORMATION\n`;
    reportContent += `---------------------\n`;
    reportContent += `User Agent: ${navigator.userAgent}\n`;
    reportContent += `Timestamp: ${currentTime.toISOString()}\n`;
    reportContent += `Report Format: Plain Text\n\n`;

    reportContent += `Note: This report was generated by the Email Validator tool.\n`;
    reportContent += `Results may vary based on network conditions and server availability.\n`;

    // Create and download file
    const blob = new Blob([reportContent], { type: "text/plain" });
    const url = window.URL.createObjectURL(blob);
    const link = document.createElement("a");
    link.href = url;
    link.download = filename;

    // Trigger download
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);

    // Clean up
    window.URL.revokeObjectURL(url);

    showTemporaryMessage(downloadReportBtn, "✅ Downloaded!", "download-btn");
  }

  // Show temporary message on button
  function showTemporaryMessage(button, message, originalClass) {
    const originalText = button.textContent;
    const originalClassName = button.className;

    button.textContent = message;
    button.className = `action-btn ${originalClass} success-state`;
    button.disabled = true;

    setTimeout(() => {
      button.textContent = originalText;
      button.className = originalClassName;
      button.disabled = false;
    }, 2000);
  }

  // Add enter key support
  emailInput.addEventListener("keypress", function (e) {
    if (e.key === "Enter") {
      emailForm.dispatchEvent(new Event("submit"));
    }
  });

  // Add some visual feedback for button
  testBtn.addEventListener("mousedown", function () {
    this.style.transform = "translateY(1px)";
  });

  testBtn.addEventListener("mouseup", function () {
    this.style.transform = "translateY(-2px)";
  });

  testBtn.addEventListener("mouseleave", function () {
    this.style.transform = "translateY(-2px)";
  });
});
