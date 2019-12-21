<?php
if (isset($_GET['ayat']) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'http://sonnylab.com/api/alkitab/'.urlencode($data4[1]));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; rv:53.0) Gecko/20100101 Firefox/53.0');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
    "Accept-Language: en-US,en;q=0.5",
    "Cookie: __smVID=dc2213dd768adc75be8e4f0b8b691ff54325813eb1f4bcf0502678a603688282; __smToken=UlC15MgVUH2f1O5ehBHX96rs; _ga=GA1.2.1471615326.1496310604; _gid=GA1.2.1894082335.1496310604; slim_session=a%3A1%3A%7Bs%3A10%3A%22slim.flash%22%3Ba%3A0%3A%7B%7D%7D"
  ));
  $result = curl_exec($ch);
  $json   = json_decode($result,true);
  curl_close($ch);
  $count = count($json);
  for($i=0;$i<$count;$i++) {
    $filter = str_replace('<span id="r">','',$json[$i]['text']);
    $filterb = str_replace('</span>','',$filter);
    
    echo '['.$json[$i]['bookname'].' '.$json[$i]['chapter'].':'.$json[$i]['verse'].'] '.$filterb.'<br/>';
  }
}
?>
