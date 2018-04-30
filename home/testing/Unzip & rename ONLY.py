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
for i in iter: #iterate through files list in directory
    if i[(len(i)-4):] == ".csv" and i != "current.csv" and len(y) == 0: 
        # identifies the first .csv that isn't the current.csv
        y = i #set y to the csv's fullname
os.rename(y, "imported.csv") # give it a makes sense name
