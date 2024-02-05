<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Perpus SMAN 1 Glenmore</title>
</head>
<body>
    <header>
        <h1>Website Perpustakaan SMA Negeri 1 Glenmore</h1>
    </header>

    <nav>
        <a href="/">Home</a>
        <a href="/blog">Blog</a>
        <a href="/perpus">perpus</a>
        <a href="/about-us">about-us</a>
        <div class="login-register">
            <a href='/login'>Login</a>
            <a href='/register'>Register</a>
        </div>
    </nav>
<br>
    <!-- <label for="cari">Cari Buku : 
        <input type="text" id="cari" placeholder="cari berdasar kategori">
    </label> -->
    <form action="/perpus" method="GET">
    <label for="cari">Cari Buku : 
        <input type="text" id="cari" name="cari" placeholder="cari berdasar kategori" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
    </label>
    <button type="submit">Search</button>
</form>
    <section>
        <h3>Daftar Buku</h3>
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

    <footer>
        © 2023 Nama Perusahaan. All rights reserved.
    </footer>
</body>
</html>
