<!DOCTYPE html>
<html>

<head>
    <title>Tambah Barang</title>
</head>

<body>
    <h1>Tambah Barang</h1>

    <form action="{{ route('barangs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" required><br><br>
        <label for="price">Harga:</label>
        <input type="number" name="price" id="price" required><br><br>
        <label for="stock">Stok:</label>
        <input type="number" name="stock" id="stock" required><br><br>
        <label for="description">Deskripsi:</label><br>
        <textarea name="description" id="description" required></textarea><br><br>
        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar" id="gambar"><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>
