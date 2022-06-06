<?php
class getinsta{
  error_reporting(0);
	public $cookie;
	
	//get func. 
public function get($user, $islem){
	
	
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://i.instagram.com/api/v1/users/web_profile_info/?username='.$user.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: i.instagram.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'Origin: https://www.instagram.com';
$headers[] = 'Referer: https://www.instagram.com/';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Asbd-Id: 198387';
$headers[] = 'X-Csrftoken: hlmY44QmbMwwg3QDOVrDAwuIDGS8Iyg1';
$headers[] = 'X-Ig-App-Id: 936619743392459';
$headers[] = 'X-Ig-Www-Claim: 0';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$sonuc = json_decode($result, true);
//get profil pic HD
$pphd = $sonuc['data']['user']['profile_pic_url_hd'];


//follow count
$followcount = $sonuc['data']['user']['edge_follow']['count'];

//follewer count
$followedcount = $sonuc['data']['user']['edge_followed_by']['count'];

//get user bio
$bio = $sonuc['data']['user']['biography'];

//check badge
$badgecheck = $sonuc['data']['user']['is_verified'];

//is private account ?
$isprivacc = $sonuc['data']['user']['is_private'];

//get user's last media


if($islem == "pphd"){
	return $pphd;
}
else if($islem == "followcount"){
	return $followcount;
}
else if($islem == "followedcount"){
	return $followedcount;
}
else if($islem == "bio"){
	return $bio;
}
else if($islem == "badgecheck"){
if($badgecheck){
		$resp = "True";
	return $resp;
	}else{
			$resp = "False";
	return $resp;
	}
}
else if($islem == "isprivacc"){
	if($isprivacc){
		$resp = "True";
	return $resp;
	}else{
			$resp = "False";
	return $resp;
	}
}
else if($islem == "lastmedia"){
	try{
	$lastmedia = $sonuc['data']['user']['edge_owner_to_timeline_media']['edges']['0']['node']['display_url'];
	}catch(Exception $e){
		$lastmedia = "";
	}
	return $lastmedia;
}else{
	echo "Bir Şeyler Ters Gitti...";
}

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
	
	
	
}
	
	
	public function getpp($user, $url){
//header("Content-Type: image/jpeg");	
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: instagram.fadb6-1.fna.fbcdn.net';
$headers[] = 'Accept: image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Origin: https://www.instagram.com';
$headers[] = 'Referer: https://www.instagram.com/';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: image';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: cross-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$ac = fopen("./userpps/$user.jpg", "a+");
fwrite($ac, $result);
fclose($ac);
 
return $user;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
		
		
		
	}
	
	
	public function getmedia($user, $url){
//header("Content-Type: image/jpeg");	
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: instagram.fadb6-1.fna.fbcdn.net';
$headers[] = 'Accept: image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Origin: https://www.instagram.com';
$headers[] = 'Referer: https://www.instagram.com/';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: image';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: cross-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$ac = fopen("./usermedia/$user.jpg", "a+");
fwrite($ac, $result);
fclose($ac);
 
return $user;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}
