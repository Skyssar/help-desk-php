
<?php include ("api/header.html");?>

<a href = "search.php" class = "navbar-brand"><h4>BUSCAR TICKET</h4></a>
      
    </div>
  </nav>

 
  
<div class="col-md-23 p-4">
      
  
    <form class="form-inline" id ="buscarform" method = "POST" >
        <label class ="col-md-2 form-label">  Buscar ticket por ID:</label>
     <input class="form-control mr-sm-2" type="number" name= "busqueda" id = "busqueda" placeholder="Buscar id del ticket" >
     <button class="btn btn-primary my-2 my-sm-0" id = "btnsearch" type="submit">Search </button> 
     &nbsp; 
     <button class=" btn btn-success my-2 my-sm-0" id = "btnver">Ver todos</button>
    </form>
 
</div>

<div class="col-md-12 p-4">

  <div class="card">
    


    <table class = "table table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Creado</th>
                <th>Dependencia</th>
                <th>Tipo</th>
                <th>Identificación</th>
                <th>Solicitante</th>
                <th>Asunto</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id = "datos">

        </tbody>
    </table>

    </div>
</div>

<?php include ("api/footer.html");?>


<!-- scripts JQuery -->
<script type = "text/javascript">

$(document).ready(function(){
    $('#btnsearch').click(function(){

        var id = document.getElementById("busqueda").value;

       Search(id);

       return false;

    })

});</script>

<script type = "text/javascript">

$(document).ready(function(){
    $('#btnver').click(function(){


       List();

       return false;

    })

});</script>