<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg" id="sidebar"><i class="fas fa-bars"></i></a></li>
            {{-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li> --}}
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown text-white">
            <i class="fas fa-clock"></i>
            <div class="d-sm-none d-lg-inline-block" id="current-date-time"></div>
        </li>
    </ul>
</nav>
<script>
    function updateDateTime() {
        const now = new Date();

        // Format tanggal
        const day = String(now.getDate()).padStart(2, '0');
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
        const month = monthNames[now.getMonth()]; // Mengambil nama bulan
        const year = now.getFullYear();

        // Format waktu
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        // Gabungkan tanggal dan waktu
        const currentDateTime = `${day} ${month} ${year} ${hours}:${minutes}:${seconds}`;
        document.getElementById('current-date-time').innerText = currentDateTime;
    }

    // Update tanggal dan waktu segera dan kemudian setiap detik
    updateDateTime();
    setInterval(updateDateTime, 1000);
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
