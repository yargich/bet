<?php 

class Equipo extends CI_Model
{
	
	public $ID_EQUIPO;
	public $NOMBRE;
	public $ID_PAIS;
	public $IMG;


	public function __construct()
	{
		parent::__construct();
		$this->ID_EQUIPO=null;
		$this->NOMBRE=null;
		$this->ID_PAIS=null;
		$this->IMG=null;
	}


	public function getEquipo()
	{
		$query = $this->db->query('SELECT * FROM equipo WHERE ID_EQUIPO='.$this->ID_EQUIPO.' ');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		} 

	}

	public function add()
	{
		$this->db->insert('equipo', $this);
	}

	public function update($pais=null)
	{
		$query = $this->db->query('UPDATE equipo set ID_PAIS='.$this->ID_PAIS.' WHERE ID_EQUIPO='.$this->ID_EQUIPO.' AND ID_PAIS IS NULL ');

	}


}
?>