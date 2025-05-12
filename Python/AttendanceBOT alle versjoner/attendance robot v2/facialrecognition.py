import cv2
import os
import time
import face_recognition
import datetime
import os

face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
# Read the input image
#img = cv2.imread('test.png')

import cv2
import glob
Number_of_students = len(glob.glob('*.png'))
StudentAttendance = []
StudentsAttended = []
Student_encoding = []
f=0

def students():
    Student_encoding = []
    
    o=0
    for file in glob.glob('*.png'):
        Student_image = face_recognition.load_image_file(str(file))
        Student_encode = face_recognition.face_encodings(Student_image)
        Student_encoding.append(Student_encode)
        o+=1
        
        
    return(Student_encoding)
Student_encoding = students()
while True:
    results = []
    StudentsAttended = []
    o=0
    cap = cv2.VideoCapture(0)
    _, img = cap.read()
    cap.release()


    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, 1.2, 4)
    p = 0
    k=0
    å=0
    b=0
    v=0
    cap.release()  
    # Display the output
    if _ == True:
        for (x, y, w, h) in faces:
            cropped_img = img[y:y+h, x:x+w]
            cv2.imwrite("face" + str(p) +".jpg", cropped_img)
            p+=1
            date = datetime.datetime.fromtimestamp(os.path.getctime("face0.jpg"))
        

        
        for file in glob.glob('*.jpg'):
            v=0
            for fole in glob.glob('*.png'):
                print(fole)
                unknown_image = face_recognition.load_image_file(file)
                unknown_encoding = face_recognition.face_encodings(unknown_image)
                results.append(face_recognition.compare_faces(Student_encoding[v], unknown_encoding[0])[0])
                
                if results[v] == True:
                    StudentsAttended.append(str(glob.glob('*.png')[v]))
                    break
                if v >= len(glob.glob('*.png')):
                    break
                v+=1
            å+=1
            print(results)
        for file in glob.glob('*.jpg'):
            os.remove(file)            
        
        
        
        
        
        file = open("Attendance.txt","a")
        for p in range(len(StudentsAttended)):
            file.write("\n" + StudentsAttended[p] + ": " + str(date) + " <br> ")
            p+=1
        file.close()
        print("people detected")
        
    if f>= 2:  # if key 'q' is
        break  # finishing the loop
    f+=1
    time.sleep(30)
        
        
        

   
