<?php
//==========//
#By Code: @KS_KK ريمبو#
#CH: @i5zzz#
#تنشر اذكر المصدر لا تصير فرخ#
//==========//
ob_start();
define('API_KEY','5384954496:AAFrZ_93WIYR54KgIejmTjnikRGL0x-h-Gk');
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$i5zzz = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$i5zzz";
$iskkk = file_get_contents($url);
return json_decode($iskkk);}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$user = $message->from->username;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$id = $message->from->id;
$text = $message->text;
$chat_id = $message->chat->id;
$user = $message->from->username;
$name = $message->from->first_name;
$sajad = file_get_contents("rembo.txt");
$ch = file_get_contents("ch.txt");
$tn = file_get_contents("tnb.txt");
$ban = file_get_contents("ban.txt");
$exb = explode("\n",$ban);
$adch ="@isbbb"; #@m15x2#
$rembo ="890009521"; #1880629456#
$m = explode("\n",file_get_contents("member.txt"));
$m1 = count($m)-1;
if($message and !in_array($id, $m)){
file_put_contents("member.txt", $id."\n",FILE_APPEND);
 }
$j = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$id);
if($message && (strpos($j,'"status":"left"') or strpos($j,'"Bad Request: USER_ID_INVALID"') or strpos($j,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا عزيزي اشترك بقناة البوت اولا❎
$ch
ثم ارسل /start",
]);return false;}
//==========//
#By Code: @KS_KK ريمبو#
#CH: @i5zzz#
#تنشر اذكر المصدر لا تصير فرخ#
//==========//
if($text =="/start"and $tn =="on"and $id !=$rembo){
bot('sendmessage',[
'chat_id'=>$rembo,
'text'=>
"
دخل شخص للبوت🆕
👨‍💼¦ اسمه » ️ [$name](tg://user?id=$id)
🔱¦ معرفه »  ️[@$user](tg://user?id=$id)
💳¦ ايديه » ️ [$id](tg://user?id=$id)
",
'parse_mode'=>"MarkDown",
]);
}
if($text =='/rembo' and $id ==$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بڪ عزيزي اليڪ اوامرڪ⚡📮",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>".•المشترڪين",'callback_data'=>"m1"]],
[['text'=>"•اذاعهہ‏‏ رسـآله📮",'callback_data'=>"send"],['text'=>"•توجہيه رسالهہ‏‏‏‏🔄",'callback_data'=>"forward"]],
[['text'=>"•وضع اشتراك اجباري💢",'callback_data'=>"ach"],['text'=>"•حذف اشتراك اجباري🔱",'callback_data'=>"dch"]],
[['text'=>"•تفعيل التنبيه✔️",'callback_data'=>"ons"],['text'=>"•تعطيل التنبيه❎",'callback_data'=>"ofs"]],
[['text'=>"فتح البوت✅",'callback_data'=>"obot"],['text'=>"ايقاف البوت❌",'callback_data'=>"ofbot"]],
[['text'=>"حظر عضو✅",'callback_data'=>"ban"],['text'=>"الغاء حظر عضو❌",'callback_data'=>"unban"]],
]
])
]);
}

if($data =='back'){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'text'=>"اهلا بڪ عزيزي اليڪ اوامرڪ⚡📮",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>".•المشترڪين ",'callback_data'=>"m1"]],
[['text'=>"•اذاعهہ‏‏ رسـآله📮",'callback_data'=>"send"],['text'=>"•توجہيه رسالهہ‏‏‏‏🔄",'callback_data'=>"forward"]],
[['text'=>"•وضع اشتراك اجباري💢",'callback_data'=>"ach"],['text'=>"•حذف اشتراك اجباري🔱",'callback_data'=>"dch"]],
[['text'=>"•تفعيل التنبيه✔️",'callback_data'=>"ons"],['text'=>"•تعطيل التنبيه❎",'callback_data'=>"ofs"]],
[['text'=>"فتح البوت✅",'callback_data'=>"obot"],['text'=>"ايقاف البوت❌",'callback_data'=>"ofbot"]],
[['text'=>"حظر عضو✅",'callback_data'=>"ban"],['text'=>"الغاء حظر عضو❌",'callback_data'=>"unban"]],
]
])
]);
unlink("rembo.txt");
}
if($data =="ban"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل ايدي العضو لاحظره🤩", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("rembo.txt","ban");
}

if($text and $sajad =="ban" and $id ==$rembo){
file_put_contents("ban.txt",$text."\n",FILE_APPEND);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم حظر العضور بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"تم حظرك من قبل المطور لايمكنك استخدام البوت😒",
]);
}

if($data =="unban"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل ايدي العضو لالغاء حظره🔱", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("rembo.txt","unban");
}
if($text and $sajad =="unban" and $id ==$rembo){
$bn = str_replace($text,'',$ban);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم الغاء حظر العضور بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("ban.txt",$bn);
unlink("rembo.txt");
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"تم الغاء حظرك من البوت🤩",
]);
}
if($data =="ofbot"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم اغلاق البوت✅", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("bot.txt","off");
}
$obot = file_get_contents("bot.txt");
if($data =="obot"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم فتح البوت بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("bot.txt");
}
if($data =="send"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل رسالتك📮", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("rembo.txt","send");
} 
if($text and $sajad == "send" and $id == $rembo){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'-تم النشر بنجاح✔️',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"back"]],
]])
]);
for($i=0;$i<count($m); $i++){
bot('sendMessage', [
'chat_id'=>$m[$i],
'text'=>$text
]);
unlink("rembo.txt");
}
}
if($data =="forward"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي قم بتوجيه الرسالة✅", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("rembo.txt","forward");
} 
if($text and $sajad == "forward" and $id == $rembo){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'تم التوجيه بنجاح🔰',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"back"]],
]])
]);
for($i=0;$i<count($m); $i++){
bot('forwardMessage', [
'chat_id'=>$m[$i],
'from_chat_id'=>$id,
'message_id'=>$message->message_id
]);
unlink("rembo.txt");
}
}
if($data =="ach"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل معرف قناتك 📮
مثل @h4ck3riraq
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("rembo.txt","ch");
} 
if($text and $sajad =="ch" and $id ==$rembo ){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"تم وضع اشتراك اجباري😁", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]); 
file_put_contents("ch.txt","$text");
unlink("rembo.txt");
} 
if($data == "m1"){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
عدد المشترڪين هو » $m1 «
        ",
        'show_alert'=>true,
]);
}
if($data =="dch"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"🔰تم حذف القناة بنجاح", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]); 
unlink("ch.txt");
} 
if($data =="ons"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
تم تفعيل التنبيه بنجاح✅
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("tnb.txt","on");
} 

if($data =="ofs"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
تم تعطيل التنبيه بنجاح✅
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("tnb.txt");
} 

if($message and in_array($id, $exb)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"انت محظور من قبل المطور لايمكنك استخدام البوت📛",
]);return false;}

if($message and $obot =="off" and $id !=$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"البوت تحت الصيانه تابع قناة البوت لمعرفة متى تنتهي الصيانه📛
@i5zzz
",
]);return false;}

if($text =='/start' ){
bot('SendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
•اهلا بك عزيزي في بوت الاعلانات😻
•يمكنك استخدامي لنشر اعلانك لكثير من المستخدمين❌
•يستخدمني اكثر من 1000 مستخدم🙈
•ماذا تنتظر شارك اعلانك الان📮
•هذا البوت الرسمي والاول في التيليجرام🤩
•يتم اذاعه اعلانك لجميع مستخدمين البوت والى قناة الاعلانات🎲
• BY » ✘ @KS_KK ✘
قناة الاعلانات » $adch
", 
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"نشر اعلان🗨"],['text'=>"نشر اعلان vip🤩"]],
],
'resize_keyboard'=>true
])
]);
}
//==========//
#By Code: @KS_KK ريمبو#
#CH: @i5zzz#
#تنشر اذكر المصدر لا تصير فرخ#
//==========//
$member = file_get_contents("member/$id.txt");
if($text =="نشر اعلان🗨" ){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"
حسنا عزيزي ارسل اعلانك لانشره لجميع الاعضاء❌
", 
]); 
file_put_contents("member/$id.txt","yes");
} 
//==========//
#By Code: @KS_KK ريمبو#
#CH: @i5zzz#
#تنشر اذكر المصدر لا تصير فرخ#
//==========//
if($text and $member =="yes"){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'تم نشر الاعلان📮',
]);
bot('sendmessage',[
'chat_id'=>$adch, 
'text'=>
" 
اعلان جديد📮
––––––––––––––––––
 [$text]()
––––––––––––––––––
معلومات المعلن
👨‍💼¦ الاسم» ️ [$name](tg://user?id=$id)
🔱¦ المعرف»  ️[@$user](tg://user?id=$id)
💳¦ الايدي» ️ [$id](tg://user?id=$id)
", 
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]); 
for($i=0; $i<count($m); $i++){
bot('sendmessage',[
'chat_id'=>$m[$i], 
'text'=>
" 
اعلان جديد📮
––––––––––––––––––
 [$text]()
––––––––––––––––––
معلومات المعلن
👨‍💼¦ الاسم» ️ [$name](tg://user?id=$id)
🔱¦ المعرف»  ️[@$user](tg://user?id=$id)
💳¦ الايدي» ️ [$id](tg://user?id=$id)
", 
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]); 
file_put_contents("member/$id.txt","0");
} 
}
if($text =="نشر اعلان vip🤩"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"
يمكنك خلال هذه الميزة نشر اعلان على قناة البوت والعديد من البوتات والكروبات 🇮🇶
للحصول على اعلان vip راسل المطور📮
»¦ @KS_KK ¦«
ليس مجانا😒
", 
]); 
} 
//==========//
#By Code: @KS_KK ريمبو#
#CH: @i5zzz#
#تنشر اذكر المصدر لا تصير فرخ#
//==========//