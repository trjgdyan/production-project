@include('layouts.head')
<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- navbar include -->
            @include('layouts.navbar')
            <!-- sidebar include -->
            @include('layouts.sidebar')
            <!-- Main Content -->
            <div class="main-content container-fluid">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('title', 'Dashboard')</h1>

                    </div>
                    <!-- content -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </section>
            </div>


        </div>
    </div>
    @include('layouts.footer')
</body>

