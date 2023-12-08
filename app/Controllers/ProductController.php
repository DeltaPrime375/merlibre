<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    protected $productModel;

    public function __construct(){
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->ProductModel = model('ProductModel'); 
    }

    public function index()
    {
        $productos = $this->ProductModel->orderBy('id_producto','asc')->findall();
        return view('productos/index',compact('productos'));
    }

    public function show($id_producto = null)
    {
        $producto = $this->ProductModel->find($id_producto);

        if($producto){
            return view('productos/show',compact('producto'));
        }else{
            return redirect()->to(site_url('/productos'));
        }
    }

    public function new()
    {
        return view('productos/new');
    }

    public function create()
    {
        $this->ProductModel->save([
            'id_proveedor' => $this->request->getVar('id_proveedor'),
            'nombre_producto' => $this->request->getVar('nombre_producto'),
            'precio_producto' => $this->request->getVar('precio_producto'),
            'descuento' => $this->request->getVar('descuento'),
            'existencia' => $this->request->getVar('existencia'),
            'mercancia_transito' => $this->request->getVar('mercancia_transito'),
            'nuevo_usado' => $this->request->getVar('nuevo_usado'), 
            'descripcion_general' => $this->request->getVar('descripcion_general'),
            'imagen' => $this->request->getVar('imagen')

        ]);

        session()->setFlashdata('success', 'Se agrego un nuevo producto');
        return redirect()->to(site_url('/productos'));
    }
    
    public function edit($id_producto = null)
    {
        $producto = $this->ProductModel->find($id_producto);

        if($producto){
            return view('productos/edit', compact('producto'));
        }else{
            session()->setFlashdata('failed', 'Producto no encontrado');
            return redirect()->to('/productos');
        }
       
    }

    public function update($id_producto = null)
    {
        $this->ProductModel->save([
            'id_producto' => $id_producto,
            'id_proveedor' => $this->request->getVar('id_proveedor'),
            'nombre_producto' => $this->request->getVar('nombre_producto'),
            'precio_producto' => $this->request->getVar('precio_producto'),
            'descuento' => $this->request->getVar('descuento'),
            'existencia' => $this->request->getVar('existencia'),
            'mercancia_transito' => $this->request->getVar('mercancia_transito'),
            'nuevo_usado' => $this->request->getVar('nuevo_usado'), 
            'descripcion_general' => $this->request->getVar('descripcion_general'),
            'imagen' => $this->request->getVar('imagen')
        ]);

        session()->setFlashdata('success', 'Se actualizaron los valores del producto');
        return redirect()->to(site_url('/productos'));
    }
    
    public function delete($id_producto = null)
    {
        $this->ProductModel->delete($id_producto);
        session()->setFlashdata('success', 'Se elimino el producto');
        return redirect()->to(site_url('/productos'));
    }
    

}
