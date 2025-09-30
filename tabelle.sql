-- Creazione del database
CREATE DATABASE IF NOT EXISTS art_collection;
USE art_collection;

-- Creazione della tabella per gli artisti
CREATE TABLE IF NOT EXISTS artists (
    artist_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL DEFAULT 'Unknown Artist',
    gender VARCHAR(50) NOT NULL DEFAULT 'Unknown',
    yearOfBirth VARCHAR(50) NOT NULL DEFAULT 'Unknown',
    yearOfDeath VARCHAR(50) NOT NULL DEFAULT 'Unknown',
    placeOfBirth VARCHAR(255) NOT NULL DEFAULT 'Unknown',
    placeOfDeath VARCHAR(255) NOT NULL DEFAULT 'Unknown',
    url VARCHAR(255) NOT NULL DEFAULT 'Unknown'
);

-- Creazione della tabella per le opere d'arte
CREATE TABLE IF NOT EXISTS artworks (
    artwork_id INT AUTO_INCREMENT PRIMARY KEY,
    accession_number VARCHAR(255) NOT NULL DEFAULT 'Untitled',
    title VARCHAR(255) NOT NULL DEFAULT 'Untitled',
    dateText VARCHAR(255) NOT NULL DEFAULT 'Unknown',
    medium VARCHAR(255) NOT NULL DEFAULT 'Unknown',
    creditLine VARCHAR(255) NOT NULL DEFAULT 'No credit',
    year VARCHAR(255) NOT NULL DEFAULT 'Unknown',
    acquisitionYear VARCHAR(255) NOT NULL DEFAULT 'Unknown',
    dimensions VARCHAR(255) NOT NULL DEFAULT 'Dimensions not listed',
    width VARCHAR(50) NOT NULL DEFAULT 'Unknown',
    height VARCHAR(50) NOT NULL DEFAULT 'Unknown',
    depth VARCHAR(50) NOT NULL DEFAULT 'Unknown',
    units VARCHAR(10) NOT NULL DEFAULT 'mm',
    inscription VARCHAR(255) NOT NULL DEFAULT 'Unknown',
    thumbnailCopyright VARCHAR(255) NOT NULL DEFAULT 'Unknown',
    thumbnailUrl VARCHAR(255) NOT NULL DEFAULT 'Unknown',
    url  VARCHAR(255) NOT NULL DEFAULT 'Unknown'
);

-- Importa i dati degli artisti dal file CSV
LOAD DATA LOCAL INFILE '/Users/Ste/Desktop/database_project-main/csv/clean_artist_data.csv'
INTO TABLE artists
CHARACTER SET utf8mb4
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(name, gender, yearOfBirth, yearOfDeath, placeOfBirth, placeOfDeath, url);

-- Importa i dati delle opere dal file CSV
LOAD DATA LOCAL INFILE '/Users/Ste/Desktop/database_project-main/csv/clean_artwork_data.csv'
INTO TABLE artworks
CHARACTER SET utf8mb4
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(accession_number, title, dateText, medium, creditLine, year, acquisitionYear, dimensions, width, height, depth, units, inscription, thumbnailCopyright, thumbnailUrl, url);
