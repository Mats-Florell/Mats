import cv2
import os
import time
import face_recognition
import datetime
import os
import pyscript
import keyboard
import math

face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
# Read the input image
#img = cv2.imread('test.png')

import cv2
import glob
Number_of_students = len(glob.glob('*.png'))
StudentAttendance = []
StudentsAttended = []
f=0
NumberOfAttendants = 0

def students():
    Student_encoding = []
    o=0
    for file in glob.glob('*.png'):
        Student_image = face_recognition.load_image_file(str(file))
        Student_encoding.append(face_recognition.face_encodings(Student_image))
        o+=1
        
        
    return(Student_encoding)
Student_encoding = students()

def Recognize():
    å=0
    p = 0
    k=0
    
    b=0
    T = os.path.getctime("face0.jpg")
    date = datetime.datetime.fromtimestamp(T)
    files = open("Website/Attendance.txt","a")
    files.write("\n")
    files.write(str(date) + "\n")
    æ=0
    for foles in glob.glob('*.png'):
        Compare(æ, files, foles);
        files.write(str(glob.glob('*.png')[æ]) + ": " + str(results) + ", ")
        æ+=1
        
    å=0
    for file in glob.glob('*.jpg'):
        å+=1
        os.remove(file)
    print(unknown_encoding)
    print(results)
    files.close()
    
def Compare(æ, files, foles):
    å=0
    for file in glob.glob('*.jpg'):
        print(file)
        print(æ)
        print(å)
        unknown_image = face_recognition.load_image_file(file)
        unknown_encoding=face_recognition.face_encodings(unknown_image)
        print(unknown_encoding) 
        results=face_recognition.compare_faces(Student_encoding[æ], unknown_encoding)
        print(results)
        å+=1
        return(results,file)
        
    
    

while True:
    p = 0
    k=0
    
    b=0
    results = []
    o=0
    cap = cv2.VideoCapture(0)
    _, img = cap.read()
    cap.release()


    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, 1.1, 4)
    
    cap.release()  
    # Display the output
    if _ == True:
        for (x, y, w, h) in faces:
            cropped_img = img[y:y+h, x:x+w]
            cv2.imwrite("face" + str(p) +".jpg", cropped_img)
            p+=1
        
        
        if int(len(faces)) == 0:  # if key 'q' is
            
            NumberOfAttendants = len(faces)
            time.sleep(5)
        if int(len(faces) != int(NumberOfAttendants)):
            Recognize()
            NumberOfAttendants = len(faces)
        time.sleep(1)
        if f>=3:
            break
        f+=1
        
        
        

   
