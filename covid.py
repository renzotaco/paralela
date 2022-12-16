import requests
from bs4 import BeautifulSoup
from pprint import pprint
url = 'https://www.worldometers.info/coronavirus/countries-where-coronavirus-has-spread/'
page = requests.get(url)
soup = BeautifulSoup(page.text, 'html.parser')
data = []
data_iterator = iter(soup.find_all('td'))
archivo = open("covid.csv", "w")

while True:
	try:
		country = next(data_iterator).text
		confirmed = next(data_iterator).text
		deaths = next(data_iterator).text
		continent = next(data_iterator).text
		data.append((
			country,
			(confirmed.replace(', ', '')),
			(deaths.replace(', ', '')),
			continent
			))
		archivo.write(country + " | " + (confirmed.replace(', ', '')) + 
			" |" + (deaths.replace(', ', '')) + " | " + continent + "\n")
	except StopIteration:
		break
data.sort(key = lambda row: row[1], reverse = True)

import texttable as tt
table = tt.Texttable()
table.add_rows([(None, None, None, None)] + data)
table.set_cols_align(('c', 'c', 'c', 'c'))
table.header((' Country ', ' Number of cases ', ' Deaths ', ' Continent '))
print(table.draw())
archivo.close()
