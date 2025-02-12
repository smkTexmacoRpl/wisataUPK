@extends('layouts.dashboard')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />
@endsection
@section('title', 'Kategory List')
@section('content')
    <div class="container">

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createKategoriModal">
            Buat Kategori
        </button>

        <table class="table" id="tableKategori">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>kategori</th>
                    <th>slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ktgs as $ktg)
                    <tr>
                        <td>{{ $ktg->id }}</td>
                        <td>{{ $ktg->kategori }}</td>
                        <td>{{ $ktg->slug }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editKategoriModal{{ $ktg->id }}">
                                Edit
                            </button>
                            <form action="{{ route('kategories.destroy', $ktg->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                    class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createKategoriModal" tabindex="-1" aria-labelledby="createKategoriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createKategoriModalLabel">Create kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kategories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" required>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modals -->
    @foreach ($ktgs as $ktg)
        <div class="modal fade" id="editKategoriModal{{ $ktg->id }}" tabindex="-1"
            aria-labelledby="editKategoriModalLabel{{ $ktg->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKategoriModalLabel{{ $ktg->id }}">Edit Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kategories.update', $ktg->id) }}" method="POST">

                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori"
                                    value="{{ $ktg->kategori }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('scripts')


    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#tableKategori');
        // $(document).ready(function() {
        // $('#tableKecamatan').DataTable();
        // });
    </script>
    @foreach ($ktgs as $ktg)
        <script>
            $(document).ready(function() {
                $('#editKategoriModal{{ $ktg->id }}').on('show.bs.modal', function(event) {

                })
            })
        </script>
    @endforeach

    <script>
        $(document).ready(function() {
            $('#createKategoriModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                modal.find('#id').val(id);
            });
        });
    </script>
@endsection
