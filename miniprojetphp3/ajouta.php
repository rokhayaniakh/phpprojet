<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>inscription</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<form action="" method="post">
<table>
<tr>
<td>Code</td>
<td><input type="text" name="code"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="nom"></td>
</tr>
<tr>
<td>Prénom</td>
<td><input type="text" name="prenom"></td>
</tr>
<tr>
<td>Date de naissance</td>
<td><input type="date" name="date"></td>
</tr>
<tr>
<td>Tel</td>
<td><input type="number" name="tel"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" name="mail"></td>
</tr>
<tr>
<td>Statut</td>
<td><input type="text" name="statut"></td>
</tr>
<tr>
<td><button type="submit" name="ok">Inscription</button></td>
</tr>
</table>
</form>
</body>
<?php
if(isset($_POST['ok'])){
  $code=$_POST['code'];  
  $nom=$_POST['nom'];  
  $prenom=$_POST['prenom'];  
  $date=$_POST['date'];  
  $tel=$_POST['tel'];  
  $mail=$_POST['mail'];  
  $statut=$_POST['statut'];  
  $promo=$_POST['promo'];  
$monfichier=fopen('listeapprenant.txt','a+');
while($ligne=fgets($monfichier)){
$col=explode(";",$ligne);
if($col[0]==$code && $col[4]==$tel&& $col[5]==$mail){
    echo("existe déja");
}else{
    fwrite($monfichier,$code.";".$nom.";".$prenom.";".$date.";".$tel.";".$mail.";".$statut.";".$promo."\n");
}
}
fclose($monfichier);
}
?>
<?php
 $listeapprenant=fopen('listeapprenant.txt','r');
 echo '<table class="table">
  <tr>
  <th>Code</th>
  <th>Nom</th>
  <th>Prénom</th>
  <th>Date</th>
  <th>Tel</th>
  <th>Email</th>
  <th>Statut</th>
 <tr>';
while(!feof($listeapprenant)){
    $ligne=fgets($listeapprenant);
    $col=explode(";",$ligne);
    if($col[6]=="exclus"){
echo"";
    }else{
    echo"<tr>";
    for($i=0;$i<count($col);$i++){
        echo"<td>".$col[$i]."</td>";
        }
           echo"</tr>";
        }
    }
         echo "</table>";
         fclose($listeapprenant);
 ?>
</html>