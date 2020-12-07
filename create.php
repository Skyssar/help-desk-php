<?php include ("api/header.html");?>

<a href = "create.php"   class = "navbar-brand"><h4>CREAR NUEVO TICKET</h4></a>
      
      </div>
    </nav>

    <div class="container p-3">
        <div class="row">
            <div class="col-md-6">

                <div class="card card-body">  
                    <form>
                        
                        <div class="form-group row">
                            <label for="dependencia" class ="col-md-3 col-form-label">Dependencia:</label>
                            <div class="col-sm-9">
                            <select class="form-control" name = "dependence" id="dependence">
                       
                               <option selected disabled value="">Seleccione dependencia</option>
                               <option value="1">Biblioteca</option>
                               <option value="2">Bienestar Universitario</option>
                               <option value="3">Derecho</option>
                               <option value="4">Enfermería</option>
                               <option value="5">Física</option>
                               <option value="6">Ingeniería de Sistemas</option>
                               <option value="7">Ingeniería Industrial</option>
                               <option value="8">Ingeniería Mecánica</option>
                               <option value="9">Licenciatura</option>
                               <option value="10">Postgrado</option>
                          
                            </select>
                        </div></div>

                        <div class="form-group row">
                            <label for="tipo" class = "col-md-3 col-form-label">Solicitante:</label>
                            <div class="col-sm-9">
                            <select class="form-control" name = "type" id="type">
                       
                               <option selected disabled value="">Seleccione tipo de solicitante</option>
                               <option value="1">Administrativo</option>
                               <option value="2">Docente</option>
                               <option value="3">Estudiante</option>               
                          
                            </select>
                        </div></div>

                        <div class="form-group row">
                            <label for="identificacion" class = "col-md-3 col-form-label">Identificación:</label>  
                            <div class="col-sm-9">                 
                            <input type="number" class="form-control" name = "identification" id = "identification" 
                            placeholder="Enter your identification number">
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="nombres" class = "col-md-3 col-form-label">Nombres:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id= "names"   
                            placeholder="Enter name" required> 
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="apellidos" class = "col-md-3 col-form-label">Apellidos:</label>  
                             <div class="col-sm-9">                 
                             <input type="text" class="form-control" id= "lastnames"  
                              placeholder="Enter your last name">
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="email" class = "col-md-3 col-form-label">Email:</label>  
                            <div class="col-sm-9">                 
                            <input type="email" class="form-control" id= "email"  name = "email" 
                            placeholder="Enter your email">
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="asunto" class = "col-md-3 col-form-label">Asunto:</label>  
                            <div class="col-sm-9">                 
                            <input type="text" class="form-control" name = "case" id = "case"
                            placeholder="Enter your case">
                           </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="descripcion" class = "col-md-3 col-form-label">Descripción:</label>  
                            <div class="col-sm-9">                 
                            <textarea type="text" class="form-control" rows = "3" name = "description" id = "description"
                            placeholder="Enter your case description"></textarea>
                           </div>
                        </div>
              
                    </form>
                    <div class="text-right">
                    <button  onclick="Create();" name = "create" class="btn btn-primary ">Crear ticket</button>
                </div> </div>     
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id = "tick" class="card-header bg-primary">
                        <h4  class = "text-white text-center">TICKET</h4>
                    
                    </div>
                    <div class="card-body">

                        <form>
                            
                            <div class="form-group row">
                              <label  for="staticID" class="col-sm-3 col-form-label col-form-label-sm">Ticket No:</label>
                              <div class="col-sm-9">
                                <input type="text"  readonly class="form-control-plaintext form-control-sm" id="staticID" value="">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticCreate" class="col-sm-3 col-form-label col-form-label-sm">Creado:</label>
                              <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext form-control-sm" id="staticCreate" value="">
                              </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticID" class="col-sm-3 col-form-label col-form-label-sm">Dependencia:</label>
                                <div class="col-sm-9">
                                  <input type="text" readonly class="form-control-plaintext form-control-sm" id="staticDependence" value="">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="staticID" class="col-sm-3 col-form-label col-form-label-sm">Solicitante:</label>
                                <div class="col-sm-9">
                                  <input type="text" readonly class="form-control-plaintext form-control-sm" id="staticSolicitante" value="">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="staticID" class="col-sm-3 col-form-label col-form-label-sm">Identificación:</label>
                                <div class="col-sm-9">
                                  <input type="text" readonly class="form-control-plaintext form-control-sm" id="staticIdentification" value="">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="staticID" class="col-sm-3 col-form-label col-form-label-sm">Asunto:</label>
                                <div class="col-sm-9">
                                  <input type="text" readonly class="form-control-plaintext form-control-sm" id="staticCase" value="">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="staticID" class="col-sm-3 col-form-label col-form-label-sm">Descripción:</label>
                                <div class="col-sm-9">
                                  <input type="text" readonly class="form-control-plaintext form-control-sm" id="staticDescription" value="">
                                </div>
                              </div>

                        </form>

                        <div class = "col-sm-15">
                            <div class="text-right" id = "lace">

                            </div>
                        </div>

                    </div>


                   
                    
                </div>
            </div>
        </div>
    </div>
   

    <?php include ("api/footer.html");?>