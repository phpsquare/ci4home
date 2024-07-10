<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\URI;
use App\Models\Sample_model;

class Home extends BaseController
{
	public function __construct(){
		$this->sample_model = new Sample_model();
		
	}
    public function index(): string
    {
		$session = \Config\Services::session();
		$request = \Config\Services::request();
		/*if ($session->get('user_id')) {
			return redirect()->to('/'); 
		}*/
		
		if($request->getPost('name')){	

			$insert_data = [
				"name"   => $request->getPost("name"),
				"email"=> $request->getPost("email"),
			];

			  $this->sample_model->update_data('user', $insert_data);
              //$this->session->set_flashdata('toast_message', sprintf('%s', "{$this->toast_msg_title} successfully updated."));
			  $session->set('success_message', "Data successfully Added");
			  //redirect($this->page_url, 'refresh');	
			 return redirect()->to('/');			  
		}
        return view('welcome_message');
    }
	 public function add()
    {
		$session = \Config\Services::session();
		$request = \Config\Services::request();
		helper("form");
		$this->data['action_url'] = base_url()."add";
		$this->data['page_heading'] = "Add User";
		$this->data['message'] = "";
		$this->data['user_details'] = $this->sample_model->get_user_details('user',"");
		$this->data['submit'] = [
			'name'    => 'submit',
			'value'   => 'submit',
			'type'    => 'submit',
			'content' => 'submit',
			'class'   => "",
		];
		/*if ($session->get('user_id')) {
			return redirect()->to('/'); 
		}*/
		
		if($request->getPost('full_name')){	
		//echo "submitted";exit;
			$insert_data = [
				"name"   => $request->getPost("full_name"),
				"email"=> $request->getPost("email"),
			];

			  $this->sample_model->insert_data('user', $insert_data);
              //$this->session->set_flashdata('toast_message', sprintf('%s', "{$this->toast_msg_title} successfully updated."));
			  $session->set('success_message', "Data successfully Added");
			  //redirect($this->page_url, 'refresh');	
			 return redirect()->to('/add');			  
		}
        return view('add-edit', $this->data);
    }
}
