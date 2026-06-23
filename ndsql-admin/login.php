<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 1);
session_start();
include("config.php");
if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === true) {
    header("Location: index.php");
    exit();
}


$error = "";

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email    = $_POST["email"];
    $password = $_POST["password"];

    // Email diye admin khoja
    $stmt = $conn->prepare("SELECT * FROM ndsql_admin WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($user) && password_verify($password, $user['password'])) {
        // Login successful
        $_SESSION['admin_id']   = $user['id'];
        $_SESSION['admin_name'] = $user['name'];
        $_SESSION['is_admin']   = true;

        header("Location: index.php"); // tomar dashboard file diye replace koro
        exit;
    } else {
        $error = "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NdSQL - Admin Login</title>
    <link rel="stylesheet" href="/other/style/style.main.css">
    <!-- CDN FontAwesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"
        integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="flex center medel fullpage">
        <div class="flex center medel">
            <div>
                <div class="flex center medel">
                    <img class="login-logo" src="https://ndsql.top/static/media/nav_logo.2f5179eca4b775b70bff.png"
                        alt="Logo">
                </div>
                <div class="loginBox">
                    <center>
                        <h2>Login to Your Account</h2>
                        <hr>
                        <br>
                    </center>

                    <?php if (!empty($error)) : ?>
                        <div class="error-box">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <label class="lable" for="email">Email</label>
                        <input id="email" name="email" placeholder="Admin Email" type="email" class="input" required>

                        <label class="lable" for="password">Password</label>
                        <input id="password" name="password" placeholder="Admin Password" type="password" class="input" required>

                        <br><br>
                        <center>
                            <button class="login-btn" type="submit">Login</button>
                        </center>
                        <br>
                        Don't have account? Back to Website
                    </form>
                </div>
            </div>
        </div>
    </div>
