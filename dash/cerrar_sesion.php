		
<?php 
ini_set('display_errors', 'Off');
ini_set('display_startup_errors', 'Off');
error_reporting(0);

	session_start(); 

	  
	session_unset();
	session_destroy();  



	echo '
           
            <div class="alert alert-success">
                Se ha cerrado sesion con exito.
            </div>';
        
		
	

	
?>