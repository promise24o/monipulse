<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: #fff !important;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Password Reset</h2>
        </div>
        <div class="content">
            <p>Hello <?= htmlspecialchars($user_name) ?>,</p>
            <p>Your password for <?= htmlspecialchars($from_name) ?> has been reset.</p>
            <p>Your new temporary password is: <strong><?= htmlspecialchars($new_password) ?></strong></p>
            <p>Please log in using this new password and change it immediately from your account settings for security reasons.</p>
            <a href="<?= base_url('get-started') ?>" class="button">Log In Now</a>
            <p>If you did not request a password reset, please ignore this email or contact our support team if you have concerns.</p>
        </div>
        <div class="footer">
            <p>Thank you,<br>The <?= htmlspecialchars($from_name) ?> Team</p>
        </div>
    </div>
</body>
</html>
