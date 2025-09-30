from sqlalchemy import create_engine

def connect_to_database():
    username = 'your_username'  # sostituisci con il tuo username per MySQL
    password = 'your_password'  # sostituisci con la tua password per MySQL
    host = 'localhost'          # l'host del database, tipicamente localhost per sviluppo locale
    database = 'your_database'  # il nome del tuo database
    engine = create_engine(f'mysql+mysqlconnector://{username}:{password}@{host}/{database}')
    return engine

if __name__ == "__main__":
    engine = connect_to_database()
    print("Connessione al database riuscita:", engine)
