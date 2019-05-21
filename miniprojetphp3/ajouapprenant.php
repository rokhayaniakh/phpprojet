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
<div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <h4>Inscription</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Code</label>
                        <input type="text" class="form-control" required name="code" placeholder="Code apprenant">
                        <label for="">Nom</label>
                        <input type="text" class="form-control" required name="nom" placeholder="Nom">
                        <label for="">Prénom</label>
                        <input type="text" class="form-control" required name="prenom" placeholder="Prénom">
                        <label for="">Date de naissance</label>
                        <input type="date" class="form-control" required name="date" placeholder="Date de naissance">
                        <label for="">Téléphone</label>
                        <input type="number" class="form-control" required name="tel" placeholder="Téléphone"/>
                        <label for="">Email</label>
                        <input type="text" class="form-control" required name="mail" placeholder="nom@gmail.com"/>
                        <label for="">statut</label>
                        <input type="text" class="form-control" required name="statut" placeholder="Statut"/>
                        <label for="">Promo</label>
                        <select name="promo" id="">
<?php
$listepromo=fopen('listepromo.txt','r');
while(!feof($listepromo)){
$ligne=fgets($listepromo);
$col=explode(';',$ligne);
$code=$col[0];
echo'<option value="'.$code.'">'.$code.'</option>';
}
fclose($listepromo);
?>
</select>
                        <br>
                        <button type="submit" name="ok" class="btn btn-secondary">inscrire </button>
                    </div>
                </form>
            </div>
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