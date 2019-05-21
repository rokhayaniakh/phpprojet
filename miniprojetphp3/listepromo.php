<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>listepromo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
    <?php
 $listepromo=fopen('listepromo.txt','r');
echo '<table class="table">
 <tr>
 <th>Code</th>
 <th>Nom</th>
 <th>Mois</th>
 <th>Année</th>
 <th>Nombre apprenants</th>
<tr>';
while (!feof($listepromo)){
    $ligne=fgets($listepromo);
    $col=explode(";",$ligne);
    echo"<tr>";
    for($i=0;$i<count($col);$i++){
echo"<td>".$col[$i]."</td>";
    }
    echo"</tr>";
}
echo "</table>";
fclose($listepromo);
    ?>
</body>
</html>