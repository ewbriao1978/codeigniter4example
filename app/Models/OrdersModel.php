<?php

namespace App\Models;
use CodeIgniter\Model;

class OrdersModel extends Model {

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['description', 'amount','customer_id'];

    public function getData($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insert_order($data)
    {            
        return $this->insert($data);
    }

    public function update_order($id,$data)
    {
        return $this->update($id, $data);
    }

    public function getOrdersbyCustomer($customer_id){
        return $this->asArray()->where(['customer_id'=> $customer_id])->findAll();
    }

    public function removeOrder($id = null){
        if ($id != null){
            $this->delete($id);
        }
    }

}

?>