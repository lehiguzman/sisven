// Call the dataTables jQuery plugin
$(document).ready(function() {    
  $('#dataTable').DataTable(
  		{
        	"language": 
        		{
            		"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        		},
        	"columnDefs": 
        	[
            	{
                	//"targets": [ 4,5 ],
                	//"visible": true,
                	//"orderable": false                	
            	}
        	],
        	//"paging":   false,        	
        	//"info":     false,
        	//"scrollY":        "200px",
        	//"scrollCollapse": true,
        	//"paging":         false
        	"dom": '<"top"fi>t<"bottom"lp><"clear">'
    	}
  		);
  

  ///////////////////////////////////AJAX////////////////////////////////////////////////
  $.ajaxSetup({
    headers: 
    {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });

  $('#tipo').change(function(e){ 

        e.preventDefault();        
        var tipo = $("select[name=tipo]").val();                    
          if(tipo == '3')
          {
                $.ajax({                    
                    url: '/ajaxRequest',
                    type: 'POST',
                    data:{tipo:tipo},
                    dataType: 'html',
                    success:function(data)
                    {
                        console.log(data);
                        $('#divMaterias').replaceWith(data);
                    }                    
                });          
          }else
          {             
            $('#divMaterias').hide();
          }
  });

  $('#checksemi').click(function(e){        
        var cursa = $("input[name=seminario]").prop('checked'); 
        var sem = $("input[name=seminario]").val();   
        
        if(cursa)
        {          
          $.ajax({                    
                    url: '/ajaxSelProfSem',
                    type: 'POST',
                    data:{sem:sem},
                    dataType: 'html',
                    success:function(data)
                    {
                        console.log(data);
                        $('#divSelProfSem').replaceWith(data);
                    }                                      
                }); 
        }                         
        else
        {           
          $('#divSelProfSem').hide();
        }
  });

  $('#addAsig').click(function(e)
  {                                    
        var contenido = $("textarea[name=contenido]").val();             
        var proposal_id = $("input[name=proposal_id]").val();                    
        
        var titulo = $("input[name=titulo]").val();   
        if(titulo != "")
        {
        $.ajax({                    
                    url: '/ajaxContenido',
                    type: 'POST',
                    data:{contenido:contenido, proposal_id:proposal_id},
                    dataType: 'html',
                    success:function(data)
                    {
                        console.log(data); 
                        document.getElementById('contenido').value = "";
                        $('#gridAsig').replaceWith(data);                        
                    }                    
                });    
        }
  });

  $('#selPeriod').change(function(e)
  {                                    
        var period_id = $("select[name=period_id]").val();             
                
        $.ajax({                    
                    url: '/ajaxStudents',
                    type: 'POST',
                    data:{period_id:period_id},
                    dataType: 'html',
                    success:function(data)
                    {
                        console.log(data);                       
                        $('#divSelStu').replaceWith(data);                        
                    }                    
                });            
  });


});