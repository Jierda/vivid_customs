<?php

     $data = explode('*',file_get_contents("php://input"));	
     $route = dirname(__FILE__).'/user';
     if (!is_dir($route)) {
	   mkdir($route);
	}
	/*else
	{
		array_map('unlink', glob($route));
	}*/

    //rmdir($absolute_path.'/user');    

	

     for ($i=0; $i < count($data) -1 ; $i++) {     
           		
     	$filteredData = substr($data[$i], strpos($data[$i], ",")+1);        
		 $decodedData=base64_decode($filteredData);

	    $name = "";        
	   	switch ($i) {
	   		case 0:
	   			$name = "front";
	   			createFile($decodedData,1,$name,$route);  	
	   			break;
	   		case 1:
	   			$name = "right";
	   			createFile($decodedData,1,$name,$route);  	
	   			break;
			case 2:
					$name = "back";
					createFile($decodedData,1,$name,$route);  	
	   			break;
	   		case 3:
					$name = "left";
					createFile($decodedData,1,$name,$route);  	
	   			break;
	   		default:
	   			$name = "user".rand(1000,9999);	   	
	   			createFile($decodedData,0,$name,$route);  			
	   			break;
	   	}	   	           	   
    }    
   
	$file = 'file.json';
	file_put_contents($route.'/'.$file, $data[count($data)-1]);

        
	function createFile($decodedData,$resolution,$filename,$route)
	{        
	    //$fic_name = 'image_'.rand(1000,9999).'.png';
	    $fic_name = $route.'/'.$filename.'.png';        
	    $fp = fopen($fic_name, 'wb');
	    $ok = fwrite( $fp, $decodedData);
	    fclose( $fp );
	    if($resolution == 1)
	    {
	        setImageResolution($fic_name,$filename,$route);
	       
	    }      
	}


function setImageResolution($imagePath,$filename,$route)
{	
    $imagick = new Imagick(realpath($imagePath));  
	$imagick->setImageUnits(Imagick::RESOLUTION_PIXELSPERINCH);	
	$imagick->resampleImage  (300,300,imagick::FILTER_UNDEFINED,1);

	$combined   =   new Imagick();
	$combined->addImage( $imagick );
	$combined->setImageFormat("pdf");   
	file_put_contents ($route.'/'.$filename.".pdf", $combined); 	
	unlink($route.'/'.$filename.".png");	
		
	}
?>