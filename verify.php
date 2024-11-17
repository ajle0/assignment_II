<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify 2FA Code</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Verify 2FA Code</h2>
    <form action="verify_code.php" method="POST">
        <div class="form-group">
            <label for="two_fa_code">Enter 2FA Code:</label>
            <input type="text" class="form-control" name="two_fa_code" required>
        </div>
        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</body>
</html>
