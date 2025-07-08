<?php

/**
 * @author Md Tayobur Rahman
 * @email - tayoburrahman119@gmail.com
 * @whatsapp -+974 7183 0623 / +880 1717 932348
 * @link - https://mdtayoburrahman.com/
 * @date 2025-06-26
 * @time 12:27
 * @copyright (c) 2025 Md Tayobur Rahman
 * @package validate-api
 */
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

class EmailValidator
{
    private $email;
    private $domain;
    private $validation_start_time;

    public function __construct($email)
    {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->domain = substr(strrchr($this->email, '@'), 1);
        $this->validation_start_time = microtime(true);
    }

    public function validate()
    {
        $results = [
            'email' => $this->email,
            'format_valid' => $this->validateFormat(),
            'domain_exists' => false,
            'mx_records' => false,
            'mx_servers' => [],
            'smtp_check' => false,
            'smtp_details' => '',
            'is_valid' => false,
            'validation_time' => 0,
            'detailed_info' => [
                'domain_info' => [],
                'dns_records' => [],
                'server_response' => '',
                'error_details' => []
            ]
        ];

        if ($results['format_valid']) {
            $results['domain_exists'] = $this->checkDomainExists();

            // Get detailed domain information
            $results['detailed_info']['domain_info'] = $this->getDomainInfo();

            if ($results['domain_exists']) {
                $mx_check = $this->checkMXRecords();
                $results['mx_records'] = $mx_check['has_mx'];
                $results['mx_servers'] = $mx_check['servers'];
                $results['detailed_info']['dns_records'] = $mx_check['detailed_records'];

                if ($results['mx_records']) {
                    $smtp_result = $this->checkSMTP();
                    $results['smtp_check'] = $smtp_result['status'];
                    $results['smtp_details'] = $smtp_result['details'];
                    $results['detailed_info']['server_response'] = $smtp_result['full_response'];

                    if (isset($smtp_result['error_details'])) {
                        $results['detailed_info']['error_details'] = $smtp_result['error_details'];
                    }
                }
            }
        } else {
            $results['detailed_info']['error_details'][] = 'Invalid email format detected';
        }

        $results['is_valid'] = $results['format_valid'] &&
            $results['domain_exists'] &&
            $results['mx_records'] &&
            $results['smtp_check'];

        $results['validation_time'] = round((microtime(true) - $this->validation_start_time) * 1000, 2);

        return $results;
    }

    private function validateFormat()
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function checkDomainExists()
    {
        // Check if domain has any DNS records
        return checkdnsrr($this->domain, 'ANY');
    }

    private function checkMXRecords()
    {
        $mx_hosts = [];
        $mx_weights = [];

        if (getmxrr($this->domain, $mx_hosts, $mx_weights)) {
            // Sort MX records by priority (weight)
            array_multisort($mx_weights, $mx_hosts);

            $detailed_records = [];
            for ($i = 0; $i < count($mx_hosts); $i++) {
                $detailed_records[] = [
                    'host' => $mx_hosts[$i],
                    'priority' => $mx_weights[$i],
                    'ip_addresses' => $this->resolveMXToIP($mx_hosts[$i])
                ];
            }

            return [
                'has_mx' => true,
                'servers' => $mx_hosts,
                'detailed_records' => $detailed_records,
                'mx_count' => count($mx_hosts)
            ];
        }

        return [
            'has_mx' => false,
            'servers' => [],
            'detailed_records' => [],
            'mx_count' => 0
        ];
    }

    private function resolveMXToIP($mx_host)
    {
        $ips = [];

        // Try to resolve IPv4
        $ipv4 = @gethostbyname($mx_host);
        if ($ipv4 !== $mx_host) {
            $ips['ipv4'] = $ipv4;
        }

        // Try to resolve IPv6
        $records = @dns_get_record($mx_host, DNS_AAAA);
        if ($records !== false && !empty($records)) {
            $ips['ipv6'] = $records[0]['ipv6'];
        }

        return $ips;
    }

    private function checkSMTP()
    {
        $mx_hosts = [];
        getmxrr($this->domain, $mx_hosts);

        if (empty($mx_hosts)) {
            return [
                'status' => false,
                'details' => 'No MX records found',
                'full_response' => '',
                'error_details' => ['No MX records available for SMTP test']
            ];
        }

        $responses = [];
        $error_details = [];

        // Try connecting to the first MX server
        $mx_host = $mx_hosts[0];
        $port = 25;
        $timeout = 10;

        $start_time = microtime(true);
        $socket = @fsockopen($mx_host, $port, $errno, $errstr, $timeout);
        $connection_time = round((microtime(true) - $start_time) * 1000, 2);

        if (!$socket) {
            return [
                'status' => false,
                'details' => "Cannot connect to $mx_host:$port - $errstr ($errno)",
                'full_response' => '',
                'error_details' => [
                    'connection_failed' => true,
                    'host' => $mx_host,
                    'port' => $port,
                    'error_code' => $errno,
                    'error_message' => $errstr,
                    'connection_time' => $connection_time . 'ms'
                ]
            ];
        }

        $responses['connection'] = "Connected to $mx_host:$port in {$connection_time}ms";

        // Read initial response
        $response = fgets($socket);
        $responses['initial'] = trim($response);

        if (!$response || !preg_match('/^220/', $response)) {
            fclose($socket);
            return [
                'status' => false,
                'details' => 'SMTP server did not respond with 220',
                'full_response' => implode("\n", $responses),
                'error_details' => [
                    'invalid_greeting' => true,
                    'expected' => '220',
                    'received' => trim($response)
                ]
            ];
        }

        // Send HELO command
        $helo_domain = $_SERVER['SERVER_NAME'] ?? 'localhost';
        fputs($socket, "HELO $helo_domain\r\n");
        $response = fgets($socket);
        $responses['helo'] = trim($response);

        if (!preg_match('/^250/', $response)) {
            fclose($socket);
            return [
                'status' => 'warning',
                'details' => 'HELO command failed',
                'full_response' => implode("\n", $responses),
                'error_details' => [
                    'helo_failed' => true,
                    'command' => "HELO $helo_domain",
                    'response' => trim($response)
                ]
            ];
        }

        // Send MAIL FROM command
        $from_email = 'test@' . ($_SERVER['SERVER_NAME'] ?? 'localhost');
        fputs($socket, "MAIL FROM: <$from_email>\r\n");
        $response = fgets($socket);
        $responses['mail_from'] = trim($response);

        if (!preg_match('/^250/', $response)) {
            fclose($socket);
            return [
                'status' => 'warning',
                'details' => 'MAIL FROM command failed',
                'full_response' => implode("\n", $responses),
                'error_details' => [
                    'mail_from_failed' => true,
                    'command' => "MAIL FROM: <$from_email>",
                    'response' => trim($response)
                ]
            ];
        }

        // Send RCPT TO command
        fputs($socket, "RCPT TO: <{$this->email}>\r\n");
        $response = fgets($socket);
        $responses['rcpt_to'] = trim($response);

        // Send QUIT command
        fputs($socket, "QUIT\r\n");
        $quit_response = fgets($socket);
        $responses['quit'] = trim($quit_response);

        fclose($socket);

        $full_response = implode("\n", $responses);

        if (preg_match('/^250/', $response)) {
            return [
                'status' => true,
                'details' => 'Email address accepted by SMTP server',
                'full_response' => $full_response
            ];
        } elseif (preg_match('/^5[0-9]{2}/', $response)) {
            return [
                'status' => false,
                'details' => 'Email address rejected by SMTP server',
                'full_response' => $full_response,
                'error_details' => [
                    'email_rejected' => true,
                    'smtp_code' => substr($response, 0, 3),
                    'smtp_message' => trim(substr($response, 4))
                ]
            ];
        } else {
            return [
                'status' => 'warning',
                'details' => 'SMTP server response unclear: ' . trim($response),
                'full_response' => $full_response,
                'error_details' => [
                    'unclear_response' => true,
                    'raw_response' => trim($response)
                ]
            ];
        }
    }

    private function getDomainInfo()
    {
        $domain_info = [
            'domain' => $this->domain,
            'tld' => substr(strrchr($this->domain, '.'), 1),
            'subdomain_count' => substr_count($this->domain, '.'),
            'length' => strlen($this->domain),
            'has_hyphen' => strpos($this->domain, '-') !== false,
            'is_numeric' => is_numeric(str_replace(['.', '-'], '', $this->domain)),
            'punycode' => $this->isPunycode($this->domain)
        ];

        // Try to get additional DNS records for analysis
        $dns_types = ['A', 'AAAA', 'CNAME', 'TXT', 'NS'];
        $dns_records = [];

        foreach ($dns_types as $type) {
            $records = @dns_get_record($this->domain, constant('DNS_' . $type));
            if ($records !== false && !empty($records)) {
                $dns_records[$type] = count($records);
            }
        }

        $domain_info['dns_record_types'] = $dns_records;

        return $domain_info;
    }

    private function isPunycode($domain)
    {
        return strpos($domain, 'xn--') !== false;
    }
}

// Main execution
try {
    // Get input
    $input = json_decode(file_get_contents('php://input'), true);

    if (!$input || !isset($input['email'])) {
        throw new Exception('Email address is required');
    }

    $email = trim($input['email']);

    if (empty($email)) {
        throw new Exception('Email address cannot be empty');
    }

    // Validate email
    $validator = new EmailValidator($email);
    $results = $validator->validate();

    echo json_encode($results);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}
?>
