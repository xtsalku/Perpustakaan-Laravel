<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(Auth::user()->role!='user')
         <title>Dashboard Admin</title>
    @endif
    @if(Auth::user()->role!='admin')
         <title>Dashboard user</title>
    @endif
    <link rel="stylesheet" href="{{ asset('css/adm.css') }}">
</head>
<body>

    <div id="sidebar">
        <div class="toggle-btn" onclick="toggleSidebar()">☰
        @if(Auth::user()->role!='user')
        <nav>
            <a href="/admin">Home</a>
            <a href="http://localhost:8000/admin/edit-profile/{{encrypt(Auth::user()->id)}}">Edit Profile</a>
            <a href="http://localhost:8000/admin/manage-buku">Manage Buku</a>
            <a href="http://localhost:8000/admin/manage-karyawan">manage Karyawan</a>
            <a href="http://localhost:8000/admin/list-peminjam">List Peminjam Buku</a>
        </nav>
        @endif
        @if(Auth::user()->role!='admin')
        <nav>
            <a href="http://localhost:8000/dashboard">Home</a>
            <a href="http://localhost:8000/dashboard/edit-profile/{{encrypt(Auth::user()->id)}}">Edit Profile</a>
            <a href="http://localhost:8000/dashboard/pinjam-buku">pinjam Buku</a>
            <a href="http://localhost:8000/dashboard/jadwal-pinjam/{{encrypt(Auth::user()->id)}}">Jadwal Pinjam Buku</a>
        </nav>
        @endif
        </div>
    </div>

    <div id="content">
        <div id="header">
            <div id="title">Dashboard Admin</div>
            <div id="user-info">
            <span>{{ Auth::user()->nama }}</span>
                <a id="logout-btn" onclick="logout()" href="/logout">Logout</a>
            </div>
        </div><br>
        <a href="http://localhost:8000/admin/manage-karyawan/add" class="edit-button">[+] tambah data</a>
        
        @if(count($perpus) > 0)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>role</th>
                    <th>opsi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($perpus as $index => $p)
                @if($p->role=='pegawai')
                <tr>
                    <td>{{ $index-3 }}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->role}}</td>
                    <td><a href="/delete/{{encrypt($p->id)}}" class="edit-button">hapus</a></td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        @else
        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>role</th>
                    <th>opsi</th>
                </tr>
            </thead>
        </table>
            <center>
                <h2>Anda Tidak Punya Karyawan</h2>
            </center>
        @endif
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
