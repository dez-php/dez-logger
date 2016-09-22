<?php

namespace Dez\Logger\Handler;

use Dez\Logger\Collection\ArrayCollection;

/**
 * Class EchoHandler
 * @package Dez\Logger\Handler
 */
class EchoHandler extends AbstractHandler {

  /**
   * @param ArrayCollection $record
   * @return null
   */
  public function handle(ArrayCollection $record)
  {
    echo $this->getFormatter()->format($record) . PHP_EOL;

    return true;
  }

}