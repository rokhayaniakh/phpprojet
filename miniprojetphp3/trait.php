<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="jumbotron">
   <center> <h1>Liste des Apprenants</h1></center>
</div>
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
         <div class="jumbotron">
    <center><h1>liste des promos</h1></center>
    </div>
<?php
 $listepromo=fopen('listepromo.txt','r');
echo '<table class="table">
 <tr>
 <th>Code</th>
 <th>Nom</th>
 <th>Mois</th>
 <th>Année</th>
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
         <form action="" method="post"> 
    <table class="jumbotron">
    <tr>
          <td><p><center>Formulaire d'inscription</center></p></td>
    </tr>
         <tr> 
            <td><label for="name">Code Apprenant</label></td>
            <td><input type="text" name="codeA" id="name" placeholder="Code apprenant" required/> </td>	
        </tr>
             <tr> 			
                 <td><label for="name">Code Promo </label></td>
                 <td>
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
                 </td>		
             </tr> 
                  <tr> 
                      <td><input type="submit" name="envoyer"/></td>
                  </tr> 
    </table>
		    </form>
        <?php
        $variant="";
        if (isset($_POST['envoyer'])) {
            $codeA=$_POST['codeA'];
            $codeP=$_POST['codeP'];
            $fichierApp=fopen("listeapprenant.txt", "r");
            $verif1=false;
            $verif2=false;
            while (!feof($fichierApp)) {
                $fichierProm=fopen("listepromo.txt", "r");

                while (!feof($fichierProm)) {
                    $col=fgets($fichierApp);
                    $colA=explode(";", $col);
                    if ($codeA==$colA[0]){
                        $verif1=true;
                        $Cod=$colA[0].";".$colA[1].";".$colA[2].";".$colA[3].";".$colA[4].";"
                        .$colA[5].";".$colA[6];
                     }
                    $col=fgets($fichierProm);
                    $colP=explode(";", $col);
                    if ($codeP==$colP[0]) {
                        $verif2=true;
                        $Pad=$colP[0].";".$colP[1].";".$colP[2].";".$colP[3];
                     }
                }
                fclose($fichierProm);
            }
            fclose($fichierApp);
            if ($verif1==false && $verif2==false) {
               echo "les code n'existe pas";
            }else{
            $fichierTrait=fopen("fichier.txt", "a");
            fwrite($fichierTrait, $Cod.";".$Pad.";\n");
            fclose($fichierTrait);
            }
        }
        ?>
     <?php 
          $fichierTrait=fopen("fichier.txt","r+");
          echo "<table class='table'>";
          echo "<tr>
          <th>Code</th>
          <th>NOM</th>
          <th>Prénom</th>
          <th>Date</th>
          <th>Téléphone</th>
          <th>Email</th>
          <th>Statut</th>
          <th>Code Promo</th>
          <th>Nom Promo</th>
          <th>Mois</th>
          <th>Année</th>
          </tr>";
          while (!feof($fichierTrait)) {
             $ligne =fgets($fichierTrait);
             $col=explode(';',$ligne);
             echo"<tr>";
             for($i=0;$i<count($col);$i++){
                echo"<td>".$col[$i]."</td>";
                }
                   echo"</tr>";
         }
            echo "</table>";
  fclose($fichierTrait);
        ?>
</body>
</html>
