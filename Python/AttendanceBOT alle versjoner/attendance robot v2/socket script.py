import socket

HOST = ''
PORT = 9876
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.bind((HOST, PORT))
s.listen(5)
conn, addr = s.accept()
print 'Connected by', addr
conn.send("Hello")
while 1:
    data = conn.recv(4096)
    print data
    if not data: break
    conn.sendall(data)
conn.close()