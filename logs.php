<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
// Load Composer's autoloader
//Import the PHPMailer class into the global namespace
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class monologres
{
    public function infolog($method,$resp)
    {
        $namefile='logs/'.'HP'.date('Ym').'.log';
        require 'vendor/autoload.php'; 
        $logger = new Logger('hotpay');
        $logger->pushHandler(new StreamHandler($namefile, Logger::DEBUG));
        $logger->info($method,$resp);
        try 
        {

        } 
        catch (Exception $EX) 
        {
            //echo 'Mensaje de Error: '. $EX->getMessage() ."\n";
            return $EX->getMessage();
        }
    }

    public function errorlog($method,$resp)
    {
        $namefile='logs/'.'HP'.date('Ym').'.log';
        require 'vendor/autoload.php'; 
        $logger = new Logger('hotpay');
        $logger->pushHandler(new StreamHandler($namefile, Logger::DEBUG));
        $logger->error($method,$resp);
        try 
        {

        } 
        catch (Exception $EX) 
        {
            //echo 'Mensaje de Error: '. $EX->getMessage() ."\n";
            return $EX->getMessage();
        }
    }
  
}
