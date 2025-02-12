<!DOCTYPE html>
<html>

<head>
    <title>Daftar Barang</title>
</head>

<body>
    <h1>Daftar Barang</h1>

    <form action="{{ route('barangs.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari nama barang..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
    </form>

    <a href="{{ route('barangs.create') }}">Tambah Barang</a>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
                <tr>
                    <td>{{ $barang->name }}</td>
                    <td>{{ $barang->price }}</td>
                    <td>{{ $barang->stock }}</td>
                    <td>{{ $barang->description }}</td>
                    <td>
                        @if ($barang->gambar)
                            <img src="{{ asset('storage/' . $barang->gambar) }}" alt="{{ $barang->name }}" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('barangs.edit', $barang->id) }}">Edit</a>
                        <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $barangs->links() }}
</body>

</html>
