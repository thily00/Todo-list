<?php

class UserManager
{
    //les attributs
    private $nom;
    private $email;
    private $mot_de_passe;
    private $db;


    //le constructeur
    public function __construct($db,$nom,$email,$mot_de_passe)
    {
        $this->setDb($db);
        $this->setNom($nom);
        $this->setEmail($email);
        $this->setMotDePasse($mot_de_passe);
    }

   
    //getteurs
    public function getNom(){ return $this->nom; }
    public function getEmail(){ return $this->email; }
    public function getMotDePasse(){ return $this->mot_de_passe; }
    public function getDb() { return $this->db; }



    //setteurs
    public function setDb(PDO $db) { $this->db = $db; }

    public function setNom ($nom)
    {
        if(is_string($nom))
        {
            $this->nom = $nom ;
        }
   
    }

    public function setEmail ($email)
    {
        if(is_string($email))
        {
            $this->email = $email ;
        }
   
    }

    public function setMotDePasse ($mot_de_passe)
    {
        if(is_string($mot_de_passe))
        {
            $this->mot_de_passe = $mot_de_passe ;
        }
   
    }
   

    // les methodes
    public function Inscrire()
    {   
        $req = $this->getDb()->prepare('INSERT INTO users(nom, email, mot_de_passe) VALUES(:nom, :email, :mot_de_passe)');
        $req->execute(array(
        'nom' => $this->getNom(),
        'email' => $this->getEmail(),
        'mot_de_passe' => $this->getMotDePasse()));
    }


    public function Connexion($email,$mot_de_passe)
    {
        $req = $this->getDb()->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array(
            'email' => $email));
        $resultat = $req->fetch();
        $isPasswordCorrect = password_verify($mot_de_passe, $resultat['mot_de_passe']);
        return $isPasswordCorrect;
    } 
  
}


?>