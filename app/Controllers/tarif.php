<?php


namespace App\Controllers;
use App\Models\Modeltarif;
use CodeIgniter\Model;

class tarif extends BaseController
{
    public function index()
    {
      $model= new Modeltarif();
      $data['tarif']= $model->gettarif()->getResultArray();
      echo view('tarif/view_tarif', $data);
    }
    public function save()
    {
      $model =new Modeltarif();
      $data =array(
        'idtarif'=> $this->request->getPost('idtarif'),
        'klass'=> $this->request->getPost('klass'),
        'tarif'=> $this->request->getPost('tarif'),
        
        
      );
     
      $model->savetarif($data);
      return redirect()->to('/tarif');
    }
    public function delete()
    {
      $model= new Modeltarif();
      $id = $this->request->getPost('id');
      $model->deletetarif($id);
      return redirect()->to('/tarif/index');
    }
    
    public function update()
    {
      $model= new Modeltarif();
      $id = $this->request->getPost('id');
      $data=array(
      'klass' => $this->request->getPost('klass'),
      'tarif' => $this->request->getPost('tarif'),
      
      
      );
      $model->updatetarif($data,$id);
      return redirect()->to('/tarif/index');
    
    
  }

} 