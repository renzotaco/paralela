#!/usr/bin/env python3
from urllib.request import urlopen
from bs4 import BeautifulSoup
html = urlopen("http://www.gnu.org")
bsObj = BeautifulSoup(html.read(),'lxml');
print (bsObj.title)
