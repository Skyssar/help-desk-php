var url = 'php/controlador.php'; 

function Validar(){

    dependencia = document.getElementById('dependence').value;
    tipo = document.getElementById('type').value;
    identificacion = document.getElementById('identification').value;
    nombres = document.getElementById('names').value;
    apellidos = document.getElementById('lastnames').value;
    email= document.getElementById('email').value;
    asunto= document.getElementById('case').value;
    descripcion = document.getElementById('description').value;
    

    if (dependencia == "" || tipo == "" || identificacion == "" || nombres == "" || apellidos == "" 
      || email == "" || asunto == "" || descripcion == "" ){
        
        return false;
    } else{

    return true;

}
}

function Create (){

    $.ajax({

        url: url,
        type: 'POST',
        data: RetornarDatos ("CREAR"),
        dataType: 'json' 

    }).done(function(response){

        var estado = Validar();

       if (estado == true){
  
       alert('Ticket creado con éxito');
   // }
     
        document.getElementById('staticID').value = response.id_ticket;
         document.getElementById('staticCreate').value = response.created;
        document.getElementById('staticDependence').value = response.dependence;
        document.getElementById('staticSolicitante').value = response.nombres + " " + response.apellidos;
        document.getElementById('staticIdentification').value = response.identificacion;
        document.getElementById('staticCase').value = response.asunto;
        document.getElementById('staticDescription').value = response.descripcion;

        var html = "";
        html += "<a href ='update.php?id=" + response.id_ticket +"'class='btn btn-primary'>Editar</a>";
        html +=  " ";
        html += "<a href ='list.php'class='btn btn-success'>Ver todos</a>";

        var html2 = "";
        html2 += "<h4 font style='text-transform: uppercase;'  class = 'text-white text-center'>Ticket " + response.type + "</h4>";

        document.getElementById("lace").innerHTML = html; 
        document.getElementById("tick").innerHTML = html2;

        Limpiar();

    } else {

        alert ('Por favor llene todos los campos')
    }

    }).fail(function(response){
         console.log(response);
    });
}

function List (){

    $.ajax({

        url: url,
        type: 'POST',
        data: {"accion" : "LIST"},
        dataType: 'json' 

    }).done(function(response){

        console.log(response);
        var html = "";


        $.each(response, function (index, data){

            html += "<tr>";
            html += "<td>" + data.id_ticket + "</td>";
            html += "<td>" + data.created + "</td>";
            html += "<td>" + data.dependence + "</td>";
            html += "<td>" + data.type + "</td>";
            html += "<td>" + data.identificacion + "</td>";
            html += "<td>" + data.nombres + " " + data.apellidos + "</td>";
            html += "<td>" + data.asunto + "</td>";
            html += "<td>";
            html += "<a href ='update.php?id=" + data.id_ticket +"'class='btn btn-primary'>Editar</a>";
            html +=  " ";
            html += "<button class = 'btn btn-danger' onclick ='Delete(" + data.id_ticket +");'class=>Eliminar</button>";
           //html += "<a href ='delete.php?id=" + data.id_ticket +"'class='btn btn-secondary'>Eliminar</a>"; 
            html += "</td>";
            html += "</tr>"
        });

        document.getElementById("datos").innerHTML = html; 
    
    }).fail(function(response){
         console.log(response);
    });
}



function Update(){

    $.ajax({

        url: url,
        type: 'POST',
        data: RetornarDatos ("UPDATEAR"),
        dataType: 'json' 

    }).done(function(response){

        var estado = Validar();

        if (estado == true){

         alert('Ticket actualizado correctamente');
 
         var html = "";
         html += "<a href ='list.php' class='btn btn-success'>Ver todos</a>";
       
     
        var html2 = "";
        html2 += "<h4 font style='text-transform: uppercase;'  class = 'text-white text-center'>Ticket " + response.type + "</h4>";
       
        document.getElementById("lace").innerHTML = html; 
        document.getElementById("tick").innerHTML = html2;
         

        document.getElementById('staticID').value = response.id_ticket;
        document.getElementById('staticCreate').value = response.created;
        document.getElementById('staticDependence').value = response.dependence;
        document.getElementById('staticSolicitante').value = response.nombres + " " + response.apellidos;
        document.getElementById('staticIdentification').value = response.identificacion;
        document.getElementById('staticCase').value = response.asunto;
        document.getElementById('staticUpdate').value = response.ts_update;
        document.getElementById('staticDescription').value = response.descripcion;
        
        } else {  

              alert('Por favor llene todos los campos');
        
            }
 
    
      
    
    }).fail(function(response){
         console.log(response);
    });
}



 
function Delete(id){

    $.ajax({

        url: url,
        type: 'POST',
        data: {"id" : id, "accion": "ELIMINAR"},
        dataType: 'json' 

    }).done(function(response){

        alert(response);
    
          List();    
    
    }).fail(function(response){
         console.log(response);
    });
}

function ReadByID(id){

    $.ajax({

        url: url,
        type: 'POST',
        data: {"id" : id, "accion": "READBYID"},
        dataType: 'json' 

    }).done(function(response){

       
       document.getElementById('dependence').value = response.id_dependencia;
       document.getElementById('type').value = response.id_tipo;
       document.getElementById('identification').value = response.identificacion;
       document.getElementById('names').value = response.nombres;
       document.getElementById('lastnames').value = response.apellidos;
       document.getElementById('email').value = response.email;
       document.getElementById('case').value = response.asunto;
       document.getElementById('description').innerText = response.descripcion;
       document.getElementById('staticCreate').value = response.created;
      // document.getElementById('staticUpdate').value = response.ts_update;
 
         
    
    }).fail(function(response){
         console.log(response);
    });
}

function Search(id){

    $.ajax({

        url: url,
        type: 'POST',
        data: {"id" : id, "accion": "SEARCH"},
        dataType: 'json' 

    }).done(function(response){

        if (response == "NO"){

            alert("la id solicitada no existe");
        }else {
        var html= "";
        html += "<tr>";
        html += "<td>" + response.id_ticket + "</td>";
        html += "<td>" + response.created + "</td>";
        html += "<td>" + response.dependence + "</td>";
        html += "<td>" + response.type + "</td>";
        html += "<td>" + response.identificacion + "</td>";
        html += "<td>" + response.nombres + " " + response.apellidos + "</td>";
        html += "<td>" + response.asunto + "</td>";
        html += "<td>";
        html += "<a href ='update.php?id=" + response.id_ticket +"'class='btn btn-primary'>Editar</a>";
        html +=  " ";
        html += "<button class = 'btn btn-danger' onclick ='Delete(" + response.id_ticket +");'class=>Eliminar</button>";
        html += "</td>";
        html += "</tr>"

        document.getElementById("datos").innerHTML = html; 
        
    }
        
    
    }).fail(function(response){
         console.log(response);
    });
}

function RetornarDatos (accion){

    return {

        "dependencia": document.getElementById('dependence').value,
        "tipo": document.getElementById('type').value,
        "identificacion": document.getElementById('identification').value,
        "nombres": document.getElementById('names').value,
        "apellidos": document.getElementById('lastnames').value,
        "email": document.getElementById('email').value,
        "asunto": document.getElementById('case').value,
        "descripcion": document.getElementById('description').value,
        "accion" : accion,
        "id": document.getElementById('staticID').value,
    
    }


}

function Limpiar(){

    document.getElementById('dependence').value = "";
    document.getElementById('type').value = "";
    document.getElementById('identification').value= "";
    document.getElementById('names').value= "";
    document.getElementById('lastnames').value= "";
    document.getElementById('email').value= "";
    document.getElementById('case').value= "";
    document.getElementById('description').value= "";
    

}




