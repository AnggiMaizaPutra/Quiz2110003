<?php


namespace App\Models;

use CodeIgniter\Model;

class Modelpelanggan extends Model
{
    public function getpelanggan()
    {
        $builder = $this->db->table('pelanggan2110003');
        return $builder->get();
    }
    public function savepelanggan($data)
    {
            $query= $this->db->table('pelanggan2110003')->insert($data);
            return $query;
    }

    public function deletepelanggan($id)
    {
            $query= $this->db->table('pelanggan2110003')->delete(array('idpel' =>$id));
            return $query;
    }
    public function updatepelanggan($data,$id)
    {
            $query= $this->db->table('pelanggan2110003')->update($data,array('idpel' =>$id));
            return $query;
    }


    
}