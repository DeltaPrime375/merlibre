<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

use App\Models\VentasModel;
use App\Models\VentasDetalleModel;
use App\Models\CarritoModel;
use App\Models\CarritoDetalleModel;
use App\Models\DireccionClientesModel;
use App\Models\DiasSurtidoModel;
use App\Models\ProductModel;

class VentasController extends ResourceController
{
    protected $Modelocarrito;
    protected $Modelocarritodetalle;
    protected $Modelodireccionclientes;
    protected $Modelodiassurtido;
    protected $ventasModel;
    protected $ventasdetalleModel;
    protected $productModel;
    

    public function __construct(){
        helper(['form','url','session']);
        $this->session = \Config\Services::session();
        $this->Modelocarrito = model('CarritoModel');        
        $this->Modelocarritodetalle = model('CarritoDetalleModel');        
        $this->Modelodireccioncliente = model('DireccionClientesModel');
        $this->Modelodiassurtido = model('DiasSurtidoModel');
        $this->ventasModel = model('VentasModel');
        $this->ventasdetalleModel = model('VentasDetalleModel');
        $this->productModel = model('ProductModel');
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {   
        $ids = 0;     
        if ($_SESSION['Usuario'] <> 0 ){
            $ids = $_SESSION['Usuario'];
        }
        $db = db_connect();
        $query = $db->query("SELECT * FROM ventas 
        where id_cliente =".$ids."");        
        $ventas= $query->getResult();
        //$ventas = $this->ventasModel->orderBy('id_venta','asc')->find($ids);
        return view('ventas/index',compact('ventas'));
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function domicilio($id = null)
    {
        //
        //$direccionclienteModel = new ModeloDireccionClientes();

        //$data = $direccionclienteModel->getWhere(['id_cliente' =>$id])->getResult();
        $data = $this->Modelodireccioncliente->find($id);
        $carrito = $this->Modelocarrito->find($id);
        
        if($data and $carrito){
            //return $this->respond($data);
            return view('ventas/domicilio',compact('data','carrito'));
        }else{
            return $this->failNotFound("El cliente ".$id." no cuenta con productos en el carrito");
        }
    }
    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function diallega($id = null)
    {
        //
        //$direccionclienteModel = new ModeloDireccionClientes();

        //$data = $direccionclienteModel->getWhere(['id_cliente' =>$id])->getResult();
        //$id = $_GET["id_cliente"];
        //select carrito_detalle.id_carrito, carrito.id_cliente, productos.tiempo_surtido from productos, carrito_detalle, carrito where productos.id_producto = carrito_detalle.ip_producto and carrito_detalle.id_carrito = carrito.id_carrito
        $data = $this->Modelodireccioncliente->find($id);
        $carrito = $this->Modelocarrito->find($id);
        //$diassur = $this->Modelodiassurtido->find($id);
        $db = db_connect();
        $query = $db->query("SELECT carrito.id_cliente, productos.tiempo_surtido FROM carrito, productos, carrito_detalle 
        where carrito.id_cliente = ".$id." and carrito.id_carrito = carrito_detalle.id_carrito and
        carrito_detalle.id_producto = productos.id_producto group by carrito.id_cliente, productos.tiempo_surtido");
        $diassur= $query->getResult();

        if($data and $carrito and $diassur){
            //return $this->respond($data);
            return view('ventas/diallega',compact('data','carrito','diassur'));
        }else{
            return $this->failNotFound("La direccion del cliente con el identificador ".$id." no fue encontrado");
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function contadocredito($id = null)
    {
        $data = $this->Modelodireccioncliente->find($id);
        $carrito = $this->Modelocarrito->find($id);
        
        $db = db_connect();
        $query = $db->query("SELECT carrito.id_cliente, productos.tiempo_surtido FROM carrito, productos, carrito_detalle 
        where carrito.id_cliente = ".$id." and carrito.id_carrito = carrito_detalle.id_carrito and
        carrito_detalle.id_producto = productos.id_producto group by carrito.id_cliente, productos.tiempo_surtido");
        $diassur= $query->getResult();

        if($data and $carrito and $diassur){
            return view('ventas/contadocredito',compact('data','carrito','diassur'));
        }else{
            return $this->failNotFound("La direccion del cliente con el identificador ".$id." no fue encontrado");
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function efectivopuntopago($id = null)
    {        
        $data = $this->Modelodireccioncliente->find($id);
        $carrito = $this->Modelocarrito->find($id);
        $selecpuntopago = $this->request->getVar('MercadoPago');
        $_SESSION['selecpuntopago'] = $selecpuntopago;
        if($data and $carrito and $selecpuntopago == "11"){
            if($selecpuntopago == "11"){
                return view('ventas/efectivopuntopago',compact('data','carrito'));
            }else{
                return view('ventas/puntopago',compact('data','carrito'));
            }
        }else{
            return $this->failNotFound("La direccion del cliente con el identificador ".$selecpuntopago." no fue encontrado");
        }
    }
/**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function revisayconfirma($id = null)
    {        
        
        $data = $this->Modelodireccioncliente->find($id);
        $carrito = $this->Modelocarrito->find($id);
        $Efectivo = $this->request->getVar('Efectivo');
        $_SESSION['Efectivo'] = $Efectivo;

        // Obtener el tiempo de surtido del los productos que el cliente comprara
        $db = db_connect();
        $query = $db->query("SELECT carrito.id_cliente, productos.tiempo_surtido 
                            FROM carrito, productos, carrito_detalle 
                            where carrito.id_cliente = ".$id." 
                            and carrito.id_carrito = carrito_detalle.id_carrito 
                            and carrito_detalle.id_producto = productos.id_producto 
                            group by carrito.id_cliente, productos.tiempo_surtido");
        $diassur= $query->getResult();

        // Obtener los productos del carrito
        $id_carrito= $carrito['id_carrito'];
        $query = $db->query("SELECT * FROM carrito_detalle 
        where id_carrito =".$id_carrito."");        
        $carritodetalle= $query->getResult();

        // Insertar el encabezado de la venta
        $Numero_envio = 0;
        $Efectivo = $_SESSION['Efectivo'];
        $estatus_pedido = "p".$Efectivo;
        $Detalle_compra = "";
        date_default_timezone_set('America/Mexico_City');
        $Hora=date('H:i:s');
        // Realiza el ciclo para insertar una venta por cada tiempo de surtido diferente 
        // todos los productos que estan en el carrito del cliente
        foreach($diassur as $row){ 
                
            $diassur=$row->tiempo_surtido;
            $Numero_envio= $Numero_envio+1;
            $fecha_actual = date("y-m-d");
            $importe = 0;
            $this->ventasModel->insert([
                'id_cliente' => $id,
                'num_envio' => $Numero_envio,
                'fecha_venta' => $fecha_actual,
                'hora' => $Hora,
                'monto_total' => $importe,
                'estatus' => $estatus_pedido
            ]);
           
            //Obtener el folio de la venta insertada
            $id_venta = $this->ventasModel->getInsertID();
            if ($num_envio = 1){
                $_SESSION['id_venta'] = $id_venta;
            }
            // insertar el detalle de la venta
            foreach($carritodetalle as $cardet){               
                $tiem_surt=$cardet->tiempo_surtido;
                $producto=$cardet->id_producto;
                $cantidad=$cardet->cantidad;
                $precio=$cardet->precio;
                $descuento=$cardet->descuento;
                
                // Insertar los productos en la venta
                if ($tiem_surt == $diassur){
                    $this->ventasdetalleModel->insert([
                        'id_venta' => $id_venta,
                        'id_producto' => $producto,
                        'tiempo_surtido' => $diassur,
                        'cantidad' => $cantidad,
                        'precio' => $precio,
                        'descuento' => $descuento
                    ]);

                    // Realizar el acumulado el importe de la venta por envio
                    $Total = $cantidad * $precio;
                    $Total_neto = $Total - (($Total * $descuento)/100);
                    $importe = $importe + $Total_neto;

                    // Obtener el nombre del producto para realizar la descripcion del ticket
                    $query = $db->query("SELECT nombre_producto FROM productos 
                    where id_producto =".$producto."");        
                    $productos= $query->getResult();
                    $Desc = "";
                    foreach($productos as $prod){ 
                        $Desc=$prod->nombre_producto;;
                    };
                    if ($Detalle_compra == ""){
                        $Detalle_compra = $Desc;
                    }else{
                        $Detalle_compra = $Detalle_compra.' + <br> '.$Desc;
                    }
                    

                }
            }

            // se graba un importe por cada envio
            //$query = $db->query("update importe_total = ".$importe." from ventas where id_venta = ".$id_venta."");        
            //$carritoupdate= $query->getResult(); 
            $this->ventasModel->save([
                'id_venta' => $id_venta,
                'id_cliente' => $id,
                'num_envio' => $Numero_envio,
                'fecha_venta' => $fecha_actual,
                'hora' => $Hora,
                'monto_total' => $importe,
                'estatus' => $estatus_pedido
            ]);

        }
        $_SESSION['Detalle_compra'] = $Detalle_compra;

        // eliminar los datos del carrito
        $this->Modelocarrito->delete($id);
        $this->Modelocarritodetalle->delete($id_carrito);
        //session()->setFlashdata('success', 'Se elimino el producto');

        if($data and $carrito){
            //return $this->respond($data);
            return view('ventas/revisayconfirma',compact('data','carrito'));
        }else{
            return $this->failNotFound("La direccion del cliente con el identificador ".$id." no fue encontrado");
        }
    }
    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('ventas/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
        
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
