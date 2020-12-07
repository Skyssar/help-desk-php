<?php // header HTML

include ("api/header.html");

/* 
   MADE BY: Yasar Cure González
            Marco Aguirre
            DESARROLLO WEB 2020

---------------------------------------------------------------------------------------------------

Index simple. 
Peticiones usando AJAX y JQuery
Front-end with Bootstrap
MVC
*/

?>
 


<a href = "http://localhost/api"   class = "navbar-brand"><h4>INICIO</h4></a>
      
      </div>
    </nav>

<div class="container p-3">

  <div class="col-md-12">

    <div class=" card card-header bg-primary"> 
    
      <h1 class = "text-white text-center" > Bienvenido a la</h1>
      <h1 class = "text-white text-center" >MESA DE AYUDA DE LA UNIVERSIDAD</h1>

    </div>

    <div class="card card-body"> 
    
      <div class = "text-right" > Created by: Yasar José Cure </div>
        <div class = "text-right" > Marco Aguirre</div>

        <div class="container p-3">
        <div class="text-center">
                  <h5 >Aquí podrás crear un ticket para un requerimiento en la dependencia de tu facultad.</h5> 
               
                </div>  
                </div> 
        <div class="container p-3">
        <div class="text-center">
                  <a  href="create.php" name = "create" class="btn btn-success ">Crear ticket</a> 
               
                </div>  
                </div> 

        <div class="container p-3">
        <div class="text-center">
                   
                   <a  href="list.php" name = "create" class="btn btn-success ">Lista de tickets</a> 
                 
                </div>  
                </div> 

        <div class="container p-3">
        <div class="text-center">
                 
                   <a  href="search.php" name = "create" class="btn btn-success ">Buscar ticket</a> 
                </div>  
                </div> 

    </div>
    




  </div>
</div>
   
<?php //footer HTML//
 include ("api/footer.html");?>
