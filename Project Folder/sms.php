<?php
require 'Clockwork.php';
require 'ClockworkException.php';

try
{
    // Create a Clockwork object using your API key
    $API_KEY = "1fb8a2f4521880944bad40933bb7747cfa38eec7" ;
    $clockwork = new mediaburst\ClockworkSMS\Clockwork( $API_KEY );

    // Setup and send a message
    $message = array( 'to' => '213540918976', 'message' => 'ca marche bb ' , 'from' => 'Telecome' );
    $result = $clockwork->send( $message );

    
}
catch (mediaburst\ClockworkSMS\ClockworkException $e)
{
    echo 'Exception sending SMS: ' . $e->getMessage();
}

?>