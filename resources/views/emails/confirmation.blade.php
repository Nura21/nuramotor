<!-- resources/views/emails/confirmation.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Email</title>
</head>
<body>
    <h1>Confirmation Email</h1>
    <p>Thank you for registering. To confirm your email, click the link below:</p>
    <a href="{{ route('email.confirm', ['token' => $user->email_confirmation_token]) }}">Confirm Email</a>
</body>
</html>
