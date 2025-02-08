<?php
session_start();
if(!isset($_SESSION["Produits"])){
  $_SESSION["Produits"] = [];
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  if(isset($_POST["Ajouter"])){
    $montant = $_POST["prix"] * $_POST["quantite"];
      $Produits = [
          "libelle" => $_POST["libelle"],
          "prix" => $_POST["prix"],
          "quantite" => $_POST["quantite"],
          "montant" => $montant,  
          "mttc" => $montant + $montant * 0.18
      ];
      
      $_SESSION["Produits"][]= $Produits;  
  }
  
  
}

  
  if(isset($_POST["vider"])){
   $_SESSION["Produits"]= [];
   
  }

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<style>
    form{
        width: 400px;
    }
    .container{
        display: flex;
        grid-gap:70px;
    }
    thead{
        background-color:gray;
    }
</style>
<body>
   
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Gestions des produits</a>
    </div>
  </nav>
  <div class="container">
    <form method="POST" action="Prod.php">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Libelle</label>
    <input type="text" name= "libelle" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    <input type="text" name="prix" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Quantite</label>
    <input type="text" name="quantite" class="form-control">
  </div>
  
  
  
  <button type="submit" name="Ajouter" class="btn btn-primary">Ajouter</button>
</form>

      <table class="table table-bordered border-Sombre">
        <thead>
            <tr>
              <th scope="col">Libellé</th>
              <th scope="col">Prix</th>
              <th scope="col">Quantité</th>
              <th scope="col">Montant</th>
              <th scope="col">MTTC</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($_SESSION["Produits"] as $value):?>
            <tr>
              <td><?= $value["libelle"]?></td>
              <td><?= $value["prix"]?></td>
              <td><?= $value["quantite"]?></td>
              <td><?= $value["montant"]?></td>
              <td><?= $value["mttc"]?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
      </table>
   </div>
   <form  action="Prod.php" method="post" style="margin-left:60%">
    <button type="submit" name="vider" class="btn btn-success">Vider</button>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>