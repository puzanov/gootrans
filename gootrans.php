<?

$tr = new Gootrans();
$tr->translate("dog likes cat", "en", "ru");

class Gootrans {
  var $user_agent = "Opera/9.80 (Windows NT 6.1; U; ru) Presto/2.8.131 Version/11.10";  
  var $cookie_file = "/tmp/cookie_torrent.txt";
  public function translate($text, $from, $to) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://translate.google.com");
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
    curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s
    curl_exec($ch); // run the whole process
    curl_setopt($ch, CURLOPT_URL, "http://translate.google.com/translate_a/t?client=t&text=%D0%BF%D1%80%D0%B8%D0%B2%D0%B5%D1%82&hl=ru&sl=en&tl=ru");
    $result = curl_exec($ch);
    var_dump($result);
    curl_close($ch);
  }
}

?>
