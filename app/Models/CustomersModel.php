<?php

namespace App\Models;
use CodeIgniter\Model;

class CustomersModel extends Model {

    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'passwd'];

    public function getData($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insert_data_login($data)
    {            
        return $this->insert($data);
    }

    public function checkUserPassword($data){
        return $this->where(['email' => $data['email'], 'passwd' => md5($data['password'])])->first();
    }
}

?>