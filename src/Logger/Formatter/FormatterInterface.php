<?php

namespace Dez\Logger\Formatter;

use Dez\Logger\Collection\ArrayCollection;

/**
 * Interface FormatterInterface
 * @package Dez\Logger\Formatter
 */
interface FormatterInterface
{

  const PLACEHOLDER_MASK_DOUBLE_DOT = ':%s';

  const PLACEHOLDER_MASK_BRACKETS = '{%s}';

  /**
   * @param ArrayCollection $record
   * @return mixed
   */
  public function format(ArrayCollection $record);

}