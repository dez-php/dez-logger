<?php

namespace Dez\Logger\Handler;

use Dez\Logger\Collection\ArrayCollection;

/**
 * Class CallbackHandler
 * @package Dez\Logger\Handler
 */
class CallbackHandler extends AbstractHandler
{

  /**
   * @var null
   */
  protected $callback = null;

  /**
   * CallbackHandler constructor.
   * @param callable $callback
   * @param int $level
   */
  public function __construct(callable $callback, $level = 0)
  {
    parent::__construct($level);

    if (!is_callable($callback, false)) {
      throw new \InvalidArgumentException('Callback shall be either closure or object-method array format');
    }

    $this->callback = $callback;
  }

  /**
   * @param ArrayCollection $record
   * @return null
   */
  public function handle(ArrayCollection $record)
  {
    call_user_func_array($this->callback, [$record, $this]);

    return true;
  }


}