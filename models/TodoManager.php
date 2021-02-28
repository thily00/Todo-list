<?php 

class TodoManager
{
    //les attributs
    private $user_email;
    private $titre;
    private $contenu;
    private $date;
    private $complete;
    private $db;

    //le constructeur
    function __construct($db,$user_email,$titre,$contenu,$date,$complete)
    {   
        $this->setDb($db);
        $this->setUserEmail($user_email);
        $this->setTitre($titre);
        $this->setContenu($contenu);
        $this->setDate($date);
        $this->setComplete($complete);
        
    }

    //les getteurs
    public function getUserEmail(){return $this->user_email;}
    public function getTitre(){return $this->titre;}
    public function getContenu(){return $this->contenu;}
    public function getDate(){return $this->date;}
    public function getComplete(){return $this->complete;}
    public function getDb(){return $this->db;} 
    
    //les setters
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    public function setTitre($titre)
    {
        if(is_string($titre))
        {
            $this->titre= $titre;
        }
    }

    public function setContenu($contenu)
    {
        $this->contenu= $contenu;
    }

    public function setDate($date)
    {
        $this->date=$date;
    }

    public function setComplete($complete)
    {
        $this->complete = $complete;
    }

    public function setDb(PDO $db) { $this->db = $db; }

    //les attributs
    public function Ajouter()
    {
        $req = $this->getDb()->prepare('INSERT INTO todos(user_email, titre, contenu,dateC,complete) VALUES(:user_email, :titre, :contenu, :dateC, :complete)');
        $req->execute(array(
            'user_email' => $this->getUserEmail(),
            'titre' => $this->getTitre(),
            'contenu' => $this->getContenu(),
            'dateC' => $this->getDate(),
            'complete' => $this->getComplete()
        ));
    }

    

}



?> 