<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=arifkarakaya;charset=utf8",  "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}

$query = $db->query("SELECT * FROM referanslar", PDO::FETCH_ASSOC);
/*if ( $query->rowCount() ){
     foreach( $query as $row ){
          print $row['baslik']."<br />";
		  
     }
}*/
if($query->rowCount() ) {

?>
<table border="1">
   <tr COLSPAN=2 BGCOLOR="#6D8FFF">
      <td>ID</td>
      <td>Name</td>
      <td>Açıklama</td>
   </tr>
 <?php     
 while($row=$query->fetch()) 
 {
      echo "<tr>".
           "<td>".$row["id"]."</td>".
           "<td>".$row["baslik"]."</td>".
           "<td>".$row["aciklama"]."</td>".
           "</tr>";
 }

}
else
{
     echo "don't exist records for list on the table";
}

?>
</table>




