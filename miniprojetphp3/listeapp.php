<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>listeapp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<div class="jumbotron">
<center><h1> Liste des apprenants de la 2e promo</h1></center>
</div>
<?php
 $listeapprenant=fopen('fichier.txt','r');
 $newligne="";
 while(!feof($listeapprenant)){
     $ligne=fgets($listeapprenant);
     $col=explode(";",$ligne);
     if($col[8]=="promo1"){
        $l="";
     }else{
         $l=$ligne;
     }
     $newligne.=$l;
  }
 fclose($listeapprenant);
 $liste1=fopen('p2.txt','w+');
 fwrite($liste1,$newligne);
 fclose($liste1);

$promo2=fopen('p2.txt','r');
 echo '<table class="table">
  <tr>
  <th>Code</th>
  <th>Nom</th>
  <th>Prénom</th>
  <th>Date</th>
  <th>Tel</th>
  <th>Email</th>
  <th>Statut</th>
  <th> code promo</th>
  <th> Nom promo</th>
  <th> Mois</th>
  <th> Année</th>
 <tr>';
while($ligne=fgets($promo2)){
    $col=explode(";",$ligne);
    echo"<tr>";
          for($i=0;$i<count($col);$i++){
      echo"<td>".$col[$i]."</td>";
      }
         echo"</tr>";
      }
       echo "</table>";
       fclose($promo2)
?>
<div class="jumbotron">
<center><h1> Liste des apprenants de la 1e promo</h1></center>
</div>
<?php
 $listeapprenant=fopen('fichier.txt','r');
 $newligne="";
 while(!feof($listeapprenant)){
     $ligne=fgets($listeapprenant);
     $col=explode(";",$ligne);
     if($col[8]=="promo2"){
        $l="";
     }else{
         $l=$ligne;
     }
     $newligne.=$l;
  }
 fclose($listeapprenant);
 $liste2=fopen('p1.txt','w+');
 fwrite($liste2,$newligne);
 fclose($liste2);
$promo1=fopen('p1.txt','r');
 echo '<table class="table">
  <tr>
  <th>Code</th>
  <th>Nom</th>
  <th>Prénom</th>
  <th>Date</th>
  <th>Tel</th>
  <th>Email</th>
  <th>Statut</th>
  <th> code promo</th>
  <th> Nom promo</th>
  <th> Mois</th>
  <th> Année</th>
 <tr>';
while($ligne=fgets($promo1)){
    $col=explode(";",$ligne);
    echo"<tr>";
          for($i=0;$i<count($col);$i++){
      echo"<td>".$col[$i]."</td>";
      }
         echo"</tr>";
      }
       echo"</table>";
       fclose($promo1)
       ?>
</body>
</html>