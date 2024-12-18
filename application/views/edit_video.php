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
    /* Global Styles */
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom right, #e3f2fd, #bbdefb); /* Warna lembut biru */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
}

/* Form Container */
form {
    background: #ffffff; /* Warna putih untuk kontras */
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    padding: 30px 40px; /* Tambahkan padding untuk ruang dalam */
    width: 100%;
    max-width: 700px; /* Lebar lebih besar untuk form */
    margin-top: 20px;
}

/* Form Title */
form h1 {
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Form Labels */
form label {
    font-size: 14px;
    font-weight: bold;
    color: #555;
    margin-bottom: 8px; /* Tambahkan jarak antar label */
    display: block;
}

/* Form Inputs */
form input,
form select,
form textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0; /* Jarak antar elemen */
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    font-family: inherit;
    background-color: #f9f9f9;
}

/* Textarea */
form textarea {
    resize: vertical;
    min-height: 150px; /* Tinggi minimal agar tidak kepotong */
}

/* Submit Button */
form input[type="submit"] {
    background: #5c6bc0;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
    padding: 12px 15px;
    border-radius: 6px;
    font-size: 16px;
    transition: background-color 0.3s ease;
    margin-top: 20px; /* Tambahkan jarak sebelum tombol */
}

form input[type="submit"]:hover {
    background: #3949ab;
}

/* Responsive Design */
@media (max-width: 480px) {
    form {
        padding: 20px;
    }

    form input,
    form select,
    form textarea {
        font-size: 12px;
        padding: 10px;
    }
}

  </style>
</head>
<body>
<?= form_open_multipart('video/update'); ?>
<?php if(validation_errors()): ?>
    <div class="validation-errors"><?= validation_errors(); ?></div>
<?php endif; ?>

    <input type="hidden" name="id_video" value="<?= $this->uri->segment(3,0)?>">
    <input type="hidden" name="nama_foto" value="<?= $video->foto?>">
        <label for="">Judul</label>

        <input type="text" name="judul" placeholder="masukkan username" value="<?= $video->judul?>">

        <label for="">Kategori</label>
 
    <select name="id_kategori" id="">

        <?php foreach($kategori as $uu) {?>
            <option 
           
            value="<?= $uu['id_kategori']?>">
            <?= $uu['nama_kategori']?></option>
            <?php } ?>
    </select>
 
        <label for="">Foto</label>
 
        <input type="file" name="foto" value="<?= $video->foto?>" accept="image/png, image/jpg, image/jpeg">

        <label for="">Video</label>
    
    <input type="text" name="url" id="url" value="<?= $video->url?>">
 
        <input type="submit" value="edit">
        <?php echo form_close();?>
    </form>
</body>
</html>