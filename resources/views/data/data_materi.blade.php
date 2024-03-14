@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb adminx-page-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data</a></li>
                    <li class="breadcrumb-item active  aria-current="page">Data Materi</li>
                </ol>
            </nav>

            <div class="pb-3">
                <h1>Data Materi</h1>
            </div>


            <div class="row">
                <div class="col">
                    <div class="card mb-grid">
                        <!-- Tombol untuk membuka modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            +Materi Baru
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Materi Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('storeMateri') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label" for="Materi">Materi</label>
                                                <input type="text" class="form-control" id="Materi"
                                                    placeholder="Materi" name="materi">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive-md">
                            <table class="table table-actions table-striped table-hover mb-0" data-table>
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <label class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input table-select-all">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </th>
                                        <th scope="col">Materi</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataMateri as $materi)
                                        <tr>
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox"
                                                        class="custom-control-input table-select-row">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </th>
                                            <td>{{ $materi->materi }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary text-white edit-btn"
                                                    data-toggle="modal" data-target="#modalEdit"
                                                    data-id="{{ $materi->id }}"
                                                    data-materi="{{ $materi->materi }}">Edit</a>
                                                <a class="btn btn-sm btn-danger text-white"
                                                    href="{{ route('destroyMateri', ['id' => $materi->id]) }}"
                                                    onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Form Modal Edit --}}
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('updateMateri', ['id' => $materi->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="edit_materi">Materi</label>
                        <input type="text" class="form-control" placeholder="Materi" name="materi"
                            id="edit_materi" value="{{ $materi->materi }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')

<script>
    $(document).ready(function() {
        var table = $('[data-table]').DataTable({
            "columns": [
                null,
                null,
                {
                    "orderable": false
                }
            ]
        });

        /* $('.form-control-search').keyup(function(){
          table.search($(this).val()).draw() ;
        }); */
    });

    @if (session('success'))
        alert("{{ session('success') }}");
    @endif

    @if (session('error'))
        alert("{{ session('error') }}");
    @endif

    $(document).ready(function() {
        $('.edit-btn').click(function() {
            var id = $(this).data('id');
            var materi = $(this).data('materi');

            $('#editForm').attr('action', '/update-materi/' + id);
            $('#edit_materi').val(materi);
        });
    });
</script>
