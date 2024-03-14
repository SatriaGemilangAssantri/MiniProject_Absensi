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
                    <li class="breadcrumb-item active  aria-current="page">Data Kelas</li>
                </ol>
            </nav>

            <div class="pb-3">
                <h1>Data Kelas</h1>
            </div>


            <div class="row">
                <div class="col">
                    <div class="card mb-grid">
                        <!-- Tombol untuk membuka modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            +Kelas Baru
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Data Kelas Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('storeKelas') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label" for="Jurusan">Jurusan</label>
                                                <input type="text" class="form-control" id="Jurusan"
                                                    placeholder="Jurusan" name="jurusan">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="Fakultas">Fakultas</label>
                                                <input type="text" class="form-control" id="Fakultas"
                                                    placeholder="Fakultas" name="fakultas">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="Tingkat">Tingkat</label>
                                                <input type="text" class="form-control" id="Tingkat"
                                                    placeholder="Tingkat" name="tingkat">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="NamaKelas">Nama Kelas</label>
                                                <input type="text" class="form-control" id="NamaKelas"
                                                    placeholder="cth: 4KAXX" name="nama_kelas">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
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
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Fakultas</th>
                                        <th scope="col">Tingkat</th>
                                        <th scope="col">Nama Kelas</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataKelas as $kelas)
                                        <tr>
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox"
                                                        class="custom-control-input table-select-row">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </th>
                                            <td>{{ $kelas->jurusan }}</td>
                                            <td>{{ $kelas->fakultas }}</td>
                                            <td>{{ $kelas->tingkat }}</td>
                                            <td>{{ $kelas->nama_kelas }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary text-white edit-btn"
                                                    data-toggle="modal" data-target="#modalEdit"
                                                    data-id="{{ $kelas->id }}" data-jurusan="{{ $kelas->jurusan }}"
                                                    data-fakultas="{{ $kelas->fakultas }}"
                                                    data-tingkat="{{ $kelas->tingkat }}"
                                                    data-nama_kelas="{{ $kelas->nama_kelas }}">Edit</a>
                                                <a class="btn btn-sm btn-danger text-white"
                                                    href="{{ route('destroyKelas', ['id' => $kelas->id]) }}"
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
                <form id="editForm" action="{{ route('updateKelas', ['id' => $kelas->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="edit_jurusan">Jurusan</label>
                        <input type="text" class="form-control" placeholder="Jurusan" name="jurusan"
                            id="edit_jurusan" value="{{ $kelas->jurusan }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit_fakultas">Fakultas</label>
                        <input type="text" class="form-control" id="edit_fakultas" placeholder="Fakultas"
                            name="fakultas" value="{{ $kelas->fakultas }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit_tingkat">Tingkat</label>
                        <input type="text" class="form-control" id="edit_tingkat" placeholder="Tingkat"
                            name="tingkat" value="{{ $kelas->tingkat }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit_nama_kelas">nama_kelas</label>
                        <input type="text" class="form-control" id="edit_nama_kelas" placeholder="john@doe.com"
                            name="nama_kelas" value="{{ $kelas->nama_kelas }}">
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
                null,
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
            var jurusan = $(this).data('jurusan');
            var fakultas = $(this).data('fakultas');
            var tingkat = $(this).data('tingkat');
            var nama_kelas = $(this).data('nama_kelas');


            $('#editForm').attr('action', '/update-kelas/' + id);
            $('#edit_jurusan').val(jurusan);
            $('#edit_fakultas').val(fakultas);
            $('#edit_tingkat').val(tingkat);
            $('#edit_nama_kelas').val(nama_kelas);
        });
    });
</script>
