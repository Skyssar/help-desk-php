<?php

require 'modelo.php';


    if ($_POST){ 
        
        $ticket = new Ticket();

        switch ($_POST["accion"]){

            case "CREAR":

                $dependencia = $_POST["dependencia"];
                $tipo = $_POST["tipo"];
                $identificacion = $_POST["identificacion"];
                $nombres = $_POST["nombres"];
                $apellidos = $_POST["apellidos"];
                $email = $_POST["email"];
                $asunto = $_POST["asunto"];
                $descripcion = $_POST["descripcion"];

               /* if ($asunto == ""){
                    $respuesta = "PERREO";
                } else{
                    $respuesta = "BARRO ASI ES";
                }*/

               $respuesta = $ticket->Create($dependencia, $tipo, $identificacion, $nombres, $apellidos, $email, $asunto, $descripcion);
                echo json_encode ($respuesta);

                /*$respuesta = $ticket->prueba($identificacion, $nombres);
                echo json_encode ($respuesta);*/

            break;

            case "LIST":
               echo json_encode($ticket->List());
            break;

            case "READBYID":
                echo json_encode($ticket->ReadbyId($_POST['id']));
            break;

            case "UPDATEAR":

                $dependencia = $_POST["dependencia"];
                $tipo = $_POST["tipo"];
                $identificacion = $_POST["identificacion"];
                $nombres = $_POST["nombres"];
                $apellidos = $_POST["apellidos"];
                $email = $_POST["email"];
                $asunto = $_POST["asunto"];
                $descripcion = $_POST["descripcion"];
                $id_ticket = $_POST['id'];

                $respuesta = $ticket->Update($id_ticket, $dependencia, $tipo, $identificacion, $nombres, $apellidos, $email, $asunto, $descripcion);
                echo json_encode ($respuesta);
            
            break;

            case "ELIMINAR":

                $id_ticket = $_POST['id'];

                $respuesta = $ticket->Delete($id_ticket);
                echo json_encode ($respuesta);
    
            break;

            case "SEARCH":

                $id_ticket = $_POST['id'];

                $respuesta = $ticket->Search($id_ticket);
                echo json_encode ($respuesta);
    
            break;
            
            

        }


     }
?>