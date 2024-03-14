@include('layouts.header')

<div class="adminx-container d-flex justify-content-center align-items-center">
    <div class="page-login">
        <div class="text-center">
            <a class="navbar-brand mb-4 h1" href="login.html">
                <img src="../demo/img/logo.png" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
                LABSI
            </a>
        </div>

        <div class="card mb-0">
            <div class="card-body">
                <form action="/login" method="post" id="loginForm">
                    @csrf
                    <div class="form-group">
                        <label for="Email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="Email" name="email"
                            placeholder="email@example.com" autofocus required value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="Password" name="password"
                            placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-sm btn-block btn-primary">Log in</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
<script>
    // Ambil pesan sukses atau gagal dari session
    @if (session('success'))
        alert("{{ session('success') }}");
    @endif

    @if (session('error'))
        alert("{{ session('error') }}");
    @endif
</script>
