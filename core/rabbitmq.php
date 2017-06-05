<?php
include(__DIR__ .'/../config/rabbitmq_config.php');
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

function queueGet($queueName) {
  $exchange = $queueName . '_exchange';
  $queue = $queueName . '_queue';

  $conn = new AMQPConnection(HOST, PORT, USER, PASS, VHOST);
  $ch = $conn->channel();
  $ch->queue_declare($queue, false, true, false, false);
  $ch->exchange_declare($exchange, 'direct', false, true, false);
  $ch->queue_bind($queue, $exchange);
  $msg = $ch->basic_get($queue);
  if ($msg !== NULL) {
    $ch->basic_recover($msg->delivery_info['delivery_tag']);
    return $msg->body;
  } else {
    return false;
  }

  $ch->close();
  $conn->close();
}

function removeFromQueue($queueName) {
  $exchange = $queueName . '_exchange';
  $queue = $queueName . '_queue';

  $conn = new AMQPConnection(HOST, PORT, USER, PASS, VHOST);
  $ch = $conn->channel();
  $ch->queue_declare($queue, false, true, false, false);
  $ch->exchange_declare($exchange, 'direct', false, true, false);
  $ch->queue_bind($queue, $exchange);
  $msg = $ch->basic_get($queue);
  if ($msg !== NULL) {
    $ch->basic_ack($msg->delivery_info['delivery_tag']);
    return true;
  } else {
    return false;
  }

  $ch->close();
  $conn->close();
}

function queuePublish($queueName, $post) {
  $exchange = $queueName . '_exchange';
  $queue = $queueName . '_queue';

  $conn = new AMQPConnection(HOST, PORT, USER, PASS, VHOST);
  $ch = $conn->channel();
  $ch->queue_declare($queue, false, true, false, false);
  $ch->exchange_declare($exchange, 'direct', false, true, false);
  $ch->queue_bind($queue, $exchange);
  $toSend = new AMQPMessage($post, array('content_type' => 'text/plain', 'delivery_mode' => 2));
  $ch->basic_publish($toSend, $exchange);
  $ch->close();
  $conn->close();
}
?>
