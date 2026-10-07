<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>We received your message</title>
</head>
<body style="margin:0;padding:24px;background:#f5f5f5;font-family:Arial,sans-serif;color:#333;">
    <div style="max-width:600px;margin:0 auto;padding:32px;background:#fff;border-top:4px solid #8B5E3C;">
        <h2 style="color:#8B5E3C;">Thank you for contacting Cindy Meadows</h2>
        <p>Hi {{ $data['name'] }},</p>
        <p>We received your message and will get back to you as soon as possible.</p>
        <p style="white-space:pre-line;"><strong>Your message:</strong><br>{{ $data['notes'] }}</p>
        <p>Warm regards,<br>Cindy Meadows</p>
    </div>
</body>
</html>