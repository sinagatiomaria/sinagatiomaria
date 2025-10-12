<?php
include 'connect.php';

// connect to db
include("connect.php");

// get id safely
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ===========1============
// Definisikan $query untuk mengambil data buku berdasarkan id
$query = "SELECT * FROM products WHERE id = $id";
$data = mysqli_query($conn, $query);

$result = mysqli_query($conn, $query);
$book = mysqli_fetch_assoc($result);

// ====================2================= 
// Ambil semua kategori dari tabel categories
$categories = mysqli_query($conn, "SELECT * FROM categories");

// fetch single product
$product = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container py-5">
        <div class="card shadow p-4">
            <h3 class="mb-4 text-dark">Edit Data Buku</h3>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?= $book['id'] ?>">
                <div class="form-floating mb-3">
                    <!-- ====================3================= -->
                    <!-- Isi attribute value gunakan htmlspecialchars untuk judul buku yang diisi dengan nilai dari database -->
                    <input type="text" class="form-control" name="title" value="" required>
                    <label>Judul Buku</label>
                </div>
                <!-- ====================3================= -->
                <!-- Isi attribute name dropdown untuk kategori yang harus diisi -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="selectCategory" name="" required>
                        <option value="" disabled>-- Pilih Kategori --</option>
                        <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                            <!-- ====================4================= -->
                            <!-- 
                            - Buat option yang datanya mengambil dari $category 
                            - valuenya itu id  
                            - jika id $category option sama dengan yang ada di $book maka tambahkan selected
                            - menampilkan nama kategori dan gunakan htmlspecialchars  
                            -->
                            
                        <?php endwhile; ?>
                    </select>
                    <label for="selectCategory">Kategori</label>
                </div>
                <div class="form-floating mb-3">
                    <!-- ====================5================= -->
                    <!-- Isi attribute value gunakan htmlspecialchars untuk penulis buku yang diisi dengan nilai dari database -->
                    <input type="text" class="form-control" name="author" value="" required>
                    <label>Penulis</label>
                </div>
                <div class="form-floating mb-3">
                    <!-- ====================6================= -->
                    <!-- Isi attribute value gunakan (int) untuk stok yang diisi dengan nilai dari database -->
                    <input type="number" class="form-control" name="stock" value="" min="0" required>
                    <label>Stok</label>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>