<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CarritoModel;
use App\Models\CarritoDetalleModel;

class CartController extends ResourceController
{

    protected $CarritoModel;
    protected $CarritoDetalleModel;

    public function __construct(){
        helper(['form','url','session']);
        $this->session = \Config\Services::session();
        $this->CarritoModel = model('CarritoModel');        
        $this->CarritoDetalleModel = model('CarritoDetalleModel');        
    }

    public function index()
    {
        $usuario=$_SESSION['Usuario'];
        $CarritoModel = new CarritoModel();
        $carrito = $CarritoModel->getWhere(['id_usuario' => $usuario])->getResult();

        $CarritoDetalleModel = new CarritoDetalleModel();
        $carritoDetalle = $CarritoDetalleModel->getWhere(['id_carrito' => $usuario])->getResult();

        return view('carrito/index',compact('carrito')); 
    }


    public function new()
    {
        //
    }

    public function create()
    {
        $this->CarritoDetalleModel->save([
            'id_carrito' => $this->request->getVar('id_carrito'),
            'id_producto' => $this->request->getVar('id_producto'),
            'fecha_agregado' => $this->request->getVar('fecha_agregado'),
            'cantidad' => $this->request->getVar('cantidad'),
            'precio' => $this->request->getVar('precio'),
            'descuento' => $this->request->getVar('descuento'),
            'tiempo_surtido' => $this->request->getVar('tiempo_surtido')
        ]);

        session()->setFlashdata('success', 'Se agrego un nuevo producto');
        return redirect()->to(site_url('/carrito'));
    }

    public function edit($id = null)
    {
        //
    }

    public function update($id = null)
    {

    }

    public function delete($id = null)
    {
        
        $CarritoModel = new CarritoModel();
        $CarritoDetalleModel = new CarritoDetalleModel();


        $CarritoDetalleModel->delete($id);
        $CarritoModel->delete($id);

        session()->setFlashdata('success', 'Se elimino el producto');
        return redirect()->to(site_url('/carrito'));
    }
}
