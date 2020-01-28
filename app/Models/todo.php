<?php 
	class todo extends Model{
		private $data;
     	function __get($property)
		{
			return $this->data[$property];
		}
	

		function __set($property,$value){
			$this->data[$property] = $value; 
		}

		function load()
		{
		    $id = $this->id;  
			$result = array();
			$sql = "SELECT * FROM todo";
			if (!empty($id)){
				$sql .= " WHERE  id = {$id}";
			}
			$sql = $this->db->query($sql);
			if ($sql->rowCount() > 0){
				$result = $sql->fetchall(); 
			}
			return $result; 
		}

		public function store()
		{
			//Insert
			$id = $this->id; 
			if (empty($id) || $id == null){
				$sql = "INSERT INTO todo (titulo,descricao,status)
				        VALUES ('{$this->titulo}','{$this->descricao}',
				            '{$this->status}')";
			//update 
			}else{
				$sql = " UPDATE todo SET        titulo  = '{$this->titulo}',
				    descricao = '{$this->descricao}',
				    status = '{$this->status}'
				    WHERE id = '$id'"; 
			}
			$this->db->query($sql); 
		}

		public function delete()
		{
			$id = $this->id; 
			if (!empty($id) && $id > 0){
				$sql = "DELETE FROM todo 
				        WHERE id = '$id'"; 
				$this->db->query($sql); 
			}
		}

	}
	?>