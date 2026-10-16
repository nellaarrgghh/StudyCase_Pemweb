<?php
// auth.php — Authentication and Authorization Helper Functions
session_start();

function is_admin() {
    return isset($_SESSION['role']) && strcasecmp($_SESSION['role'], 'admin') === 0;
}

function require_admin() {
    if (!is_admin()) {
        http_response_code(403);
        die("403 - Access denied. This page is for admins only.");
    }
}
?>