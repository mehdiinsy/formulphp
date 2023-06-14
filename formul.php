<?php
require_once('cnx.php');
$bdd= retourcnx();


$bdd->exec("CREATE TABLE if not exists compte(
    idcompte INT AUTO_INCREMENT,
    pseudo VARCHAR(99),
    pass VARCHAR(99),
    idClient int,
    primary key(idcompte),
    foreign key(idClient) references client(idClient)
    )");

if(isset($_POST['pseudo']) && isset($_POST['pass'])){
    echo $_POST['pseudo']. "<br>";
    echo $_POST['pass']. "<br>";
};

$pseudo = $_POST['pseudo'];
$pass = $_POST['pass'];

$client = $bdd->prepare("select max(idClient) from client");
$client->execute();
$idClient = $client->fetch();


$str = "insert into compte(pseudo, pass, idClient)
values('$pseudo','$pass',$idClient[0])";
$bdd->exec($str);

$req = $bdd->prepare("select idClient,Nom,Prenom from client");
$req->execute();
echo "</br>";

if($req->rowCount()==0){
    echo "Vous n'avez pas de clients";
}
    else{
    echo '<tr class="table-warning"</tr><th></th><th>id</th><th>Nom</th><th>Prenom</th>';
} 

?>