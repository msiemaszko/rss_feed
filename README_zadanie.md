Prosty fetch RSS/Atom
Celem zadania jest napisanie prostego programu PHP uruchamianego z CLI (Windows CMD, Unix Shell), który z danego adresu URL pobierze dane RSS/Atom i zapisze je do pliku *.csv

Napisany program ma wykonywać 2 polecenia:
* csv:simple URL PATH - pobranie z URL danych RSS/Atom i zapisanie ich do pliku PATH.csv określonego przez w ścieżce PATH. Stare dane z pliku PATH.csv mają być nadpisane.
* csv:extended URL PATH - pobranie z URL danych RSS/Atom i dopisanie ich do pliku PATH.csv określonego przez w ścieżce PATH. Stare dane z pliku PATH.csv mają być dopisane.

Dodatkowe wymagania:
* URL testowy to http://feeds.nationalgeographic.com/ng/News/News_Main
* plik *.csv określany przez ścieżkę PATH ma mieć kolumny z nagłówkami "title", "description", "link, "pubDate", "creator" i wartości tych kolumn.
* wartość z kolumny "pubDate" powinna być w formacie 2012-11-14 15:31:33.
* pliki źródłowe programu powinny być zawarte w podkatalogu "src/", natomiast "namespace" aplikacji powinien nazywać się ImieNazwisko np.: <?php use ImieNazwisko\ExampleCatalog\ExampleClass
* plik startowy do uruchamiania z CLI powinien nazywać się "src/console.php", tak aby np. zadziałało uruchomienie z konsoli polecenie: "php src/console.php csv:simple http://feeds.nationalgeographic.com/ng/News/News_Main eksport_prosty.csv"
* program ma mieć testy jednostkowe (zgodne phpunit) umieszczone w podkatalogu "test/", tak aby można je uruchomić przez polecenie w konsoli: "phpunit"

Dodatkowe informacje:
* można użyć szkieletu przykładowego szkieletu composera np.: https://github.com/SammyK/package-skeleton (można wybrać inny szkielet z Internetu)
* można dociągać dowolne pakiety i biblioteki zgodne ze standardem composera
* dobrze oceniane będzie dodanie prostej dokumentacji jak na: https://github.com/SammyK/package-skeleton aby było wiadomo jak odpalić projekt/program
* dobrze będą oceniane zastosowane standardy kodowania, wzorce projektowe, organizacja struktury programu, zabezpieczenia na sytuacje wyjątkowe/nieprzewidziane i brak błędów w aplikacji
