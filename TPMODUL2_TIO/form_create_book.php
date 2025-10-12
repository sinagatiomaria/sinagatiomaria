<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Buku</h1>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="create.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Judul Buku" required>
                            <label for="title">Judul Buku</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="category" name="category" placeholder="Kategori" required>
                            <label for="category">Kategori</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="author" name="author" placeholder="Penulis" required>
                            <label for="author">Penulis</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Stok" required>
                            <label for="stock">Stok</label>
                        </div>
                        <button type="submit" name="create" class="btn btn-primary w-100">Tambah Buku</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
