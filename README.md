# Instagram User Profile Info Functions (PHP)

# Usage / Kullanım : 

domain.com/index.php?username=ronaldo<br/>
if you want see profil pic.<br/>
```
$sorgu = $use->get($user, "pphd");
$media = $use->getpp($user, $sorgu);
echo "<img src='./userpps/$media.jpg'/>";
```
for last media 

```
$sorgu = $use->get($user, "lastmedia");
$media = $use->getmedia($user, $sorgu);
echo "<img src='./usermedia/$media.jpg'/>";
``` 
and another functions
```
bio
follow count
followed count
badge check
is private check
```
