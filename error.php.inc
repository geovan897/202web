<?php

class errorLogger
{
  private $fp;
  public function __construct($outputfile = "/var/log/php.log")
  {
    $this->fp = fopen($outputfile,"a");
  }

  public function log($message)
  {
    fwrite($this->fp,$message.PHP_EOL);
  }

  public function __destruct()
  {
    fclose($this->fp);
  }
}

?>
