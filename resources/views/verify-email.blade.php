<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
</head>
<body>
    <h1>Email Verification Required</h1>
    <p>Please check your email for a verification link.</p>
    <p>If you did not receive the email, you can request another one:</p>
    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>
</body>
</html>
