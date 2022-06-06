<?php
include("api.php");
$use = new getinsta();
$use->cookie = '';
$user = $_GET['username'];

//son paylasilan medyayı alır

$sorgu = $use->get($user, "lastmedia");
$media = $use->getmedia($user, $sorgu);
echo "<img src='./usermedia/$media.jpg'/>";

//profil resmini alır
/*
$sorgu = $use->get($user, "pphd");
$media = $use->getpp($user, $sorgu);
echo "<img src='./userpps/$media.jpg'/>";
*/

//takip ettigi kisi sayisi
//echo $sorgu = $use->get($user, "followcount");

//takip edildigi sayi
//echo $sorgu = $use->get($user, "followedcount");

//bio su
//echo $sorgu = $use->get($user, "bio");

//mavi tik varmı 
//echo $sorgu = $use->get($user, "badgecheck");

//gizli hesap mı 
//echo $sorgu = $use->get($user, "isprivacc");
