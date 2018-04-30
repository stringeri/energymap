#!/usr/bin/env python
# This file is intended to be run once a day. It updates the DAM CSV.
# Can be manually run at !FIXME
import sys
import zipfile
import os
import csv
import json
import gviz_api
from bs4 import BeautifulSoup#from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url
from urllib import urlopen, urlretrieve, quote #from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url

def unzipCompareCompile():
    url = 'http://mis.ercot.com/misapp/GetReports.do?reportTypeId=12328&reportTitle=DAM%20Hourly%20LMPs&showHTMLView=&mimicKey'#modified from https://stackoverflow.com/questions/20986640/scraping-download-files-from-ur
    u = urlopen(url)#modified from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url
    html = u.read().decode('utf-8')#modified from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url
    counter = 0
    y = ""
    comparelist = [] # used to compare new/old csv data
    tocompare = []
    dataTable = gviz_api.DataTable(('Hour', 'string'),('Site', 'string'), ('Expected Price','number'))
    osdir = '/home/ubuntu/workspace/DAM'
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
        if i[(len(i)-4):] == ".csv" and i != "currentDAM.csv" and len(y) == 0: 
            # identifies the first .csv that isn't the currentDAM.csv
            y = i #set y to the csv's fullname
    if len(y)>0: #if a csv was found
        os.rename(y, "imported.csv") # give it a makes sense name
        newcsv = open('imported.csv', 'rb') #init newcsv to be read
        with open('currentDAM.csv', 'rb') as origcsv: #modified from the 
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
                print "Up To Date"
                os.remove('imported.csv')    #removes new csv if same
                print tocompare[0][12:len(tocompare[0])]
                tocompare.pop(0)
                print tocompare[0][12:len(tocompare[0])-2]
                tableData = []
                for i in tocompare:
                    tableData.append(i[12:len(i)-2]) #pull all data but the date and "N" DSTFlag
                test = []
                counter = 0
                for i in tocompare:
                    test.append((i[12:len(i)-2]).split(","))
                dataTable.LoadData(tableData)
                test.insert(0, ['Hour', 'Location', 'Price'])
                #print test[1]
                return 1, test
            else: 
                print "Updated" #If CSV's not same, remove old one, and...
                #...rename new one to currentDAM.
                os.remove("currentDAM.csv")
                os.rename("imported.csv", "currentDAM.csv")
                counter = 0
                for field in tocompare:
                    if counter > 0: #zero contains column names - this is superfluous
                        field[12:len(field)-2] #pull all data but the date and "N" DSTFlag
                    counter += 1
                return 2, "blah" 
                
    else:
        print "DAM CSV not found, upload one ASAP and Verify URL being pulled is correct!"
def Select(tableData, Hour):
    tableData.pop(0)
    hourData = [['Location', 'Price']]
    if Hour == 0 :
        for i in tableData:
            if len(i)>=3 and i[0] == '1:00'and type(i) == list and len(hourData) < 10:
                i[2] = float(i[2])
                i.pop(0)
                hourData.append(i)
                
    return hourData
                

def main():
    
    success, tableData = unzipCompareCompile()
    Hour = 0
    finalData = Select(tableData, Hour)
    print finalData
    return success, tableData
main()


    
