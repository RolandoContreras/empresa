<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 
/*****
* Generator Class MC v.1.55
* FRECUENCIA LATINA.
* Proyecto
* V. 1.0
* Iniciado: 29/09/2012
* Descripcion: Este Modelo controla la tabla de la base de datos con su mismo nombre
******/

/***
* @EXTIENDE EL MODELO
* Descripcion: se utilizara para nuevas funciones
* Creador: Marco Cristobal D.
* Fecha: 29/09/2012
****/

class customer_model_atributos{	
    var $customer_id='';
    var $parents_id='';
    var $kit_id='';
    var $email='';
    var $code='';
    var $position='';
    var $position_temporal='';
    var $password='';
    var $razon_social='';
    var $ruc='';
    var $address2='';
    var $first_name='';
    var $last_name='';
    var $dni='';
    var $birth_date='';
    var $address='';
    var $references='';
    var $country='';
    var $department='';
    var $city='';
    var $phone='';
    var $mobile='';
    var $active='';
    var $status_value='';
    var $created_at='';
    var $created_by='';
    var $updated_at='';
    var $updated_by='';
}

class Customer_Model extends CI_Model{ 

    public function __construct() {
        parent::__construct();  
        $this->table = 'customer';
	$this->table_id = 'customer_id';
        $this->customer_id='';
        $this->parents_id='';
        $this->kit_id='';
	$this->email='';
        $this->code='';
        $this->position='';
        $this->position_temporal='';
        $this->password='';
        $this->razon_social='';
        $this->ruc='';
        $this->address2='';
	$this->first_name='';
        $this->last_name='';
        $this->dni='';
        $this->birth_date='';
        $this->address='';
        $this->references='';
	$this->country='';
	$this->department='';
        $this->city='';
	$this->phone='';
	$this->mobile='';
        $this->active='';
	$this->status_value='';
	$this->created_at='';
	$this->created_by='';
	$this->updated_at='';
	$this->updated_by='';
	$this->fields = new customer_model_atributos();
    }   
    
    public function fields(){
    }
    
    public function insert($data){
      $this->db->insert($this->table, $data);
      return $this->db->insert_id();
    }
  
    public function insert_lote($data){
      $this->db->insert_batch($this->table, $data);
    }
  
    public function update($pk, $data){
        $this->db->where($this->table_id, $pk);
        $this->db->update($this->table, $data);
    }

    public function delete($pk){
        $this->db->where($this->table_id, $pk);
        $this->db->delete($this->table);
    }
  
    public function get_search_row($data){
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"]);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
       $this->db->from($this->table);       
       $query=  $this->db->get();
       return $query->row();
    }

    public function search($data){ 
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"]);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
        if (isset($data["limit"]) && $data["limit"]!=""){$this->db->limit($data["limit"]);}
        $this->db->from($this->table);
        $query = $this->db->get();
        $dato = $query->result();
        return $dato;
    }

    public function total_records($data){        
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"]);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}      
        $this->db->from($this->table);
        $query = $this->db->get();
        $dato = $query->num_rows();
        return $dato;      
  }

  public function search_data($data,$inicio,$num_reg){       
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"]);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
        //if (isset($data["limit"]) && $data["limit"]!=""){$this->db->limit($data["limit"]);}        
        $this->db->from($this->table);       
        $query = $this->db->get("",$inicio,$num_reg);        
        $dato = $query->result();
        return $dato;       
  }
  
  public function search_data_rows($data,$inicio,$num_reg){       
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"]);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
        //if (isset($data["limit"]) && $data["limit"]!=""){$this->db->limit($data["limit"]);}        
        $this->db->from($this->table);       
        $query = $this->db->get("",$inicio,$num_reg);        
        $dato = $query->row();
        return $dato;       
  }
} //FIN DEL MODELO EXTENDIDO
?>