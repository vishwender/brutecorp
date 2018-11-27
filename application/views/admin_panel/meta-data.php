<?php
//add global keywords for all pages
$keywords = "";
//add global description for all pages
$description = "";

if(isset($no_cache)){
    echo '<meta name="googlebot" content="noarchive" />'."\n";
}else{
?>
<meta name="keywords" content="<?php echo isset($meta_keywords) && !empty($meta_keywords)? $meta_keywords: $keywords;?>" />
<meta name="description" content="<?php echo isset($meta_description) && !empty($meta_description)? $meta_description: $description;?>" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php }