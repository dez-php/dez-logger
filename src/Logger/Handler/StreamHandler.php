<?php

namespace Dez\Logger\Handler;

use Dez\Logger\Collection\ArrayCollection;
use Dez\Logger\Handler\Mask\LogLevelMask;

/**
 * Class StreamHandler
 * @package Dez\Logger\Handler
 */
class StreamHandler extends AbstractHandler {

  /**
   * @var null|string
   */
  protected $file = null;

  /**
   * StreamHandler constructor.
   * @param $filepath
   * @param int $level
   */
  public function __construct($filepath, $level = LogLevelMask::MASK_ALL)
  {
    parent::__construct($level);
    $this->file = realpath($filepath);
  }

  /**
   * @param ArrayCollection $record
   * @return null
   */
  public function handle(ArrayCollection $record)
  {
    file_put_contents($this->file, $this->formatter->format($record) . PHP_EOL, FILE_APPEND);

    return true;
  }


}