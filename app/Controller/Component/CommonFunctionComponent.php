<?php
class CommonFunctionComponent extends Component 
{

	var $components = array('Session','RequestHandler', 'Email'); 



    var $common_const = array(
		"uploaded" => "../../app/webroot/img/uploaded"
	);
	 var $common_product = array(
		"product_img" => "../../app/webroot/img/product_img/large"
	);
	 var $common_product_thumb = array(
		"product_img_thumb" => "../../app/webroot/img/product_img/thumb"
	);
	 var $my_temppath = array(
		"temp_thumb" => "../../app/webroot/img/temp"
	);
	var $my_realpath = array(
		"real" => "../../app/webroot/img"
	);
	var $page_range_options = array(
	"1" => 1,
	"2" => 2,
	"3" => 3,
	"4" => 4,
	"5" => 5,
	"6" => 6,
	"7" => 7,
	"8" => 8,
	"9" => 9,
	"10" => 10,
	"11" => 11,
	"12" => 12,
	"13" => 13,
	"14" => 14,
	"15" => 15,
	"16" => 16,
	"17" => 17,
	"18" => 18,
	"19" => 19,
	"20" => 20,
	"21" => 21,
	"22" => 22,
	"23" => 23,
	"24" => 24,
	"25" => 25,
	"26" => 26,
	"27" => 27,
	"28" => 28,
	"29" => 29,
	"30" => 30);
// added by Neha
	/**
	Are used for custom field type in admin section
	*/
	var $custom_field_types = array('text'=>'Textbox', 'textarea'=>'Textarea', 'radio'=>'radio', 'checkbox'=>'checkbox');
	
	
	/**
	Are used for number of button in admin section
	*/
	var $no_of_button  = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15');
	
    
    /*var $roles = array(
	"1" => "Admin",
	"2" => "SubAdmin");*/
	

    function parseSlug($string)
    {
		return low(Inflector::slug($string, '-'));
	}
function isUploadedFile($params)
	{
		$val = array_shift($params);
		
	  if ((isset($val['error']) && $val['error'] == 0) || (!empty($val['tmp_name']) && $val['tmp_name'] != 'none')) 
		{
			return true; //is_uploaded_file($val['tmp_name']);
		} else {
		  return false;
		}
	}
	
	
	function unlink_file($file_path)
	{
		if(file_exists($file_path) && (is_file($file_path)))
		{
			unlink($file_path);
		}
		return false;
	}
	
	function isfile_exists($file_path)
	{
		//echo $file_path;
        //die;
        if(file_exists($file_path) && (is_file($file_path)))
		{
			return true;
		}
		return false;
	}
	function getshopping_image($product_id){
	
	 $shopping_image = $this->ProductImage->find('first', array('conditions' => array("ProductImage.default" => 1,"ProductImage.product_id"=>$product_id)));
	}
	
	

}
?>