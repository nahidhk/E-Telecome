<div class="box">
    <div class="s-Card-grid margin">
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-house-laptop"></i></div>
            <div class="info">
                <b>Hostname</b>
                <span><?php echo gethostname(); ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-user"></i></div>
            <div class="info">
                <b>Server User</b>
                <span>
                    <?php
                    echo function_exists('get_current_user') ? get_current_user() : "N/A";
                    ?>
                </span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-right-to-bracket"></i></div>
            <div class="info">
                <b>Logged In As</b>
                <span><?php echo $_SESSION['username'] ?? 'Guest'; ?></span>
            </div>
        </div>
    </div>
    <div class="s-Card-grid margin">
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-chart-pie"></i></div>
            <div class="info">
                <b>Disk Usage %</b>
                <span>
                    <?php
                    $total = disk_total_space("/");
                    $free = disk_free_space("/");
                    $used = $total - $free;
                    echo round(($used / $total) * 100, 1) . '%';
                    ?>
                </span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-arrow-up-from-bracket"></i></div>
            <div class="info">
                <b>Server Uptime</b>
                <span>
                    <?php
                    if (function_exists('shell_exec') && stripos(PHP_OS, 'WIN') === false) {
                        $uptime = @shell_exec('uptime -p');
                        echo $uptime ? trim($uptime) : 'N/A';
                    } else {
                        echo 'N/A';
                    }
                    ?>
                </span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-users"></i></div>
            <div class="info">
                <b>Total Users</b>
                <span>
                    <?php
                    try {
                        $stmt = $conn->query("SELECT COUNT(*) FROM users");
                        echo $stmt->fetchColumn();
                    } catch (PDOException $e) {
                        echo "N/A";
                    }
                    ?>
                </span>
            </div>
        </div>
    </div>
    <div class="s-Card-grid margin">
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-hard-drive"></i></div>
            <div class="info">
                <b>Disk Free Space</b>
                <span><?php echo round(disk_free_space("/") / 1073741824, 2); ?> GB</span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-hard-drive"></i></div>
            <div class="info">
                <b>Disk Total Space</b>
                <span><?php echo round(disk_total_space("/") / 1073741824, 2); ?> GB</span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-gauge-high"></i></div>
            <div class="info">
                <b>CPU Load</b>
                <span>
                    <?php
                    if (function_exists('sys_getloadavg')) {
                        $load = sys_getloadavg();
                        echo round($load[0], 2) . ' (1min)';
                    } else {
                        echo "N/A";
                    }
                    ?>
                </span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-memory"></i></div>
            <div class="info">
                <b>PHP Memory Usage</b>
                <span><?php echo round(memory_get_usage() / 1048576, 2); ?> MB</span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-memory"></i></div>
            <div class="info">
                <b>Peak Memory Usage</b>
                <span><?php echo round(memory_get_peak_usage() / 1048576, 2); ?> MB</span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-hourglass-half"></i></div>
            <div class="info">
                <b>Page Load Time</b>
                <span><?php echo round((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000, 2); ?> ms</span>
            </div>
        </div>
    </div>
    <div class="s-Card-grid margin">
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-network-wired"></i></div>
            <div class="info">
                <b>Server IP</b>
                <span><?php echo $_SERVER['SERVER_ADDR'] ?? 'N/A'; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-regular fa-circle-dot"></i></div>
            <div class="info">
                <b>Your IP</b>
                <span><?php echo $_SERVER['REMOTE_ADDR']; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-chart-diagram"></i></div>
            <div class="info">
                <b>Port</b>
                <span><?php echo $_SERVER['SERVER_PORT']; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-lock"></i></div>
            <div class="info">
                <b>HTTPS</b>
                <span><?php echo (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'Enabled' : 'Disabled'; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-globe"></i></div>
            <div class="info">
                <b>Domain</b>
                <span><?php echo $_SERVER['HTTP_HOST']; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-plug"></i></div>
            <div class="info">
                <b>SAPI</b>
                <span><?php echo php_sapi_name(); ?></span>
            </div>
        </div>
    </div>
    <div class="s-Card-grid">
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-weight-hanging"></i></div>
            <div class="info">
                <b>Project Folder Size</b>
                <span>
                    <?php
                    function folderSize($dir)
                    {
                        $size = 0;
                        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS)) as $file) {
                            $size += $file->getSize();
                        }
                        return $size;
                    }
                    try {
                        echo round(folderSize(__DIR__) / 1048576, 2) . ' MB';
                    } catch (Exception $e) {
                        echo 'N/A';
                    }
                    ?>
                </span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-brands fa-php"></i></div>
            <div class="info">
                <b>PHP Version</b>
                <span><?php echo phpversion(); ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-layer-group"></i></div>
            <div class="info">
                <b>Max Input Vars</b>
                <span><?php echo ini_get('max_input_vars'); ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-file-arrow-up"></i></div>
            <div class="info">
                <b>Max File Uploads</b>
                <span><?php echo ini_get('max_file_uploads'); ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-upload"></i></div>
            <div class="info">
                <b>Upload Max Size</b>
                <span><?php echo ini_get('upload_max_filesize'); ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-paper-plane"></i></div>
            <div class="info">
                <b>Post Max Size</b>
                <span><?php echo ini_get('post_max_size'); ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-file-lines"></i></div>
            <div class="info">
                <b>Total PHP Files</b>
                <span>
                    <?php
                    $count = 0;
                    foreach (glob(__DIR__ . '/*.php') as $f) {
                        $count++;
                    }

                    echo $count;
                    ?>
                </span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-cookie-bite"></i></div>
            <div class="info">
                <b>Cookies Sent</b>
                <span><?php echo count($_COOKIE); ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-puzzle-piece"></i></div>
            <div class="info">
                <b>Loaded Extensions</b>
                <span><?php echo count(get_loaded_extensions()); ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-microchip"></i></div>
            <div class="info">
                <b>Memory Limit</b>
                <span><?php echo ini_get('memory_limit'); ?></span>
            </div>
        </div>

        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-database"></i></div>
            <div class="info">
                <b>Databases</b>
                <span>
                    <?php
                    try {
                        $stmt = $conn->query("SHOW DATABASES");
                        echo $stmt->rowCount();
                    } catch (PDOException $e) {
                        echo "N/A";
                    }
                    ?>
                </span>
            </div>
        </div>

        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-shield-halved"></i></div>
            <div class="info">
                <b>cURL</b>
                <span><?php echo function_exists('curl_version') ? curl_version()['version'] : 'N/A'; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-code-branch"></i></div>
            <div class="info">
                <b>Protocol</b>
                <span><?php echo $_SERVER['SERVER_PROTOCOL']; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-arrow-right-arrow-left"></i></div>
            <div class="info">
                <b>Request Method</b>
                <span><?php echo $_SERVER['REQUEST_METHOD']; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-folder"></i></div>
            <div class="info">
                <b>Temp Directory</b>
                <span><?php echo sys_get_temp_dir(); ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-clock-rotate-left"></i></div>
            <div class="info">
                <b>Timezone</b>
                <span><?php echo date_default_timezone_get(); ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-clock"></i></div>
            <div class="info">
                <b>Max Execution Time</b>
                <span><?php echo ini_get('max_execution_time'); ?> sec</span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-calendar-days"></i></div>
            <div class="info">
                <b>Server Time</b>
                <span><?php echo date('Y-m-d H:i:s'); ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-bolt"></i></div>
            <div class="info">
                <b>OPcache</b>
                <span><?php echo function_exists('opcache_get_status') ? 'Enabled ' : 'Disabled ❌'; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-image"></i></div>
            <div class="info">
                <b>GD Library</b>
                <span><?php echo extension_loaded('gd') ? 'Enabled ' : 'Disabled ❌'; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-file-zipper"></i></div>
            <div class="info">
                <b>Zip Support</b>
                <span><?php echo extension_loaded('zip') ? 'Enabled' : 'Disabled'; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-users"></i></div>
            <div class="info">
                <b>PHP OpenSSL</b>
                <span><?php echo extension_loaded('openssl') ? 'Enabled' : 'Disabled'; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-envelope"></i></div>
            <div class="info">
                <b>Mail Function</b>
                <span><?php echo function_exists('mail') ? 'Enabled' : 'Disabled'; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-brands fa-android"></i></i></div>
            <div class="info">
                <b>Mobile App</b>
                <span>Disabled</span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-shield"></i></div>
            <div class="info">
                <b>Safe Mode</b>
                <span><?php echo ini_get('safe_mode') ? 'On' : 'Off'; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-solid fa-bug"></i></div>
            <div class="info">
                <b>Display Errors</b>
                <span><?php echo ini_get('display_errors') ? 'On' : 'Off'; ?></span>
            </div>
        </div>
        <div class="s-Card">
            <div class="icon-wrap"><i class="fa-brands fa-cpanel"></i></div>
            <div class="info">
                <b>Host Cpanel</b>
                <span>Off</span>
            </div>
        </div>
    </div>
    <div class="s-Card margin">
        <div class="icon-wrap"><i class="fa-solid fa-diagram-project"></i></div>
        <div class="info">
            <b>Session Save Path</b>
            <span><?php echo session_save_path() ?: sys_get_temp_dir(); ?></span>
        </div>
    </div>

    <div class="s-Card margin">
        <div class="icon-wrap"><i class="fa-solid fa-server"></i></div>
        <div class="info">
            <b>Server Software</b>
            <span><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'N/A'; ?></span>
        </div>
    </div>

    <div class="s-Card margin">
        <div class="icon-wrap"><i class="fa-brands fa-linux"></i></div>
        <div class="info">
            <b>OS</b>
            <span><?php echo php_uname('s') . ' ' . php_uname('r'); ?></span>
        </div>
    </div>


    <div class="s-Card margin">
        <div class="icon-wrap"><i class="fa-solid fa-language"></i></div>
        <div class="info">
            <b>Browser Language</b>
            <span><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'N/A'; ?></span>
        </div>
    </div>
    <div class="s-Card margin">
        <div class="icon-wrap"><i class="fa-solid fa-server"></i></div>
        <div class="info">
            <b>MySQL Version</b>
            <span>
                <?php
                try {
                    echo $conn->getAttribute(PDO::ATTR_SERVER_VERSION);
                } catch (PDOException $e) {
                    echo "N/A";
                }
                ?>
            </span>
        </div>
    </div>
    <div class="s-Card">
        <div class="icon-wrap"><i class="fa-solid fa-compass"></i></div>
        <div class="info">
            <b>Browser (User Agent)</b>
            <span><?php echo $_SERVER['HTTP_USER_AGENT'] ?? 'N/A'; ?></span>
        </div>
    </div>

    <div class="s-Card margin">
        <div class="icon-wrap"><i class="fa-solid fa-fingerprint"></i></div>
        <div class="info">
            <b>Session ID</b>
            <span><?php echo session_id() ?: 'N/A'; ?></span>
        </div>
    </div>
    <div class="s-Card">
        <div class="icon-wrap margin"><i class="fa-solid fa-folder-open"></i></div>
        <div class="info">
            <b>Document Root</b>
            <span><?php echo $_SERVER['DOCUMENT_ROOT']; ?></span>
        </div>
    </div>

    <div class="s-Card margin">
        <div class="icon-wrap"><i class="fa-solid fa-eye"></i></div>
        <div class="info">
            <b>Referrer</b>
            <span><?php echo $_SERVER['HTTP_REFERER'] ?? 'Direct'; ?></span>
        </div>
    </div>
</div>