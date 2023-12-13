<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'direccion_clientes';
    protected $primaryKey       = 'id_direccioncliente  ';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_direccioncliente  ', 'id_usuario', 'calle', 'numero', 'colonia', 'ciudad', 'estado', 'pais', 'CP', 'telefono', 'detalles_domicilio'];

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