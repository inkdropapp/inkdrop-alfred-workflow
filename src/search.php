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

    $baseUrl = "http://{$this->username}:{$this->password}@{$this->hostname}:{$this->port}";
    $json = $wf->request( $baseUrl."/notes/?limit=20&keyword=".urlencode( $query ) );
    $json = json_decode($json);
    $int = 1;

    foreach( $json as $sugg ):
      $data = $sugg;
      $noteId = $data->{'_id'};
      $bookId = $data->bookId;
      $book = json_decode($wf->request( $baseUrl."/".$bookId ));
      $uri = 'inkdrop://'.str_replace(':', '/', "${noteId}");
      $wf->result($int.'.'.time(), $uri, $data->title, $book->name, 'icon.png');
      $int++;
    endforeach;

    $results = $wf->results();
    if ( count( $results ) == 0 ):
      $wf->result( 'inkdrop', $query, 'No notes found', 'No notes found. Search Inkdrop for '.$query, 'icon.png' );
    endif;

    return $wf->toxml();
  }
}
