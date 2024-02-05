<!DOCTYPE html>
<html>
<head>
    <title>Register Form</title>
    <style>
        /* Style the container */
        .container {
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
            border-radius: 4px;
        }

        /* Style the input fields and the submit button */
        input[type=text], input[type=password] {
            width: 90%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
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

        .container button:hover {
            opacity:1;
        }
        
.alert-danger {
    background-color: #f44336; /* Warna latar belakang merah */
    color: white; /* Warna teks putih */
    padding: 15px; /* Ruang dalam di sekitar teks */
    margin-bottom: 15px; /* Jarak bawah dari elemen berikutnya */
    border-radius: 4px; /* Sudut bulat pada tepi */
}

.alert-danger ul {
    list-style: none; /* Hapus penomoran daftar (bullet points) */
    padding: 0; /* Hapus padding default daftar */
    margin: 0; /* Hapus margin default daftar */
}

.alert-danger li {
    margin-bottom: 5px; /* Jarak bawah antara item daftar */
}

    </style>
</head>
<body>
    <h2>Register Form</h2>

    <form action="/register" method="post">
    @csrf
        <div class="container">
        @if($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $item)
                <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <label for="nama"><b>Nama</b></label>
            <input type="text" placeholder="Nama Lengkap" name="nama" >
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Username" name="username" >

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Password" name="password" >


            <button type="submit">Register</button>
    </form>
</body>
</html>