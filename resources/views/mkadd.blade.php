<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Karywan</title>
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
    <h1>Add Karyawan</h1>
    <div class="container">
        <form action="http://localhost:8000/admin/manage-karyawan/add/added" method="post">
            @csrf
        <label for="nama">Nama:
            <input type="text" name="nama" id="nama" required>
        </label>
        <br>
        <label for="username">Username:
            <input type="text" name="username" id="username" required>
        </label>
        <br>
        <label for="password">Password:
            <input type="text" name="password" id="password" required>
        </label>
        <input type="hidden" name="role" value="pegawai">
        <br> <br>
        <button type="submit">Submit</button>
    </form>
    <br><br>
    <a href="http://localhost:8000/admin/manage-buku">Kembali</a>
</div>
</body>
</html>