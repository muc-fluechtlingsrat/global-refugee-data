import requests
from bs4 import BeautifulSoup
url = 'https://www.cia.gov/library/publications/the-world-factbook/fields/2194.html'
page = requests.get(url)
soup = BeautifulSoup(page.content, 'html.parser')
for row in soup.tbody.children:
    if row != '\n':
        countryCandidate = row.find('td', 'country')
        if countryCandidate is not None:
            print(countryCandidate.a.string)
        fieldCandidate = row.find('td', 'fieldData')
        if fieldCandidate is not None:
            # field.Candidate.string did NOT work
            # still need to figure out how to get rid of tags
            print(fieldCandidate)