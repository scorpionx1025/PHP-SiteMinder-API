<?php
print "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />";

/**
 * Website: http://sourceforge.net/projects/simplehtmldom/
 * Additional projects that may be used: http://sourceforge.net/projects/debugobject/
 * Acknowledge: Jose Solorzano (https://sourceforge.net/projects/php-html/)
 * Contributions by:
 *	 Yousuke Kumakura (Attribute filters)
 *	 Vadim Voituk (Negative indexes supports of "find" method)
 *	 Antcs (Constructor with automatically load contents either text or file/url)
 *
 * all affected sections have comments starting with "PaperG"
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author S.C. Chen <me578022@gmail.com>
 * @author John Schlick
 * @author Rus Carroll
 * @version 1.5 ($Rev: 208 $)
 * @package PlaceLocalInclude
 * @subpackage simple_html_dom
 */
include('simple_html_dom.php');


$username            = 'SITEMINDER_USER_ACCOUNT';
$password         = 'SITEMINDER_USER_PASSWORD';


$ch = curl_init(); 
$headers[] = "Accept: */*";
$headers[] = "Connection: Keep-Alive";
$headers[] = "Content-type: application/x-www-form-urlencoded;charset=UTF-8";
curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
curl_setopt($ch, CURLOPT_HEADER,  0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);         
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt'); 
curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookies.txt'); 
curl_setopt($ch, CURLOPT_URL, 'https://www.siteminder.com.au/web/userSessions'); 
$postData = "username=$username&password=$password";

// set post options
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); 
$result = curl_exec($ch);


curl_setopt($ch, CURLOPT_URL, 'https://www.siteminder.com.au/web/extranet/reports/6086/checkins');

$result = "<?xml version=\"1.0\" encoding=\"utf-8\"?>".curl_exec($ch);  

$html = str_get_html($result);

foreach($html->find('.checkin-date') as $date){
    foreach($date->find('.dom') as $dom){
        foreach($date->find('.reservation-list') as $ul) 
        {
            foreach($ul->find('div[id*=reservation_]') as $div) 
            {
             // do something...
                foreach($div->find('.reservation-id') as $reservation)
                {
                    foreach($reservation->find('.strong') as $reservation_id)
                    {
                    }
                }
                foreach($div->find('.booked-on') as $booked)
                {
                    foreach($booked->find('.strong') as $book_source)
                    {
                    }
                }
                //Like Booking.com - 2837123456
                echo $book_source->plaintext . ' - ' . $reservation_id->plaintext . '<br />\n';
                //Like yyyy-mm-dd
                echo date('Y-m-').trim($dom->plaintext) . '<br />\n';
            }
        }
    }
}


?>
