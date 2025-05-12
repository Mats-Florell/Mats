import cv2
import os
import time
import face_recognition
import datetime
import os

face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
# Read the input image
#img = cv2.imread('test.png')
cap = cv2.VideoCapture(0)
i=0

while cap.isOpened():
    _, img = cap.read()


    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, 1.1, 4)

    for (x, y , w ,h) in faces:
        cv2.rectangle(img, (x,y), (x+w, y+h), (255, 0 , 0), 3)

    # Display the output
    if _ == True:
        cv2.imwrite('img.png', img)
        unknown_image = face_recognition.load_image_file("img.png")
        known_image = face_recognition.load_image_file("Mats.png")
        known_image2 = face_recognition.load_image_file("Roman.jpg")
        cap.release()
        Mats_encoding = face_recognition.face_encodings(known_image)[0]
        Roman_encoding = face_recognition.face_encodings(known_image2)[0]
        unknown_encoding = face_recognition.face_encodings(unknown_image)[0]
        
        results = face_recognition.compare_faces([Mats_encoding, Roman_encoding], unknown_encoding)
        T = os.path.getctime("img.png")
        date = datetime.datetime.fromtimestamp(T)
        print("Mats: " + str(results[0]))
        print("Roman: " + str(results[1]))
        print(date)
        os.remove("img.png")
        break
    i=i+1
    if ('q'):  # if key 'q' is pressed 
        print('stopping')
        break  # finishing the loop
    time.sleep(2)
    
        
