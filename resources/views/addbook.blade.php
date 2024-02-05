<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Buku</title>
    <style>
        .container {
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
        input[type=text], input[type=number] {
            width: 90%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        input[type=submit]:hover {
            opacity: 0.8;
        }
        .container button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <h1>Edit Buku</h1>
    <div class="container">

        <form action="http://localhost:8000/admin/manage-buku/addbook" method="post">
            @csrf
        <input type="hidden" name="id" >
        <br>
        <label for="kode_buku">Kode Buku:
            <input type="text" name="kode_buku" id="kode_buku" >
        </label>
        <br>
        <label for="judul_buku">Judul buku:
            <input type="text" name="judul_buku" id="judul_buku" >
        </label>
        <br>
        <label for="pengarang">Pengarang:
            <input type="text" name="pengarang" id="pengarang" >
        </label>
        <br>
        <label for="penerbit">Penerbit:
            <input type="text" name="penerbit" id="penerbit" >
        </label>
        <br>
        <label for="tahun">Tahun Buku:
            <input type="text" name="tahun" id="tahun" >
        </label>
        <br>
        <label for="kategori">Kategori:
            <input type="text" name="kategori" id="kategori" >
        </label>
        <br>
        <br> <br>
        <button type="submit">Submit</button>
    </form>
    <br><br>
    <a href="http://localhost:8000/admin/manage-buku">Kembali</a>
</div>
</body>
</html>