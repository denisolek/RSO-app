<?php

include(__DIR__ . '/config/rabbitmq.php');
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

$exchange = 'basic_get_test';
$queue = 'basic_get_queue';

$conn = new AMQPConnection(HOST, PORT, USER, PASS, VHOST);
$ch = $conn->channel();

$ch->queue_declare($queue, false, true, false, false);

$ch->exchange_declare($exchange, 'direct', false, true, false);

$ch->queue_bind($queue, $exchange);

$msg = $ch->basic_get($queue);
// var_dump($msg);


if ($msg !== NULL) {
  $ch->basic_ack($msg->delivery_info['delivery_tag']);
  var_dump($msg->body);
} else {
  var_dump("no more messages");
}


$ch->close();
$conn->close();
