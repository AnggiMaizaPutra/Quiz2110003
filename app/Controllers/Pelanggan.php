<?php


namespace App\Controllers;
use App\Models\Modelpelanggan;
use CodeIgniter\Model;

class pelanggan extends BaseController
{
    public function index()
    {
      $model= new Modelpelanggan();
      $data['pelanggan']= $model->getpelanggan()->getResultArray();
      echo view('pelanggan/view_pelanggan', $data);
    }
    public function save()
    {
      $model =new Modelpelanggan();
      $data =array(
        'idpel'=> $this->request->getPost('idpel'),
        'nama'=> $this->request->getPost('nama'),
        'nohp'=> $this->request->getPost('nohp'),
        'alamat'=> $this->request->getPost('alamat'),
        
      );
     
      $model->savepelanggan($data);
      return redirect()->to('/pelanggan');
    }
    public function delete()
    {
      $model= new Modelpelanggan();
      $id = $this->request->getPost('id');
      $model->deletepelanggan($id);
      return redirect()->to('/pelanggan/index');
    }
    
    public function update()
    {
      $model= new Modelpelanggan();
      $id = $this->request->getPost('id');
      $data=array(
      'nama' => $this->request->getPost('nama'),
      'nohp' => $this->request->getPost('nohp'),
      'alamat' => $this->request->getPost('al'),
      
      );
      $model->updatepelanggan($data,$id);
      return redirect()->to('/pelanggan/index');
    
    
  }

} 