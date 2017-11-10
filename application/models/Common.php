<?php

	class Common extends CI_Model {
	
		public function __construct()
		{
			parent::__construct();
		}


		public function save($table, $data)
		{
			$this->db->insert($table, $data);      
			return $this->db->insert_id();  
		}

		public function query($table, $where = array(), $order = "")
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			if(!empty($order)) $this->db->order_by($order);
			$query = $this->db->get();
			return $query->row();
		}

		public function queryAll($table, $where = array(), $order = "", $onset = 0, $limit = 60)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			if(!empty($order)) $this->db->order_by($order);
			if(!empty($limit)) $this->db->limit($limit, $onset);
			$query = $this->db->get();
			return $query->result();
		}	

		public function edit($table, $data, $where)
		{
			$this->db->update($table, $data, $where);
			return 'success';        
		}

		public function delete($table, $where)
		{
			$this->db->delete($table, $where); 
			return 'success';     
		}





	}