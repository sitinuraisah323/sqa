<?php
require_once 'Master.php';
class UserProgramModel extends Master
{
	// public $table = 'schedule';
    public $table = 'user_program';
	public $primary_key = 'id';
    // public $time;
    // public $date;
    // public $venue;
    // public $description;

	public function __construct()
	{
        parent::__construct();
        $this->load->model('RoleModel', 'role');
    }
    
    public function rules()
    {
        return [
            // ['field' => 'answer',
            // 'label' => 'Answer',
            // 'rules' => 'required'],

            ['field' => 'date',
            'label' => 'Date',
            'rules' => 'required'],
            
            // ['field' => 'venue',
            // 'label' => 'Venue',
            // 'rules' => 'required'],
            
            // ['field' => 'description',
            // 'label' => 'Description',
            // 'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->product_id = uniqid();
        $this->time = $post["time"];
        $this->date = $post["date"];
        $this->venue = $post["venue"];
        $this->description = $post["description"];
        $this->id_program = $post["id_program"];
        return $this->db->insert($this->_table, $this);
    }

	public function getCategory()
    {
        $builder = $this->db->table('category');
        return $builder->get();
    }
 
    public function getProduct()
    {
        $builder = $this->db->table('product');
        $builder->select('*');
        $builder->join('category', 'category_id = product_category_id','left');
        return $builder->get();
    }
 
    public function saveProduct($data){
        $query = $this->db->table('schedule')->insert($data);
        return $query;
    }
 
    public function updateProduct($data, $id)
    {
        $query = $this->db->table('schedule')->update($data, array('id' => $id));
        return $query;
    }
 
    public function deleteProduct($id)
    {
        $query = $this->db->table('product')->delete(array('product_id' => $id));
        return $query;
    } 

}