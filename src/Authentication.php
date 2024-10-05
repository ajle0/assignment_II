<?php
class Authentication {
    public function generate2FACode() {
        return rand(100000, 999999);
    }