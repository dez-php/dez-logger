<?php

namespace Dez\Logger\Formatter;

use Dez\Logger\Collection\ArrayCollection;

/**
 * Class JsonFormatter
 * @package Dez\Logger\Formatter
 */
class JsonFormatter extends AbstractFormatter
{

  /**
   * @var bool
   */
  protected $prettyPrint = false;

  /**
   * JsonFormatter constructor.
   * @param bool $prettyPrint
   */
  public function __construct($prettyPrint = false)
  {
    $this->prettyPrint = $prettyPrint;
  }

  /**
   * @param ArrayCollection $record
   * @return string
   */
  public function format(ArrayCollection $record)
  {
    return json_encode($this->prepare($record), ($this->prettyPrint ? JSON_PRETTY_PRINT : 0));
  }

}