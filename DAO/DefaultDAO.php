<?php
require_once(__DIR__.'../../autoloader.php');

class DefaultDAO extends DAO
{
    public string $tableName ='user';

    public function __construct()
    {
        parent::__construct();
    }

    public function testConnexion()
    {
        try{$this->getPDO();
            echo 'good job';
        
        }catch(Exception $e){
            echo 'oups'.$e;
        }
    }
    public function create($array)
    {
        $query = "INSERT INTO " . $this->tableName . "(firstname, lastname,email, password) VALUES (:firstname, :lastname, :email, :password)";
        $add = $this->getPDO()->prepare($query);
        try{
            $add->execute([
                'firstname' => $array['firstname'],
                'lastname' => $array['lastname'],
                'email' =>$array['email'],
                'password'=>$array['password']
            ]);

        }catch(Exception $e){
            throw new Exception("Erreur lors de l'envoie des données : " . $e->getMessage());
        }
    }
    public function retrieve($id)
    {

    }
    public function update($array)
    {
        
    }
    public function delete($id)
    {
        $query="DELETE FROM ".$this->tableName." WHERE id=". $id;
        var_dump($query);
        $del = $this->getPDO()->prepare($query);
        try{
            $del->execute();
            echo 'données supprimé';
        }catch(Exception $e){
            throw new Exception("erreur lors de la suppression des données". $e->getMessage());
        }
    }
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->tableName;
        $stmt = $this->getPDO()->prepare($query);
        try {
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            throw new Exception("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }
    public function getAllby($filter)
    {

    }
}