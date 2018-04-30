from bs4 import BeautifulSoup#from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url
from urllib import urlopen, urlretrieve, quote #from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url
url = 'http://mis.ercot.com/misapp/GetReports.do?reportTypeId=12328&reportTitle=DAM%20Hourly%20LMPs&showHTMLView=&mimicKey'#modified from https://stackoverflow.com/questions/20986640/scraping-download-files-from-ur
u = urlopen(url)#modified from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url
html = u.read().decode('utf-8')#modified from https://stackoverflow.com/questions/20986640/scraping-download-files-from-url
counter = 0
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