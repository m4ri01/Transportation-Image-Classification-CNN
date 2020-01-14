import paho.mqtt.client as mqtt
import time
import mysql.connector
import binascii
from PIL import Image
import io
import os
import signal
import time
import sys
import RPi_I2C_driver
import RPi.GPIO as GPIO
import threading

from pirc522 import RFID

mylcd = RPi_I2C_driver.lcd()
sp = 11
GPIO.setmode(GPIO.BOARD)
GPIO.setup(sp,GPIO.OUT)
idbaca = 0
validasi = 0

def bacarfid():
	global idbaca
	run = True
	rdr = RFID()
	util = rdr.util()
	util.debug = True

	def end_read(signal,frame):
		global run
		print("\nCtrl+C captured, ending read.")
		run = False
		rdr.cleanup()
		sys.exit()

	signal.signal(signal.SIGINT, end_read)

	while run:
		rdr.wait_for_tag()

		(error, data) = rdr.request()
		(error, uid) = rdr.anticoll()
		if not error:
			idbaca = str(uid[0])+str(uid[1])+str(uid[2])+str(uid[3])
			time.sleep(.1)
			



def dataproses():
	def prosesGambar(mosq,obj,msg):
		pesan = msg.payload
		data = io.BytesIO(pesan)
		gambar = Image.open(data)
		gambar.save("/var/www/html/gambarkendaraan/default.jpg")
		print("simpan")




	def prosesnama(mosq,obj,msg):
		global idbaca
		pesan = msg.payload.decode("utf-8")
		pesan = str(pesan)
		pesan = pesan.split(",")
		nama = pesan[0]
		golongan = pesan[1]
		namaganti = "/var/www/html/gambarkendaraan/{}".format(nama)
		namafix = "{}".format(nama)
		os.rename(r"{}".format("/var/www/html/gambarkendaraan/default.jpg"),r"{}".format(namaganti))
		harga = 0
		golongan = int(golongan)
		if golongan == 1:
			harga = 24000
		elif golongan == 2:
			harga = 36000
		elif golongan == 3:
			harga = 40000
		elif golongan == 6:
			harga = 50000
		mylcd.lcd_clear()
			mylcd.lcd_display_string("harga: {}".format(harga),1)
		baca = ""
		while baca == "" :
			baca = idbaca
			if baca != "":
				baca == ""
				break
		saldo = prosesetol(baca)
		print(saldo)
		saldo = saldo[0]
		print(saldo)
		saldo = int(saldo)
		while True:
			if (saldo == 0):
				mylcd.lcd_clear()
				mylcd.lcd_display_string("harga: {}".format(harga),1)
				mylcd.lcd_display_string("tidak terdaftar",2)
			elif (saldo - harga < 0):
				mylcd.lcd_clear()
				mylcd.lcd_display_string("harga: {}".format(harga),1)
				mylcd.lcd_display_string("Saldo kurang",2)
			elif (saldo - harga >= 0):
				saldoakhir = saldo - harga
				mylcd.lcd_clear()
				mylcd.lcd_display_string("harga: {}".format(harga),1)
				mylcd.lcd_display_string("sisa = {}".format(saldoakhir),2)
				updateharga(baca,saldoakhir)
				break
			time.sleep(1)
		p = GPIO.PWM(sp,50)
		p.start(7.5)
		time.sleep(0)
		p.ChangeDutyCycle(12.5)
		time.sleep(3)
		p.ChangeDutyCycle(7.5)
		time.sleep(1)
		p.stop()
		GPIO.cleanup()


		insertDB(namafix,"madiun",golongan,harga)

		

	def updateharga(rfidku,saldoakhir):
			mydb = mysql.connector.connect(
					host="localhost",
					user="gulo",
					passwd="hahaha111",
					database="gerbangtol"
					)
			mycursor = mydb.cursor(buffered=True)
			mycursor.execute('SELECT kartuid, COUNT(*) FROM etol WHERE kartuid = %s GROUP BY kartuid',(rfidku,))
			row_count = mycursor.rowcount
		if row_count != 0:
			sql=""" UPDATE `etol` SET `saldo` = '%s' WHERE `kartuid` = '%s'  """%(saldoakhir,rfidku)
			mycursor.execute(sql)
			mydb.commit()
		else:
			return 0

	def prosesetol(rfidku):
			mydb = mysql.connector.connect(
					host="localhost",
					user="gulo",
					passwd="hahaha111",
					database="gerbangtol"
					)
			mycursor = mydb.cursor(buffered=True)
			mycursor.execute('SELECT kartuid, COUNT(*) FROM etol WHERE kartuid = %s GROUP BY kartuid',(rfidku,))
			row_count = mycursor.rowcount
		if row_count != 0:
			sql=""" SELECT saldo FROM `etol` WHERE kartuid= '%s'  """%(rfidku)
			mycursor.execute(sql)
			hasil = mycursor.fetchone()
			return hasil
		else:
			return 0


	def insertDB(gambar,gerbang,golongan,harga):
		mydb = mysql.connector.connect(
					host="localhost",
					user="gulo",
					passwd="hahaha111",
					database="gerbangtol"
					)
		mycursor = mydb.cursor(buffered=True)
		sql=""" INSERT INTO `datakendaran` (`gambar`, `gerbang`, `golongan`,`harga`) VALUES ('%s', '%s', '%s','%s');""" % (gambar,gerbang,golongan,harga)
		mycursor.execute(sql)
		mydb.commit()


		

	def on_message(mosq, obj, msg):
		pass

	mqttc = mqtt.Client()
	mqttc.message_callback_add("/gambar/lomba", prosesGambar)
	mqttc.message_callback_add("/gambar/nama", prosesnama)
	mqttc.connect("localhost", 1883, 60)
	mqttc.subscribe("/gambar/#", 0)
	mqttc.loop_forever()

bacarfid = threading.Thread(target=bacarfid)
dataproses = threading.Thread(target=dataproses)
bacarfid.start()
dataproses.start()