<?php
include 'connect.php';

// Ambil ID dari URL dengan aman
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// =========== 1 ============
// Cek apakah ID valid (>0)
if ($id <= 0) {
    $book = null;
} else {
    // Query ambil data buku + kategori (pakai prepared statement biar aman dari SQL Injection)
    $query = "
        SELECT books.id, books.title, categories.category_name, books.author, books.stock
        FROM books
        JOIN categories ON books.category_id = categories.id
        WHERE books.id = ?
    ";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $book = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dis
