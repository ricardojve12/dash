<?php
session_start();

require 'database.php';

if (isset($_SESSION['id'])) {
   $records = $conn->prepare('SELECT id, email, password FROM usuario WHERE id = ":id"');
   $records->bindParam(':id', $_SESSION['id']);
   $records->execute();
   $results = $records->fetch(PDO::FETCH_ASSOC);

   $user = null;

   if (count($results) > 0) {
      $user = $results;
   }
}
?>



<?php

require_once "vistas/parte_superior.php";


?>

<!---INICIO DEL CONTENIDO PRINCIPAL-->
<div class="container">
   <h1>contenido principal</h1>
</div>

<!--fin del contenido princila-->
<?php

require_once "vistas/parte_inferior.php" ?>