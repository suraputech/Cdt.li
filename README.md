# Cdt.li
<h2>Free and Easy to use short URL service</h2>
<p>Below is the example code of php intigration of Cdt.li url shortener service </p>
<pre>
&lt;?php 
require($_SERVER["DOCUMENT_ROOT"]."/api/cdtService.php");
$cdt = new cdtService("JKLJHCXD78764"); //Secret Key
$cdt->setPrivate($true); //Optional
$cdt->enableAnalytics($true); //Optional
echo $cdt->getShortUrl("https://www.facebook.com"); //Get Short URL
?&gt;
</pre>
