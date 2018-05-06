# Cdt.Li Free and Easy to use URL shortener
<h2> Register for secret key at https://cdt.li </h2>
<h2>Free and Easy to use short URL service</h2>
<p>Below is the example code of php intigration of Cdt.li url shortener service </p>
<pre>
&lt;?php 
require($_SERVER["DOCUMENT_ROOT"]."/lib/cdtService.php");
$cdt = new cdtService("JKLJHCXD78764"); //Secret Key
$cdt->setPrivate($true); //Optional
$cdt->enableAnalytics($true); //Optional
echo $cdt->getShortUrl("https://www.facebook.com"); //Get Short URL
?&gt;
</pre>
<h3> Use Short URL widget </h3>

