# -*- coding: utf-8 -*-
import time
import commands
import threading
from time import ctime,sleep

def compile(timeout,user_id,connection):  
	(status, output0) = commands.getstatusoutput('docker run  -i -t -d\
                                                    -v $(pwd)/public/source/'+user_id+'/:/home/\
                                                    c5b46ff5017e sh /compile.sh')
	for i in range(timeout):			
		(status, output1) = commands.getstatusoutput('docker logs '+output0)
		time.sleep(1)
		if output1:
			connection.send('%d.'+output1)
			(status, output0) = commands.getstatusoutput('docker rm '+output0)
			connection.close()
			return 1	
	(status, output0) = commands.getstatusoutput('docker kill '+output0)
	(status, output0) = commands.getstatusoutput('docker rm '+output0)
	print "something wrong"%num	
	connection.close()		
	return 0

def battle(timeout,a_id,b_id,connection,map_name):  
	(status, output0) = commands.getstatusoutput('docker run  -i -t -d\
                                                    -v $(pwd)/public/source/'+a_id+'/:/home/a/\
                                                    -v $(pwd)/public/source/'+b_id+'/:/home/b/\
                                                    -v $(pwd)/public/source/'+a_id+'vs'+b_id+'/:/home/result/\
                                                    -e MAP='+map_name+' c5b46ff5017e sh /battle.sh')
	for i in range(timeout):			
		(status, output1) = commands.getstatusoutput('docker logs '+output0)
		time.sleep(1)
		if output1:
			connection.send('%d.'+output1)
			(status, output0) = commands.getstatusoutput('docker rm '+output0)
			connection.close()
			return 1	
	(status, output0) = commands.getstatusoutput('docker kill '+output0)
	(status, output0) = commands.getstatusoutput('docker rm '+output0)
	print "something wrong"%num	
	connection.close()		
	return 0


threads = []
if __name__ == '__main__':  
    import socket  
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)  
    sock.bind(('', 8001))  
    sock.listen(5)  
    while True:  
        connection,address = sock.accept()  
        try:  
            connection.settimeout(15)  
            buf = connection.recv(1024)
            buf =buf.split('\n')
            if buf[0] == 'c':  
                connection.send('welcome to server!')
                t = threading.Thread(target=compile,args=(5,buf[1],connection))
                t.setDaemon(True)
                t.start()
            else:
                if buf[0] == 'b' :  
                    connection.send('welcome to server!')  
                    t = threading.Thread(target=battle,args=(60,buf[1],buf[2],connection,buf[3]))
                    t.setDaemon(True)
                    t.start()
                else:
                    connection.send('Not supported!')
        except socket.timeout:  
            print 'time out'  
      
