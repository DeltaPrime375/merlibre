<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct(){
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->UserModel = model('UserModel'); 
    }

    public function index()
    {
        $usuarios = $this->UserModel->orderBy('id_usuario','asc')->findall();
        return view('usuarios/index',compact('usuarios'));
    }

    public function show($id_usuario = null)
    {
        $usuario = $this->UserModel->find($id_usuario);

        if($usuario){
            return view('usuarios/show',compact('usuario'));
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
        $this->UserModel->save([
            'nombre_usuario' => $this->request->getVar('nombre_usuario'),
            'apellido_paterno' => $this->request->getVar('apellido_paterno'),
            'apellido_materno' => $this->request->getVar('apellido_materno'),
            'apodo_usuario' => $this->request->getVar('apodo_usuario'),
            'correo_electronico' => $this->request->getVar('correo_electronico'),
            'telefono' => $this->request->getVar('telefono'), 
            'RFC' => $this->request->getVar('RFC'),
            'contraseña' => $this->request->getVar('contraseña')
        ]);

        session()->setFlashdata('success', 'Se agrego un nuevo usuario');
        return redirect()->to(site_url('/usuarios'));
    }
    
    public function edit($id_usuario = null)
    {
        $usuario = $this->UserModel->find($id_usuario);

        if($usuario){
            return view('usuarios/edit', compact('usuario'));
        }else{
            session()->setFlashdata('failed', 'Usuario no encontrado');
            return redirect()->to('/usuarios');
        }
       
    }

    public function update($id_usuario = null)
    {
        $this->UserModel->save([
            'id_usuario' => $id_usuario,
            'nombre_usuario' => $this->request->getVar('nombre_usuario'),
            'apellido_paterno' => $this->request->getVar('apellido_paterno'),
            'apellido_materno' => $this->request->getVar('apellido_materno'),
            'apodo_usuario' => $this->request->getVar('apodo_usuario'),
            'correo_electronico' => $this->request->getVar('correo_electronico'),
            'telefono' => $this->request->getVar('telefono'), 
            'RFC' => $this->request->getVar('RFC'),
            'contraseña' => $this->request->getVar('contraseña')
        ]);

        session()->setFlashdata('success', 'Se actualizaron los valores del usuario');
        return redirect()->to(site_url('/usuarios'));
    }
    
    public function delete($id_usuario = null)
    {
        $this->UserModel->delete($id_usuario);
        session()->setFlashdata('success', 'Se elimino el usuario');
        return redirect()->to(site_url('/usuarios'));
    }

    public function login()
    {
        return view('usuarios/login');
    }
    
}
