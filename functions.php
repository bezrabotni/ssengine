<?php

// It may take a whils to crawl a site ...
set_time_limit(10000);

// Inculde the phpcrawl-mainclass
include("libs/PHPCrawler.class.php");

function getTextBetweenTags($string, $tagname) {
    preg_match( "/\<{$tagname}\>(.*)\<\/{$tagname}\>/", $string, $matches);
    return $matches[1];
}


function searchsite($url,$query)
{
// Extend the class and override the handleDocumentInfo()-method
class MyCrawler extends PHPCrawler
{
  function handleDocumentInfo($DocInfo)
  {
    global $query;
    global $url;
    // Just detect linebreak for output ("\n" in CLI-mode, otherwise "<br>").
    if (PHP_SAPI == "cli") $lb = "\n";
    else $lb = "<br />";
    $before="/(.*";
    $after=".*)/";
    $q=$before.$query.$after;
    //$query= '/(.*diskriminaciju.*)/';
    preg_match($q,$DocInfo->content,$matches,PREG_OFFSET_CAPTURE, 3);
    if ($matches && $DocInfo->received == true)
    {
      echo "<div style='margin-left:10px'>";
      //$titlexpr="/<title[^>]*>(.*?)</title>/";
      //preg_match($titlexpr,$DocInfo->content,$sitetitle,PREG_OFFSET_CAPTURE, 3);
      $sitetitle=getTextBetweenTags($DocInfo->content, "title");
      echo "<a href='".$DocInfo->url."'> <h4>".$sitetitle."</h4></a>";
      echo "<p style='color:green;'>".$DocInfo->url." - (".$url.") </p>";
      $desc=implode("...",$matches[0]);
      $sitetitle="~<[a-zA-Z]*>|</[a-zA-Z]*>~";
      preg_replace($sitetitle, " ", $desc);
      print_r($desc);
      echo "<hr style='color:border-top: 1px solid #aaaaaa;'>";
      echo "</div>";
    }
    // Now you should do something with the content of the actual
    // received page or file ($DocInfo->source), we skip it in this example

    flush();
  }
}


  // Now, create a instance of your class, define the behaviour
  // of the crawler (see class-reference for more options and details)
  // and start the crawling-process.

  $crawler = new MyCrawler();

  // URL to crawl
  $crawler->setURL($url);

  // Only receive content of files with content-type "text/html"
  $crawler->addContentTypeReceiveRule("#text/html#");

  // Ignore links to pictures, dont even request pictures
  $crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png)$# i");

  // Store and send cookie-data like a browser does
  $crawler->enableCookieHandling(true);

  // Set the traffic-limit to 1 MB (in bytes,
  // for testing we dont want to "suck" the whole site)
  $crawler->setTrafficLimit(1000 * 1024);

  // Thats enough, now here we go
  $crawler->go();

  // At the end, after the process is finished, we print a short
  // report (see method getProcessReport() for more information)
  $report = $crawler->getProcessReport();

  if (PHP_SAPI == "cli") $lb = "\n";
  else $lb = "<br />";

  echo "Summary:".$lb;
  echo "Links followed: ".$report->links_followed.$lb;
  echo "Documents received: ".$report->files_received.$lb;
  echo "Bytes received: ".$report->bytes_received." bytes".$lb;
  echo "Process runtime: ".$report->process_runtime." sec".$lb;
}


?>
