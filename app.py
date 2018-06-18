from flask import Flask, request
import json
import requests
import random
import MySQLdb





# ตรง YOURSECRETKEY ต้องนำมาใส่เองครับจะกล่าวถึงในขั้นตอนต่อๆ ไป
global LINE_API_KEY
# ห้ามลบคำว่า Bearer ออกนะครับเมื่อนำ access token มาใส่
LINE_API_KEY = 'Bearer 7YR60AJ855Zu1Etxsc7aCdFqhip1o8yAKj7PzLe90ClE9Po0fz5o81BeghtpCki4+zFZ7FrYjjbrFvQw84+Axi+P1zWPnxSCTl/lF5gVTDaDqdC5IHk30qnjo7GQ1hHKizexgGNpBPn/Fwz3slJqkQdB04t89/1O/w1cDnyilFU='

app = Flask(__name__)
 
@app.route('/')
def index():
    return 'This is chatbot server.'
@app.route('/bot', methods=['POST'])

def bot():
    # ข้อความที่ต้องการส่งกลับ
    replyQueue = list()
   
    # ข้อความที่ได้รับมา
    msg_in_json = request.get_json()
    msg_in_string = json.dumps(msg_in_json)
    
    # Token สำหรับตอบกลับ (จำเป็นต้องใช้ในการตอบกลับ)
    replyToken = msg_in_json["events"][0]['replyToken']
    
    # ส่วนนี้ดึงข้อมูลพื้นฐานออกมาจาก json (เผื่อ)
    userID =  msg_in_json["events"][0]['source']['userId']
    msgType =  msg_in_json["events"][0]['message']['type']
    
    # ตรวจสอบว่า ที่ส่งเข้ามาเป็น text รึป่าว (อาจเป็น รูป, location อะไรแบบนี้ได้ครับ)
    # แต่ก็สามารถประมวลผลข้อมูลประเภทอื่นได้นะครับ
    # เช่น ถ้าส่งมาเป็น location ทำการดึง lat long ออกมาทำบางอย่าง เป็นต้น
    if msgType != 'text':
        reply(replyToken, ['อะไรของเธอ'])
        return 'OK',200
    
    # ตรงนี้ต้องแน่ใจว่า msgType เป็นประเภท text ถึงเรียกได้ครับ 
    # lower เพื่อให้เป็นตัวพิมพ์เล็ก strip เพื่อนำช่องว่างหัวท้ายออก ครับ
    text = msg_in_json["events"][0]['message']['text'].lower().strip()
    replyQueue.append(text)

    
    
    dbconn=MySQLdb.connect(database='db_junebot', user='root', password='', host='localhost',charset='utf8')
    query = "select * from question"
    with dbconn.cursor(MySQLdb.cursors.DictCursor) as cursor:
    cursor.execute(query)
    data = cursor.fetchall()
    x = json.dumps(data,indent=4)
    replyQueue.append(x)



    
    
    replyQueue.append(text)

    




    # query = (
    #     "SELECT a_topic FROM answer AS e "
    #     "JOIN question AS s USING (a_id) "
    #     "WHERE  q_topic = '%s'" % text)
    # replyQueue.append(text)

    # cur.execute(query)
    # results = cur.fetchall()
    # for x in results :
    #     replyQueue.append(x)
    

    #replyQueue.append(text)
    #replyQueue.append('ดีๆๆๆๆๆๆ')
    
    # ตัวอย่างการทำให้ bot ถาม-ตอบได้ แบบ exact match
    # response_dict = ('ดี','สวัสดีครับ')
    # response = ('ไง','ดีครับ','ว่าไงครับ')

    # if text in response_dict :
    #     replyQueue.append(random.choice(response))
    #  else:
    #      replyQueue.append('ไม่รู้ว่าจะตอบอะไรดี TT')
       
    # ตัวอย่างการทำให้ bot ถาม-ตอบได้ แบบ non-exact match
    # โดยที่มี method ชื่อ find_closest_sentence ที่ใช้การเปรียบเทียบประโยค
    # เพื่อค้นหาประโยคที่ใกล้เคียงที่สุด อาจใช้เรื่องของ word embedding มาใช้งานได้ครับ
    # simple sentence embeddings --> https://openreview.net/pdf?id=SyK00v5xx
    # response_dict = {'สวัสดี':'สวัสดีครับ'}
    # closest = find_closest_sentence(response_dict, text)
    # replyQueue.append(reponse_dict[closest])
   
    # ตอบข้อความ "นี่คือรูปแบบข้อความที่รับส่ง" กลับไป

    #replyQueue.append('นี่คือรูปแบบข้อความที่รับส่ง')
    
    # ทดลอง Echo ข้อความกลับไปในรูปแบบที่ส่งไปมา (แบบ json)
    #replyQueue.append(text)
    reply(replyToken, replyQueue[:5])
    
    return 'OK', 200

 
def reply(replyToken, textList):
    # Method สำหรับตอบกลับข้อความประเภท text กลับครับ เขียนแบบนี้เลยก็ได้ครับ
    LINE_API = 'https://api.line.me/v2/bot/message/reply'
    headers = {
        'Content-Type': 'application/json; charset=UTF-8',
        'Authorization': LINE_API_KEY
    }
    msgs = []
    for text in textList:
        msgs.append({
            "type":"text",
            "text":text
        })
    data = json.dumps({
        "replyToken":replyToken,
        "messages":msgs
    })
    requests.post(LINE_API, headers=headers, data=data)
    return

if __name__ == '__main__':
    app.run()
