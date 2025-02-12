@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Kabupaten List</h1>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createKabupatenModal">
            Create Kabupaten
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kabupaten</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kabupatens as $kabupaten)
                    <tr>
                        <td>{{ $kabupaten->id }}</td>
                        <td>{{ $kabupaten->kabupaten }}</td>
                        <td>{{ $kabupaten->keterangan }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editKabupatenModal{{ $kabupaten->id }}">
                                Edit
                            </button>
                            <form action="{{ route('kabupatens.destroy', $kabupaten->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createKabupatenModal" tabindex="-1" aria-labelledby="createKabupatenModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createKabupatenModalLabel">Create Kabupaten</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kabupatens.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kabupaten" class="form-label">Kabupaten</label>
                            <input type="text" class="form-control" id="kabupaten" name="kabupaten" required>
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
    @foreach ($kabupatens as $kabupaten)
        <div class="modal fade" id="editKabupatenModal{{ $kabupaten->id }}" tabindex="-1"
            aria-labelledby="editKabupatenModalLabel{{ $kabupaten->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKabupatenModalLabel{{ $kabupaten->id }}">Edit Kabupaten</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kabupatens.update', $kabupaten->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <input type="text" class="form-control" id="kabupaten" name="kabupaten"
                                    value="{{ $kabupaten->kabupaten }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan">{{ $kabupaten->keterangan }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
