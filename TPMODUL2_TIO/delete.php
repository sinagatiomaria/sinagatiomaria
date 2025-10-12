<?php
// Include the database connection
require "connect.php";

// ===============1==============
// If statement untuk mengambil GET request dari URL kemudian simpan di variabel id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ==============2=============
    // Definisikan $query untuk menghapus data menggunakan $id
    $delete_query = "DELETE FROM products WHERE id = '$id'";
    mysqli_query($conn, $delete_query);

    // =============4=============
    // Eksekusi query
   if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_products.php");
    } else {
        echo "
        <script>
            alert('Failed to delete product');
            document.location.href = 'list_products.php';
        </script>
        ";
        exit;
    }
}

// Close the database connection after finishing
mysqli_close($conn);
?>