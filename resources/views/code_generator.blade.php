@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb adminx-page-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Generator</a></li>
                    <li class="breadcrumb-item active  aria-current="page">Kode Absen</li>
                </ol>
            </nav>

            <div class="pb-3">
                <h1>Kode Absen</h1>
            </div>


            <div class="row">
                <div class="col">
                    <div class="card mb-grid">
                        <!-- Tombol untuk membuka modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            +Generate Kode Baru
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Kode Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('generatecode') }}" method="post">
                                            @csrf
                                            <div class="card-body collapse show d-flex justify-content-center"
                                                id="card1">
                                                <button type="submit" class="btn btn-danger">Generate Kode
                                                    Absen</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
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
                                        <th scope="col">Kode</th>
                                        <th scope="col">Pembuat Kode</th>
                                        <th scope="col">Status Kode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataKode as $kode)
                                        <tr>
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox"
                                                        class="custom-control-input table-select-row">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </th>
                                            <td>{{ $kode->code }}</td>
                                            <td>{{ $kode->user->name }}</td>
                                            <td>
                                                @if ($kode->id_user_get != null)
                                                    Sudah Dipakai
                                                @else
                                                    Belum Dipakai
                                                @endif
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


@include('layouts.footer')

<script>
    $(document).ready(function() {
        var table = $('[data-table]').DataTable({
            "columns": [
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
</script>
