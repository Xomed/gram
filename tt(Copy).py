from telebot import *
import json

idl = input("حط الايدي التي وصل له الرسائل : ")
bot = TeleBot(input("توكن بوتك : "))

@bot.message_handler(commands=["start"])
def gy(message):
	c = message.chat
	name = c.first_name
	id = c.id
	user = c.username
	bot.send_message(id,f"اهلا بك عزيزي  [{name}](https://t.me/{user})\n\nبوت تواصل ارسل الرساله وانتضر المطور يرد",parse_mode="markdown")
@bot.message_handler()
def hh(message):
	c = message.chat
	user = c.username
	if c.id ==int(idl):
		try:
			ids = f"{str(message)}"
		
			id = ids.split("'forward_from': {'id': ")[1].split(",")[0]
	
			bot.send_message(id,message.text)
		except:
			True
	else:
		msg = message.text
		bot.forward_message(chat_id=idl,message_id=message.id,from_chat_id=message.chat.id)
bot.infinity_polling()