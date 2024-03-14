@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<!-- adminx-content-aside -->
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb adminx-page-breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>

            <div class="pb-3">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                @if (Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'staff' || Auth::user()->role == 'pj'))
                    <div class="col-lg-6">
                        <form action="{{ route('generatecode') }}" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    Buat Kode Absen
                                </div>
                                <div class="card-body collapse show d-flex justify-content-center" id="card1">
                                    <button type="submit" class="btn btn-danger">Generate Kode Absen</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                <div class="@if (Auth::user() && Auth::user()->role == 'asisten') col-lg-12 @else col-lg-6 @endif">
                    <div class="card">
                        <div class="card-header">
                            Form Absen
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <h3>Selamat Datang, {{ auth()->user()->name }}</h3>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <h1 id="detik" class="mb-0">{{ $keteranganJam }}</h1>
                        </div>
                        <div class="card-body d-flex justify-content-center mt-0">
                            <h5>{{ $keteranganHari }}</h5>
                        </div>
                        <div class="card-body">
                            @if (empty($cekAbsen))
                                <form action="{{ route('storeAbsen') }}" method="post" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="IDAsisten">ID Asisten</label>
                                <input type="text" name="id_asisten" class="form-control" id="IDAsisten"
                                    value="{{ auth()->user()->id_asisten }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kelas</label>
                                <select name="kelas" class="form-control js-choice"
                                    @if (!empty($cekAbsen)) disabled @endif>
                                    <option value="" selected disabled>Silakan Pilih</option>
                                    @foreach ($kelas as $namaKelas)
                                        <option value="{{ $namaKelas->id }}">{{ $namaKelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Materi</label>
                                <select name="materi" class="form-control js-choice"
                                    @if (!empty($cekAbsen)) disabled @endif>
                                    <option value="" selected disabled>Silakan Pilih</option>
                                    @foreach ($materi as $namaMateri)
                                        <option value="{{ $namaMateri->id }}">{{ $namaMateri->materi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Peran Jaga</label>
                                <select name="peran_jaga" class="form-control js-choice"
                                    @if (!empty($cekAbsen)) disabled @endif>
                                    <option selected disabled>Silakan Pilih</option>
                                    <option value="Ketua">Ketua</option>
                                    <option value="Tutor">Tutor</option>
                                    <option value="Asisten Baris">Asisten Baris</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="KodeAbsen">Kode Absen</label>
                                <input type="text" name="code" class="form-control" id="KodeAbsen"
                                    placeholder="Ex: 87ADsds0" @if (!empty($cekAbsen)) disabled @endif>
                                <p class="card-text">*Silakan minta PJ atau Staff untuk kode absennya</p>
                            </div>
                            <div class="row">
                                @if (empty($cekAbsen))
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-primary ">Absen</button>
                                    </div>
                                @endif
                            </div>
                            </form>
                            @if (!empty($cekAbsen))
                                <form action="{{ route('updateAbsen') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col text-center">
                                                <button type="submit" class="btn btn-warning">Clock Out</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>




                @include('layouts.footer')
                <script>
                    function updateDetik() {
                        var detikElement = document.getElementById('detik');
                        var waktuSekarang = new Date();
                        var detik = waktuSekarang.getSeconds();

                        // Tambahkan leading zero jika detik < 10
                        if (detik < 10) {
                            detik = '0' + detik;
                        }

                        detikElement.textContent = waktuSekarang.getHours() + ':' + waktuSekarang.getMinutes() + ':' + detik;
                    }

                    // Perbarui detik setiap detik
                    setInterval(updateDetik, 1000);

                    @if (session('success'))
                        alert("{{ session('success') }}");
                    @endif

                    @if (session('error'))
                        alert("{{ session('error') }}");
                    @endif
                </script>
