<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit petugas</title>
    <style>
/* Background untuk keseluruhan halaman */
body {
    background: linear-gradient(135deg, #6a5acd, #00bfff); /* Gradient dari ungu ke biru */
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

/* Form Edit Styling */
.form-edit-container {
    width: 400px;
    margin: 80px auto; /* Jarak dari atas dan center secara horizontal */
    background: #ffffff; /* Putih untuk form */
    padding: 25px;
    border-radius: 12px; /* Sudut form lebih membulat */
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); /* Shadow lebih dramatis */
    font-family: Arial, sans-serif;
}

.form-edit-title {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 25px;
    text-align: center;
    color: #333; /* Warna teks judul gelap */
}

.form-edit-group {
    margin-bottom: 18px;
}

.form-edit-group label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #555;
    margin-bottom: 6px;
}

.form-edit-group input,
.form-edit-group textarea,
.form-edit-group select {
    width: 100%;
    padding: 12px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 6px; /* Sudut input membulat */
    outline: none;
    box-sizing: border-box;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.form-edit-group input:focus,
.form-edit-group textarea:focus,
.form-edit-group select:focus {
    border-color: #6a5acd; /* Warna fokus ungu sesuai background */
    box-shadow: 0 0 8px rgba(106, 92, 205, 0.5); /* Glow efek ungu */
}

.form-edit-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: #6a5acd; /* Warna tombol ungu */
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    text-align: center;
    transition: background 0.3s;
}

.form-edit-btn:hover {
    background: #4e3b92; /* Warna tombol ungu lebih gelap saat hover */
}

.form-edit-footer {
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
}

.form-edit-footer a {
    color: #6a5acd;
    text-decoration: none;
    font-weight: bold;
}

.form-edit-footer a:hover {
    text-decoration: underline;
}


    </style>
</head>
<body>

<div class="form-edit-container">
    <h2 class="form-edit-title">Edit Data</h2>
    <form action="<?=base_url('user/update')?>" method="POST">
    <input type="hidden" name="id_user" value="<?= $user->id_user?>">
        <div class="form-edit-group">
            <label for="name">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan nama" value="<?= $user->username?>" required>
        </div>
        <div class="form-edit-group">
            <label for="email">Nama</label>
            <input type="nama" id="nama" name="nama" placeholder="Masukkan email"  value="<?= $user->nama?>" required>
        </div>
        <div class="form-edit-group">
            <label for="email">Password</label>
            <input type="password" id="password" name="password" value="<?= $user->password?>" required>
        </div>
        <div class="form-edit-group">
            <label for="role">Pilih Peran</label>
            <select id="role" name="role" required>
                <option value="" disabled selected>Pilih peran</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
                <option value="editor">Editor</option>
            </select>
        </div>
        
        <button type="submit" class="form-edit-btn">Simpan Perubahan</button>
    </form>
    <div class="form-edit-footer">
        <a href="#">Kembali ke Dashboard</a>
    </div>
</div>

    <?= form_open('user/update')?>
    <?= validation_errors(); ?>
    <input type="hidden" name="id_user" value="<?= $user->id_user?>">
        <label for="">Username</label>
        <br>
        <input type="text" name="username" placeholder="masukkan username" value="<?= $user->username?>">
        <br>
        <label for="">Nama</label>
        <br>
        <input type="text" name="nama" placeholder="masukkan nama " value="<?= $user->nama?>">
        <br>
        <p></p>
        <label for="">password</label>
        <br>
        <input type="password" name="password" placeholder="masukkan password" value="<?= $user->password?>">
        <br>
        <label for="">Level</label>
        <br>
        <input type="text" name="level" placeholder="masukkan level" value="<?= $user->level?>">
        
        <br>
        <p></p>
        <input type="submit" value="edit">
    </form>
</body>
</html>