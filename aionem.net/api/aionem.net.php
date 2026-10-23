<?php


    function AioNem_Net_API_SMS_Send_Net($to, $body) {
        
        $uid = "schoolbox";
        $key = "schoolbox";
        $from = "Menzicare";
        
        return AioNem_Net_API_SMS_Send($uid, $key, $from, $to, $body);
    }

    function AioNem_Net_API_Chat_Send_Net($to, $body) {
        
        $uid = "schoolbox";
        $key = "schoolbox";
        $from = "Menzicare";
        
        return AioNem_Net_Chat_Send($uid, $key, $from, $to, $body);
    }

    function AioNem_Net_API_Mail_Send_Net($to, $subject, $body) {
        
        $uid = "schoolbox";
        $key = "schoolbox";
        $email = "info@school.rw";
        $password = "SchoolBox";
        $from = "SchoolBox";
        $reply = "info@school.rw";
        
        return AioNem_Net_Mail_Send($uid, $key, $email, $password, $from, $to, $subject, $body, $reply);
    }



    function AioNem_Net_API_SMS_Send($uid, $key, $from, $to, $body) {

        $data = array (
            'uid' => $uid,
            'from' => $from,
            'to' => $to,
            'body' => $body,
            'action' => "sms-send",
        );
        $request = curl_init("https://api.aionem.net/sms/index.php");
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($request, CURLOPT_MAXREDIRS, 3);
        curl_setopt($request, CURLOPT_POSTREDIR, 3);
        curl_setopt($request, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($request, CURLOPT_USERPWD, "$uid:$key");
        curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($request);
        curl_close($request);

        return $response;
    }
    
    function AioNem_Net_API_SMS_Balance($uid, $key) {

        $data = array (
            'uid' => $uid,
            'action' => "sms-balance",
        );
        $request = curl_init("https://api.aionem.net/sms/index.php");
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($request, CURLOPT_MAXREDIRS, 3);
        curl_setopt($request, CURLOPT_POSTREDIR, 3);
        curl_setopt($request, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($request, CURLOPT_USERPWD, "$uid:$key");
        curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($request);
        curl_close($request);

        return $response;
    }
    
    
    function AioNem_Net_Chat_Send($uid, $key, $from, $to, $body) {

        $data = array (
            'from' => $from,
            'to' => $to,
            'body' => $body,
            'action' => 'chat-send'
        );
        $request = curl_init("https://api.aionem.net/chat/index.php");
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($request, CURLOPT_MAXREDIRS, 3);
        curl_setopt($request, CURLOPT_POSTREDIR, 3);
        curl_setopt($request, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($request, CURLOPT_USERPWD, "$uid:$key");
        curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($request);
        curl_close($request);

        return $response;
        
    }
    
    
    function AioNem_Net_Mail_Send($uid, $key, $email, $password, $from, $to, $subject, $body, $reply) {

        $data = array (
            'email' => $email,
            'password' => $password,
            'from' => $from,
            'subject' => $subject,
            'to' => $to,
            'body' => $body,
            'reply' => $reply,
            'action' => 'mail-send'
        );
        $request = curl_init("https://api.aionem.net/mail/index.php");
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($request, CURLOPT_MAXREDIRS, 3);
        curl_setopt($request, CURLOPT_POSTREDIR, 3);
        curl_setopt($request, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($request, CURLOPT_USERPWD, "$uid:$key");
        curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($request);
        curl_close($request);

        return $response;
        
    }
    
    
?>