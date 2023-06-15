<?php 
require_once('cnx.php');
$bdd = retourcnx();

var_dump($_FILES['file']);

if(isset ($_POST['Civilite']) && isset($_POST['Nom']) &&
 isset ($_POST['Prenom']) && isset($_POST['ddn']) &&
 isset ($_POST['Commune']) && isset($_POST['Region']) &&
 isset ($_POST['Tel']) && isset($_POST['Email']) &&
 isset ($_POST['web']) && isset($_POST['Niveau']) &&
 isset($_POST['Languages']) && isset($_FILES['file']['tmp_name'])
 ){
    print_r($_FILES);
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    echo $_POST['Civilite']. "<br>";
    echo $_POST['Nom']. "<br>";
    echo $_POST['Prenom']. "<br>";
    echo $_POST['ddn']. "<br>";
    echo $_POST['Commune']. "<br>";
    echo $_POST['Region']. "<br>";
    echo $_POST['Tel']. "<br>";
    echo $_POST['Email']. "<br>";
    echo $_POST['web']. "<br>";
    echo $_POST['Niveau']. "<br>";
    print_r($_POST['Languages']);
}
    
// move_uploaded_file('tmp_name', './img/'.'img');
// $tabExtension = explode('.', 'img');
// $extension = strtolower(end($tabExtension));
// //Tableau des extensions que l'on accepte
// $extensions = ['jpg', 'png', 'jpeg', 'gif'];
// if(in_array($extension, $extensions)){
//     move_uploaded_file($tmpName, './img/'.$name);
// }
// else{
//     echo "Mauvaise extension";
// }

// $maxSize = 400000;
// if(in_array($extension, $extensions) && $size <= $maxSize){
//     move_uploaded_file($tmpName, './img/'.$name);
// }
// else{
//     echo "Mauvaise extension ou taille trop grande";
// }

// if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
//     move_uploaded_file($tmpName, './img/'.$name);
// }
// else{
//     echo "Une erreur est survenue";
// }


$Civilite = $_POST['Civilite'];
$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$ddn = $_POST['ddn'];
$Commune = $_POST['Commune'];
$Region = $_POST['Region'];
$Tel = $_POST['Tel'];
$Email = $_POST['Email'];
$web = $_POST['web'];
$Niveau = $_POST['Niveau'];

$chk = $_POST['Languages'];
$Languages = implode(",",$chk);



$bdd->exec("CREATE TABLE IF NOT EXISTS client(
idClient INT AUTO_INCREMENT,
Civilite VARCHAR(15),
Prenom VARCHAR(99),
Nom VARCHAR(99),
ddn Date,
Commune VARCHAR(99),
Tel INT,
Email VARCHAR(99),
web VARCHAR(99),
Niveau VARCHAR(99),
Languages VARCHAR(99),
img VARCHAR(255),
PRIMARY KEY(idClient)
)");



// $req = $bdd->prepare('INSERT INTO client(img) VALUES (img)');
// $req->execute();
// echo "Image enregistrée";

// $req = $bdd->query('SELECT img FROM client');
//         while($data = $req->fetch()){
//             var_dump($data);
//         }


$tof = 'img/'.basename($_FILES['file']['name']);
move_uploaded_file($tof, 'img/'.basename($_FILES['file']['name']));
$str= "insert into client(Civilite,Nom,Prenom,ddn,Commune,Tel,Email,web,Niveau,Languages,img)
Values('$Civilite','$Nom','$Prenom','$ddn','$Commune','$Tel','$Email','$web','$Niveau','$Languages','$tof')";
$bdd->exec($str);
echo     '<link rel="stylesheet" href="bootstrap.min.css">';


$req = $bdd->prepare('SELECT img FROM client');
$req->execute();
while($data = $req->fetch()){
echo $data[0];
echo "<img src='".$data[0]."' alt='probleme' width='300px' ><br>";
}
$req = $bdd->prepare("select idClient,Civilite,Nom,Prenom,ddn,Commune,Tel,Email,web,Niveau,Languages from client");
$req->execute();
// echo "</br>";
// echo '<table border class="table table-hover">';
// if($req->rowCount()==0){
//     echo "Vous n'avez pas de clients";
// }
//     else{
//     echo '<tr class="table-warning"</tr><th></th><th>id</th><th>Civilite</th><th>Nom</th><th>Prenom</th><th>ddn</th><th>Commune</th><th>Mail</th><th>Tel</th><th>Site</th><th>Niveau</th><th>Languages</th>';
// } 
    
//     while($d = $req->fetch()){
//     echo '<tr><th class="table-success">client</th><th>' . $d['0'] . "</th>";
//     echo "<th>" . $d['1'] . "</th>";
//     echo "<th>" . $d['2'] . "</th>";
//     echo "<th>" . $d['3'] . "</th>";
//     echo "<th>" . $d['4'] . "</th>";
//     echo "<th>" . $d['5'] . "</th>";
//     echo "<th>" . $d['6'] . "</th>";
//     echo "<th>" . $d['7'] . "</th>";
//     echo "<th>" . $d['8'] . "</th>";
//     echo "<th>" . $d['9'] . "</th>";
//     echo "<th>" . $d['10'] . "</th></tr>";
// }
// echo "</table>";


// header('location: ./formul.html');

?>












