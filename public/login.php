<?php include_once '../templates/header.php'; ?>

<div class="container">
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="twofa_code">2FA Code</label>
            <input type="text" name="twofa_code" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>