<html>
<body>

<?php
   $con = mysqli_connect("","root");
   mysqli_select_db($con, "hardware");

   $sql = "select hersteller, typ, preis from fp where ";
   switch($_POST["pr"])
   {
      case 1:
         $sql .= "preis <= 120";
         break;
      case 2:
         $sql .= "preis > 120 and preis <= 140";
         break;
      case 3:
         $sql .= "preis > 140";
   }

   if (isset($_POST["prsort"]))
      $sql .= " order by preis desc";

   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   if ($num==0) echo "keine passenden Datensätze gefunden";

   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo $dsatz["hersteller"] . ", "
         . $dsatz["typ"] . ", "
         . $dsatz["preis"] . "<br>";
   }

   mysqli_close($con);
?>

</body>
</html>
