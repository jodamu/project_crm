$(function() {

    //Paneles
    $('.container-fluid').sortable({
      axis: "X",
      update: function(event, ui) {
        var data = $(this).sortable('toArray');
       
      }
    });
  
    //Mostrar
    var Argumentos = {};
    var panel_id=0;
    function CreaDatos(object, arg) {
      var data = $(object).sortable('toArray'); // Datos al array
      panel_id = $(object).attr("id"); // Toma el id del panel
      var arrayLength = data.length; // Logitud el array
  
      //id del panel
      if (!arg.hasOwnProperty(panel_id)) {
        arg[panel_id] = new Array();
      }
  
      //Genera los postits
      for (var i = 0; i < arrayLength; i++) {
        var p_id = data[i];
        // Añade los postits en panel_id
        arg[panel_id].push(p_id);
      }
      return arg;
    }
  
    //muestra los postits
    $('.panel').sortable({
      connectWith: '.panel',
        items: "li:not(.ui-state-disabled)",
      //Paso 1
      start: function(event, ui) {
        Argumentos = {}; 
      },
      //paso 2
      remove: function(event, ui) {
        //Toma el array del postit
        Argumentos = CreaDatos(this, Argumentos);
        
      },
      //Paso 3
      receive: function(event, ui) {
        
        //Toma el array de los postits y añade nuevo 
        Argumentos = CreaDatos(this, Argumentos);
      },
      update: function(e, ui) {
        if (this === ui.item.parent()[0]) {
          //cambios en el mismo contenedor
          if (ui.sender == null) {
            Argumentos = CreaDatos(this, Argumentos);
           }
        }
      }, 
      //Paso 4
      stop: function(event, ui) {
         
        console.log(Argumentos);
        $("#array").val(JSON.stringify(Argumentos));
        $.ajax({ 
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          type: $('#form').attr('method'), 
          url: $('#form').attr('action'), 
          data: $('#form').serialize(), 
          success: function(data){ 
            console.log(data); 
            
            alertify.success('Modificado Correctamente.'); 
          },
          error: function(data){
            console.log(data);
            alertify.error('Error.');
          } 
      }); 
     
      },
    });
  });