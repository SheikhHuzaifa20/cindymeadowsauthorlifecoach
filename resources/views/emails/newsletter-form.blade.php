<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Newsletter Subscription</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .email-box { background: #fff; border-radius: 8px; padding: 30px; max-width: 600px; margin: 0 auto; border-top: 4px solid #8B5E3C; }
        h2 { color: #8B5E3C; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #333; }
        .value { color: #555; margin-top: 4px; }
        .footer { margin-top: 30px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="email-box">
        <h2>📧 New Newsletter Subscription</h2>
        <p>A new visitor has subscribed to your newsletter.</p>

        <div class="field">
            <div class="label">Subscriber Email:</div>
            <div class="value">{{ $email }}</div>
        </div>

        <div class="footer">
            This email was sent from the Newsletter form on <strong>cindymeadowsauthorlifecoach.com</strong>
        </div>
    </div>
</body>
</html>
