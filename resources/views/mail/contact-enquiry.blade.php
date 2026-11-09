<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>New A&amp;PM website enquiry</title></head>
<body>
    <h1>New website travel enquiry</h1>
    <p><strong>Full name:</strong> {{ $enquiry['name'] }}</p>
    <p><strong>Email:</strong> {{ $enquiry['email'] }}</p>
    <p><strong>Phone/WhatsApp:</strong> {{ $enquiry['phone'] ?? 'Not provided' }}</p>
    <p><strong>Enquiry type:</strong> {{ config('contact.types')[$enquiry['enquiry_type']] }}</p>
    <h2>Message</h2>
    <p style="white-space: pre-wrap">{{ $enquiry['message'] }}</p>
    <p>This is an enquiry, not a confirmed reservation. Reply to this email to contact the traveller.</p>
</body>
</html>
