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
                    <li class="breadcrumb-item active  aria-current="page">Data Asisten</li>
                </ol>
            </nav>

            <div class="pb-3">
                <h1>Data Asisten</h1>
            </div>


            <div class="row">
                <div class="col">
                    <div class="card mb-grid">
                        <!-- Tombol untuk membuka modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                            +Asisten Baru
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Asisten Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('storeAsisten') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label" for="IDAsisten">Id Asisten</label>
                                                <input type="text" class="form-control" id="IDAsisten"
                                                    placeholder="ID Asisten" name="id_asisten">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="Nama">Nama</label>
                                                <input type="text" class="form-control" id="Nama"
                                                    placeholder="Nama" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="JoinDate">Join Date</label>
                                                <input type="date" class="form-control" id="JoinDate"
                                                    placeholder="Join Date" name="join_date">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Jabatan</label>
                                                <select name="role" class="form-control js-choice">
                                                    <option selected disabled>Silakan Dipilih</option>
                                                    <option value="admin">admin</option>
                                                    <option value="staff">staff</option>
                                                    <option value="pj">pj</option>
                                                    <option value="asisten">asisten</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="customFile" class="form-label">Photo</label>
                                                <input type="file" class="form-control" id="customFile"
                                                    name="photo">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="Email">Email</label>
                                                <input type="email" class="form-control" id="Email"
                                                    placeholder="john@doe.com" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="Password">Password</label>
                                                <input type="password" class="form-control" id="Password"
                                                    placeholder="" name="password">
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
                                        <th scope="col">ID Asisten</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Join Date</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataAsisten as $asisten)
                                        <tr>
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox"
                                                        class="custom-control-input table-select-row">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </th>
                                            <td>{{ $asisten->id_asisten }}</td>
                                            <td>{{ $asisten->name }}</td>
                                            <td>{{ $asisten->join_date }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-pill badge-primary">{{ $asisten->role }}</span>
                                            </td>
                                            <td>{{ $asisten->email }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary text-white edit-btn"
                                                    data-toggle="modal" data-target="#modalEdit"
                                                    data-id="{{ $asisten->id }}"
                                                    data-id_asisten="{{ $asisten->id_asisten }}"
                                                    data-name="{{ $asisten->name }}"
                                                    data-join-date="{{ $asisten->join_date }}"
                                                    data-role="{{ $asisten->role }}"
                                                    data-photo="{{ $asisten->photo }}"
                                                    data-email="{{ $asisten->email }}">Edit</a>
                                                <a class="btn
                                                    btn-sm btn-danger text-white"
                                                    href="{{ route('destroyAsisten', ['id' => $asisten->id]) }}"
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Asisten </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('updateAsisten', ['id' => $asisten->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label class="form-label" for="edit_id_asisten">Id Asisten</label>
                        <input type="text" class="form-control" placeholder="ID Asisten" name="id_asisten"
                            id="edit_id_asisten" value="{{ $asisten->id_asisten }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit_name">Nama</label>
                        <input type="text" class="form-control" id="edit_name" placeholder="Nama" name="name"
                            value="{{ $asisten->name }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit_join_date">Join Date</label>
                        <input type="date" class="form-control" id="edit_join_date" placeholder="Join Date"
                            name="join_date" value="{{ $asisten->join_date }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jabatan</label>
                        <select name="role" class="form-control js-choice" id="edit_role">
                            <option disabled>Silakan Dipilih</option>
                            <option value="admin" {{ $asisten->role == 'admin' ? 'selected' : '' }}>admin</option>
                            <option value="staff" {{ $asisten->role == 'staff' ? 'selected' : '' }}>staff</option>
                            <option value="pj" {{ $asisten->role == 'pj' ? 'selected' : '' }}>pj</option>
                            <option value="asisten" {{ $asisten->role == 'asisten' ? 'selected' : '' }}>asisten
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="edit_photo" name="photo">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email" placeholder="john@doe.com"
                            name="email" value="{{ $asisten->email }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="Password">Password</label>
                        <input type="password" class="form-control" id="Password" placeholder="" name="password">
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
            var id_asisten = $(this).data('id_asisten');
            var name = $(this).data('name');
            var join_date = $(this).data('join-date');
            var role = $(this).data('role');
            var photo = $(this).data('photo');
            var email = $(this).data('email');

            $('#edit_id').val(id);
            $('#editForm').attr('action', '/update-asisten/' + id);
            $('#edit_id_asisten').val(id_asisten);
            $('#edit_name').val(name);
            $('#edit_join_date').val(join_date);
            $('#edit_role').val(role);
            $('#edit_photo').val(photo);
            $('#edit_email').val(email);
        });

    });
</script>
