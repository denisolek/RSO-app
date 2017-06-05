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

$toSend = new AMQPMessage('test message 2', array('content_type' => 'text/plain', 'delivery_mode' => 2));
$ch->basic_publish($toSend, $exchange);


$ch->close();
$conn->close();
