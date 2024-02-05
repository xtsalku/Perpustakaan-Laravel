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
        <br>
        <a href="http://localhost:8000/admin/manage-buku/add" class="edit-button">[+] tambah data</a>
        <br><br>
        <form action="http://localhost:8000/admin/manage-buku/" method="GET">
    <label for="cari">Cari Buku : 
        <input type="text" id="cari" name="cari" placeholder="ketik disini" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
    </label>
    <button type="submit">Search</button>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>opsi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($perpus as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{$p->kode_buku}}</td>
                    <td>{{$p->judul_buku}}</td>
                    <td>{{$p->pengarang}}</td>
                    <td>{{$p->penerbit}}</td>
                    <td>{{$p->tahun}}</td>
                    <td>{{$p->kategori}}</td>
                    <td>
                    <a href="http://localhost:8000/admin/manage-buku/edit/{{encrypt($p->id)}}" class="edit-button">Edit</a>
                    <a href="http://localhost:8000/admin/manage-buku/delete/{{encrypt($p->id)}}" class="delete-button">Delete</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
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
