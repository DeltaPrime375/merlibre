<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CartModel;

class CartController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $cartModel = new CartModel();
        $datos['carrito'] = $cartModel->findAll();
        return $this->respond($datos);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $cartModel = new CartModel();
        $carrito = $cartModel->getWhere(['id_carrito' => $id])->getResult();
        if ($carrito) {
            return $this->respond($carrito);
        } else {
            return $this->failNotFound('Articulo no encontrado' . $id);
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
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
        $cartModel = new CartModel();

        $datosSolicitud = $this->request->getJSON();

        $datosActualizar = [
            'id_cliente' => $datosSolicitud->id_cliente,
            'cantidad_productos' => $datosSolicitud->cantidad_productos,
            'importe_carrito' => $datosSolicitud->importe_carrito
        ];

        $cartModel->update($id, $datosActualizar);

        return $this->respondUpdated(['message' => 'Registro actualizado con éxito']);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $cartModel = new CartModel();
        $cartModel->delete($id);

        return $this->respondDeleted(['message' => 'Registro eliminado con éxito']);
    }
}
