<?php

include ("../api/db.php");


class Ticket {

    public function prueba  ($identificacion, $nombres){
       
      /*$conexion = new Conexion();

      $stmt = $conexion->prepare("INSERT INTO prueba(identificacion, nombres) 
      values (:identificacion, :nombres)");

      $stmt->bindValue (":identificacion", $identificacion, PDO::PARAM_STR);
      $stmt->bindValue (":nombres", $nombres, PDO::PARAM_STR); */

      include "../api/db.php";
      
      $query1 = "INSERT INTO prueba(identificacion, nombres) 
      VALUES ('$identificacion', '$nombres')";
       $result1 = mysqli_query($conexion, $query1);

       if (!$result1){
           return "ON";
       } else{
           return "OK";
       }
    }
   
    public function Create ($dependencia, $tipo, $identificacion, $nombres, $apellidos, $email, $asunto, $descripcion){
        
        include "../api/db.php";

        $query2 = "INSERT INTO ticket(asunto, descripcion, identificacion, nombres, apellidos, email, id_tipo, id_dependencia) 
        VALUES ('$asunto', '$descripcion', '$identificacion', '$nombres', '$apellidos', '$email', '$tipo', '$dependencia')";
        $result2 = mysqli_query($conexion, $query2);

        $query3 = "SELECT * FROM ticket t LEFT JOIN dependencia d ON t.id_dependencia=d.id 
        LEFT JOIN tipo c ON t.id_tipo = c.id ORDER BY t.id_ticket DESC LIMIT 1";
        $result3 = mysqli_query($conexion, $query3);
        
 
       $consulta = mysqli_fetch_assoc($result3);     
            return $consulta; 
        
    }

    public function List (){

        include "../api/db.php";

        $query1 = "SELECT * FROM ticket t LEFT JOIN dependencia d ON t.id_dependencia=d.id 
        LEFT JOIN tipo c ON t.id_tipo = c.id ORDER BY t.id_ticket DESC";
        $result1 = mysqli_query($conexion, $query1);
        
        $consulta = mysqli_fetch_all($result1, MYSQLI_ASSOC);
       
            return $consulta; 
         


    }

    public function Search ($id_ticket){

        include "../api/db.php";

        $existe =0;

        $query1 = "SELECT * FROM ticket t LEFT JOIN dependencia d ON t.id_dependencia=d.id 
        LEFT JOIN tipo c ON t.id_tipo = c.id WHERE t.id_ticket=$id_ticket";
        $result1 = mysqli_query($conexion, $query1);

        while ($consulta = mysqli_fetch_assoc($result1)){
            $existe++;
            return $consulta;
           }
           if ($existe == 0){
              return "NO";
           }
          

    }


    public function ReadbyId ($id_ticket){

        include "../api/db.php";

        $existe =0;

        $query1 = "SELECT * FROM ticket WHERE id_ticket = $id_ticket";
        $result1 = mysqli_query($conexion, $query1);

        while ($consulta = mysqli_fetch_assoc($result1)){
            $existe++;
            return $consulta;
           }
           if ($existe == 0){
              return "LA ID NO EXISTE";
           }
          

    }


    // actualizar datos

    public function Update ($id_ticket, $dependencia, $tipo, $identificacion, $nombres, $apellidos, $email, $asunto, $descripcion){
        
        include "../api/db.php";
    
            $query2 = "UPDATE ticket SET identificacion = '$identificacion', nombres = '$nombres', apellidos = '$apellidos', email = '$email',
            asunto = '$asunto', descripcion = '$descripcion', 
            id_tipo = '$tipo', id_dependencia = '$dependencia' WHERE id_ticket = $id_ticket";
            $result2 = mysqli_query($conexion, $query2);
    
            $query3 = "SELECT * FROM ticket t LEFT JOIN dependencia d ON t.id_dependencia=d.id 
            LEFT JOIN tipo c ON t.id_tipo = c.id WHERE t.id_ticket=$id_ticket";
            $result3 = mysqli_query($conexion, $query3);
        
 
       $consulta = mysqli_fetch_assoc($result3);     
            return $consulta; 

    }

    public function Delete ($id_ticket){

        include "../api/db.php";

        $existe = 0;
        $query1 = mysqli_query($conexion,"SELECT * FROM ticket WHERE id_ticket = $id_ticket");
   
        while ($consulta = mysqli_fetch_assoc($query1)){
         $existe++;
        }
        if ($existe == 0){
           return "LA ID NO EXISTE";
        }

        else {
          mysqli_query($conexion,"DELETE FROM ticket WHERE id_ticket = $id_ticket");
  
         return "El ticket $id_ticket ha sido eliminado";

        }
    }




    
}




?>


