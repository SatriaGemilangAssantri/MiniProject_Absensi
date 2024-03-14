@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb adminx-page-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Report</a></li>
                    <li class="breadcrumb-item active  aria-current="page">Report Absen</li>
                </ol>
            </nav>

            <div class="pb-3">
                <h1>Report Absen</h1>
            </div>


            <div class="row">
                <div class="col">
                    <div class="card mb-grid">
                        <div class="table-responsive-md">
                            <table class="table table-actions table-striped table-hover mb-0" data-table>
                                <form method="post" action="{{ route('searchRiwayat') }}">
                                    @csrf
                                    <div class="row mt-4 ml-4 mr-4">
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label mr-2" for="TanggalAwal">Tanggal Awal</label>
                                                <input class="form-control input-date mb-2" name="start"
                                                    type="date" placeholder="YYYY/MM/DD" id="TanggalAwal">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label mr-2" for="TanggalAkhir">Tanggal Akhir</label>
                                                <input class="form-control input-date mb-2" name="end"
                                                    type="date" placeholder="YYYY/MM/DD" id="TanggalAkhir">
                                            </div>
                                        </div>
                                        <div class="col-md-1 mb-3">
                                            <div class="form-group">
                                                <label class="form-label mr-2" for="Cari">Cari</label>
                                                <button type="submit" class="form-control btn btn-primary mb-2"
                                                    id="Cari">-></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <label class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input table-select-all">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </th>
                                        <th scope="col">ID Asisten</th>
                                        <th scope="col">Nama Asisten</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Materi</th>
                                        <th scope="col">Jaga Sebagai</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Waktu Mulai</th>
                                        <th scope="col">Waktu Akhir</th>
                                        <th scope="col">Durasi</th>
                                        <th scope="col">PJ/Asisten/Staff Approved</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($absensi as $absen)
                                        <tr>
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox"
                                                        class="custom-control-input table-select-row">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </th>
                                            <td>{{ $absen->id_asisten }}</td>
                                            <td>{{ $absen->user->name }}</td>
                                            <td>{{ $absen->kelas ? $absen->kelas->nama_kelas : 'N/A' }}</td>
                                            <td>{{ $absen->materi ? $absen->materi->materi : 'N/A' }}</td>
                                            <td><span
                                                    class="badge badge-pill badge-primary">{{ $absen->teaching_role }}</span>
                                            </td>
                                            <td>{{ $absen->date }}</td>
                                            <td>{{ $absen->start }}</td>
                                            <td>{{ $absen->end }}</td>
                                            <td>{{ $absen->duration }} Menit</td>
                                            @php
                                                $getIdCode = App\Models\Code::where('id', $absen->code_id)->first();
                                                $getApproved = App\Models\User::where(
                                                    'id',
                                                    $getIdCode->user_id,
                                                )->first();
                                            @endphp
                                            <td>{{ $getApproved->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center" id="card1">
                                {{-- <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">With supporting text below as a natural lead-in to additional
                                content.</p> --}}
                                <a href="{{ route('exportAbsen') }}" class="btn btn-success">Export to Excel</a>
                            </div>
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
                null,
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
</script>
