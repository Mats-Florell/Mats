import cv2
import os
import time
import face_recognition
import datetime
import os
import pyscript

face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
# Read the input image
#img = cv2.imread('test.png')
cap = cv2.VideoCapture(0)
i=0
import cv2
import glob
Number_of_students = len(glob.glob('*.png'))
StudentAttendance = []
StudentsAttended = []

while cap.isOpened():
    _, img = cap.read()


    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, 1.1, 4)

    for (x, y , w ,h) in faces:
        cv2.rectangle(img, (x,y), (x+w, y+h), (255, 0 , 0), 3)
    # Display the output
    if _ == True:
        cv2.imwrite('img.jpg', img)
        
        cap.release()
        unknown_image = face_recognition.load_image_file("img.jpg")
        unknown_encoding = face_recognition.face_encodings(unknown_image)[0]
        

        Student_encoding = []
        for file in glob.glob('*.png'):
            Student_image = face_recognition.load_image_file(str(file))
            Student_encoding.append(face_recognition.face_encodings(Student_image)[0])
            i=i+1
        results = face_recognition.compare_faces(Student_encoding, unknown_encoding)
        T = os.path.getctime("img.jpg")
        date = datetime.datetime.fromtimestamp(T)
        os.remove("img.jpg")
        file = open("Attendance.txt","a")
        for q in range(len(results)):
            if results[q] == True:
                StudentsAttended.append(str(glob.glob('*.png')[q]))
        for p in range(len(StudentsAttended)):
            StudentAttendance.append(str(glob.glob('*.png')[p]))
            file.write("\n" + StudentsAttended[p] + ": " + str(date) + ", ")
        file.close()
        
        
        

    if ('q'):  # if key 'q' is pressed 
        print('stopping')
        break  # finishing the loop
        
