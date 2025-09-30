import pandas as pd

# Carica i dati degli artisti con specifica della codifica UTF-8
artists = pd.read_csv('/Users/Ste/Desktop/database_project-main/csv/artist_data.csv', dtype=str, encoding='utf-8')

 

# Salva i dati puliti degli artisti con codifica UTF-8
artists.to_csv('/Users/Ste/Desktop/database_project-main/csv/clean_artist_data.csv', index=False, encoding='utf-8')

# Carica i dati delle opere con specifica della codifica UTF-8
artworks = pd.read_csv('/Users/Ste/Desktop/database_project-main/csv/artwork_data.csv', dtype=str, encoding='utf-8')

# Pulizia dei dati delle opere
artworks = artworks.drop_duplicates()
artworks['title'] = artworks['title'].fillna("Untitled")
artworks['dateText'] = artworks['dateText'].replace(['date not known', 'no date'], 'Unknown')
artworks['medium'] = artworks['medium'].fillna("Unknown")
artworks['creditLine'] = artworks['creditLine'].fillna("No credit")
artworks['dimensions'] = artworks['dimensions'].fillna("Dimensions not listed")
artworks['width'] = artworks['width'].fillna("Unknown")
artworks['height'] = artworks['height'].fillna("Unknown")
artworks['depth'] = artworks['depth'].fillna("Unknown")
artworks['units'] = artworks['units'].fillna("mm")

# Verifica e rimuovi colonne non necessarie
if 'thumbnailCopyright' in artworks.columns:
    artworks = artworks.drop(columns=['thumbnailCopyright'])

# Salva i dati puliti delle opere con codifica UTF-8
artworks.to_csv('/Users/Ste/Desktop/database_project-main/csv/clean_artwork_data.csv', index=False, encoding='utf-8')
