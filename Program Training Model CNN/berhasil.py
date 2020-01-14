#!/usr/bin/env python
# coding: utf-8

# In[1]:


from keras.applications import MobileNet


# In[2]:


img_baris,img_kolom = 224,224
MobileNet = MobileNet(weights='imagenet',
                     include_top=False,
                     input_shape=(img_baris,img_kolom,3))


# In[3]:


for layer in MobileNet.layers:
    layer.trainable = False


# In[4]:


for (i,layer) in enumerate(MobileNet.layers):
    print(str(i) + " "+layer.__class__.__name__,layer.trainable)


# In[5]:


def tambahModel(bottomModel,numClasses):
    topModel = bottomModel.output
    topModel = GlobalAveragePooling2D()(topModel)
    topModel = Dense(1024,activation='relu')(topModel)
    topModel = Dense(1024,activation='relu')(topModel)
    topModel = Dense(1024,activation='relu')(topModel)
    topModel = Dense(512,activation='relu')(topModel)
    topModel = Dense(numClasses,activation='softmax')(topModel)
    return topModel


# In[6]:


from keras.models import Sequential
from keras.layers import Dense,Dropout, Activation, Flatten,GlobalAveragePooling2D
from keras.layers import Conv2D,MaxPooling2D,ZeroPadding2D
from keras.layers.normalization import BatchNormalization
from keras.models import Model


# In[7]:


numClasses = 6
FC_Head = tambahModel(MobileNet,numClasses)


# In[8]:


model = Model(inputs = MobileNet.input,outputs = FC_Head)


# In[9]:


print(model.summary())


# In[10]:


from keras.preprocessing.image import ImageDataGenerator


# In[11]:


train_data_dir = "D:lomba/output/train/"
val_data_dir = "D:lomba/output/val/"


# In[12]:


train_datagen = ImageDataGenerator(rescale = 1./255,
                                  rotation_range=45,
                                  width_shift_range = 0.3,
                                  height_shift_range = 0.3,
                                  horizontal_flip=True,
                                  vertical_flip = True,
                                  zoom_range=0.25,
                                  shear_range=0.25,
                                  fill_mode = 'nearest')


# In[13]:


val_datagen = ImageDataGenerator(rescale=1./255)


# In[14]:


batch_size = 32

train_generator = train_datagen.flow_from_directory(train_data_dir,
                                                   target_size=(img_baris,img_kolom),
                                                   batch_size = batch_size,
                                                   class_mode = 'categorical')


# In[15]:


val_generator = val_datagen.flow_from_directory(val_data_dir,
                                               target_size = (img_baris,img_kolom),
                                               batch_size = batch_size,
                                               class_mode = 'categorical')


# In[1]:


from keras.callbacks import ModelCheckpoint,EarlyStopping


# In[2]:


checkpoint = ModelCheckpoint("D:lomba/tol3.h5",
                            monitor='val_loss',
                            mode='min',
                            save_best_only = True,
                            verbose=1)


# In[3]:


earlystop = EarlyStopping(monitor='val_loss',
                         min_delta =0,
                         patience = 3,
                         verbose = 1,
                         restore_best_weights=True)


# In[4]:


callbacks = [checkpoint,earlystop]


# 

# In[20]:


model.compile(loss='categorical_crossentropy',
             optimizer='adam',
             metrics= ['accuracy'])


# In[21]:


nb_train = 2729
nb_val = 338

epochs = 5
batch_size = 16

history = model.fit_generator(train_generator,
                             steps_per_epoch = nb_train/batch_size,
                             epochs = epochs,
                             callbacks = callbacks,
                             validation_data = val_generator,
                             validation_steps  = nb_val/batch_size)


# 

# In[1]:


from keras.models import load_model


# In[2]:


classifier = load_model("D:lomba/tol3.h5")


# In[3]:


import os
import cv2
import numpy as np
from os import listdir
from os.path import isfile,join


# In[4]:


kendaraan_dict = {"[0]":"bus",
                 "[1]":"mobil",
                 "[2]":"motor",
                 "[3]":"pickup",
                 "[4]":"trailertruck",
                 "[5]":"truk2gandar"}
kendaraan_dict_n = {"n0":"bus",
                   "n1":"mobil",
                   "n2":"motor",
                   "n3":"pickup",
                   "n4":"trailertruck",
                   "n5":"truk2gandar"}
def draw_test(name,pred,im,asli):
    kendaraan = kendaraan_dict[str(pred)]
    BLACK=[0,0,0]
    expanded_image = cv2.copyMakeBorder(im,150,0,0,100,cv2.BORDER_CONSTANT,value=BLACK)
    cv2.putText(expanded_image,"prediction:"+kendaraan,(20,60),cv2.FONT_HERSHEY_SIMPLEX,1,(0,0,255),2)
    cv2.putText(expanded_image,"Real:"+asli,(20,120),cv2.FONT_HERSHEY_SIMPLEX,1,(0,255,0),2)
    cv2.imshow(name,expanded_image)


# In[5]:


def getRandomImage(path):
    """function loads a random images from a random folder in our test path """
    folders = list(filter(lambda x: os.path.isdir(os.path.join(path, x)), os.listdir(path)))
    random_directory = np.random.randint(0,len(folders))
    path_class = folders[random_directory]
    print("Class - " + str(path_class))
    file_path = path + path_class
    file_names = [f for f in listdir(file_path) if isfile(join(file_path, f))]
    random_file_index = np.random.randint(0,len(file_names))
    image_name = file_names[random_file_index]
    return (cv2.imread(file_path+"/"+image_name),path_class)   


# In[6]:


for i in range(0,10):
    input_im,asli = getRandomImage("D:lomba/output/val/")
    input_original = input_im.copy()
    input_original = cv2.resize(input_original, None, fx=0.5, fy=0.5, interpolation = cv2.INTER_LINEAR)
    
    input_im = cv2.resize(input_im, (224, 224), interpolation = cv2.INTER_LINEAR)
    input_im = input_im / 255.
    input_im = input_im.reshape(1,224,224,3) 
    
    # Get Prediction
    res = np.argmax(classifier.predict(input_im, 1, verbose = 0), axis=1)
    
    # Show image with predicted class
    draw_test("Prediction", res, input_original,asli) 
    cv2.waitKey(0)

cv2.destroyAllWindows()


# In[ ]:




