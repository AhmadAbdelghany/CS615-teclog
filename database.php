<?php

class Db {
    
    protected $con;
    private $host = "eu-cdbr-azure-north-d.cloudapp.net";
    private $user = "bcfa588a057935";
    private $pwd = "891fb21a";
    private $db = "acsm_041b7098d974235";
	
// 	private $host = "localhost";
//     private $user = "root";
//     private $pwd = "admin";
//     private $db = "techblog";
    
    //Creates a PDO conection & sets error mode to exceptions
    public function __construct(){
    
        try { 
            $this->con = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pwd); 
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $this->con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } 
        catch(PDOException $e) { 
            echo $e->getMessage();
        }
        
    }
    
    //sets the datab to null
    public function disconnect() {
        
        $this->con = null;
        
    }
	/**
		creates the notes table 
		should run only once on installation of the application
	**/
    public function createTable() {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS notes (
                       id INT(11) AUTO_INCREMENT,
                       last_modified TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                       content text,
                       PRIMARY KEY(id)
                    );";
            $this->con->query($sql);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	/**
		creates the notes table 
		should run only once on installation of the application
	**/
    public function dropTable() {
        try {
            $sql = "DROP TABLE notes;";
            $this->con->query($sql);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	/**
		adds a new note to the database
	**/
    public function createNote($content) {
        try {
            $query = $this->con->prepare("INSERT INTO notes (content) VALUES (:content);");
            $query->bindParam(':content', $content);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	/**
		retrieves all notes from the database 
	**/
    public function getNotes() {
        try{
            $query = $this->con->prepare("SELECT * FROM notes ORDER BY last_modified DESC;");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	/**
		get the minimum note id
	**/
    public function getMinId() {
        try{
            $query = $this->con->prepare("SELECT min(id) FROM notes;");
            $query->execute();
            return $query->fetch()[0];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	/**
		get the minimum note id
	**/
    public function getMaxId() {
        try{       
            $query = $this->con->prepare("SELECT max(id) FROM notes;");
            $query->execute();
            return $query->fetch()[0];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	/**
		checks if an id corresponds to an existing note id
	**/
    public function isValid($id) {
        try{
            $query = $this->con->prepare("SELECT * FROM notes WHERE id = :id;");
            $query->bindParam(':id', $id);
            $query->execute();
            return count($query->fetchAll()) > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	/**
		deletes a note from db
	**/
    public function deleteNote($id) {
        try{          
            $query = $this->con->prepare("DELETE FROM notes WHERE id = :id;");
            $query->bindParam(':id', $id);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
	/**
		updates an existing note with the new id
	**/
    public function updateNote($id, $newContent) {
        try{
            $query = $this->con->prepare("UPDATE notes
                                           SET content = :content,
                                               last_modified = CURRENT_TIMESTAMP
                                           WHERE id = :id");
            $query->bindParam(':id', $id);
            $query->bindParam(':content', $newContent);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}
?>