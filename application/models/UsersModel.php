<?php
require_once 'Master.php';
class UsersModel extends Master
{
	public $table = 'Users';
	public $primary_key = 'id';
	
	// private $_table = "products";

    // public $id;
    // public $name;
    // public $price;
    // public $image = "default.jpg";
    // public $description;


	public function __construct()
	{
        parent::__construct();
        $this->load->model('RoleModel', 'role');
    }

	public function get_peserta()
	{
		$this->db->select('u.id, u.nama, u.email, u.role_id, role.role, u.is_active');
		$this->db->join('user_role as role','role.id=u.role_id');		
		$this->db->where('u.role_id', '2');		
		$this->db->order_by('u.nama','asc');		
		return $this->db->get('users as u')->result();
	}
    public function search($search, $role)
	{
        // $this->users->db
        //     ->from('users')
        //     ->group_start()
        //     ->like('nama', $_POST['search'])
        //     ->group_end()
        //     ->get()->result();
		$this->db->select('u.id, u.nama, u.email, u.role_id, role.role, u.is_active');
		$this->db->join('user_role as role','role.id=u.role_id');		
		$this->db->where('u.role_id', $role);	
        $this->db->group_start();	
        $this->db->like('nama', $search);
        $this->db->group_end();
		$this->db->order_by('u.nama','asc');		
		return $this->db->get('users as u')->result();
	}

	public function get_mentor()
	{
		$this->db->select('u.id, u.nama, u.email, u.role_id, role.role, u.is_active');
		$this->db->join('user_role as role','role.id=u.role_id');		
		$this->db->where('u.role_id', '3');		
		$this->db->order_by('u.nama','asc');		
		return $this->db->get('users as u')->result();
	}


    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required']
            
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

    public function getData($rowno,$rowperpage,$search="") {
 
    $this->db->select('*');
    $this->db->from('posts');

    if($search != ''){
      $this->db->like('title', $search);
      $this->db->or_like('content', $search);
    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

  /////
// var $column_order = array(null, 'kelurahan.nama', 'kecamatan.nama', 'kabupaten.nama', 'provinsi.nama');
//     var $column_search = array('kelurahan.nama', 'kecamatan.nama', 'kabupaten.nama',  'provinsi.nama');
//     var $order = array('id_kel' => 'asc');
 
    private function _get_datatables_query()
    {
        // //custom filter
        // if ($this->input->post('provinsi')) {
        //     $this->db->where('provinsi.id_prov', $this->input->post('provinsi'));
        // }
        // if ($this->input->post('kabupaten')) {
        //     $this->db->where('kabupaten.id_kab', $this->input->post('kabupaten'));
        // }
        // if ($this->input->post('kecamatan')) {
        //     $this->db->where('kecamatan.id_kec', $this->input->post('kecamatan'));
        // }
 
        // $this->db->select('kelurahan.nama AS nm_kel, kecamatan.nama AS nm_kec, kabupaten.nama AS nm_kab, provinsi.nama AS nm_prov');
        // $this->db->from('kelurahan');
        // $this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec', 'left');
        // $this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab', 'left');
        // $this->db->join('provinsi', 'kabupaten.id_prov = provinsi.id_prov', 'left');
 
        // $i = ;
 
        // foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
 
                // if ($i === ) {
                    $this->db->group_start();
                    $this->db->like('nama', $_POST['search']['value']);
                // } else {
                //     $this->db->or_like($, $_POST['search']['value']);
                // }
 
                // if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            // }
            // $i++;
        }
 
        // if (isset($_POST['order'])) {
        //     $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        // } else if (isset($this->order)) {
        //     $order = $this->order;
        //     $this->db->order_by(key($order), $order[key($order)]);
        // }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        // if ($_POST["length"] != -1) {
        //     $this->db->limit($_POST['length'], $_POST['start']);
        // }
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from('kelurahan');
        return $this->db->count_all_results();
    }
 
    function getprov($searchTerm = "")
    {
        $this->db->select('id_prov, nama');
        $this->db->where("nama like '%" . $searchTerm . "%' ");
        $this->db->order_by('id_prov', 'asc');
        $fetched_records = $this->db->get('provinsi');
        $dataprov = $fetched_records->result_array();
 
        $data = array();
        foreach ($dataprov as $prov) {
            $data[] = array("id" => $prov['id_prov'], "text" => $prov['nama']);
        }
        return $data;
    }
 
    function getkab($id_prov, $searchTerm = "")
    {
        $this->db->select('id_kab, nama');
        $this->db->where('id_prov', $id_prov);
        $this->db->where("nama like '%" . $searchTerm . "%' ");
        $this->db->order_by('id_kab', 'asc');
        $fetched_records = $this->db->get('kabupaten');
        $datakab = $fetched_records->result_array();
 
        $data = array();
        foreach ($datakab as $kab) {
            $data[] = array("id" => $kab['id_kab'], "text" => $kab['nama']);
        }
        return $data;
    }
 
    function getkec($id_kab, $searchTerm = "")
    {
        $this->db->select('id_kec, nama');
        $this->db->where('id_kab', $id_kab);
        $this->db->where("nama like '%" . $searchTerm . "%' ");
        $this->db->order_by('id_kec', 'asc');
        $fetched_records = $this->db->get('kecamatan');
        $datakec = $fetched_records->result_array();
 
        $data = array();
        foreach ($datakec as $kec) {
            $data[] = array("id" => $kec['id_kec'], "text" => $kec['nama']);
        }
        return $data;
    }



}