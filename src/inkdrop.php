<?php
require_once('workflows.php');

class Inkdrop {
  private $hostname;
  private $port;
  private $username;
  private $password;

  function __construct ( $hostname, $port, $username, $password ) {
    $this->hostname = $hostname;
    $this->port = $port;
    $this->username = $username;
    $this->password = $password;
  }

  public function search($query) {
    $wf = new Workflows();

    $authOptions = [CURLOPT_USERPWD => "{$this->username}:{$this->password}"];

    $baseUrl = "http://{$this->hostname}:{$this->port}";
    $json = $wf->request($baseUrl."/notes/?limit=20&keyword=".urlencode( $query ), $authOptions);
    $json = json_decode($json);
    $int = 1;

    foreach( $json as $sugg ):
      $data = $sugg;
      $noteId = $data->{'_id'};
      $bookId = $data->bookId;
      $book = json_decode($wf->request($baseUrl."/".$bookId, $authOptions));
      $uri = 'inkdrop://'.str_replace(':', '/', "{$noteId}");
      $wf->result($int.'.'.time(), $uri, $data->title, $book->name, 'icon.png');
      $int++;
    endforeach;

    $results = $wf->results();
    if ( count( $results ) == 0 ):
      $wf->result( 'inkdrop', $query, 'No notes found', 'No notes found. Search Inkdrop for '.$query, 'icon.png' );
    endif;

    return $wf->toxml();
  }

  function buildUri($noteId) {
    $uri = 'inkdrop://'.str_replace(':', '/', "{$noteId}");

    return $uri;
  }

  public function create($title, $body, $notebook, $tags) {
    $wf = new Workflows();

    $options = [
      CURLOPT_USERPWD => "{$this->username}:{$this->password}",
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
      CURLOPT_POSTFIELDS => json_encode( array(
        "doctype" => "markdown",
        "bookId" => $notebook,
        "status" => "active",
        "share" => "private",
        "title" => trim($title),
        "body" => trim($body),
        "tags" => $tags,
      ) ),
    ];
    $baseUrl = "http://{$this->hostname}:{$this->port}";

    $result = $wf->request($baseUrl."/notes", $options);
    $result = json_decode($result);

    return boolval($result->{'ok'});
  }
}
