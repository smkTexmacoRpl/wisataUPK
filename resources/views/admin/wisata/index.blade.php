@extends('layouts.dashboard')
@section('title')
    Tempat Wisata
@endsection
@section('content')
    <div class="container mt-5">

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addWisataModal">
            Add Wisata
        </button>

        <!-- Tabel untuk menampilkan data -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tempat Wisata</th>
                    <th>Description</th>
                    <th>Alamat</th>
                    <th>Category</th>
                    <th>user</th>
                    <th>longitute</th>
                    <th>latitute</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wisatas as $wisata)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $wisata->nama_wisata }}</td>
                        <td>{{ $wisata->deskripsi }}</td>
                        <td>{{ $wisata->alamat }}</td>
                        <td>{{ $wisata->kategori->kategori }}</td>
                        <td>{{ $wisata->user->name }}</td>
                        <td></td>
                        <td><img src="{{ asset('storage/' . $wisata->gambar_info) }}" alt="Product Image" width="100">
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm edit-product" data-id="{{ $wisata->id_wisata }}"
                                data-bs-toggle="modal" data-bs-target="#editWisataModal">Edit</button>
                            <form action="{{ route('informasi.destroy', $wisata->id_wisata) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                    class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal untuk Add Product -->
    <div class="modal fade" id="addWisataModal" tabindex="-1" aria-labelledby="addWisataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addProductForm" action="{{ route('wisatas.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addWisataLabel">Add Wisata</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="wisata" class="form-label">Nama Tempat Wisata</label>
                            <input type="text" class="form-control form-control-sm" id="wisata" name="wisata"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Wisata</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategory</label>
                            <select type="text" class="form-control" id="kategori_id" name="kategori_id">
                                <option>pilih kategori</option>
                                @foreach ($kategories as $ktg)
                                    <option value="{{ $ktg->id }}">{{ $ktg->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control form-control-xs" id="alamat" name="alamat">

                        </div>

                        <div class="mb-3">
                            <label for="gambar_info" class="form-label">Gambar info</label>
                            <input type="file" class="form-control form-control-xs" id="gambar_info" name="gambar_info">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Product -->
    <div class="modal fade" id="editWisataModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editProductForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_price" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="edit_price" name="price"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Handle Edit Modal
        $(document).on('click', '.edit-product', function() {
            var id = $(this).data('id');
            $.get(`/products/${id}/edit`, function(data) {
                $('#edit_name').val(data.name);
                $('#edit_description').val(data.description);
                $('#edit_price').val(data.price);
                $('#editProductForm').attr('action', `/products/${id}`);
            });
        });
    </script>
@endsection
