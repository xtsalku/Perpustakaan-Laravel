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
        @foreach($perpus as $p)
        <form action="http://localhost:8000/dashboard/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$p->id}}">
        <br>
        <label for="nama">Nama:
            <input type="text" name="nama" id="nama" value="{{$p->nama}}">
        </label>
        <br>
        <label for="username">Username:
            <input type="text" name="username" id="username" value="{{$p->username}}">
        </label>
        <br>
        <label for="password">Ganti Password:
            <input type="text" name="password" id="password" placeholder="Masukkan Password Baru">
        </label>
        <br>
        <button type="submit">Submit</button>
        </form>
    </div>
    @endforeach
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
