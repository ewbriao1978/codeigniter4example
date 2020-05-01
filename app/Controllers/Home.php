<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomersModel;
use App\Models\OrdersModel;

class Home extends BaseController
{
	// I defined session variable in BaseController.php provided by Codeigniter. See code. 
	
	public function index()

	{   
		return view('login');
	}


	public function registration()
	{
		echo view ('common/headerRegister');
		echo view ('formRegister');
		echo view ('common/footer');
	}

	public function customerSession(){
		//$session = \Config\Services::session();
		$orders_model = new OrdersModel();
		$data = $this->session->get();
		$data['orders'] = $orders_model->getOrdersbyCustomer($data['id']);

		echo view ('common/headerUser');
		echo view ('ordersView',$data);
		echo view ('common/footer');
	}


	public function insertOrder($id){
		$data['customer_id'] = $id;
		echo view ('common/headerUser');
		echo view ('insertOrderView',$data);
		echo view ('common/footer');
	}

	public function editOrder($id){
		$orders_model = new OrdersModel();
		$result = $orders_model->getData($id);
		$data = $result;
		
		echo view ('common/headerUser');
		echo view ('editOrderView',$data);
		echo view ('common/footer');
	}


	public function editOrderToDB($id){
		$rules = [
			'description' => 'required|min_length[3]|max_length[255]',
			'amount' => 'required', 
		];// revisar

		$orders_model = new OrdersModel();

		if ($this->validate($rules)){
			$data = array(

				'customer_id' =>  $this->request->getVar('customerIDform'),

				'description' => $this->request->getVar('description'),
				
				'amount' => $this->request->getVar('amount'),


			);
			

			$orders_model->update_order($id, $data);
 			return redirect()->to(base_url('customersession'));
			
		}
		else{
			$this->editOrder($id);	
					
		}

	}

	public function insertOrderToDB($customer_id){


		$rules = [
			'description' => 'required|min_length[3]|max_length[255]',
			'amount' => 'required', 
		];// revisar

		$orders_model = new OrdersModel();

		if ($this->validate($rules)){
			$data = array(

				'customer_id' =>  $customer_id,

				'description' => $this->request->getVar('description'),
				
				'amount' => $this->request->getVar('amount'),


			);
			

			$orders_model->insert_order($data);
 			return redirect()->to(base_url('customersession'));
			
		}
		else{
			$this->insertOrder($customer_id);	
					
		}
	}



	public function removeOrder($id=null){
		
		if ($id==null){
			return redirect()->to('customersession');
		}

		$orders_model = new OrdersModel();

		$result = $orders_model->getData($id);

		if ($result !=NULL){
			$orders_model->removeOrder($result['id']);		
			return redirect()->to(base_url('customersession'));
			
		}else{
			return redirect()->to(base_url('customersession'));
		}


	} 


	public function insertData(){

		$rules = [
			'name' => 'required|min_length[3]|max_length[50]',
			'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[customers.email]',
			'passwd'=> 'required|min_length[6]|max_length[60]', 
		];

		// Codeigniter 3: $this->load->model("CustomersModel");
		$customers_model = new CustomersModel();
		// Codeigniter 3: $this->load->library("session");
//		$session = \Config\Services::session();

		// codeignter 3 : $this->input->post("...");

		if ($this->validate($rules)){
			$data = array(


				'name' => $this->request->getVar('name'),
				
				'email' => $this->request->getVar('email'),

				'passwd' => md5($this->request->getVar('passwd'))

			);

			$customers_model->insert_data_login($data);
			$this->session->setFlashdata('messageRegisterOk',' Registered Successfull. Please, login.' );
			return redirect()->to('/');
			
		}
		else{
			$this->registration();	
					
		}
		
	}


	public function loginUser(){
		
		$rules = [
			'email' => 'required|min_length[6]|max_length[50]|valid_email',
			'password'=> 'required|min_length[5]|max_length[60]', 
		];

		$customers_model = new CustomersModel();
//		$session = \Config\Services::session();
		 
		if ($this->validate($rules)){
			$data = array(
				'id' => '',

				'email' => $this->request->getVar('email'),

				'password' => $this->request->getVar('password'),

				'name' => '',

				'logged_in' => FALSE

			);
			
			if(!($userRow = $customers_model->checkUserPassword($data))){
				$this->session->setFlashdata('loginFail',' Incorrect username (your e-mail) or password.' );
				return redirect()->to('/');
			}else{
				//$orders_model = new OrdersModel();
				$data['logged_in'] = TRUE;
				$data['id'] = $userRow['id'];
				$data['name'] = $userRow['name'];
				//$data['orders'] = $orders_model->getOrdersbyCustomer($data['id']);
				$this->session->set($data);
				if ($data['name'] == 'admin'){
					return redirect()->to(base_url('adminsession'));

				}else{ 
					return redirect()->to(base_url('customersession'));
				}
				
			}
			

		}
		else {
			return view('login');
			
		}

	
	} 




	public function logout(){
//		$session = \Config\Services::session();
		$data['logged_in'] = FALSE;
		$data['name'] = "";
		$data['email']="";
		$data['password']="";
		$this->session->set($data);
		$this->session->destroy();
		return redirect()->to('/'); 

	}

	//--------------------------------------------------------------------

}
