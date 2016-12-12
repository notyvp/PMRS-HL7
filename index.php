<?php
include_once 'vendor/autoload.php';
use PMRS\HL7\Unserializer;
$file = 'Resources/orm.txt';
$testHl7 = file_get_contents ( $file );
// file_put_contents($file, str_replace(chr(10), chr(13), $testHl7));
// return;
$unserializer = new Unserializer ();
$map = array (
		'MSH' => 'PMRS\HL7\Node\Segment\MSHSegment',
		'PID' => 'PMRS\HL7\Node\Segment\PIDSegment'
);
$message = $unserializer->loadMessageFromString ( $testHl7, $map );
foreach ( $message->getSegmentsByName ( 'MSH' ) as $msh ) {
	echo $msh->getSendingApplication () . PHP_EOL;
	echo $msh->getDateTimeOfMessage ()->format ( 'd-m-Y H:i:s' ) . PHP_EOL;
	echo $msh->getMessageType () . PHP_EOL;
}
foreach ( $message->getSegmentsByName ( 'PID' ) as $pid ) {
	echo $pid->getPID () . PHP_EOL;
	echo $pid->getInternalPID () . PHP_EOL;
	echo $pid->getPName () . PHP_EOL;
}
return;
$message->setEscapeSequences ( array (
		'cursor_return' => PHP_EOL
) );
echo $message;

// require_once "Net/HL7/Segments/MSH.php";
// require_once "Net/HL7/Message.php";
// require_once "Net/HL7/Connection.php";

// $msg  = new Net_HL7_Message();
// $msg->addSegment(new Net_HL7_Segments_MSH());

// $seg1 = new Net_HL7_Segment("PID");

// $seg1->setField(3, "XXX");

// $msg->addSegment($seg1);

// echo "Trying to connect";
// $socket = new Net_Socket();
// $success = $socket->connect("localhost", 12002);

// if ($success instanceof PEAR_Error) {
// 	echo "Error: {$success->getMessage()}";
// 	exit(-1);
// }

// $conn = new Net_HL7_Connection($socket);

// echo "Sending message\n" . $msg->toString(true);

// $resp = $conn->send($msg);

// $resp || exit(-1);

// echo "Received answer\n" . $resp->toString(true);

// $conn->close();





