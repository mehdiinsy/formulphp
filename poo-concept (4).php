<?php
/*
    POO
    -- Classe: entité qui englobe des objets
    -- Objet : une instance de classe
    Concepts de l'OO: (4 concepts)
        -- Encapsulation
            Camoufler les données sauf pour le développeur.
*/
$x = 5; // Varibles hors class

    class Personne{
        // Attributs
        // Modificateurs : public, private, protected
        protected $_prenom = "Paul";
        protected $_nom = "George";
        protected $_age = 89;
        protected $_fonction = "PDG";
        protected $_salaire = 1800;
        // Le constructeur: permet de créer des objets en assignant des valeurs.
        public function __construct($prenom,$nom,$age,$fonction,$salaire){
            $this->_prenom = $prenom;
            $this->_nom = $nom;
            $this->_age = $age;
            $this->_fonction = $fonction;
            $this->_salaire = $salaire;
        }
        // GETTERS / SETTERS
        public function getPrenom(){
            return $this->_prenom;
        }
        public function getNom(){
            return $this->_nom;
        }
        public function getAge(){return $this->_age;}
        public function getFonction(){return $this->_fonction;}
        public function getSalaire(){return $this->_salaire;}
        // Les setters
        public function setNom($nom){$this->_nom = $nom;}
        public function setPrenom($prenom){$this->_prenom = $prenom;}
        public function setAge($age){$this->_age = $age;}
        public function setFonction($fonction){$this->_fonction = $fonction;}
        public function setSalaire($salaire){$this->_salaire = $salaire;}
        // Méthodes
        public function afficherInfo(){
            echo 'identite : '.$this->getPrenom() .' '. $this->getNom().'<br><br> ';
        }
        public function augmenterSalaire($pourcentage){
            $nvxsalaire = $this->getSalaire() + ($this->getSalaire() * $pourcentage)/100;
            $this->setSalaire($nvxsalaire);
        }
    }
        //classe homme
        class homme extends Personne{
            
            protected $_serviceMilitaire = false;

            public function __construct($prenom,$nom,$age,$fonction,$salaire,$_serviceMilitaire){
                //permet d'invoquer a la classe mere
                // ou parent:: __construct ou Personne::super()
                parent::__construct($prenom,$nom,$age,$fonction,$salaire);
                // $this->_prenom = $prenom;
                // $this->_nom = $nom;
                // $this->_age = $age;
                // $this->_fonction = $fonction;
                // $this->_salaire = $salaire;
                $this->_serviceMilitaire = $_serviceMilitaire;
            }
            public function getserviceMilitaire(){
                return $this->_serviceMilitaire;
            }
            public function setserviceMilitaire($_serviceMilitaire){
                $this->_serviceMilitaire = $_serviceMilitaire;
            }
            //3eme concept de l'O.O : redefinition (surcharge)
            public function afficherInfo(){
                if($this->getserviceMilitaire()){
                    $service = "!VALIDER!";
                
            }else{
                $service = "!NON VALIDER!";
            }
            return parent::afficherInfo() . ".les services militaires de tommy sont " . $service . "<br>";
        
        }
    }
        //classe femme
        class femme extends Personne{
            protected $_congesMaternite = false;

            public function __construct($prenom,$nom,$age,$fonction,$salaire,$_congesMaternite){
                //permet d'invoquer a la classe mere
                // ou parent:: __construct ou Personne::super()
                parent::__construct($prenom,$nom,$age,$fonction,$salaire);
                // $this->_prenom = $prenom;
                // $this->_nom = $nom;
                // $this->_age = $age;
                // $this->_fonction = $fonction;
                // $this->_salaire = $salaire;
                $this->_congesMaternite = $_congesMaternite;
            }
            public function getcongesMaternite(){
                return $this->_congesMaternite;
            }
            public function setcongesMaternite($_congesMaternite){
                $this->_congesMaternite = $_congesMaternite;
            }
            //3eme concept de l'O.O : redefinition (surcharge)
            public function afficherInfo(){
                if($this->getcongesMaternite()){
                    $service = "En conge";
                
            }else{
                $service = "Hors conge";
            }
            return parent::afficherInfo() . ".Lagertha est actuellement " . $service;
        
        }
        }
    
    //echo $_prenom; // FAUX
    // ATTENTION : On ne manipule pas les classes, il faut passer par un objet.
    $p1 = new Personne("Sherlock","Holmes",77,"Détective",5600); // instanciation par défaut de la classe Personne
    $p2 = new Personne("Naruto","Uzumaki",19,"Hokage",500);
    // $p1->f1() = "ABCD";
    echo $p1->getPrenom() . ", ";
    echo $p1->getNom() . ", ";
    echo $p1->getAge() . ", ";
    echo $p1->getFonction() . ", ";
    echo $p1->getSalaire() . "<br>";

    echo $p2->getPrenom() . ", ";
    echo $p2->getNom() . ", ";
    echo $p2->getAge() . ", ";
    echo $p2->getFonction() . ", ";
    echo $p2->getSalaire() . "<br>";
    
    $p2->setPrenom("Doflamingo") . ", ";
    $p2->setNom("Donquichotte") . ", ";
    echo $p2->getPrenom() . ", ";
    echo $p2->getNom() . "<br><br><br>";  

    $p1->afficherInfo();

    $p2->getSalaire(10);
    
    
    echo "Voici votre salaire actuelle : " .$p1->getSalaire()."<br>";
    $p1->augmenterSalaire(10);
    echo "Le nouveau salaire après augmentation : " .$p1->getSalaire()."<br><br><br>";

    //CONCEPT 0.0 n°2 : Heritage : une classe fille (sous-classe)
    //qui hérite(attributs + methodes) d'une classe mere(super-classe)
    // ATTENTION : le constructeur ne fait pas parti de la classe 
echo "<br>";
$h1 = new homme("Thomas","SHELBY",40,"parieur",5600,true);
echo $h1->afficherInfo();
echo "Voici votre salaire actuelle : " .$h1->getSalaire()."<br>";
$h1->augmenterSalaire(30);
echo "les nouveaux gains après les trucages" ." " .$h1->getSalaire()."<br><br><br>";

echo "<br>";
$f1 = new femme("Lagertha","LOTHBROK",40,"viking",5600,true);
echo $f1->afficherInfo() ."<br>";
echo "Voici votre salaire actuelle : " .$f1->getSalaire()."<br>";
$f1->augmenterSalaire(20);
echo "les nouveaux gains après les pillages" ." " .$h1->getSalaire() . "<br><br><br>";


//4eme concept de l'O.O : abstraction : declaration d'une fonction(signature) sans corps
//ATTENTION : des l'ajout d'une fonctiion abstraite dans une classe
//il faut mettre la classe en abstraite
// ATTENTION : les classes filles doivent implementer toutes les fonctions abstraites.
//public abstract function calculer();