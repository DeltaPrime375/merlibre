<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ProveedoresModel;
class ProveedoresController extends BaseController
{
    protected $proveedoresModel;

    public function __construct(){
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::Session();
        $this->proveedoresModel = model('ProveedoresModel'); 
    }

    public function index()
    {
        $proveedores = $this->proveedoresModel->orderBy('id_proveedor','asc')->findall();
        return view('proveedores/index',compact('proveedores'));
    }

    public function show($id_proveedor = null)
    {
        $proveedores = $this->proveedoresModel->find($id_proveedor);

        if($proveedores){
            return view('proveedores/show',compact('proveedores'));
        }else{
            return redirect()->to(site_url('/proveedores'));
        }
    }

    public function new()
    {
        return view('proveedores/new');
    }

    public function create()
    {
        $this->proveedoresModel->save([
            'nombre_proveedor' => $this->request->getVar('nombre_proveedor'),
            'direccion_proveedor' => $this->request->getVar('direccion_proveedor'),
            'RFC' => $this->request->getVar('RFC'),
        ]);

        session()->setFlashdata('success', 'Se agrego un nuevo proveedor');
        return redirect()->to(site_url('/proveedores'));
    }
    
    public function edit($id_proveedor = null)
    {
        $proveedores = $this->proveedoresModel->find($id_proveedor);

        if($proveedores){
            return view('proveedores/edit', compact('proveedores'));
        }else{
            session()->setFlashdata('failed', 'proveedor no encontrado');
            return redirect()->to('/proveedores');
        }
       
    }

    public function update($id_proveedor = null)
    {
        $this->proveedoresModel->save([
            'id_proveedor' => $this->request->getVar('id_proveedor'),
            'nombre_proveedor' => $this->request->getVar('nombre_proveedor'),
            'direccion_proveedor' => $this->request->getVar('direccion_proveedor'),
            'RFC' => $this->request->getVar('RFC'),

        ]);

        session()->setFlashdata('success', 'Se actualizaron los valores del proveedor');
        return redirect()->to(site_url('/proveedores'));
    }
    
    public function delete($id_proveedor = null)
    {
        echo "proveedor: ".$id_proveedor;
        $this->proveedoresModel->delete($id_proveedor);
        session()->setFlashdata('success', 'Se elimino el proveedor');
        return redirect()->to(base_url('/proveedores'));
    }
    
}
