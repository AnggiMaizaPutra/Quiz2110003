<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkaskeluar extends Model
{
    public function getkaskeluar()
    {
        $builder = $this->db->table('tbl_kas_masjid')->where('status="keluar"');
        return $builder->get();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_kas_masjid')->insert($data);
    }

    public function deletekaskeluar($id)
    {
        $query = $this->db->table('tbl_kas_masjid')->delete(array('tanggal' => $id));
        return $query;
    }

    public function updatekaskeluar($data, $id)
    {
        $query = $this->db->table('tbl_kas_masjid')->update($data, array('tanggal' => $id));
    }
    public function getlaporanUangkeluar()
    {
        $builder = $this->db->table('tbl_kas_masjid');
        return $builder->get();
    }
    public function getlaporanperperiode($tgla,$tglb)
    {
        $b= $this->db->query("select * from tbl_kas_masjid where tanggal>='$tgla'and tanggal<='$tglb' and status='keluar'");
        return$b;
    }
    public function getLaporanperperiodeperjenis($tgla, $tglb, $jenis)

    {
        $b = $this->db->query("select * from tbl_kas_masjid where tanggal >= '$tgla' and tanggal <='$tglb' and jenis_kas='$jenis' and status='keluar'");
        return $b;
    }
    

}