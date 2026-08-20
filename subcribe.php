<?php

include("./ndsql-admin/config.php");

function showMessage($type, $title, $message) {
    $colors = [
        'success' => ['bg' => '#d4edda', 'border' => '#28a745', 'text' => '#155724', 'icon' => '✓'],
        'warning' => ['bg' => '#fff3cd', 'border' => '#ffc107', 'text' => '#856404', 'icon' => '!'],
        'error'   => ['bg' => '#f8d7da', 'border' => '#dc3545', 'text' => '#721c24', 'icon' => '✕'],
    ];
    $c = $colors[$type];
    ?>
    <!DOCTYPE html>
    <html lang="bn">
    <head>
        <meta charset="UTF-8">
        <title>Subscription Status</title>
        <style>
            * { margin:0; padding:0; box-sizing:border-box; }
            body {
                font-family: 'Segoe UI', 'Hind Siliguri', Arial, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }
            .card {
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 10px 40px rgba(0,0,0,0.2);
                max-width: 420px;
                width: 100%;
                padding: 40px 30px;
                text-align: center;
                animation: pop 0.4s ease;
            }
            @keyframes pop {
                0% { transform: scale(0.9); opacity: 0; }
                100% { transform: scale(1); opacity: 1; }
            }
            .icon {
                width: 70px; height: 70px;
                border-radius: 50%;
                background: <?= $c['bg'] ?>;
                border: 3px solid <?= $c['border'] ?>;
                color: <?= $c['border'] ?>;
                font-size: 32px; font-weight: bold;
                display: flex; align-items: center; justify-content: center;
                margin: 0 auto 20px;
            }
            .title { font-size: 22px; font-weight: 700; color: <?= $c['text'] ?>; margin-bottom: 10px; }
            .message { font-size: 15px; color: #555; line-height: 1.6; margin-bottom: 25px; }
            .btn {
                display: inline-block;
                background: <?= $c['border'] ?>;
                color: #fff; text-decoration: none;
                padding: 12px 30px; border-radius: 8px;
                font-weight: 600; font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <div class="icon"><?= $c['icon'] ?></div>
            <div class="title"><?= htmlspecialchars($title) ?></div>
            <div class="message"><?= htmlspecialchars($message) ?></div>
            <a href="/" class="btn">Back to Home</a>
        </div>
    </body>
    </html>
    <?php
}

try {
    $data = ndsql_usersio_add($_POST);

    if ($data === true) {
        showMessage('success', 'অভিনন্দন!', 'আপনি সফলভাবে সাবস্ক্রাইব করেছেন।');
    }
} catch (PDOException $e) {
    if ((int)$e->errorInfo[1] === 1062) {
        showMessage('warning', 'ইতিমধ্যে সাবস্ক্রাইবড', 'এই ইমেইল দিয়ে আগেই সাবস্ক্রাইব করা আছে। নতুন করে যোগ করা হয়নি।');
    } else {
        error_log('[Subscribe Error] ' . $e->getMessage());
        showMessage('error', 'কিছু ভুল হয়েছে', 'দুঃখিত, একটি সমস্যা হয়েছে। আবার চেষ্টা করুন।');
    }
}
?>