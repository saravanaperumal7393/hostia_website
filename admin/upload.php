<?php
//If directory doesnot exists create it.
$output_dir = "products/";
require_once('../connection.php');
//include("../resize.php"); 
$image_path = "watermark.png";
$image_path1 = "strip1.png";
//$water_mark_text_2 = $_REQUEST["pdt_name"];
$font_path = "trebuc.ttf";
$font_size = 35;

function watermark_image($oldimage_name, $new_image_name){
    global $image_path,$font_path, $font_size, $water_mark_text_1, $water_mark_text_2,$image_path1;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = 1400; $height = 1400;    
	list($image_width, $image_height) = getimagesize($oldimage_name);
	
		//if($image_width>$width || $image_height >$height){
			$proportions = $image_width/$image_height;
			
			if($image_width>$image_height){
				if($image_width<$width) 
				{
				$new_width=$image_width;
				$new_height=$image_height;
				}
				else
				{
				 $new_width = $width;
				 $new_height = round($width/$proportions);
				}
				
			}		
			else{
				if($image_height<$height) {
					 $new_height=$image_height;
					 $new_width=$image_width;
				}
				else {
					$new_height = $height;
				$new_width = round($height*$proportions);
				}
			}			
    $im = imagecreatetruecolor($new_width, $new_height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $new_width, $new_height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);  
	//$watermark1 = imagecreatefrompng($image_path);
   // list($w_width, $w_height) = getimagesize($image_path);
	$blue = imagecolorallocate($im, 0, 0, 0);
//	$yy=($new_height/2)-25 ;
//	$xx=($new_width-650)/2 ;
   // imagettftext($image, $font_size, 0, 30, 190, $black, $font_path, $water_mark_text_1);
 //  	imagecopy($im, $watermark1, $xx, $yy, 0, 0, $w_width, $w_height);
  //  imagettftext($im, $font_size, 0, 280, 655, $blue, $font_path, $water_mark_text_2);      
    $pos_x = $new_width - $w_width; 
    $pos_y = $new_height - $w_height;
   // imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $new_image_name, 100);
    imagedestroy($im);
    unlink($oldimage_name);
		//}
    return true;
}

if(isset($_FILES["myfile"]))
{
	
	$ret = array();

	$error =$_FILES["myfile"]["error"];
   {
    
    	if(!is_array($_FILES["myfile"]['name'])) //single file
    	{
              $path = "products/";
			   $remove_these = array(' ','`','"','\'','\\','/');
			  $new_name = str_replace($remove_these,'',$_FILES['myfile']['name']);
			  $new_name = time()."-".$new_name;
				// $new_name = $_FILES['myfile']['name'].time().".jpg";
				  $ret[$NewImageName]= $path.$new_name;
	  move_uploaded_file($_FILES['myfile']['tmp_name'], $path.$_FILES['myfile']['name']);
    
		
        
        if(watermark_image($path.$_FILES['myfile']['name'], $path.$new_name))
                $demo_image = $path.$new_name;
								//if(watermark_text($demo_image, $new_name))
               // $demo_image = $new_name;
                
   

		//$path1=makeimage($demo_image,'thumbnail_','thumbnail/',400,300);
	$intQuery="insert into tbl_images(Product_id,Product_image,thumb_image)values('". $_POST['pid']."','".$path.$new_name."','". $path.$new_name."')";

mysqli_query($db,$intQuery);


    	}
    	else
    	{
            $fileCount = count($_FILES["myfile"]['name']);
    		for($i=0; $i < $fileCount; $i++)
    		{
				 $path = "products/";
				 $remove_these = array(' ','`','"','\'','\\','/');
		$new_name = str_replace($remove_these,'',$_FILES['myfile']['name']);
		$new_name = time()."-".$new_name;
				// $new_name = $_FILES['myfile']['name'][$i].time().".jpg";
				  $ret[$NewImageName]= $path.$new_name;
	  move_uploaded_file($_FILES['myfile']['tmp_name'][$i], $path.$_FILES['myfile']['name'][$i]);
   
		
        
        if(watermark_image($path.$_FILES['myfile']['name'][$i], $path.$new_name))
                $demo_image = $path.$new_name;
								//if(watermark_text($demo_image, $new_name))
               // $demo_image = $new_name;
                
  

		//$path1=makeimage($demo_image,'thumbnail_','thumbnail/',400,300);
                
	$intQuery="insert into tbl_images(Product_id,Product_image,thumb_image)values('". $_POST['pid']."','".$path.$new_name."','". $path.$new_name."')";

mysqli_query($db,$intQuery);


    		}
    	}
    }
    echo json_encode($ret);
 
}

?>