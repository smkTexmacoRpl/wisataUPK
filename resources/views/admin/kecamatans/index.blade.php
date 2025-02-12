@extends('layouts.dashboard')

@section('title', 'Kecamatan List')
@section('content')
    <div class="container">

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createKecamatanModal">
            Create Kecamatan
        </button>

        <table class="table" id="tableKecamatan">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kecamatans as $kecamatan)
                    <tr>
                        <td>{{ $kecamatan->id }}</td>
                        <td>{{ $kecamatan->kabupaten->kabupaten }}</td>
                        <td>{{ $kecamatan->kecamatan }}</td>
                        <td>{{ $kecamatan->keterangan }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editKecamatanModal{{ $kecamatan->id }}">
                                Edit
                            </button>
                            <form action="{{ route('kecamatans.destroy', $kecamatan->id) }}" method="POST"
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
    <div class="modal fade" id="createKecamatanModal" tabindex="-1" aria-labelledby="createKabupatenModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createKabupatenModalLabel">Create Kabupaten</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kecamatans.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kabupaten_id" class="form-label">Kabupaten</label>
                            <select class="form-select" id="kabupaten_id" name="kabupaten_id" required>
                                @foreach ($kabs as $kab)
                                    <option value="{{ $kab->id }}">{{ $kab->kabupaten }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modals -->
    @foreach ($kecamatans as $kc)
        <div class="modal fade" id="editKecamatanModal{{ $kc->id }}" tabindex="-1"
            aria-labelledby="editKabupatenModalLabel{{ $kc->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKecamatanModalLabel{{ $kc->id }}">Edit Kecamatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kecamatans.update', $kecamatan->id) }}" method="POST">

                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="kabupaten_id" class="form-label">Kabupaten</label>
                                <input type="text" class="form-control" id="kabupaten_id" name="kabupaten_id"
                                    value="{{ $kecamatan->kabupaten_id }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                    value="{{ $kecamatan->kecamatan }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan">{{ $kecamatan->keterangan }}</textarea>
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

    <script>
        new DataTable('#tableKecamatan');
        // $(document).ready(function() {
        //     $('#tableKecamatan').DataTable();
        // });
    </script>
    @foreach ($kecamatans as $kc)
        <script>
            $(document).ready(function() {
                $('#editKecamatanModal{{ $kc->id }}').on('show.bs.modal', function(event) {

                })
            })
        </script>
    @endforeach

    <script>
        $(document).ready(function() {
            $('#createKecamatanModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var kabupaten_id = button.data('kabupaten_id');
                var modal = $(this);
                modal.find('#kabupaten_id').val(kabupaten_id);
            });
        });
    </script>
@endsection
