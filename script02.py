#!/usr/bin/python3
import requests
from bs4 import BeautifulSoup
from pprint import pprint
url = 'https://notes.ayushsharma.in/technology'
data = requests.get(url)
print(data.text)

