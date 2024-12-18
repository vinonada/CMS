<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah video</title>
    <style>
/* Background Gradient */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, #4b006e, #7a1c92); /* Ungu agak gelap */
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Form Container */
form {
    background: linear-gradient(to bottom, #ffffff, #f8f9fa); /* Gradient putih ke abu-abu terang */
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    padding: 30px 40px;
    width: 100%;
    max-width: 700px; /* Lebar maksimal */
    margin-top: 20px;
}

/* Form Title */
form h6 {
    font-size: 20px;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Form Labels */
form label {
    font-size: 14px;
    font-weight: bold;
    color: #555;
    margin-bottom: 8px;
    display: block;
}

/* Form Inputs */
form input[type="text"],
form input[type="date"],
form input[type="file"],
form select,
form textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0; /* Jarak antar elemen */
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    background-color: #f9f9f9;
    font-family: inherit;
}

/* Textarea */
form textarea {
    resize: vertical; /* Pengguna bisa mengubah tinggi */
    min-height: 120px; /* Tinggi minimal */
}

/* Submit Button */
form input[type="submit"] {
    background: linear-gradient(to right, #42a5f5, #1e88e5); /* Gradient biru terang ke biru gelap */
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
    padding: 12px 15px;
    border-radius: 6px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    margin-top: 20px;
}

form input[type="submit"]:hover {
    background: linear-gradient(to right, #1e88e5, #1565c0); /* Gradient hover */
    transform: scale(1.05); /* Efek zoom saat hover */
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
    <?= form_open_multipart('video/simpan'); ?>
   
<div class="col-sm-12 col-xl-6">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Tambah Konten</h6>
        <input type="hidden" name="id_video" value="<?= $this->uri->segment(3,0)?>">

        <label for="">Judul</label>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" 
                name = "judul" placeholder="judul">
           
        </div>

        <div>
    <label for="">Kategori</label>
    <select name="id_kategori" id="">
        <?php foreach($kategori as $aa) {?>
            <option value="<?= $aa['id_kategori']?>"><?= $aa['nama_kategori']?></option>
            <?php } ?>
    </select>
</div>

        <div class="form-floating mb-3">
            <label for="">Foto</label>
            <input type="file" class="form-control" 
                name = "foto"  accept=".jpg,.jpeg,.png,.gif" required>
            
        </div>
        
        <div class="form-floating mb-3">
        <label for="">Video</label>
        <input type="text" id="url" name="url" placeholder="Masukkan URL video">
       
        </div>

            <p></p>

            <input type="submit" value="tambah">
            <?php echo form_close();?>
        </div>
        
    </div>
</div>
    </form>
</body>
</html>