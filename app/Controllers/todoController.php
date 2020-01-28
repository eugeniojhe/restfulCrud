<?php 
	class todoController extends controller{
		private $ioTodo; 
		public function __construct()
		{
			parent::__construct();
			$this->ioTodo = new todo;	
		}

		public function index()
		{
			echo ",index"; 
		}

		public function load()
		{
		  $result = array(); 
		  $this->ioTodo->id = (isset($_POST['id'])?$_POST['id']:'');
          $result = $this->ioTodo->load(); 
          header("content-type:aplication/json");
          echo json_encode($result); 
		}

		public function store()
		{
			if (isset($_POST['titulo']) &&empty($POST['titulo'])){
			  $this->ioTodo->id = (isset($_POST['id'])?$_POST['id']:'');
			  echo "This id ".$this->ioTodo->id; 
			  $this->ioTodo->titulo = addslashes($_POST['titulo']);
		      $this->ioTodo->descricao = (isset($_POST['descricao'])?addslashes($_POST['descricao']):'') ; 
		      $this->ioTodo->status =(isset($_POST['status'])?addslashes($_POST['status']):'') ; 
		      $this->ioTodo->store(); 
		     } 
		}

		public function delete()
		{
		   if (isset($_POST['id']) && !empty($_POST['id'])){
		   		$id = $_POST['id'];
		   		$this->ioTodo->id = $_POST['id'];
		   		$this->ioTodo->delete();
		   } 
		}
	}
?>