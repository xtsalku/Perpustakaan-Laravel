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
            @if(Auth::user()->role!='user')
            <div id="title">Edit Profile Admin</div>
            @endif
            @if(Auth::user()->role!='admin')
            <div id="title">Menu Pinjam Buku</div>
            @endif
            <div id="user-info">
            <span>{{ Auth::user()->nama }}</span>
                <a id="logout-btn" onclick="logout()" href="/logout">Logout</a>
            </div>
        </div>
        @foreach($perpus as $p)
        <form action="http://localhost:8000/dashboard/pinjam-buku/shw/add" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$p->id}}">
        <input type="hidden" name="kode_buku" value="{{$p->kode_buku}}">
        <input type="hidden" name="penerbit" value="{{$p->penerbit}}">
        <input type="hidden" name="pengarang" value="{{$p->pengarang}}">
        <input type="hidden" name="tahun" value="{{$p->tahun}}">
        <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
        <br>
        <label for="nama">Nama Peminjam:
            <input type="text" name="nama" id="nama" value="{{Auth::user()->nama}}" readonly>
        </label>
        <br>
        <label for="judul_buku">judul_buku:
            <input type="text" name="judul_buku" id="judul_buku" value="{{$p->judul_buku}}" readonly>
        </label>
        <br>
        <label for="kategori">kategori:
            <input type="text" name="kategori" id="kategori" value="{{$p->kategori}}" readonly>
        </label>
        <br>
        <label for="tgl_pinjam">tanggal_pinjam:
            <input type="date" name="tgl_pinjam" id="tanggal_pinjam" >
        </label>
        <br>
        <label for="tgl_kembali">tanggal_kembali:
            <input type="date" name="tgl_kembali" id="tanggal_kembali" >
        </label>
        <br>
        <button type="submit">Submit</button>
        </form>
        @endforeach
        <a href="/dashboard/pinjam-buku">Kembali</a>
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
