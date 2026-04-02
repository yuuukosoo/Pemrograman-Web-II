<!DOCTYPE html>
<html>
<head>
  <title>Daftar Smartphone</title>
  <style>
       table {
      border-collapse: separate;
      border-spacing: 3px;
      border: 1px solid black; 
    }
    th, td {
      border: 1px solid black;
      padding: px 10px;
    }
    
  </style>
</head>
<body>

<?php
  $smartphones = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
  ];
?>

  <table>
    <tr>
      <th>Daftar Smartphone Samsung</th>
    </tr>
    <?php foreach ($smartphones as $item) : ?>
    <tr>
      <td><?= $item ?></td>
    </tr>
    <?php endforeach; ?>
  </table>

</body>
</html>