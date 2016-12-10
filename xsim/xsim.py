#!/usr/bin/python
#==================================================
# xsim_client.py
# 2016-12-06
# Benny Saxen
#==================================================
import time
import httplib
import os
g_client_name = 'benny'
g_server      = 'nabton.com'
g_path        = '/xsim/xsim.php'
g_box         = 'folke@nabton.com:/var/www/html/xsim/.'
g_delay       = 5
g_any = g_path+ "?msg=1&client=%s" % (g_client_name) 
while 1:
    conn = httplib.HTTPConnection(g_server)
    try:
        conn.request("GET", g_any)
        try:
            r1 = conn.getresponse()
            print ("Server Response:-_- %s %s " % (r1.status, r1.reason))
            line = r1.read()
            print line
            # check if data1 has any order
            if 'xsim:' in line:
                order=line.split(':')
                xsys = order[1] + " > %s.res" % (g_client_name)
                print line
                print xsys
                os.system(xsys);
                xsys = "scp %s.res %s" % (g_client_name, g_box)
                os.system(xsys)
        except:
            print '-_- No response from server'
    except:
        print '-_- Not able to connect to server '+g_server
    conn.close()
    time.sleep(g_delay)
# End of file