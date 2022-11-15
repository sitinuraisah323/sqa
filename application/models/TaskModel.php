<?php
require_once 'Master.php';
class TaskModel extends Master
{
	// public $table = 'schedule';
    public $table = 'task';
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
          $searchQuery = " (users.nama like '%".$searchValue."%'  ) ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('users')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('users')->result();
      $totalRecordwithFilter = $records[0]->allcount;


       ## Total materi tahfidz
      $this->db->select('count(*) as allcount');
      $this->db->where('materi.id_program', 2);
      $materis = $this->db->get('materi')->result();
    
        ## Total ujian tahfidz
      $this->db->select('count(*) as allcount');
      $this->db->where('examquestion.id_program', 2);
      $exam = $this->db->get('examquestion')->result();

      ## Fetch records
      $this->db->select("users.id,users.nama, users.email, 
      ( select sum(task.taskValue) from task where users.id = task.id_user and id_program=2) as nilai, 
      ( select sum(exam.taskValue) from exam where users.id = exam.id_user and id_program=2) as ujian ");
      if($searchQuery != '')
            

      $this->db->where($searchQuery);
    // $this->db->group_by('task.id_user');
    //   $this->db->group_by('users.nama');
    //   $this->db->group_by('users.email');
    // $this->db->group_by('');

      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('users')->result();
    //   var_dump($records);exit;
      $data = array();
$no=0;
$rata = 0;
      foreach($records as $record ){
         $rata = ($record->nilai/$materis[0]->allcount)*70/100 + ($record->ujian/$exam[0]->allcount)*3/100;
         if($rata>70){
            $ket ="Lulus";
             $lulus[] = array( 
              "id_user"=>$record->id,
              "id_program"=>2,
              "nama"=>$record->nama,
              "email"=>$record->email,
              "nilai"=>$record->nilai/$materis[0]->allcount,
              "ujian"=>$record->ujian/$exam[0]->allcount,
              "rata"=> $rata,
              "keterangan"=>$ket,
              
          ); 
         }else{
            $ket ="Tidak Lulus";
         }
          $data[] = array( 
            //   "no"=>$no++,
              "nama"=>$record->nama,
              "email"=>$record->email,
              "nilai"=>round($record->nilai/$materis[0]->allcount),
              "ujian"=>round($record->ujian/$exam[0]->allcount),
              "rata"=> round($rata),
              "keterangan"=>$ket,
              
          ); 
          
      }

      


      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data,
          "data"=>$lulus
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
          $searchQuery = " (users.nama like '%".$searchValue."%'  ) ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('users')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('users')->result();
      $totalRecordwithFilter = $records[0]->allcount;


       ## Total materi tahfidz
      $this->db->select('count(*) as allcount');
      $this->db->where('materi.id_program', 1);
      $materis = $this->db->get('materi')->result();
    
        ## Total ujian tahfidz
      $this->db->select('count(*) as allcount');
      $this->db->where('examquestion.id_program', 1);
      $exam = $this->db->get('examquestion')->result();

      ## Fetch records
      $this->db->select("users.id,users.nama, users.email, 
      ( select sum(task.taskValue) from task where users.id = task.id_user and id_program=1) as nilai, 
      ( select sum(exam.taskValue) from exam where users.id = exam.id_user and id_program=1) as ujian ");
      if($searchQuery != '')
            

      $this->db->where($searchQuery);
    // $this->db->group_by('task.id_user');
    //   $this->db->group_by('users.nama');
    //   $this->db->group_by('users.email');
    // $this->db->group_by('');

      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('users')->result();
    //   var_dump($records);exit;
      $data = array();
$no=0;
$rata = 0;
      foreach($records as $record ){
         $rata = ($record->nilai/$materis[0]->allcount)*70/100 + ($record->ujian/$exam[0]->allcount)*3/100;
         if($rata>70){
            $ket ="Lulus";
             $lulus[] = array( 
              "id_user"=>$record->id,
              "id_program"=>1,
              "nama"=>$record->nama,
              "email"=>$record->email,
              "nilai"=>$record->nilai/$materis[0]->allcount,
              "ujian"=>$record->ujian/$exam[0]->allcount,
              "rata"=> $rata,
              "keterangan"=>$ket,
              
          ); 
         }else{
            $ket ="Tidak Lulus";
         }
          $data[] = array( 
            //   "no"=>$no++,
              "nama"=>$record->nama,
              "email"=>$record->email,
              "nilai"=>round($record->nilai/$materis[0]->allcount),
              "ujian"=>round($record->ujian/$exam[0]->allcount),
              "rata"=> round($rata),
              "keterangan"=>$ket,
              
          ); 
          
      }

      


      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data,
          "data"=>$lulus
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
          $searchQuery = " (users.nama like '%".$searchValue."%'  ) ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('users')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('users')->result();
      $totalRecordwithFilter = $records[0]->allcount;


       ## Total materi tahfidz
      $this->db->select('count(*) as allcount');
      $this->db->where('materi.id_program', 3);
      $materis = $this->db->get('materi')->result();
    
        ## Total ujian tahfidz
      $this->db->select('count(*) as allcount');
      $this->db->where('examquestion.id_program', 3);
      $exam = $this->db->get('examquestion')->result();

      ## Fetch records
      $this->db->select("users.id,users.nama, users.email, 
      ( select sum(task.taskValue) from task where users.id = task.id_user and id_program=3) as nilai, 
      ( select sum(exam.taskValue) from exam where users.id = exam.id_user and id_program=3) as ujian ");
      if($searchQuery != '')
            

      $this->db->where($searchQuery);
    // $this->db->group_by('task.id_user');
    //   $this->db->group_by('users.nama');
    //   $this->db->group_by('users.email');
    // $this->db->group_by('');

      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('users')->result();
    //   var_dump($records);exit;
      $data = array();
$no=0;
$rata = 0;
      foreach($records as $record ){
         $rata = ($record->nilai/$materis[0]->allcount)*70/100 + ($record->ujian/$exam[0]->allcount)*3/100;
         $lulus = [];
         if($rata>70){
            $ket ="Lulus";
             $lulus[] = array( 
              "id_user"=>$record->id,
              "id_program"=>3,
              "nama"=>$record->nama,
              "email"=>$record->email,
              "nilai"=>$record->nilai/$materis[0]->allcount,
              "ujian"=>$record->ujian/$exam[0]->allcount,
              "rata"=> $rata,
              "keterangan"=>$ket,
              
          ); 
         }else{
            $ket ="Tidak Lulus";
         }
          $data[] = array( 
            //   "no"=>$no++,
              "nama"=>$record->nama,
              "email"=>$record->email,
              "nilai"=>round($record->nilai/$materis[0]->allcount),
              "ujian"=>round($record->ujian/$exam[0]->allcount),
              "rata"=> round($rata),
              "keterangan"=>$ket,
              
          ); 
          
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data,
          "data"=>$lulus ? $lulus : ''
      );

      return $response; 
  }

}