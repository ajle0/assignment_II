<?php
session_start();

if (isset($_POST['two_fa_code']) && $_POST['two_fa_code'] == $_SESSION['two_fa_code']) {
    echo "2FA verification successful. Access granted!";
    // Clear the 2FA session data
    unset($_SESSION['two_fa_code']);
    unset($_SESSION['email']);
} else {
    echo "Invalid 2FA code. Access denied.";
}
?>
