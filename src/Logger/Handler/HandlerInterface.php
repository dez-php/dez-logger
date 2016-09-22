<?php

namespace Dez\Logger\Handler;

use Dez\Logger\Collection\ArrayCollection;
use Dez\Logger\Formatter\FormatterInterface;

/**
 * Interface HandlerInterface
 * @package Dez\Logger\Handler
 */
interface HandlerInterface {

  /**
   * @param ArrayCollection $record
   * @return null
   */
  public function handle(ArrayCollection $record);

  /**
   * @param $level
   * @return boolean
   */
  public function levelAllow($level);

  /**
   * @return FormatterInterface
   */
  public function getFormatter();

  /**
   * @param FormatterInterface $formatter
   */
  public function setFormatter(FormatterInterface $formatter);

}