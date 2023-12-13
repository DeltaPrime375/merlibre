<?php

namespace App\Models;

use CodeIgniter\Model;

class VentasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ventas';
    protected $primaryKey       = 'id_venta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_venta','id_cliente','num_envio','fecha_venta','hora','monto_total','estatus'];
    //
    /*
    estatus:
    p# = pedido, donde si # = 1 (santander), 2 (HSBC), 3 (7 Eleven), 4 (Soriana), 5(OXXO)
    s = surtiendo
    t = transito
    q = paqueteria
    e = entregado
    */
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
