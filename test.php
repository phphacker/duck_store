<?php

$query = "http://news.yandex.ru/travels.rss";
$rss = file_get_contents($query);
$xml = new SimpleXMLElement($rss);

foreach ($xml->channel->item as $item) {
  echo '<h3>'. $item->title . '</h3>';
  echo $item->description . '<br><br><br>';
}
