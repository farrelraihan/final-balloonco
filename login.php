<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="proses-login.php">
        <label>Email Staff</label>
        <input type="text" name="login_admin" required><br><br>
        <label>Password Staff</label>
        <input type="password" name="pw_admin" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
