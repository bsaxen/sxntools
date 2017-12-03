#!/usr/bin/python
#==================================================
# xsim_client.py
# 2017-12-02
# Benny Saxen
#
# Prepare client for copy file to server
# ssh-keygen -t rsa
# ssh-copy-id <user>@<url>
#==================================================
import time
import httplib
import os
g_client_name = 'test_name'
g_server      = 'url-xsim-server'
g_path        = '/xsim.php' # set correct doc root
g_box         = 'user@xsim-url.com:/var/www/html/sxntools/xsim/.'
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
            if 'xsim:' in line:
                order=line.split(':')
                g_delay = float(order[2])
                f = open('work','w')
                f.write(order[1])
                f.close()
                xsys = "sh ./work > %s.res 2>&1" % (g_client_name)
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
