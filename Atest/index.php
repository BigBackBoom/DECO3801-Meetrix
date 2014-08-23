<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Starkbook Demo | Google like seach engine with jQuery,PHP and MySQL.</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<!-- Include javascript and CSS once -->
		<link href="css/dark.css" rel="stylesheet" type="text/css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
		<script src="js/stark.js" type="text/javascript"></script>
		<!-- Required HTML -->
<link href="css/style.css" type="text/css" rel="stylesheet"/>
<link href="css/reset.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.watermark.js"></script>
<script type="text/javascript">
 
 
      $(document).ready(function() {

$("#faq_search_input").watermark("Search Here");

$("#faq_search_input").keyup(function()
{
var faq_search_input = $(this).val();
var dataString = 'keyword='+ faq_search_input;
if(faq_search_input.length>3)

{
$.ajax({
type: "GET",
url: "ajax-search.php",
data: dataString,
beforeSend:  function() {

$('input#faq_search_input').addClass('loading');

},
success: function(server_response)
{

$('#searchresultdata').html(server_response).show();
$('span#faq_category_title').html(faq_search_input);

if ($('input#faq_search_input').hasClass("loading")) {
 $("input#faq_search_input").removeClass("loading");
        } 

}
});
}return false;
});
});
	  
</script>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/stark.css">
		
<style>
.maincontnr
{
/*background: none repeat scroll 0 0 #F9F9F9;*/
background: none repeat scroll 0 0 #ffffff;
    border: 1px solid #CCCCCC;
	min-height:800px;
    margin: 27px auto 0;
    width: 980px;
}
.maincontnr h1
{
background: none repeat scroll 0 0 #B3D4FC;
    margin: 50px 20px;
    text-align: center;

}
.header-container, .footer-container, .main aside {
    background: none !important;
    margin-top: 30px;
}
.cssselector
{
border: 1px solid #CCCCCC;
    box-shadow: 0 0 6px #D1CFD5 inset;
    float: left;
    margin-left: 86px;
    margin-top: 20px;
    min-height: 295px;
    padding: 30px;
    width: 300px;
}
.footer-container, .main aside {
    border-top: 20px solid #3B5998;
    clear: both;
}
.header-container, .footer-container, .main aside {
    background: none repeat scroll 0 0 #A7A7A7;
    margin-top: 0px !important;
}
.cssselector h3
{
    font-size: 20px;
    font-weight: bold;
    margin: 0px;
}
.cssselector ul {
    margin: 0 0 15px 25px;
}

		

</style>
    </head>
    <body>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=402976049765077";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        		<div id="sbBarHolder" class="slim">
        <div class=" fixed_elem" id="sbBar">
							<div class="sbsearch">
	<li id="search-7" class="widget widget_search"><form role="search" method="get" id="searchform" action="http://www.starkbook.com/">
	<div class="sbsearchbox">
	<input name="s" id="s" placeholder="search" style="padding: 1px 1px 1px 5px; color: #828282;width: 300px;border:none;border-right:1px solid #ccc;" type="text"><input id="searchsubmit" placeholder="search" value="" style="background:#fff; border-radius: 0 0 0 0;width:20px;background-image: url(https://s-static.ak.fbcdn.net/rsrc.php/v1/yV/r/wPWUfETd_cS.png) !important; background-position: -2px -44px; border:none;margin-top:2px;" type="submit"/>
	<!--<input type="submit" id="searchsubmit" value="Search" />-->
	</div>
	</form></li>
			</div>
        </div>
      </div>
	  </div>
       

        		
			 
			
		
	
                  
            <div class="faqsearch">
			
              <div class="faqsearchinputbox">
                <!-- The Searchbox Starts Here  -->
                <input  name="query" type="text" id="faq_search_input" class="searchboxa"/>
				
                <!-- The Searchbox Ends  Here  -->
              </div>
			  			  <div class="sbdvjkdsv">
			  <a href="" class="" data-show-count="false"></a></div>

</div>
            
			            <div id="searchresultdata" class="faq-articles">

			</div>
                  <div class="clearfix"> </div>
      
               

</body></html>