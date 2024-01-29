<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltransaksi extends Model
{
   public function gettransaksi()
   {
      $b = $this->db->query("select idtransaksi,nama,tarif,meterblnini,meterblnlalu,tglbayar FROM transaksi2110003 JOIN pelanggan2110003 ON idpel=idpel JOIN tarif2110003 ON idharga=idtarif");
      return $b;
   }
   public function getLaporanperperiode($tgla, $tglb)
   {
      $b = $this->db->query("SELECT idtransaksi,idpel,nama,tglbayar,meterblnini,meterblnlalu,tarif,(meterblnini-meterblnlalu) AS jumlahpemakaian,
   IF(klass='Ekonomi',0,10000) AS biayasampah,(tarif*(meterblnini-meterblnlalu))+IF(klass='Ekonomi',0,10000) AS totalbiaya FROM transaksi2110003 JOIN pelanggan2110003 
   ON idpel=idpel JOIN tarif2110003 ON idharga=idtarif where tglbayar >='$tgla' and tglbayar<='$tglb'");
      return $b;
   }
   public function gettarif()
   {
      $b = $this->db->query("SELECT *from tarif2110003");
      return $b;
   }
   public function getpelanggan()
   {
      $b = $this->db->query("SELECT * from pelanggan2110003");
      return $b;
   }
   public function insertData($data)
   {
      $this->db->table('transaksi2110003')->insert($data);
   }
   public function deletetransaksi($id)
   {
      $query = $this->db->table('transaksi2110003')->delete(array('idtransaksi' => $id));
      return $query;
   }
   public function updatetransaksi($data, $id)
   {
      $query = $this->db->table('transaksi2110003')->update($data, array('idtransaksi' => $id));
   }
   public function gethitunganakyatimmasuk()
   {
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid =iddonatur WHERE tbl_kas_masjid.jenis_kas = 'Anak Yatim'");
      return $b;
   }
   public function gethitungmasjidmasuk()
   {
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid =iddonatur WHERE tbl_kas_masjid.jenis_kas = 'Masjid'");
      return $b;
   }
   public function gethitungtpqmasuk()
   {
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid =iddonatur WHERE tbl_kas_masjid.jenis_kas = 'TPQ'");
      return $b;
   }
   public function gethitungsosialmasuk()
   {
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid =iddonatur WHERE tbl_kas_masjid.jenis_kas = 'Sosial'");
      return $b;
   }
   public function getLaporanUangMasuk()
   {
      $b = $this->db->query("select id_kas_masjid,nama,tanggal,ket,kas_masuk,jenis_kas from tbl_kas_masjid join donatur on tbl_kas_masjid.iddonaturmasjid=donatur.iddonatur ");
      return $b;
   }
   public function laporanperperiodeperjeniskas()
   {
      echo view('/transaksi/vlaporanperjeniskas');
   }
   public function getLaporanperperiodeperjenis($tgla, $tglb, $jenis)
   {
      $b = $this->db->query("select id_kas_masjid,nama,tanggal,ket,kas_masuk,jenis_kas from tbl_kas_masjid join donatur on tbl_kas_masjid.iddonaturmasjid=donatur.iddonatur where tanggal >='$tgla' and tanggal <='$tglb' and jenis_kas='$jenis'");
      return $b;
   }
   public function getDonatur()
   {
      $builder = $this->db->table('donatur');
      return $builder->get();
   }
}
