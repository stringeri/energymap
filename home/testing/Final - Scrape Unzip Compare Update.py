#!/usr/bin/env python
import sys
import zipfile
import os
import csv
from bs4 import BeautifulSoup#from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url
from urllib import urlopen, urlretrieve, quote #from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url
url = 'http://mis.ercot.com/misapp/GetReports.do?reportTypeId=12328&reportTitle=DAM%20Hourly%20LMPs&showHTMLView=&mimicKey'#modified from https://stackoverflow.com/questions/20986640/scraping-download-files-from-ur
u = urlopen(url)#modified from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url
html = u.read().decode('utf-8')#modified from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url
counter = 0
y = ""
comparelist = []
tocompare = []
osdir = '/home/ubuntu/workspace/'
for pos, letter in enumerate(html):
    if letter == "=" and html[pos-1] == 'd' and html[pos-2] == 'I':
        counter +=1 #first two hits are not what we want, 
        #toss that garbo out... if file being pulled is wrong, reenable print
        #statement - the html may be subject to change on their end.
        if counter == 2: #Only record the first csv
            addressend = html[pos-57:pos+10]
            address = 'http://mis.ercot.com' + addressend #the address of the csv
            urlretrieve(address, 'imported.zip')
        #    print address

zip_ref = zipfile.ZipFile("imported.zip", 'r') #open the zip/point to it
zip_ref.extractall("") #extract the zipfile contents
zip_ref.close() #'close the file back up'... probably deallocates pointer?
iter = os.listdir(osdir) #returns the list of files in the directory
for i in iter: #iterate through files list in directory
    if i[(len(i)-4):] == ".csv" and i != "current.csv" and len(y) == 0: 
        # identifies the first .csv that isn't the current.csv
        y = i #set y to the csv's fullname
if len(y)>0: #if a csv was found
    os.rename(y, "imported.csv") # give it a makes sense name
    newcsv = open('imported.csv', 'rb') #init newcsv to be read
    with open('current.csv', 'rb') as origcsv: #modified from the 
        #python repository https://docs.python.org/2/library/csv.html
        origcsvr = csv.reader(origcsv, delimiter=' ', quotechar='|') #quote char and 
        #delimiter unnecessary; those are for parsing purposes.
        newcsvr = csv.reader(newcsv, delimiter=' ', quotechar='|')
        for row in origcsvr:
            comparelist.append(row[0]) #put into lists, make them possible to
            #compare w/o messing with delimiter and quotechar settings
        for row in newcsvr:
            tocompare.append(row[0])
        if comparelist == tocompare:
            print "They're the same."
            os.remove('imported.csv')    #removes new csv if same
            sys.exit(1) 
        else: 
            print "time to update" #If CSV's not same, remove old one,
            #rename new one to current.
            os.remove("current.csv")
            os.rename("imported.csv", "current.csv")
            sys.exit(0)
            
else:
    print "DAM CSV not found, upload one ASAP."