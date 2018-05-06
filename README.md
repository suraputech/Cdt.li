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
<ul>
     <li> Light weight, asyncronous and powerful social sharing widget </li>
     <li> Easy intigration in any webpage. </li> 
     <li> Widget loads after all page content, no effect on performance </li>    
    </ul>
<pre>
&lt;div id="cdt_widget"&gt;&lt;/div&gt;
&lt;script async src="//cdt.li/widget.js"&gt;&lt;/script&gt;
</pre>

