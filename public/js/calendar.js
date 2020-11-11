
document.addEventListener('DOMContentLoaded', function() {

    var url ='./';
    
    $('body').on('click', '.datetimepicker', function() {
            $(this).not('.hasDateTimePicker').datetimepicker({
                controlType: 'select',
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
                timeFormat: 'HH:mm:ss',
                yearRange: "1900:+10",
                showOn:'focus',
                firstDay: 1
            }).focus();
        });
    
    $(".colorpicker").colorpicker();
    
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'es',
      timeZone: 'America/Bogota',
      views: {
        listDay: { buttonText: 'Agenda dia' },
        listWeek: { buttonText: 'Agenda semana' },
        listMonth: { buttonText: 'Agenda mes' }
      },

      theme: true,    
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list','bootstrap'],
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listDay,listWeek,listMonth'
        },
        navLinks: false, // can click day/week names to navigate views
        themeSystem: 'slate',
        businessHours: true, // display business hours
        editable: true,
        selectable: true,
        selectMirror: true,
        
      
      select: function(arg) {
        
        $('#createEvent').trigger("reset");
        var fe = arg.start.getFullYear()+'-'+(arg.start.getMonth()+1)+'-'+(arg.start.getDate()+1)+' 00:00:00';
        var en = arg.end.getFullYear()+'-'+(arg.end.getMonth()+1)+'-'+arg.end.getDate()+' 00:00:00';
            
        $("#startDate").val(fe);
        $("#endDate").val(en);
        if(arg.allDay){
          $("#allday").prop("checked",true);
        } else{
          $("#allday").prop("checked",false);
        }
        $("#agregarj").click();
        calendar.unselect() 
      },
        //uncomment to have a default date
        //defaultDate: '2020-04-07',
        events:'evento/load',
        
        eventDrop: function(arg) {
            var start = arg.event.start.toDateString()+' '+arg.event.start.getHours()+':'+arg.event.start.getMinutes()+':'+arg.event.start.getSeconds();
              $("#start").val(start);
              
            if (arg.event.end == null) {
                end = start;
                $("#end").val(start);
            } else {
                var end = arg.event.end.toDateString()+' '+arg.event.end.getHours()+':'+arg.event.end.getMinutes()+':'+arg.event.end.getSeconds();
                $("#end").val(end);
              }
              $("#id").val(arg.event.id);
    
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
              type: $('#dropform').attr('method'), 
              url: $('#dropform').attr('action'), 
              data:$("#dropform").serialize(),
              success: function(data) {
                console.log(data);
                
                alertify.success('Actualizado Correctamente.'); 
                    },
              error: function(data){
                console.log(data);
                alertify.error('Error.  '+data);
              }
            });
        },
        

        eventResize: function(arg) {
            var start = arg.event.start.toDateString()+' '+arg.event.start.getHours()+':'+arg.event.start.getMinutes()+':'+arg.event.start.getSeconds();
              $("#start").val(start);
              
            if (arg.event.end == null) {
                end = start;
                $("#end").val(start);
            } else {
                var end = arg.event.end.toDateString()+' '+arg.event.end.getHours()+':'+arg.event.end.getMinutes()+':'+arg.event.end.getSeconds();
                $("#end").val(end);
              }
              $("#id").val(arg.event.id);
    
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
              type: $('#dropform').attr('method'), 
              url: $('#dropform').attr('action'), 
              data:$("#dropform").serialize(),
              success: function(data) {
                console.log(data);
                
                alertify.success('Actualizado Correctamente.'); 
                    },
              error: function(data){
                console.log(data);
                alertify.error('Error.  '+data);
              }
            });
        },
        windowResize: function(arg) {
            //console.log( arg);
          },
        eventClick: function(arg) {
            var id = arg.event.id;
            
            $('#editEventId').val(id);
            $('#deleteEvent').attr('data-id', id); 
    
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
              url:"evento/"+id+"/edit",
              type:"GET",
              dataType:"json",
              success: function(data) {
                console.log(data.id);
                buscar(data.id);
                    
                    $('#editStartDate').val(data.start);
                    $('#editEndDate').val(data.end);
                    $('#editColor').val(data.color);
                    $('#editTextColor').val(data.textColor);
                    $('#editEventallday').val(data.allday);
                    $('#editeventmodal').modal();
                },
              error: function(data){
                console.log(data);
                alertify.error('Error.  '+data);
              } 
            });
    
            $('body').on('click', '#deleteEvent', function() {
                if(confirm("Are you sure you want to remove it?")) {
                    $.ajax({
                      headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:"evento/destroy",
                        type:"POST",
                        data:{id:arg.event.id, _method:'DELETE'},
                        success: function(data) {
                          console.log(data);
                alertify.success('Eliminado Correctamente. ');
                      },
                        error: function(data){
                          console.log(data);
                          alertify.error('Error.  '+data);
                        } 
                    }); 
    
                    //close model
                    $('#editeventmodal').modal('hide');
    
                    //refresh calendar
                    calendar.refetchEvents();         
                }
            });
            
            calendar.refetchEvents();
        }
    });
    
    calendar.render();
    
   


    $("#startDate").on('change', function() {
      $("#endDate").val($(this).val());
    });
    
    $("#insertar").click(function() {
            
            $.ajax({ 
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
              type: $('#createEvent').attr('method'), 
              url: $('#createEvent').attr('action'), 
              data: $('#createEvent').serialize(), 
              success: function(data){ 
                console.log(data); 
                //remove any form data
                $('#createEvent').trigger("reset");
    
                //close model
                //$('#addeventmodal').modal('hide');
                calendar.refetchEvents();
                alertify.success('Insertado Correctamente.'); 
              },
              error: function(data){
                console.log(data);
                alertify.error('Error.  '+data);
              } 
          }); 
    
    });
    
    $("select#languages").on('change', function() {
      calendar.setOption('locale', $(this).val());
    });
    
    
    
    $("#editar").click(function() {
            var id = $("#editEventId").val();
            console.log(id);
             $.ajax({ 
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
              type: $('#editEvent').attr('method'), 
              url: "evento/update'"+id, 
              data: $('#editEvent').serialize(), 
              success: function(data){ 
                console.log(data); 
                //remove any form data
                $('#editEvent').trigger("reset");
                console.log(data);
                calendar.refetchEvents();
                //close model
                $('#editeventmodal').modal('hide');
                alertify.success('Insertado Correctamente.'); 
              },
              error: function(data){
                console.log(data);
                alertify.error('Error.  '+data);
              } 
          }); 
    
    });
    
    });

    function buscar(id){
      $('.modal-footer').fadeOut();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
        url:id,
        type:"GET",
        dataType:"json",
        success: function(data) {
          console.log(data);

          $('.editEventTitle option[value="'+data+'"]').attr("selected", true);
          $('.modal-footer').fadeIn();
          },
        error: function(data){
          console.log(data);
          alertify.error('Error.  '+data);
        }
    });
  }
    