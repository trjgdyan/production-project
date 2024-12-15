<style>
    .menu {
        color: white;
        background-color: #4a90e2;
        border-radius: 8px;
        padding: 5px 15px;
        font-weight: bold;
        display: flex;
        align-items: center;
        width: 80%;
        margin: 0 auto;
        text-align: center;
    }

    .menu .nav-link {
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        /* Pusatkan konten di dalam nav-link */
        width: 100%;
    }

    .menu .nav-link i {
        font-size: 1.5em;
        margin-right: 10px;
    }

    .menu:hover {
        background-color: purple;
        transition: background-color 0.3s ease;
    }
</style>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html" style="color:white;">PT MANUFAKTUR </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Ut</a>
        </div>

        <div class="d-flex flex-column align-items-center">
            <div class="d-flex flex-column align-items-center">
                <img alt="image" src="../assets/img/profile.png" style="height:10rem; width:10rem"
                    class="rounded-circle profile-widget-picture">
                <p class="mb-0" style="color:white;">{{ auth()->user()->name }}</p>
                <a href="{{ route('logout') }}" class="mt-0" style="color:white;">(LOGOUT)</a>
            </div>
            <div class="mt-3">
                <table style="color:white;">
                    <tbody>
                        <tr>
                            <td>Module </td>
                            <td>&nbsp;:&nbsp;</td>
                            <td>Production</td>
                        </tr>
                        <tr>
                            <td>CLASS </td>
                            <td>&nbsp;:&nbsp;</td>
                            <td>{{ auth()->user()->class }}</td>
                        </tr>
                        <tr>
                            <td>Dept </td>
                            <td>&nbsp;:&nbsp;</td>
                            <td>{{ auth()->user()->department }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="sidebar-menu d-flex flex-column justify-content-center align-items-center mt-3">
            <div class="menu">
                <a href="
                    {{ route('dashboard') }}
                "
                    class="nav-link d-flex justify-content-center align-items-center">
                    <i class="fas fa-home ml-0"></i>
                    <span style="font-size:1.2em;" class="mr-0">Dashboard</span>
                </a>
            </div>
        </div>
    </aside>
</div>
