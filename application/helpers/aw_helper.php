<?php
/**
 * @author prabhjeet
 * @copyright 2010
 */
function aw_css_minify($filename) {
    $css = implode('',file($filename));
    $css = preg_replace('/\s+/', ' ', $css);
    $css = preg_replace('/\/\*.*?\*\//', '', $css);
    $css = preg_replace('/\}/', '}'.chr(13), $css);
    return trim($css);
}
// --------------------------------------------------------------------
function aw_password($string, $size=32){
    $salt = 'SL`)6PUMblz<ei%26Z)LH_m%24_%26vu'.'admin123';
    $string = sha1($string.$salt);
	return substr($string,0,$size);
}
// --------------------------------------------------------------------
function aw_profile_image($image){
    
	if (empty($image))
	$image_url=aw_config_item('front_images').'images/profile_default.jpg';
	else
	$image_url=aw_config_item('front_images').'user_image/'.$image;
	return $image_url;
}
// --------------------------------------------------------------------
function limit_words($string, $word_limit)
{
$words = explode(" ",$string);
return implode(" ",array_splice($words,0,$word_limit));
}
// --------------------------------------------------------------------
/**
 * Ad display size: 125x125
 *
 * Takes image name and display ad
 *
 * @access	public
 * @param	string
 * @return	image
 */	
function ad($image, $url=''){
    $ad = array(
            'src' => aw_config_item('sidebar_ads').$image,
            'style' => 'margin-right:5px;margin-top:10px;margin-left:5px;',
             'width' => '125',
            'height' => '125',
            'class' => 'ad'
        );
        
    if(!empty($url)){
        echo anchor($url,img($ad), 'target=_blank');    
    }else{
        echo img($ad);
    }
}
function create_embed_video($code){
	
	$data = '<iframe width="300" height="200" src="//www.youtube.com/embed/'. $code . '" frameborder="0" allowfullscreen></iframe>';
	
	return $data;
}		
//-----------------------------------------------------------
function create_embed_thumb($code){
	
	$data = '<img src="http://img.youtube.com/vi/'.$code.'/0.jpg" width="120" height="90">';
	
	return $data;
}		
function aw_converted_date($sql_date) {
            $date=strtotime($sql_date);
            $final_date=date("M j", $date);
            return $final_date;
            }
			function aw_convt_date($sql_date) {
            $date=strtotime($sql_date);
            $final_date=date("M j, Y", $date);
            return $final_date;
            }
			
			
function aw_time_elapsed($ptime)
{
    $etime = time() - $ptime;
    if ($etime < 1)
    {
        return '0 seconds';
    }
    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
                );
    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
        }
    }
}
// --------------------------------------------------------------------
function remove_accent($str)
{
  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?');
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
  return str_replace($a, $b, $str);
}
function convert_to_hyphen($str)
{
  return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), remove_accent($str)));
} 
// --------------------------------------------------------------------
/**
 * Hyphen
 *
 * Takes multiple words separated by spaces and hyphen them
 *
 * @access	public
 * @param	string
 * @return	str
 */	
if ( ! function_exists('hyphen'))
{
	function hyphen($str)
	{
	   $strz = str_replace("'", "", $str);
       $strz = preg_replace('/[\/"-#?@^*()\[\]{}|]+/', '', strtolower(trim($strz)));
		return preg_replace('/[\s]+/', '-', strtolower(trim($strz)));
	}
}
// ------------------------------------------------------------------------
/**
 * AW Word Limiter
 *
 * Limits a string to X number of words.
 *
 * @access	public
 * @param	string
 * @param	integer
 * @param	string	the end character. Usually an ellipsis
 * @return	string
 */	
if ( ! function_exists('aw_word_limiter'))
{
	function aw_word_limiter($str, $limit = 100, $end_char = '...')
	{
		if (trim($str) == '')
		{
			return $str;
		}
	
		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);
			
		if (strlen($str) == strlen($matches[0]))
		{
			$end_char = '';
		}
		
		return rtrim($matches[0]).$end_char;
	}
}
// --------------------------------------------------------------------
/**
 * AW Trim String
 *
 * Trim Spaces Between a String
 *
 * @access	public
 * @param	string
 * @return	string
 */	
function aw_trim_string($str)
{
    $ret_str ="";
    $str = trim($str);
    for($i=0;$i < strlen($str);$i++)
    {
        if(substr($str, $i, 1) != " ")
        {
            $ret_str .= trim(substr($str, $i, 1));
        }
        else
        {
            while(substr($str,$i,1) == " ")
          
            {
                $i++;
            }
            $ret_str.= " ";
            $i--; // ***
        }
    }
    return $ret_str;
} 
// --------------------------------------------------------------------
function aw_meta($string=''){
    $meta = "";
    $meta = aw_word_limiter($string,100);//show only upto 100 chars
    $meta = aw_trim_string($meta);//Remove White Spaces between string's words
    $meta = strip_tags($meta);//Strip HTML and PHP tags from a string
    return $meta;
}
// --------------------------------------------------------------------
/**
 * TWITTER
 *
 * Takes a string and split into arrays, then again convert each splitted array into modified strings 
 *
 * @access	public
 * @param	string
 * @return	array
 */	
function aw_twitters($list){
	
	$data = array();
	
	$listings = explode(',',$list);
	
	//coverting arrays into strings
	foreach($listings as $twitter){
		//remove blank spaces from middle, start and beginning of each string
		$trimmed = trim($twitter);	
		$trimmed = str_replace(" ", "", $trimmed);
		//check if the link "http://twitter.com/" found in the string and return true/same string
		$httpTwit = strstr($trimmed, "http://twitter.com/");
		//check if the link "http://www.twitter.com/" found in the string and return true/same string
		$wwwTwit = strstr($trimmed, "http://www.twitter.com/");
		
		//check if return string has "www" included or not, and remove twritter address from string and retun only the name of the twitter account
		if($httpTwit == TRUE){
			$twitterLink = substr($httpTwit, 19);
            // return twitter name linked with twitter account
            $twitterAccounts[] = "<a href='{$trimmed}' target='_blank'>@{$twitterLink}</a>";
		}elseif($wwwTwit == TRUE){
			$twitterLink = substr($wwwTwit, 23);
            // return twitter name linked with twitter account
            $twitterAccounts[] = "<a href='{$trimmed}' target='_blank'>@{$twitterLink}</a>";
		}elseif(!empty($twitter)){
		    $twitterLink = $twitter;
            // return twitter name linked with twitter account
            $twitterAccounts[] = "<a href='http://twitter.com/{$trimmed}' target='_blank'>@{$twitterLink}</a>";
		}else{
		  $twitterAccounts[] = '';
		}
	}
    
    $count = count($twitterAccounts);
    for($i = 0; $i < $count; $i++){
        if($twitterAccounts[$i] !== $twitterAccounts[$count - 1])
        {
            echo $twitterAccounts[$i] . ', ';
        }else{
            echo $twitterAccounts[$i];
        }
    }
    
	//return $data;
}
//------------------------------------------------------------------
//Display Affiliate Managers Data (IM-ids, online/offline status)
function aw_messengers($network_details){
    if(isset($_SESSION['totalSubArrays']))
    {
        $total =  $_SESSION['totalSubArrays'];
        unset($_SESSION['totalSubArrays']);
        for($i=0; $i<$total; $i++){
            $base = base_url().'resources/images/front-end/';
            
            //check if AIM id is available then diplay
            $aim = $network_details[$i]['manager_aim'];
            if($aim == NULL){
                echo "<a id='aim'></a>";
                echo "AIM: N/A";
            }else{
                echo "<a id='aim'></a>";
                echo "AIM: <img src='http://big.oscar.aol.com/{$network_details[$i]['manager_aim']}?on_url={$base}aim_online.gif&off_url={$base}aim_offline.gif' border='0' width='17' height='16' />";
                echo " <a href='aim:GoIM?screenname={$network_details[$i]['manager_aim']}'>{$network_details[$i]['manager_firstname']} {$network_details[$i]['manager_lastname']}</a>";    
            }
            
            echo '<br />';
            //check if YAHOO id is available then diplay
            $yahoo = $network_details[$i]['manager_yahoo'];
            if($yahoo == NULL){
                echo "<a id='yahoo'></a>";
                echo "Yahoo: N/A";
            }else{
                echo "<a id='yahoo'></a>";
                echo "Yahoo: <a href = 'ymsgr:sendim?{$network_details[$i]['manager_yahoo']}'>  <img src='http://opi.yahoo.com/online?u={$network_details[$i]['manager_yahoo']}&m=g&t=5' border=0> {$network_details[$i]['manager_firstname']} {$network_details[$i]['manager_lastname']}</a>";
            }
            echo '<br />';
            
            //check if SKYPE id is available then diplay
            $skype = $network_details[$i]['manager_skype'];
            if($skype == NULL){
                echo "<a id='skype'></a>";
                echo "Skype: N/A";
            }else{
                echo "<a id='skype'></a>";
                echo "Skype: <a href='skype:{$network_details[$i]['manager_skype']}?chat'><img src='http://mystatus.skype.com/smallicon/{$network_details[$i]['manager_skype']}' style='border: none;' alt='My status' /> {$network_details[$i]['manager_firstname']} {$network_details[$i]['manager_lastname']}</a>";
            }
                        
            if($network_details[$i] !== $network_details[$total - 1])
            {
                echo '<br />....................................................................<br /> ';
            }       
        }// end foreach loop
    }
}
//------------------------------------------------------------------
/**
 * CONVERT DATE
 *
 * Convert dates 
 *
 * @access	public
 * @param	mysql datetime
 * @return	formatted date, time or datetime
 */	
            function aw_convert_date($sql_date) {
            $date=strtotime($sql_date); $final_date='';
			if (!empty($sql_date))
            $final_date=date("F j, Y", $date);
            return $final_date;
            }
//-------------------------------------------------------------------
/**
 * CONFIG ITEM
 *
 * For finding config items 
 *
 * @access	public
 * @param	config item name
 * @return	config item
 */
function aw_config_item($item_name){
    $CI =& get_instance();
    return $CI->config->item($item_name);
	
}
/*
function aw_config_item($item_name){
    $CI =& get_instance();
    return $CI->config->item($item_name);
}*/
//---------------------------------------------------------------------
/**
 * RANDOM STRING GENERATE
 *
 * generate random string for activation key
 *
 * @access	public
 * @return	string
 */
function aw_random_string($username=""){
    $randomstring = md5($username.time());
    return $randomstring;
}
//---------------------------------------------------------------------
/**
 * REVIEW STARS
 *
 * display stars for different locations for networks
 *
 * @access	public
 * @return	string
 */
function aw_stars($overall_counting=0, $star_rows=0, $total_reviews=0, $disabled_value = FALSE){
	
    if($disabled_value == TRUE){
        $disabled = "disabled='disabled'";
    }else{
        $disabled = '';
    }
    
    $stars_in_row = 5; // how many stars in per row
    
	//get percentage
	//$result_counting = $result_countings * $total_users;
	$total_stars = $star_rows *  $stars_in_row  * $total_reviews;
    //echo $total_stars;
    if($total_stars !== 0){
    	$get_result = ($overall_counting * 100) / $total_stars;
    	$result = round($get_result);	
    	
    	//return $result;
    	switch($result){
    	   
           case ($result == 0):
    		//display one star
    		return "
            <form>
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled /></form>";
    
    		break;
           
    		case ($result >=1 && $result <=20 ):
    		//display one star
    		return "
            <form>
    		<input type='radio' name='total1' class='star' $disabled checked='checked'/>
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled /></form>";
    
    		break;
    		
    		case ($result >=21 && $result <=40 ):
    		//display 2 stars
    		return "<form>
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled checked='checked'/>
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled /></form>";
    		break;
    		
    		case ($result >=41 && $result <=60 ):
    		//display 3 stars
    		return "<form>
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled checked='checked'/>
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled /></form>";
    		break;
    		
    		case ($result >=61 && $result <=80 ):
    		//display 4 stars
    		return "<form>
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled checked='checked'/>
    		<input type='radio' name='total1' class='star' $disabled /></form>";
    		break;
    		
    		case ($result >=81 && $result <=100 ):
    		//display 5 stars
    		return "<form>
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled checked='checked'/></form>";
    		break;
    	}
     }else{
        return "<form>
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled />
    		<input type='radio' name='total1' class='star' $disabled /></form>";
    }
}
