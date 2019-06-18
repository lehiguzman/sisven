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

  $('#addProducto').click(function(e)
  {   
        var producto_id = $("select[name=producto_id]").val();             
        var cantidad = $("input[name=cantidad]").val();                    
        var precio = $("input[name=precios]").val();                    
        var iva = $("input[name=iva]").val();
        
          $.ajax({                    
                    url: '/ajaxProductos',
                    type: 'POST',
                    data:{producto_id:producto_id, cantidad:cantidad, precio:precio, iva:iva},
                    dataType: 'html',
                    success:function(data)
                    {
                        console.log(data);                         
                        $('#divListaProductos').replaceWith(data);
                    }                    
                });    
        
  });

}); //document ready function