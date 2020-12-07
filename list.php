<?php include ("api/header.html");?>
      
     
      <a href = "list.php" class = "navbar-brand"><h4>LISTA DE TICKETS</h4></a>
      
    </div>
  </nav>

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

<script type = "text/javascript">

$(document).ready(function(){
  List();
}); 


</script>