<?php
class mTienda extends CI_Model{

  public function getTienda(){
    $this->db->select("*");
    $this->db->from("tienda");
    $this->db->where("estado","1");
    $this->db->where("trash","0");
    $resultado = $this->db->get();
	return $resultado->result();
  }
	
  public function getTienda_forHomePage(){
    $this->db->select("*");
    $this->db->from("tienda");
    $this->db->where("estado","1");
    $this->db->where("trash","0");
    $this->db->order_by('tienda_id', 'RANDOM');
    $this->db->limit(5); 
    $resultado = $this->db->get();
	return $resultado->result();
  }

  public function getTiendaByCategoria($search){
    $this->db->select("*");
    $this->db->from("tienda");
    $this->db->where("estado","1");
    $this->db->where("trash","0");
	$this->db->where("categoria_id",$search);
    $resultado = $this->db->get();
	return $resultado->result();
  }

  public function getTiendaByName($search){
    $this->db->select("*");
    $this->db->from("tienda");
    $this->db->where("estado","1");
    $this->db->where("trash","0");
	$this->db->like("nombre",$search, 'both');
    $resultado = $this->db->get();
	return $resultado->result();
  }

  // public function getTienda(){
    
  // }

	// public function listar_abogados(){
	// 	$this->db->select("abogado.id_abogados, abogado.correo, abogado.cal, abogado.situacion, abogado.id_persona, personas.dni, personas.nom, personas.ape_pa, personas.ape_ma, DATE_FORMAT(personas.fecha_na, '%d/%m/%Y') as fecha_na, personas.telf");
	// 	$this->db->from("abogado");
	// 	$this->db->join("personas","abogado.id_persona = personas.id_persona", "inner");
	// 	$resultado = $this->db->get();
	// 	return $resultado->result();
	// }
	
	// public function listar_Personas(){
	// 	$this->db->select("id_persona , CONCAT(ape_pa,' ',ape_ma,', ',nom) as persona");
	// 	$this->db->from("personas");
	// 	$this->db->where("personas.estado",'1');
	// 	$resultado = $this->db->get();
	// 	return $resultado->result();
	// }

	
	// public function ActualizarAbogado($param){
	// 	$campos = array(
	// 			'id_abogados' =>  $param['id_abogados'],
			
	// 			'correo' =>  $param['correo'],
	// 			'cal' =>  $param['cal'],
	// 			'id_persona' =>  $param['id_persona']
	// 			 );

	// 	$this->db->where('id_abogados', $param['id_abogados']);
	// 	$this->db->update('abogado',$campos);
		
	// 	return 1;
	// }




	// public function EstadoAbogado($id_abogados,$situacion){

	// 	$campos = array(
	// 		'situacion' => $situacion
	// 	);
	// 	$this->db->where('id_abogados', $id_abogados);
	// 	return $this->db->update('abogado',$campos);

	// }




	// public function listar_Personas_diponibles(){
	// 	$this->db->select("personas.id_persona , CONCAT(personas.dni,'  -  ',personas.ape_pa,' ',personas.ape_ma,', ',personas.nom) as persona");
	// 	$this->db->from("personas");
	// 	$this->db->join("abogado","personas.id_persona = abogado.id_persona", "left");
	// 	$this->db->where("abogado.id_abogados",null);
	// 	$this->db->where("personas.estado",'1');
	// 	$resultado = $this->db->get();
	// 	return $resultado->result();
	// }


	// public function datos_persona($id_persona){
	// 	$this->db->select("id_persona, dni, nom, ape_pa, ape_ma, direc, telf , DATE_FORMAT(fecha_na, '%d/%m/%Y') as fecha_na, parametros.estado, id_parametro_T_Genero , nom_parametro as genero,id_parametro_T_Estado_Civil as estado_civil,idDist, idProv, idDepa");
	// 	$this->db->from("personas");
	// 	$this->db->join("parametros","personas.id_parametro_T_Genero = parametros.id_parametro", "left");
	// 	$this->db->where("id_persona",$id_persona);
	// 	$resultado = $this->db->get();
	// 	return $resultado->result();
	// }



	// public function NuevoIdAbogado(){ 
    //     $this->db->select("max(abogado.id_abogados)+1 as nuevoID");
	// 	$this->db->from("abogado");
	// 	$resultado = $this->db->get();
	// 	return $resultado->result();
	// }
      


	// public function Agregar_Abogado($id_abogados,$correo,$cal,$situacion,$id_persona){

	// 	if($id_persona!=""){

	// 		$campos = array(
	// 			'id_abogados' => $id_abogados,
				
	// 			'correo' => $correo,
	// 			'cal' => $cal,
	// 			'situacion' => $situacion,
	// 			'id_persona' => $id_persona
	// 			 );

	// 		$this->db->insert('abogado',$campos);

							
	// 	return 1;
           	
						
	// 	}else{
	// 		return 0;
	// 	}

		
	// }  



	// public function buscar_abogados($dni,$ape_pa,$ape_ma,$nom,$cal,$situacion){
	// 	$this->db->select("abogado.id_abogados, abogado.correo, abogado.cal, abogado.situacion, abogado.id_persona, personas.dni, personas.nom, personas.ape_pa, personas.ape_ma, DATE_FORMAT(personas.fecha_na, '%d/%m/%Y') as fecha_na, personas.telf");
	// 	$this->db->from("abogado");
	// 	$this->db->join("personas","abogado.id_persona = personas.id_persona", "inner");
	// 	$this->db->like("dni",$dni, 'both');
	// 	$this->db->like("ape_pa",$ape_pa, 'both');
	// 	$this->db->like("ape_ma",$ape_ma, 'both');
	// 	$this->db->like("nom",$nom, 'both');
	// 	$this->db->like("cal",$cal, 'both');
	// 	$this->db->like("situacion",$situacion, 'both');
	// 	$resultado = $this->db->get();
	// 	return $resultado->result();
	// }










}
?>