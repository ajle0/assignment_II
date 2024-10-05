<?php
class Authentication {
    public function generate2FACode() {
        return rand(100000, 999999);
    }

    public function validate2FACode($inputCode, $userCode) {
        return $inputCode === $userCode;
    }
}
?>
