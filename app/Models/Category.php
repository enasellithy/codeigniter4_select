<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'parent_id', 'model_name'
    ];

//    // Validation
    protected $validationRules      = [
        'name' => 'required',
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'Name is required',
        ],
    ];

    public function  saveCategory($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
