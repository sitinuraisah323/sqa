<?php
require_once 'Master.php';
class RoleModel extends Master
{
	public $table = 'user_role';
	public $primary_key = 'id';

	public function get_role()
	{
		$this->db->select('*');
		return $this->db->get('user_role')->result();
	}

}
