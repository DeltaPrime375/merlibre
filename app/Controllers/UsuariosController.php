<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UsuariosModel;
use App\Models\ProductModel;
use App\Models\DireccionModel;

class UsuariosController extends BaseController
{
    protected $UsuariosModel;
    protected $ProductModel;
    protected $DireccionModel;

    public function __construct(){
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::Session();
        $this->UsuariosModel = model('UsuariosModel'); 
        $this->ProductModel = model('ProductModel'); 
        $this->DireccionModel = model('DireccionModel'); 	
    }

    public function index()
    {
        $usuario=$_SESSION['Usuario'];
        $UsuariosModel = new UsuariosModel();
        //$usuariosModel = new UsuariosModel();
        //$usuarios = $this->UsuariosModel->orderBy('id_usuario','asc')->findAll();
        //$usuarios = $this->UsuariosModel->find($id_usuario);
        $usuarios = $UsuariosModel->getWhere(['id_usuario' => $usuario])->getResult();
        return view('usuarios/index',compact('usuarios'));
    }

    public function show($id_usuario = null)
    {
        $usuarios = $this->UsuariosModel->find($id_usuario);

        if($usuarios){
            return view('usuarios/show',compact('usuarios'));
        }else{
            return redirect()->to(site_url('/usuarios'));
        }
    }

    public function showdir($id_usuario = null)
    {
        $direccion_clientes = $this->DireccionModel->find($id_usuario);

        if($direccion_clientes){
            return view('usuarios/showdir',compact('direccion_clientes'));
        }else{
            return redirect()->to(site_url('/usuarios'));
        }
    }

    public function new()
    {
        return view('usuarios/new');
    }

    public function create()
    {
        $this->UsuariosModel->insert([
            'nombre_usuario' => $this->request->getVar('nombre_usuario'),
            'apellido_paterno' => $this->request->getVar('apellido_paterno'),
            'apellido_materno' => $this->request->getVar('apellido_materno'),
            'apodo_usuario' => $this->request->getVar('apodo_usuario'),
            'correo_electronico' => $this->request->getVar('correo_electronico'),
            'telefono' => $this->request->getVar('telefono'),
            'RFC' => $this->request->getVar('RFC'),
            'contrasena' => $this->request->getVar('contrasena'),
        ]);

        $id_usuario = $this->UsuariosModel->getInsertID();
        $_SESSION['Usuario'] = $id_usuario;
        $_SESSION['Nombre'] = $this->request->getVar('nombre_usuario')." ".$this->request->getVar('apellido_paterno'). " ".$this->request->getVar('apellido_materno');
        session()->setFlashdata('success', 'Se agrego un nuevo cliente');
        return redirect()->to(site_url('/usuarios'));
    }
    
    public function edit($id_usuario = null)
    {
        $usuarios = $this->UsuariosModel->find($id_usuario);

        if($usuarios){
            return view('usuarios/edit', compact('usuarios'));
        }else{
            session()->setFlashdata('failed', 'usuario no encontrado');
            return redirect()->to('/usuarios');
        }
       
    }

    public function editdir($id_usuario = null)
    {
        $direccion_clientes = $this->DireccionModel->find($id_usuario);

        if($direccion_clientes){
            return view('usuarios/editdir', compact('direccion_clientes'));
        }else{
            session()->setFlashdata('failed', 'usuario no encontrado');
            return redirect()->to('/usuarios');
        }
       
    }

    public function update($id_usuario = null)
    {
        $this->UsuariosModel->save([
            'id_usuario' => $id_usuario,
            'nombre_usuario' => $this->request->getVar('nombre_usuario'),
            'apellido_paterno' => $this->request->getVar('apellido_paterno'),
            'apellido_materno' => $this->request->getVar('apellido_materno'),
            'apodo_usuario' => $this->request->getVar('apodo_usuario'),
            'correo_electronico' => $this->request->getVar('correo_electronico'),
            'telefono' => $this->request->getVar('telefono'),
            'RFC' => $this->request->getVar('RFC'),
            'contrasena' => $this->request->getVar('contrasena'),
        ]);

        session()->setFlashdata('success', 'Se actualizaron los valores del usuario');
        return redirect()->to(site_url('/usuarios'));
    }
    
    public function delete($id_usuario = null)
    {
        echo "usuario: ".$id_usuario;
        $this->UsuariosModel->delete($id_usuario);
        $this->DireccionModel->delete($id_usuario);
        session()->setFlashdata('success', 'Se elimino el usuario correctamente');
        return redirect()->to(base_url('/'));
    }

    public function newdir($id_usuario = null)
    {
        $usuarios = $this->UsuariosModel->find($id_usuario);

        if($usuarios){
            return view('usuarios/newdir', compact('usuarios'));
        }else{
            session()->setFlashdata('failed', 'cliente no encontrado');
            return redirect()->to('/usuarios');
        }
       
    }

    public function createdir($id_usuario = null)
    {
        $this->direccionModel->insert([ //crear DireccionModel
            'id_usuario' => $id_usuario,
            'calle' => $this->request->getVar('calle'),
            'numero' => $this->request->getVar('numero'),
            'colonia' => $this->request->getVar('colonia'),
            'ciudad' => $this->request->getVar('ciudad'),
            'estado' => $this->request->getVar('estado'),
            'pais' => $this->request->getVar('pais'),
            'CP' => $this->request->getVar('CP'),
            'telefono' => $this->request->getVar('telefono'),
            'detalles_domicilio' => $this->request->getVar('detalles_domicilio'),
        ]);

        session()->setFlashdata('success', 'Se agrego el domicilio correctamente');
        return redirect()->to(site_url('/usuarios'));
    }

    public function updatedir($id_usuario = null)
    {
        $this->direccionModel->save([
            'id_usuario'  => $this->request->getVar('id_usuario'),
            'calle' => $this->request->getVar('calle'),
            'numero' => $this->request->getVar('numero'),
            'colonia' => $this->request->getVar('colonia'),
            'ciudad' => $this->request->getVar('ciudad'),
            'estado' => $this->request->getVar('estado'),
            'pais' => $this->request->getVar('pais'),
            'CP' => $this->request->getVar('CP'),
            'telefono' => $this->request->getVar('telefono'),
            'detalles_domicilio' => $this->request->getVar('detalles_domicilio'),
        ]);

        session()->setFlashdata('success', 'Se actualizo correctamente');
        return redirect()->to(site_url('/usuarios'));
    }

    public function inicio()
    {
        $Correo = $this->request->getVar('correo_electronico');
        $Contrasena = $this->request->getVar('contrasena');
        $db = db_connect();
        $query = $db->query("SELECT * FROM usuarios");        
        $usuarios= $query->getResult();
        $Existe = 0;
        $Usuario = 0;
        $Nombre =" ";
        foreach($usuarios as $usr){
            if ($usr->correo_electronico == $Correo) {
                if($usr->contrasena == $Contrasena){
                    $Existe = 1;
                    $Nombre=$usr->nombre_usuario." ".$usr->apellido_paterno." ".$usr->apellido_materno;
                    $Usuario = $usr->id_usuario;
                }
                //$Existe = 1;
            }
        }
        $_SESSION['Usuario'] = $Usuario;
        $_SESSION['Nombre'] = $Nombre;
        //echo $Correo;
        $productos = $this->ProductModel->orderBy('id_producto','desc')->findall();
        //return view('merlibre_home',compact('productos'));
        
        if($Correo){
            return view('merlibre_home',compact('productos'));
        }else{
            return redirect()->to(site_url('/usuarios'));
        }
    }
    public function login()
    {
        return view('usuarios/login');
    }
}