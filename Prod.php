<?php
session_start();
if(!isset($_SESSION["Produits"])){
  $_SESSION["Produits"] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(isset($_POST["Ajouter"])){
  if (isset($_POST['libelle'], $_POST['prix'], $_POST['code'], $_POST['quantite'])) {
      
      $libelle = $_POST['libelle'];
      $prix = $_POST['prix'];
      $code = $_POST['code'];
      $quantite = $_POST['quantite'];
      
      $Produits = [
          "libelle" => $libelle,
          "prix" => $prix,
          "code" => $code,
          "quantite" => $quantite,
          "montant" => $prix * $quantite,  
          "mttc" => $prix * $quantite * 0.18
      ];
      $_SESSION["Produits"][] = $Produits;
  }
}
  $_SESSION["Produits"][]= $Produits;
  if(isset($_POST["vider"])){
   $_SESSION["Produits"]= [];
   
  }
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
    <form method="post" action="Prod.php">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Libelle</label>
    <input type="text" class="form-control">
    <div id="emailHelp" name= "libelle" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    <input type="text" name="prix" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Quantite</label>
    <input type="text" name="quantite" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Montant</label>
    <input type="text" name="montant" class="form-control" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">MTTC</label>
    <input type="text" name="mttc" class="form-control">
  </div>
  
  <button type="submit" name= "Ajouter" class="btn btn-primary">Ajouter</button>
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
              <td><?= htmlspecialchars($value["libelle"])?></td>
              <td><?= htmlspecialchars($value["prix"])?></td>
              <td><?= htmlspecialchars($value["quantite"])?></td>
              <td><?= htmlspecialchars($value["montant"])?></td>
              <td><?= htmlspecialchars($value["mttc"])?></td>
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