import zipfile
import os
import csv
counter = 0
comparelist = []
tocompare = []
#f = open("testtext.txt","w+")
newcsv = open('1current.csv', 'rb')
with open('current.csv', 'rb') as origcsv:
        origcsvr = csv.reader(origcsv, delimiter=' ', quotechar='|')
        newcsvr = csv.reader(newcsv, delimiter=' ', quotechar='|')
        for row in origcsvr:
            comparelist.append(row[0])
        for row in newcsvr:
            tocompare.append(row[0])

        if comparelist == tocompare:
            print "precious"
        else: 
            print "time to update"
                    
                
#f.close()