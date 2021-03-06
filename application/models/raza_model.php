<?php
	class raza_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		function MostrarRazas(){
			$query = $this->db->get_where('raza', array('raz_estado' => 1));
			return $query->result();
		}

		function Insertar($descripcion,$abreviatura){
			$data = array(
               'raz_descripcion' => $descripcion,
               'raz_abreviatura' => $abreviatura,
               'raz_estado' => 1
            );
			$estado= $this->db->insert('raza', $data);
			if ($estado==1) {
				return 1;
			}else{
				return 0;
			}
		}

		function ListarRaza($raz_id){
			$query = $this->db->get_where('raza', array('raz_id' => $raz_id));
			return $query->result();
		}

		function Modificar($id,$descripcion,$abreviatura){
			$data = array(
               'raz_descripcion' => $descripcion,
               'raz_abreviatura' => $abreviatura
            );
			$this->db->where('raz_id', $id);
			$estado= $this->db->update('raza', $data); 
			if ($estado==1) {
				return 1;
			}else{
				return 0;
			}
		}

		function Eliminar($raz_id){
			$data = array(
               'raz_estado' => 0
            );
			$this->db->where('raz_id', $raz_id);
			$estado= $this->db->update('raza', $data); 
			if ($estado==1) {
				return 1;
			}else{
				return 0;
			}
		}
	}
?>