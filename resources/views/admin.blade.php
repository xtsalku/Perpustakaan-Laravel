<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(Auth::user()->role=='user')
    <title>Dashboard user</title>
    @endif
    @if(Auth::user()->role=='admin')
    <title>Dashboard Admin</title>
    @endif
    @if(Auth::user()->role=='pegawai')
    <title>Dashboard Pegawai</title>
    @endif
    <link rel="stylesheet" href="{{ asset('css/adm.css') }}">
</head>
<body>

    <div id="sidebar">
        <div class="toggle-btn" onclick="toggleSidebar()">☰
        @if(Auth::user()->role=='admin')
        <nav>
            <a href="/admin">Home</a>
            <a href="http://localhost:8000/admin/edit-profile/{{encrypt(Auth::user()->id)}}">Edit Profile</a>
            <a href="http://localhost:8000/admin/manage-buku">Manage Buku</a>
            <a href="http://localhost:8000/admin/manage-karyawan">manage Karyawan</a>
            <a href="http://localhost:8000/admin/list-peminjam">List Peminjam Buku</a>
        </nav>
        @endif
        @if(Auth::user()->role=='user')
        <nav>
            <a href="http://localhost:8000/dashboard">Home</a>
            <a href="http://localhost:8000/dashboard/edit-profile/{{encrypt(Auth::user()->id)}}">Edit Profile</a>
            <a href="http://localhost:8000/dashboard/pinjam-buku">pinjam Buku</a>
            <a href="http://localhost:8000/dashboard/jadwal-pinjam/{{encrypt(Auth::user()->id)}}">Jadwal Pinjam Buku</a>
        </nav>
        @endif
        @if(Auth::user()->role=='pegawai')
        <nav>
            <a href="/admin">Home</a>
            <a href="http://localhost:8000/admin/edit-profile/{{encrypt(Auth::user()->id)}}">Edit Profile</a>
            <a href="http://localhost:8000/admin/manage-buku">Manage Buku</a>
            <a href="http://localhost:8000/admin/list-peminjam">List Peminjam Buku</a>
        </nav>
        @endif
        </div>
    </div>

    <div id="content">
        <div id="header">
            @if(Auth::user()->role=='user')
            <div id="title">Dashboard user</div>
            @endif
            @if(Auth::user()->role=='admin')
            <div id="title">Dashboard Admin</div>
            @endif
            @if(Auth::user()->role=='pegawai')
            <div id="title">Dashboard pegawai</div>
            @endif
            <div id="user-info">
            <span>{{ Auth::user()->nama }}</span>
                <a id="logout-btn" onclick="logout()" href="/logout">Logout</a>
            </div>
        </div>
        <h2>Selamat Datang {{ Auth::user()->nama }} </h2>
        <p>Silakan pilih menu untuk mengelola informasi.</p>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');

            if (sidebar.style.width === '250px') {
                sidebar.style.width = '0';
                content.style.marginLeft = '0';
            } else {
                sidebar.style.width = '250px';
                content.style.marginLeft = '0px';
            }
        }

        function logout() {
            // Your logout logic here
            alert('Anda Telah LogOut');
        }
    </script>

</body>
</html>
