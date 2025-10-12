<?php
include 'connect.php';

if (isset($_POST['create'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $stock = intval($_POST['stock']);

    // Cek kategori
    $checkCategory = "SELECT id FROM categories WHERE category_name = '$category'";
    $result = mysqli_query($conn, $checkCategory);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $category_id = $row['id'];
    } else {
        $insertCategory = "INSERT INTO categories (category_name) VALUES ('$category')";
        mysqli_query($conn, $insertCategory);
        $category_id = mysqli_insert_id($conn);
    }

    // Insert buku
    $query = "INSERT INTO books (title, category_id, author, stock)
              VALUES ('$title', '$category_id', '$author', '$stock')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Buku berhasil ditambahkan!');
            window.location.href='list_books.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menambahkan buku: " . mysqli_error($conn) . "');
            window.history.back();
        </script>";
    }
} else {
    header('Location: form_create_book.php');
    exit;
}
?>
