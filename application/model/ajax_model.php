<?php

class Ajax_model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db){
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
	public function select($sql){
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function selectParam($sql,$parameters){
		$query = $this->db->prepare($sql);
		foreach($parameters as $key => $param){
			//print(gettype($param) == "integer");
			if(gettype($param) == "integer"){
				$query->bindValue($key, $param, PDO::PARAM_INT);
			}
			else{
				$query->bindValue($key, $param);
			}
		}
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
		$query->execute();
		return $query->fetchAll();
	}
	
}

?>
		