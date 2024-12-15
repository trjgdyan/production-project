@include('layouts.head')
@include('layouts.head')

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Sign Up</h4>

            </div>
            <div class="card-body">
                <form method="POST" action="">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="name" class="form-control" name="name" tabindex="1" required
                            autofocus>
                    </div>
                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2"
                            required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Daftar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
