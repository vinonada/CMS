<?php
class Transaksi_model extends CI_model{

    public function pemasukan_hari_ini(){
        $tanggal = date('Y-m-d');
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi', 'pemasukan');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $tanggal);
        return $this->db->get()->row()->total;
    }

    function pemasukan_bulan_ini(){
        $tanggal = date('Y-m');
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi', 'pemasukan');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
        return $this->db->get()->row()->total;
    }

    function pemasukan(){
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi', 'pemasukan');
        return $this->db->get()->row()->total;
    }

     function pengeluaran_hari_ini(){
        $tanggal = date('Y-m-d');
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi', 'pengeluaran');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $tanggal);
        return $this->db->get()->row()->total;
    }

    function pengeluaran_bulan_ini(){
        $tanggal = date('Y-m');
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi', 'pengeluaran');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
        return $this->db->get()->row()->total;
    }

    function pengeluaran(){
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi', 'pengeluaran');
        return $this->db->get()->row()->total;
    }

    function saldo_awal($tanggal){
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi', 'pemasukan');
        $this->db->where("tanggal <", $tanggal);
       $pemasukan = $this->db->get()->row()->total;

       $this->db->select('sum(nominal) as total')->from('transaksi');
       $this->db->where('jenis_transaksi', 'pengeluaran');
       $this->db->where("tanggal <", $tanggal);
      $pengeluaran = $this->db->get()->row()->total;
      $saldo = intval($pemasukan) - intval($pengeluaran);
      return $saldo;
    }
}