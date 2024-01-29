<?php


namespace App\Models;

use CodeIgniter\Model;

class Modeltarif extends Model
{
    public function gettarif()
    {
        $builder = $this->db->table('tarif2110003');
        return $builder->get();
    }
    public function savetarif($data)
    {
            $query= $this->db->table('tarif2110003')->insert($data);
            return $query;
    }

    public function deletetarif($id)
    {
            $query= $this->db->table('tarif2110003')->delete(array('idtarif' =>$id));
            return $query;
    }
    public function updatetarif($data,$id)
    {
            $query= $this->db->table('tarif2110003')->update($data,array('idtarif' =>$id));
            return $query;
    }


    
}