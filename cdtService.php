<?php
class cdtService
  {
    private $key;
    private $ip;
    private $url;
    public $short_url;
    private $endpoint = "cdt.li/api/";
    private $private = 0;
    private $analytics = 0;
    function __construct($key)
      {
        $this->ip  = $this->getIp();
        $this->key = $key;
      }
    
    public function getShortUrl($url)
      {
        $this->url = $url;
        $api       = $this->buildApi();
        $curl      = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $api,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0'
        ));
        // Send the request & get short url as response 
        $shorted_url = curl_exec($curl); //Shorted URL
        $this->setErrorStatus(curl_getinfo($curl, CURLINFO_HTTP_CODE));
        curl_close($curl);
        return $shorted_url;
      }
    
    public function getErrorInfo()
      {
        return $this->error;
      }
    public function setPrivate($value){
      if($value){
        $this->private = 1;
      }  
    }
    public function enableAnalytics($value){
        if($value){
            $this->analytics = true;
        }
      }    
    public function setErrorStatus($status)
      {
        switch ($status)
        {
            case "200":
                break;
            case "400":
                $this->error = "Bad request";
                break;
            case "401":
                $this->error = "Not authorized";
                break;
            case "403":
                $this->error = "Forbidden";
                break;
            case "404":
                $this->error = "Not Found";
                break;
            case "408":
                $this->error = "Request Timed out";
                break;
            case "500":
                $this->error = "Internal Server Error";
                break;
        }
      }
    
    private function getProtocol()
      {
        
        if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443)
          {
            
            return 'https://';
          }
        return 'http://';
      }
    private function buildApi()
      {
        $api = $this->getProtocol . $this->endpoint . $this->key . '/' . $this->url . '/' . $this->private . '/' . $this->analytics;
        return $api;
      }
    
    private function getIp()
      {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) //check ip from share internet
          {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
          }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) //to check ip is pass from proxy
          {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
          }
        else
          {
            $ip = $_SERVER['REMOTE_ADDR'];
          }
        return $ip;
      }
  }
?>
