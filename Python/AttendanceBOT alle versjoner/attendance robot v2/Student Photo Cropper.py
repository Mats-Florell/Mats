import cv2
face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
Path = input("Path to the class photo: ")
img = cv2.imread(Path)
print(img)

gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
faces = face_cascade.detectMultiScale(gray, 1.2, 4)
p=0
for (x, y, w, h) in faces:
            cropped_img = img[y:y+h, x:x+w]
            cv2.imwrite("Student" + str(p) +".png", cropped_img)
            p+=1
        