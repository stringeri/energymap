#!/usr/bin/env python
# This file is intended to be run once a day. It updates the Historical Market CSV.
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
    newcsv = open('ERCOT Backcasted Load Profiles 2018 J.csv', 'rb') #init newcsv to be read
    with open('ERCOT Backcasted Load Profiles 2018 J.csv', 'rb') as origcsv: #modified from the 
        #python repository https://docs.python.org/2/library/csv.html
        origcsvr = csv.reader(origcsv, delimiter=' ', quotechar='|') #quote char and 
        #delimiter unnecessary; those are for parsing purposes.
        data = []
        data = [row for row in csv.reader(newcsv.read().splitlines())]
        #print origcsvr
        csvData = []
        for row in data:
            csvData.append(row) #put into lists, make them possible to
            #compare w/o messing with delimiter and quotechar settings
        #print csvData[0][12:len(csvData[0])]
        #print csvData.pop(0)
        #print csvData[0][12:len(csvData[0])-2]
        #print csvData[0]
        #print csvData[1]
        tableData = []
        #for i in csvData:
        #    tableData.append(i[12:len(i)-2]) #pull all data but the date and "N" DSTFlag
        #test = []
        #counter = 0
        #for i in csvData:
        #    test.append((i[12:len(i)-2]).split(","))
        #dataTable = gviz_api.DataTable(('Hour', 'string'),('Site', 'string'), ('Expected Price','number'))
        #dataTable.LoadData(tableData)
        #test.insert(0, ['Hour', 'Location', 'Price'])
        return 1, csvData
            
def Select(tableData, hour, minute, sort, term, start):
    #print tableData
    tableData.pop(0)
    hourData = []
    if hour != 25:
        if minute > 3:
            minute = minute-4
            hour = hour + 12
        if minute == 0:
            minadd = ":00"
        elif minute == 1:
            minadd = ":15"
        elif minute == 2:
            minadd = ":30"
        elif minute == 3:
            minadd = ":45"
        time = hour*4 + minute + 1 # offset index for the first two columns
        if time < 2:
            time = 2
        if time > 97:
            time = time - 97 #there exist 96 time entries starting at index 1
        if len(term) > 3:
            for i in tableData:
                if len(i)>=3 and i[0] == term:
                    i[time] = float(i[time])
                    i[time] = format(i[time], '.2f')
                    i[time] = float(i[time])
                    print i[1]
                    i[0] = i[0] + "@" + i[1] + "@" + str(hour) + str(minadd)
                    hourData.append([i[0], i[time]])
        else:
            for i in tableData:
                if len(i)>=3:
                    i[time] = float(i[time])
                    i[time] = format(i[time], '.2f')
                    i[time] = float(i[time])
                    #print i[1]
                    i[0] = i[0] + "@" + i[1] +"@" + str(hour) + str(minadd)
                    hourData.append([i[0], i[time]])
    else:
        if term != "":
            for i in tableData:
                if len(i)>=3 and i[1] == term:
                    i[2] = float(i[2])
                    i[2] = format(i[2], '.2f')
                    i[2] = float(i[2])
                    x = i.pop(0)
                    i[0] = i[0] + " @ " + x
                    hourData.append(i)
        else:
            for i in tableData:
                if len(i)>=3:
                    i[2] = float(i[2])
                    i[2] = format(i[2], '.2f')
                    i[2] = float(i[2])
                    x = i.pop(0)
                    i[0] = i[0] + " @ " + x
                    hourData.append(i)
    if sort == "Low":
        hourData.sort(key = lambda x: x[1])
    elif sort == "High":
        hourData.sort(key = lambda x: x[1]) #sort all lowest to highest
        hourData.reverse() #reverse
    hourData = hourData[start:start+10]
    hourData.sort(key = lambda x: x[1]) #set the ten in lowest to highest
    for i in hourData:
        i[1] = "$" + str(i[1])
        x= i[1].find('.')
        if len(i[1][x:]) <= 2:
            i[1] = i[1] + "0"
    hourData.insert(0,['Location and Time', 'Price Per Kw/H'])
    
    return hourData
                

def main():
    hour = int(sys.argv[1])
    minute = int(sys.argv[2])
    sort = sys.argv[3]
    term = sys.argv[4]
    start = 0
#    hour = 0
#    sort = "No Sort"
#    term = ''
#    start = 0
#    minute = 0
    success, tableData = unzipCompareCompile()
    finalData = Select(tableData, hour, minute, sort, term, start)
    print finalData
#    return success, tableData
main()


    
