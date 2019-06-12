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
});
