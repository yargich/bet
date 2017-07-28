<?php 

class Partido extends CI_Model
{
	
	public $ID_PARTIDO;
	public $ID_COMPETENCIA;
	public $FECHA;
	public $HORARIO;
	public $ESTADO;
	public $LOCAL;
	public $VISITANTE;
	public $GOLES_LOCAL;
	public $GOLES_VISITANTE;
	public $EN_VIVO;
	#public $FROM;
	#public $TO;

	public function __construct()
	{
		parent::__construct();
		$this->ID_PARTIDO=null;
		$this->ID_COMPETENCIA=null;
		$this->FECHA=null;
		$this->HORARIO=null;
		$this->ESTADO=null;
		$this->LOCAL=null;
		$this->VISITANTE=null;
		$this->GOLES_LOCAL=null;
		$this->GOLES_VISITANTE=null;
		$this->EN_VIVO=null;
	}



	public function all()
	{
		$query = $this->db->query("SELECT * FROM partido p    ORDER BY p.FECHA DESC, p.HORARIO ASC"); 
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		} 
	}

	public function index()
	{
		$query = $this->db->query("SELECT * FROM partido p   WHERE  p.HORARIO>='".$this->HORARIO."' AND  p.FECHA BETWEEN '".$this->FROM."' AND '".$this->TO."' ORDER BY p.FECHA ASC, p.HORARIO ASC"); 
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		} 
	} 


	public function getPartido()
	{
		$query = $this->db->query('SELECT ID_PARTIDO FROM partido WHERE ID_PARTIDO='.$this->ID_PARTIDO.' '); 
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		} 

	} 

	public function add()
	{

		$this->db->insert('partido', $this);
	}

	public function update()
	{
		$this->db->where('ID_PARTIDO', $this->ID_PARTIDO); 
		$this->db->update('partido', $this);
	}





}
?> 