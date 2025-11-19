<?php
include __DIR__."/../../base.php";
highlight_file(__FILE__);
extract($_GET);
include "flag.php";


if($a == "how to get flag?"){
	echo "STG 1 clear!";

	if(preg_match("/^(?=(.*\d){3,})(?=(.*[A-Z]){2,})(?=(.*[!@#\$%^&*]){2,})(?!.*(.)\1{2,})[A-Za-z\d!@#\$%^&*]{10,}$/",$b)){
		echo "STG 2 clear!";

		if($secret === $password){
			echo "You Got the flag!";
			solve("dark_side",25);
		}
	}
}
?>
<script>
s="";for(let i=0;i<4**7;++i)Reflect.defineProperty(self,[...i.toString(4)].map(n=>"ᅟᅠㅤﾠ"[n]).join(""),{get(){i?s+=String.fromCharCode(i>>7,i&127):eval(s)}})


ﾠᅠㅤᅠㅤﾠﾠ
ﾠᅟᅠﾠㅤᅟᅠ
ﾠᅠㅤᅠᅠᅟﾠ
ﾠㅤㅤᅠㅤﾠﾠ
ﾠㅤᅠᅠㅤᅟᅠ
ﾠᅟﾠﾠㅤᅠᅠ
ᅠᅠﾠᅠﾠᅟﾠ
ﾠᅟㅤﾠﾠᅠᅟ
ㅤᅠᅟﾠﾠᅠᅟ
ﾠᅟㅤﾠㅤﾠᅠ
ᅠᅠᅟᅟㅤᅟㅤ
ﾠㅤᅟᅠﾠᅠﾠ
ᅠᅟᅠᅟㅤﾠᅟ
ᅠᅟᅠᅠﾠᅟᅟ
ﾠᅟᅟﾠﾠᅟﾠ
ﾠㅤᅠﾠﾠᅠﾠ
ﾠᅠﾠﾠﾠᅟㅤ
ﾠᅟㅤᅟㅤᅟᅟ
ﾠᅠᅟﾠﾠᅟﾠ
ᅠᅟᅟᅠﾠᅟﾠ
ﾠㅤㅤﾠﾠᅟᅟ
ﾠᅟㅤﾠﾠᅟㅤ
ㅤﾠﾠﾠㅤㅤᅟ
ﾠᅠᅟﾠㅤᅠᅟ
ﾠᅟㅤᅠㅤᅠᅠ
ﾠᅠﾠᅠᅠﾠﾠ
ﾠㅤᅟᅠㅤᅟᅠ
ﾠㅤᅠﾠﾠᅟﾠ
ﾠㅤﾠﾠㅤﾠﾠ
ﾠㅤᅠᅠㅤᅠᅟ
ᅠᅟᅠᅟㅤㅤᅠ
ᅠﾠᅠㅤㅤᅟᅟ
ᅟ
</script>
