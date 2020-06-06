<?php 
    $names = array("Alfreds Futterkiste", "Berglunds snabbkop", "Island Trading", "Koniglich Essen");
    $countries = array("Germany", "Sweden", "UK", "Germany");
    if (!isset($_SESSION['logged_user'])) { ?>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Name</th>
    <th style="width:40%;">Country</th>
  </tr>
  <?php for ($i=0; $i < count($names); $i++) { ?>
    <tr>
      <td><?php echo $names[$i]; ?></td>
      <td><?php echo $countries[$i]; ?></td>
    </tr>
 <?php } ?>
</table>
<?php } else { header('Location: /login.php'); } ?>