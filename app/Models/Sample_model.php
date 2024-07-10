<?php 
namespace App\Models;

use CodeIgniter\Model;
class Sample_model extends Model{
  
	public function insert_data($table_name, $insert_data){
		$db      = \Config\Database::connect();
		$builder = $db->table($table_name);
		$builder->insert($insert_data);
		return $db->insertID();
	}
  
	public function delete_data($table_name, $id){
		$db      = \Config\Database::connect();
		$builder = $db->table($table_name);
		$builder->where('id', $id);
		$builder->delete();
	}
	public function update_data($table_name, $update_data, $id){
		$db      = \Config\Database::connect();
		$builder = $db->table($table_name);
		$builder->set($update_data);
		$builder->where('id', $id);
		$builder->update();
	}
	function get_user_details($table_name,$id)
	{
		$db      = \Config\Database::connect();
		if($id=='')
		{
			$where = "WHERE id='".$id."'";
		}

		$query = $db->query("SELECT * FROM ".$table_name." ".$where);
		return $result = $query->getRowArray();
	}
}