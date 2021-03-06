<?php

namespace Dez\Logger\Formatter;

use Dez\Logger\Collection\ArrayCollection;

/**
 * Class LineFormatter
 * @package Dez\Logger\Formatter
 */
class LineFormatter extends AbstractFormatter
{

  public function __construct($format = null)
  {
    if (null !== $format) {
      $this->setFormat($format);
    }
  }

  /**
   * @param ArrayCollection $record
   * @return string
   */
  public function format(ArrayCollection $record)
  {
    return $this->replace($this->getFormat(), $this->prepare($record));
  }

}