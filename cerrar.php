<?php session_start();

  session_destroy();
  $cerrar_sesion = $_SESSION = array(); //dejamos en 0 la session
  header('Location: login.php');
 // echo "has cerrado session exitosamente ";

//  echo "<script>
//             alert('Sesion Cerrada con Exito');
//             window.location= 'login.php'
// </script>";
?>
