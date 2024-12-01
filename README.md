Walidacja Faktury XML
Opis projektu

Ten projekt to prosta aplikacja internetowa umożliwiająca walidację plików XML względem określonego schematu XSD. Używając formularza HTML, użytkownik może przesłać plik XML, który zostanie sprawdzony pod kątem zgodności ze schematem.
Funkcjonalności

    Przesyłanie pliku XML przez użytkownika za pomocą formularza.
    Walidacja pliku XML względem schematu XSD (plik schemat.xsd).
    Wyświetlanie wyników walidacji (poprawność lub szczegółowe błędy).

Technologie

    HTML5, CSS (Bootstrap 5.3.0)
    PHP (libxml)

Wymagania

    Serwer obsługujący PHP (np. Apache, Nginx).
    Zainstalowane rozszerzenie PHP libxml.
    Plik schematu XSD (schemat.xsd) umieszczony w katalogu głównym projektu.

Instalacja

    Sklonuj repozytorium na swój serwer:

    git clone https://github.com/<twoja-nazwa-uzytkownika>/walidacja-faktury-xml.git

    Skopiuj plik schematu XSD do katalogu głównego projektu jako schemat.xsd.
    Upewnij się, że serwer ma włączone przesyłanie plików:
        W pliku php.ini upewnij się, że dyrektywa file_uploads jest ustawiona na On.
    Otwórz projekt w przeglądarce.

Struktura projektu

walidacja-faktury-xml/
│
├── index.php         # Główny plik aplikacji

├── schemat.xsd       # Plik schematu XSD (do dodania przez użytkownika)

└── README.md         # Dokumentacja projektu


Jak używać

    Prześlij plik XML korzystając z formularza na stronie.
    Kliknij przycisk Waliduj.
    Wynik walidacji zostanie wyświetlony:
        Zielony komunikat, jeśli plik XML jest poprawny.
        Czerwony komunikat z listą błędów, jeśli plik XML jest niezgodny z XSD.

Przykładowe błędy

Jeśli plik XML zawiera błędy, zostaną one wyświetlone w formacie:

    Typ błędu (Warning, Error, Fatal Error)
    Lokalizacja błędu (linia, kolumna)
    Szczegółowa wiadomość o błędzie

Wsparcie

W przypadku problemów proszę otworzyć zgłoszenie w sekcji Issues na GitHubie.
Licencja

Projekt jest udostępniany na licencji MIT. Szczegóły w pliku LICENSE.
