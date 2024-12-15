@include('layouts.head')

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card card-primary">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Login</h4>
                {{-- <a href="{{ route('signup') }}" style="text-decoration: none;">Buat akun</a> --}}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="noreg">Nomor Pegawai</label>
                        <input id="noreg" type="text" class="form-control" name="noreg" tabindex="1"
                            value="{{ old('noreg') }}" autofocus>
                    </div>
                    @error('noreg')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
