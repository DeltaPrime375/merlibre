<?php


namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductModel;

class Home extends ResourceController
{
    protected $productModel;

    public function __construct(){
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::Session();
        $this->ProductModel = model('ProductModel'); 

    }

    public function index(): string
    {
        $productos = $this->ProductModel->orderBy('id_producto','desc')->findall();
        return view('merlibre_home',compact('productos'));
        //return view('welcome_message');
    }


}
