<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifierpromo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<form action="" method="post">
<table>
<tr>
<td>Code</td>
<td><input type="text" name="code"  placeholder="code"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text"name="nom" placeholder="nom"></td>
</tr>
<tr>
<td>Mois</td>
<td><input type="text"name="mois" placeholder="mois"></td>
</tr>
<tr>
<td>Année</td>
<td><input type="number"name="annee" placeholder="année de la promo"></td>
</tr>
<tr>
<td><button type="submit"name="ok">Modifier</button>
</td>
</tr>
</table>
</form>
<?php
 $listepromo=fopen('listepromo.txt','a+');
echo '<table class="table">
 <tr>
 <th>Code</th>
 <th>Nom</th>
 <th>Mois</th>
 <th>Année</th>
<tr>';
while ($ligne=fgets($listepromo)){
    $col=explode(";",$ligne);
    echo"<tr>";
    for($i=0;$i<count($col);$i++){
echo"<td>".$col[$i]."</td>";
    }
    echo"</tr>";
}
echo "</table>";
fclose($listepromo);
if(isset($_POST['ok'])){
    $newvaleur="";
    $code=$_POST['code'];
    $nom=$_POST['nom'];
    $mois=$_POST['mois'];
    $annee=$_POST['annee'];
    $monfichier=fopen('listepromo.txt','a+');
    while(!feof($monfichier)){
        $ligne=fgets($monfichier);
        $col=explode(";",$ligne);
        if($col[0]=$code){
/* $col[1]=$nom;
$col[2]=$mois;
$col[3]=$annee;
$col[4]=$nombre; */
$modifier=$code.";".$nom.";".$mois.";".$annee.";"."\n";  
        }else{
            $modifier=$ligne;
        }
        $newvaleur.=$modifier;
    }
    fclose($monfichier);
    $update=fopen('listepromo.txt','w+');
    fwrite($update,$newvaleur);
    fclose($update);
}
?>
</body>
</html>