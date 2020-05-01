<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomersModel;
use App\Models\OrdersModel;

class Admin extends BaseController
{
	
 
	public function adminSession(){
        $orders_model = new OrdersModel();
        $customers_model = new CustomersModel();
        $data_customers = $customers_model->getData();
        $data_orders = $orders_model->getData();
       
        $data = $this->session->get();
        $data_all['orders'] = $data_orders;
        $data_all['customers'] = $data_customers;

		echo view ('common/headerUser');
		echo view ('adminView',$data_all);
		echo view ('common/footer');
	}



	//--------------------------------------------------------------------

}
