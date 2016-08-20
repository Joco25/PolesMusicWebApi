<?php 
namespace App\Classes;
use App\Classes\Api;

use DateTime;
 
class Common{
 
   public static function isUserLoggedIn() {
 
         $value = session('facebook_id');
         if($value)
         {
         	return true;
         }
    }

    public static function getFirstName($name) {
    	$first = explode(' ', $name);
    	return $first[0];
    }

    public static function getReporterDetails($facebook_id, $detail) {
    	$api = new \App\Classes\Api;
    	$result = $api->getUser($facebook_id);
        if(isset($result['data']))
        {
            $user = $result['data'];
            if($detail == "name")
            {
                return self::getFirstName($user[$detail]);
            }
            if($detail == "fullname")
            {
                return $user['name'];
            }
            return $user[$detail];
        }
        else return $result['message'];
    	
    }

    public static function getClientDetails($client, $detail) {
      $api = new \App\Classes\Api;
      $result = $api->getClient($client);
        if(isset($result['data']))
        {
            $user = $result['data'];
            return $user[$detail];
        }
        else return $result['message'];
      
    }

    public static function checkMobileSearch($mobilenumber)
    {
        //All Nigerian Phone Network Prefixes and Number Ranges
        $nigerian_phone_number_prefixes = array('0701', '0702', '0703', '0704', '0705', '0706', '0707', '0708', '0709', '0802', '0803', '0804', '0805', '0806', '0807', '0808', '0809', '0810', '0811', '0812', '0813', '0814', '0815', '0816', '0817', '0818', '0819', '0909', '0902', '0903', '0905');
        
        //Strip whitespace (or other characters) from the beginning and end of a string
        $number = trim($mobilenumber);
        
        //Ensure number starts with any of the phone prefixes
        $number_prefix = substr($number, 0, 4);
        $country_code = "234";
        if (in_array($number_prefix, $nigerian_phone_number_prefixes)){
            $mobilenumber = $country_code . substr($mobilenumber, 1);
        }
        elseif (substr($mobilenumber, 0, 1) == '+'){
            $mobilenumber = substr($mobilenumber, 1);
        }
        return $mobilenumber;
        
    }

    public static function time_elapsed($datetime, $full = false) {
       $now = new DateTime;
       $ago = new DateTime($datetime);
       $diff = $now->diff($ago);

       if (isset($diff)) {
            $string = array(
            'y' => 'year',
            'm' => 'month',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute'
            );

            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full)
                $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
       else {
              return 0;
        }
    }

    public static function isAdminLoggedIn() {
        
         $value = session('staff');
         $username = session('email');
         if($value)
         {
            return true;
         }
    }

    public static function getMusicDetail($path)
    {
      include(app_path() . '\Classes\getid3\getid3.php');

      $getID3 = new \getID3;

      $mixinfo = $getID3->analyze( $path );

      $bit_rate = $mixinfo['audio']['bitrate'];           // audio bitrate
      $play_time = $mixinfo['playtime_string'];            // playtime in minutes:seconds, formatted string

      //print_r($mixinfo);
      $hours = 0;
      list($mins , $secs) = explode(':' , $play_time);

      if($mins > 60)
      {
          $hours = intval($mins / 60);
          $mins = $mins - $hours*60;
      }
      if($hours)
      {
        $play_time = sprintf("%02d:%02d:%02d" , $hours , $mins , $secs);
      }
      else $play_time = sprintf("%02d:%02d" , $mins , $secs);

      $music = array('playtime' => $playtime, 'bitrate' => $bitrate);

      return $music;
    }
 
}