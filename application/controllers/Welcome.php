<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index() {
		// Set jumlah konten per halaman
		$limit = 5;
		$offset = $this->uri->segment(3, 0);  // Ambil offset dari URL (misal halaman 2: segment ke-3 = 5)
	
		// Ambil data konfigurasi
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();
	
		// Ambil data lainnya
		$this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
	
		// Ambil konten dengan limit dan offset
		$this->db->from('kontenn a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$this->db->join('user c', 'a.username=c.username', 'left');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit($limit, $offset);  // Batasi konten yang ditampilkan
		$kontenn = $this->db->get()->result_array();
	
		// Ambil total jumlah konten untuk pagination
		$this->db->from('kontenn a');
		$total_konten = $this->db->count_all_results();
	
		// Data yang akan dikirim ke view
		$data = array(
			'judul'  => "Beranda",
			'konfig' => $konfig,
			'kategori' => $kategori,
			'caraousel' => $caraousel,
			'kontenn' => $kontenn,
			'total_konten' => $total_konten,
			'limit' => $limit,
			'offset' => $offset
		);
	
		// Muat view
		$this->load->view('beranda', $data);
	}
		

		public function artikel($id){
			$this->db->from('konfigurasi');
			$konfig = $this->db->get()->row();
		
			$this->db->from('kategori');
			$kategori = $this->db->get()->result_array();
		
			$this->db->from('kontenn a');
			$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
			$this->db->join('user c', 'a.username=c.username', 'left');
			$this->db->where('slug', $id);
			$kontenn = $this->db->get()->row();
		
			 // Prev Post
			 $this->db->from('kontenn');
			 $this->db->where('tanggal <', $kontenn->tanggal);
			 $this->db->order_by('tanggal', 'DESC');
			 $this->db->limit(1);
			 $prev_post = $this->db->get()->row();
			// var_dump($prev_post); // Debug Prev Post
		 
			 // Next Post
			 $this->db->from('kontenn');
			 $this->db->where('tanggal >', $kontenn->tanggal);
			 $this->db->order_by('tanggal', 'ASC');
			 $this->db->limit(1);
			 $next_post = $this->db->get()->row();
			// var_dump($next_post); // Debug Next Post

			$this->db->from('komen');
			$this->db->where('id_konten', $kontenn->id_konten);
			$komen = $this->db->get()->result_array();
			// Mengirimkan data ke view
			$data = array(
				'judul'    => $kontenn->judul." Detail",
				'konfig'   => $konfig,
				'kategori' => $kategori,
				'kontenn'  => $kontenn,
				'komen'    => $komen
				//'youtubeId' => $youtubeId,  // Mengirimkan ID YouTube ke view
			);
		
			// Load view dengan data yang dikirimkan
			$this->load->view('detail', $data);
		}
		
		public function kategori($id){
			//echo "Selamat Datang di Toko Buku Dongeng";
		   // $this->load->model('Buku_Model');
			//$data['books'] = $this->Buku_Model->get_all_buku();
			//var_dump($data->judul);
			//$this->load->view('template/header');
			//$this->load->view('template/sidebar');
			$this->db->from('konfigurasi');
			$konfig = $this->db->get()->row();
		
			$this->db->from('kategori');
			$kategori = $this->db->get()->result_array();
		
			$this->db->from('kontenn a');
			$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
			$this->db->join('user c', 'a.username=c.username', 'left');
			$this->db->where('a.id_kategori', $id);
			$kontenn = $this->db->get()->result_array();

			$this->db->from('video');
			$this->db->where('id_kategori', $id); // Filter video berdasarkan id_kategori
			$video = $this->db->get()->result_array();

		
			$this->db->from('kategori');
			$this->db->where('id_kategori', $id);
			$nama_kategori = $this->db->get()->row()->nama_kategori;
	
			$data = array(
				'judul'  => $nama_kategori."Beranda",
				'nama_kategori' => $nama_kategori,
				'konfig' => $konfig,
				'kategori' => $kategori,
				'kontenn' => $kontenn,
				'video' => $video,
			);
			$this->load->view('kategori_index', $data);
			//$this->load->view('template/footer');
			//$this->load->view('template/japa');
		
			}
	
			function cari(){
				// Menentukan jumlah item konten yang akan ditampilkan per halaman
				$limit = 9;
				
				// Mengambil offset dari URL, digunakan untuk pagination (segment ke-3 di URL)
				$offset = $this->uri->segment(3, 0); 
				
				// Ambil keyword pencarian jika ada
				$keyword = $this->input->get('keyword'); // Mengambil parameter 'keyword' dari query string
			
				// Ambil konfigurasi
				$this->db->from('konfigurasi');
				$konfig = $this->db->get()->row();
			
				// Ambil data carousel
				$this->db->from('caraousel');
				$caraousel = $this->db->get()->result_array();
			
				// Ambil kategori
				$this->db->from('kategori');
				$kategori = $this->db->get()->result_array();
			
				// Mengambil data konten dari tabel 'konten' dengan join ke tabel 'kategori' dan 'user'
				$this->db->from('kontenn a'); // Alias 'a' untuk tabel 'konten'
				$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Join dengan tabel 'kategori'
				$this->db->join('user c', 'a.username=c.username', 'left'); // Join dengan tabel 'user'
				
				// Jika ada keyword pencarian, tambahkan kondisi pencarian
				if ($keyword) {
					$this->db->like('a.judul', $keyword); // Pencarian di kolom judul
				}
				
				$this->db->order_by('tanggal', 'DESC'); // Mengurutkan berdasarkan tanggal terbaru
				$this->db->limit($limit, $offset); // Membatasi jumlah konten yang ditampilkan
				$kontenn = $this->db->get()->result_array(); // Mengambil data konten
			
				// Menghitung total jumlah konten untuk keperluan pagination
				$this->db->from('kontenn a'); // Mengambil data dari tabel 'konten' kembali
				$total_konten = $this->db->count_all_results(); // Menghitung total semua konten yang tersedia
			
				// Menyiapkan data untuk view
				$data = array(
					'judul'  => "Beranda - Hasil Pencarian",
					'konfig' => $konfig,
					'kategori' => $kategori,
					'caraousel' => $caraousel,
					'kontenn' => $kontenn,
					'total_konten' => $total_konten,  // Total jumlah konten untuk pagination
					'limit' => $limit,                // Batas jumlah konten per halaman
					'offset' => $offset    
				);
			
				// Load view dengan data yang sudah diproses
				$this->load->view('beranda', $data);
			}
			
		function komen(){
			//$id_konten = $this->input->post('id_konten');
			$id = $this->input->post('id'); // Ambil ID Artikel
	
			$data = array(
				'id_konten' => $this->input->post('id_konten'),
				'isi_komen' => $this->input->post('isi_komen'),
				'username' => $this->input->post('username'),
			);
	
			$this->db->insert('komen', $data);
			redirect('beranda/artikel/' . $id_konten); // Redirect ke artikel yang tepat
			}
	
			public function more() {
				$offset = (int) $this->input->get('offset'); // Pastikan offset adalah integer
				$limit = (int) $this->input->get('limit');   // Pastikan limit adalah integer
			
				// Terapkan limit dan offset di query
				$this->db->limit($limit, $offset);
				$konten = $this->db->get('kontenn')->result_array();
			
				// Jika tidak ada data, kirimkan respons kosong
				if (empty($konten)) {
					echo json_encode(['html' => '', 'status' => 'no_more']);
					return;
				}
			
				// Hasilkan HTML untuk data baru
				$html = '';
				foreach ($konten as $kk) {
					$html .= '<div class="col-lg-6 travel-left content-item">';
					$html .= '<div class="single-travel media pb-70">';
					$html .= '<img src="'.base_url('./tema/assets/images/'.$kk['foto']).'" width="100px" alt="">';
					$html .= '<div class="media-body align-self-center">';
					$html .= '<h4 class="mt-0"><a href="'.base_url('beranda/artikel/'.$kk['slug']).'">'.$kk['judul'].'</a></h4>';
					$html .= '<p>'.substr($kk['isi_konten'], 0, 200).'... <a href="'.base_url('beranda/artikel/'.$kk['slug']).'">Baca Selengkapnya</a></p>';
					$html .= '</div></div></div>';
				}
			
				// Kirimkan HTML sebagai respons
				echo json_encode(['html' => $html, 'status' => 'success']);
			}

			public function tambah_saran()
			{
				$username = $this->input->post('username');
				//$email = $this->input->post('email');
				$isi_saran = $this->input->post('isi_saran');
				$id = $this->input->post('id'); // Ambil slug artikel untuk redirect

				// Validasi input
				if (empty($username) || empty($isi_saran)) {
					$this->session->set_flashdata('error', 'Semua kolom wajib diisi!');
					redirect('welcome/artikel/' . $id); // Kembali ke halaman artikel
				}

				// Data yang akan disimpan
				$data = array(
					'username' => $username,
					//'email' => $email,
					'isi_saran' => $isi_saran,
				);

				// Simpan ke database
				$this->db->insert('saran', $data);

				// Beri pesan sukses
				$this->session->set_flashdata('success', 'Saran Anda berhasil dikirim!');
				redirect('welcome/artikel/' . $id); // Kembali ke halaman artikel
			}

			public function load_more() {
				$offset = $this->input->post('offset', TRUE); // Ambil nilai offset dari request
				
				// Ambil konten berdasarkan offset
				$this->db->from('kontenn a');
				$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
				$this->db->join('user c', 'a.username=c.username', 'left');
				$this->db->order_by('tanggal', 'DESC');
				$this->db->limit(5, $offset);  // Batasi 5 data per kali
				$konten = $this->db->get()->result_array();
				
				echo json_encode($konten); // Kirim data konten dalam format JSON
			}
			
}
