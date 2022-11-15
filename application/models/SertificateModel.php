<?php
require_once 'Master.php';
class SertificateModel extends Master
{
	// public $table = 'schedule';
    public $table = 'sertificate';
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

    function getEmployees($postData=null){

      $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      ## Search 
      $searchQuery = "";
      if($searchValue != ''){
          $searchQuery = " (nama like '%".$searchValue."%' or 
                email like '%".$searchValue."%' or 
                id_program like'%".$searchValue."%' ) ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('sertificate')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
    $this->db->where('sertificate.id_program', 2);
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('sertificate')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('sertificate.*, sertificate.id as id_sertificate, program.nama as program');
      $this->db->join('program', 'sertificate.id_program=program.id');
          $this->db->where('sertificate.id_program', 2);
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('sertificate')->result();

      $data = array();

      foreach($records as $record ){
         
          $data[] = array(
            "id"=>$record->id_sertificate, 
              "date"=>$record->date,
              "nama"=>$record->nama,
              "email"=>$record->email,
              "value"=>$record->value,
              "program"=>$record->program,
              "descriptions"=>$record->descriptions,
          ); 
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );

      return $response; 
  }

  function getEmployeesTahsin($postData=null){

      $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      ## Search 
      $searchQuery = "";
      if($searchValue != ''){
          $searchQuery = " (nama like '%".$searchValue."%' or 
                email like '%".$searchValue."%' or 
                id_program like'%".$searchValue."%' ) ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('sertificate')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
    $this->db->where('sertificate.id_program', 1);

      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('sertificate')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('sertificate.*, sertificate.id as id_sertificate, program.nama as program');
      $this->db->join('program', 'sertificate.id_program=program.id');
                $this->db->where('sertificate.id_program', 1);

      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('sertificate')->result();

      $data = array();

      foreach($records as $record ){
         
          $data[] = array(
            "id"=>$record->id_sertificate, 
              "date"=>$record->date,
              "nama"=>$record->nama,
              "email"=>$record->email,
              "value"=>round($record->value),
              "program"=>$record->program,
              "descriptions"=>$record->descriptions,
          ); 
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );

      return $response; 
  }

  function getEmployeesTilawah($postData=null){

      $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      ## Search 
      $searchQuery = "";
      if($searchValue != ''){
          $searchQuery = " (nama like '%".$searchValue."%' or 
                email like '%".$searchValue."%' or 
                id_program like'%".$searchValue."%' ) ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('sertificate')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
    $this->db->where('sertificate.id_program', 3);

      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('sertificate')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('sertificate.*, sertificate.id as id_sertificate, program.nama as program');
      $this->db->join('program', 'sertificate.id_program=program.id');
    $this->db->where('sertificate.id_program', 3);

      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('sertificate')->result();

      $data = array();

      foreach($records as $record ){
         
          $data[] = array(
            "id"=>$record->id_sertificate, 
              "date"=>$record->date,
              "nama"=>$record->nama,
              "email"=>$record->email,
              "value"=>$record->value,
              "program"=>$record->program,
              "descriptions"=>$record->descriptions,
          ); 
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );

      return $response; 
  }

  function getByUser($postData=null){

      $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      ## Search 
      $searchQuery = "";
      if($searchValue != ''){
          $searchQuery = " (nama like '%".$searchValue."%' or 
                email like '%".$searchValue."%' or 
                id_program like'%".$searchValue."%' ) ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('sertificate')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
        $this->db->where('sertificate.id_user', $this->session->userdata('id'));

      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('sertificate')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('sertificate.*, sertificate.id as id_sertificate, program.nama as program');
      $this->db->join('program', 'sertificate.id_program=program.id');
    $this->db->where('sertificate.id_user', $this->session->userdata('id'));

      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('sertificate')->result();

      $data = array();

      foreach($records as $record ){
         
          $data[] = array(
            "id"=>$record->id_sertificate, 
              "date"=>$record->date,
              "nama"=>$record->nama,
              "email"=>$record->email,
              "value"=>$record->value,
              "program"=>$record->program,
              "descriptions"=>$record->descriptions,
          ); 
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );

      return $response; 
  }

  function generate(){

      $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      ## Search 
      $searchQuery = "";
      if($searchValue != ''){
          $searchQuery = " (nama like '%".$searchValue."%' or 
                email like '%".$searchValue."%' or 
                id_program like'%".$searchValue."%' ) ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('sertificate')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('sertificate')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('sertificate.*, program.nama as program');
      $this->db->join('program', 'sertificate.id_program=program.id');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('sertificate')->result();

      $data = array();

      foreach($records as $record ){
         
          $data[] = array( 
              "date"=>$record->date,
              "nama"=>$record->nama,
              "email"=>$record->email,
              "value"=>$record->value,
              "program"=>$record->program,
              "descriptions"=>$record->descriptions,
          ); 
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );

      return $response; 
  }

}