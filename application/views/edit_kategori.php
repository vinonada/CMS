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
</head>
<body>
    <?= form_open('kategori/update')?>
    <?= validation_errors(); ?>
    <input type="hidden" name="id_kategori" value="<?= $kategori->id_kategori?>">
       
        <label for="">Nama Kategori</label>
        <br>
        <input type="text" name="nama_kategori" placeholder="masukkan nama kategori " value="<?= $kategori->nama_kategori?>">
        <br>
        
        <br>
        <p></p>
        <input type="submit" value="edit">
    </form>
</body>
</html>