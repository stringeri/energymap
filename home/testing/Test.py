#!/usr/bin/env python
import sys
f = open("testtext.txt","w+")
for i in range(99):
    f.write("This is a test of the crontab system and its python running capabilities " + str(i)+"\n")
f.close()
sys.exit(1)