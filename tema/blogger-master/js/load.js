
let offset = 6; // Jumlah data awal yang sudah ditampilkan
const limit = 6; // Jumlah data per permintaan

document.getElementById('load-more').addEventListener('click', function () {
    const button = this; // Simpan referensi tombol "Load More"
    button.innerText = 'Loading...'; // Ubah teks tombol saat proses loading

    // Fetch data dari backend
    fetch(`<?= base_url('beranda/load_more') ?>?offset=${offset}&limit=${limit}`)
        .then(response => response.json()) // Konversi respons ke JSON
        .then(data => {
            if (data.html.trim() !== '') {
                // Tambahkan data baru ke dalam container
                document.getElementById('content-container').insertAdjacentHTML('beforeend', data.html);

                // Perbarui offset jika data berhasil dimuat
                offset += limit;
            } 

            // Sembunyikan tombol jika tidak ada data lagi
            if (data.html.trim() === '' || data.status === 'no_more') {
                button.style.display = 'none'; // Sembunyikan tombol
            }

            button.innerText = 'Load More'; // Kembalikan teks tombol
        })
        .catch(error => {
            console.error('Error:', error); // Log error jika fetch gagal
            button.innerText = 'Load More'; // Kembalikan teks tombol
        });
});

