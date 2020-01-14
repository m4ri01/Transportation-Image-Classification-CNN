#!/usr/bin/env python
# coding: utf-8

# In[2]:


import cv2
from keras.models import load_model
import serial
import numpy as np
from keras.preprocessing import image
import paho.mqtt.publish as pub
import time
import os, os.path

DIR="D:fotokendaraan/"
img_counter=len([name for name in os.listdir(DIR) if os.pathsfile(os.path.join(DIR, name))])
if img_counter >0:
    img_counter = img_counter+1


# In[4]:


cam = cv2.VideoCapture(0)
classifier = load_model('D:lomba/tol3.h5')
jenis_golongan = { "[0]":"1","[1]":"1","[2]":"6","[3]":"1","[4]":"3","[5]":"2"}


# In[ ]:


while True:
    try:
        ret,frame = cam.read()
        cv2.imshow("test",frame)
        if not ret:
            break
        k= cv2.waitKey(1)
        if k%256 == 27:
                print("Escape hit, closing...")
                break
            elif k%256 == 32:
                nama = "D:"

