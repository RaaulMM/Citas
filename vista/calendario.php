

 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Calendario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/moment.min.js"> </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!--FULL CALENDAR-->
    <script src="js/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <script src="js/es.js"></script>

    <!-- js BOOTSTRA -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <?=   session_start(); ?>
</head>
   
<body><br><br>
  <?php 
  if ($_SESSION['$usu'] == 'pepe') {
     ?>
    <a href="index.php?mod=Usuario&ope=Listado"> Listado Usuario</a>
    <div class="container">
  <?php } ?>
  
  
       
        <div class="col-12"> <h2>Hola <?=   $_SESSION['$usu'] ?></h2><div id="CalendarioWeb"></div> </div> <br>
     </div>

   <script>
   $(document).ready(function(){
       $('#CalendarioWeb').fullCalendar({
        height: 539,
        weekends: false,
        dayCount: 5,
        minTime: "10:00:00",
        maxTime: "18:00:00",
        defaultView: 'agendaWeek',
        groupByResource: true,
        themeSystem: 'bootstrap4' ,

          header:{
              left:'today,prev,next',
              center:'title',
              right:'agendaWeek, month'
          },
          views: {
              agendaFiveDay: {
                type: 'agenda',
                duration: { days: 5 },
                firstDay: 1,
                slotDuration: '00:30:00',
                
              }
          },
          businessHours:[ 
            {
                dow: [ 1, 2, 3, 4, 5],
                start: '10:00',
                end : '14:00', 
            },
            {
                dow: [ 1, 2, 3, 4, 5],
                start: '16:00',
                end : '18:00',
            }
          ],
          events:'/calendary/modelo/eventos.php',

          dayClick:function(date,jsEvent,view){
            /*var newDateObj = new Date((date.format()));
            newDateObj.setMinutes( newDateObj.getMinutes() + 30 );


            //var fechaEnd = newDateObj.getMinutes()
            console.log(date.format());
            console.log(newDateObj.parse());*/

            $('#txtFechaI').val(date.format());
            $('#txtFechaF').val(date.format());
            $("#ModalClik").modal();
          },

          eventClick:function(calEvent,jsEvent, view ){

            
            $("#txtDescripcion").val(calEvent.title);
            $("#txtFechaI").val(calEvent.start);
            $("#txtFechaF").val(calEvent.end);
            $("#idUsu").val(calEvent.idUsu);
            $("#idPro").val(calEvent.idPro);
            $("#EventClik").modal();
          },
         

          
       });
   });
   </script>




<!-- Modal -->
<div class="modal fade" id="ModalClik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selección</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
       <?php require_once "modelo/Database.php";  ?>
       <?php require_once "modelo/Evento.php";   ?>
       <?php require_once "modelo/Usuario.php";   ?>

      <form action="index.php" method="GET">
        <input type="hidden" name="mod" value="evento">
        <input type="hidden" name="ope" value="registro">
      
        
        <label>FechaInicio:</label>
        <input type="datetime" name="txtFechaI" id="txtFechaI" readonly><br>
        <label>FechaFinal:</label>
        <input type="datetime" name="txtFechaF" id="txtFechaF"><br>

        <label>Descripción</label>
        <textarea id="txtDescripcion" name="txtDescripcion" rows="4"></textarea><br>
        <?php 
          $datos = Usuario::getAllUsu() ;
            foreach ($datos as $item) :
        ?>
        <input type="hidden" name="idUsu" id="idUsu" value="<?= $item->getId();?>" ><br>

        <?php
            endforeach;
        ?>
        <label>Proyectos</label>
        <select id="idPro" name="idPro">
                <?php 
                 $datos = Usuario::getAllPro() ;
                          foreach ($datos as $item) :
                ?>
                          <option value="<?= $item->getIdPro_Pro();?>"> 
                            <?= $item->getIdPro_Pro();?>
                          </option>
                          <?php
                            endforeach;
                          ?>
        </select><br>
        <input type="hidden" name="color" value="#FF0000">
        
        <button type="submit">Registrar</button> 
      </form>


      </div>
      <div class="modal-footer">
      
        
      </div>
    </div>
  </div>
</div> 

<!-- Modal2 -->
<div class="modal fade" id="EventClik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selección</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
       <?php require_once "modelo/Database.php";  ?>
       <?php require_once "modelo/Evento.php";   ?>
       <?php require_once "modelo/Usuario.php";   ?>

      <form action="index.php" method="GET">
        <input type="hidden" name="mod" value="evento">
        <input type="hidden" name="ope" value="registro">
      
        
        <label>FechaInicio:</label>
        <input type="datetime" name="txtFechaI" id="txtFechaI"><br>
        <label>FechaFinal:</label>
        <input type="datetime" name="txtFechaF" id="txtFechaF"><br>

        <label>Descripción</label>
        <textarea id="txtDescripcion" name="txtDescripcion" rows="4"></textarea><br>
        <?php 
          $datos = Usuario::getAllUsu() ;
            foreach ($datos as $item) :
        ?>
        <input type="hidden" name="idUsu" id="idUsu" value="<?= $item->getId();?>" ><br>

        <?php
            endforeach;
        ?>
        <label>Proyectos</label>
        <select id="idPro" name="idPro">
                <?php 
                 $datos = Usuario::getAllPro() ;
                          foreach ($datos as $item) :
                ?>
                          <option value="<?= $item->getIdPro_Pro();?>"> 
                            <?= $item->getIdPro_Pro();?>
                          </option>
                          <?php
                            endforeach;
                          ?>
        </select><br>
        <input type="hidden" name="color" value="#FF0000">
        
        <button type="submit">Actualizar</button> 
      </form>


      </div>
      <div class="modal-footer">
      
        
      </div>
    </div>
  </div>
</div>


</body>
</html>