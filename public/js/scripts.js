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

  //Función que cambia el valor del IVA según la selección del combo de productos
  $('#producto').change(function(e)
  { 
    var producto = $("select[name=producto]").val();
            
      $.ajax({                    
            url: '/ajaxIva',
            type: 'POST',
            data:{producto:producto},
            dataType: 'html',
              success:function(data)
                {
                  console.log(data);                         
                  $('#divIvaOculto').replaceWith(data);
                }                    
      });            
  });

  //Función que agrega productos al detalle de la factura
  $('#btnAgregaProducto').click(function(e)
  { 
    var factura = $("input[name=factura_id]").val();
    var producto = $("select[name=producto]").val();
    var cantidad = $("input[name=cantidad]").val();
    var precio = $("input[name=precio]").val();
    var iva = $("input[name=iva]").val();
    var accion = "agregar";

    verificaExistente(document.getElementById('producto'));

      $.ajax({                    
            url: '/ajaxActualizaProductos',
            type: 'POST',
            data:{factura:factura, producto:producto, cantidad:cantidad, precio:precio, iva:iva, accion:accion},
            dataType: 'html',
              success:function(data)
              {
                console.log(data);                         
                $('#divTablaProductos').replaceWith(data);
              }                    
      });                
  });

  //Función que elimina productos del detalle de la factur
  $('#btnEliminaProducto').click(function(e)
  {   
        var factura = $("input[name=factura_id]").val();
        var detalle_factura = $("input[name=detalle_id]").val();
        var accion = "eliminar";
            
        $.ajax({                    
              url: '/ajaxActualizaProductos',
              type: 'POST',
              data:{factura:factura,detalle_factura:detalle_factura, accion:accion},
              dataType: 'html',
                success:function(data)
                {
                  console.log(data);                         
                  $('#divTablaProductos').replaceWith(data);
                }                    
        });                
  });


}); //document ready function