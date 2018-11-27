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
<?php 
if ($main=='home'){ ?>
<meta name="abstract" content="A complete web services"/>
<meta name="page-topic" content="Web Designer India, Web Designer Amritsar, Web Designer Punjab, Web Hosting Amritsar, SEO Amritsar"/>
<meta name="page-type" content="Web Designer India, Web Designer Amritsar, Web Hosting, SEO Amritsar"/>
<meta name="author" content="Brute Corp Team"/>
<meta name="site" content="web designing amritsar"/>
<meta name="copyright" content="Copyright 2013, Brute Corp, brutecorp.com"/>
<meta name="distribution" content="Global" />
<meta name="robots" content="index, follow" />
<meta name="revisit-after" content="2 days" />
<meta name="google-site-verification" content="rdOB_9Shr_ss23oPWtQ_9J0kMVTjxNSkqswDxN3QoAk" />

<?php }
}