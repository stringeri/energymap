#!/usr/bin/env python
import zipfile
import os
import csv

osdir = '/home/ubuntu/workspace/'
zip_ref = zipfile.ZipFile("imported.zip", 'r') #open the zip/point to it
y = ""
comparelist = []
tocompare = []

zip_ref.extractall("") #extract the zipfile contents
zip_ref.close() #'close the file back up'... probably deallocates pointer?

iter = os.listdir(osdir) #returns the list of files in the directory
#f = open("testtext.txt","w+") #opens testtext fo testing/debug purposes
for i in iter: #iterate through files list in directory
#    f.write(i + '\n') #write file name to testtext
    if i[(len(i)-4):] == ".csv" and i != "current.csv" and len(y) == 0: 
        # identifies the first .csv that isn't the current.csv
        y = i #set y to the csv's fullname
#f.close() #directory listed, close

if len(y)>0: #if a csv was found
    os.rename(y, "1current.csv") # give it a makes sense name
    newcsv = open('1current.csv', 'rb') #init newcsv to be read
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
            print "precious"
            os.remove('1current.csv')    #removes new csv if same
        else: 
            print "time to update" #If CSV's not same, remove old one,
            #rename new one to current.
            os.remove("current.csv")
            os.rename("1current.csv", "current.csv")
            
else:
    print "DAM CSV not found, upload one ASAP."