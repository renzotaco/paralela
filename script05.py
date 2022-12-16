#!/usr/bin/env python3
import requests
from bs4 import BeautifulSoup
from pprint import pprint
url = 'https://notes.ayushsharma.in/technology'
data = requests.get(url)
my_data = []
html = BeautifulSoup(data.text, 'html.parser')
archivo = open("webscraping.txt", "w")
articles = html.select('a.post-card')
for article in articles:
	title = article.select('.card-title')[0].get_text()
	excerpt = article.select('.card-text')[0].get_text()
	pub_date = article.select('.card-footer small')[0].get_text()
	my_data.append({"title": title, "excerpt": excerpt, "pub_date": pub_date})
	archivo.write(title + " | " + excerpt + " | " + pub_date + "\n")
pprint(my_data)
archivo.close()
