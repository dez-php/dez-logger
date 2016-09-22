<?php

namespace TestLogger;

use Dez\Logger\Collection\ArrayCollection;
use Dez\Logger\DateTime;
use Dez\Logger\Formatter\JsonFormatter;
use Dez\Logger\Handler\CallbackHandler;
use Dez\Logger\Handler\EchoHandler;
use Dez\Logger\Handler\HandlerInterface;
use Dez\Logger\Handler\Mask\LogLevelMask;
use Dez\Logger\Handler\StreamHandler;
use Dez\Logger\Log;

error_reporting(E_ALL);
ini_set('display_errors', 'On');

set_exception_handler(function (\Throwable $exception) {
  die('<b>' . get_class($exception) . '</b>: <i>' . $exception->getMessage() . '</b>');
});

class Printer
{

  public function echoMe(ArrayCollection $record, HandlerInterface $handler)
  {
    /** @var DateTime $datetime */
    $datetime = $record['datetime'];
    $datetime->setFormat(DateTime::RFC3339);
    echo __METHOD__ . ' -> ' . PHP_EOL . $handler->getFormatter()->format($record);
  }

}

include_once '../vendor/autoload.php';

$logger = new Log();

$handler = new StreamHandler(__DIR__ . '/logs/test.log', LogLevelMask::MASK_EMERGENCY);

$logger->pushHandler('stream', $handler);
//
$logger->pushHandler('echo1', new EchoHandler(LogLevelMask::MASK_EMERGENCY | LogLevelMask::MASK_NOTICE));
$logger->pushHandler('echo2', new EchoHandler(LogLevelMask::MASK_WARNING));

$callbackHandler = new CallbackHandler([new Printer(), 'echoMe'], LogLevelMask::MASK_CRITICAL | LogLevelMask::MASK_WARNING);

$callbackHandler->setFormatter(new JsonFormatter(true));

$logger->pushHandler('callback', $callbackHandler);

$logger->warning('test message :md5_time', [
  'md5_time' => md5(time())
]);

$logger->emergency('MASK_EMERGENCY only :file [:md5]', [
  'file' => __FILE__,
  'md5' => md5_file(__FILE__)
]);

$logger->info('asdasdasdasdasd :md5_time', [
  'md5_time' => md5(time())
]);

$logger->warning('warning test !!!! :md5_time', [
  'md5_time' => md5(time())
]);

$logger->critical('critical test !!!! :md5_time', [
  'md5_time' => md5(time())
]);