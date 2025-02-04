# A feladat

## Általános leírás
A feladatunk arra a problémára keresi a megoldást, mikor a családból senki nem tudja eldönteni, hogy mit is kéne enni? Ezt tovább gondolva a célunk hogy a felhasználó egy egész heti véletlenszerűen mégis megfelelően összeállított menüt kapjon egy pár szükséges kérdés megválaszolása után. Ebből adódóan a heti étrend paraméterezhető is lesz abból a szempontból, hogy melyik nap hány emberre szeretnénk főzni. Miután ez mind megtörtént a felhasználó kap egy bevárásrló listát is amiben részletesen megkapja hogy a milyen hozzávalókat kell beszerezzen, amit ki is nyomtathat.
A feladatot egy webes alkalmazás formájában valósítjuk meg, ami mögött(Backend) egy adatbázis áll majd az ehhez szükséges adatokkal, például az ételen elkészítéséhez szükséges receptekkel és hozzávalókkal.
A feladat alapja egy txt-alapű adatbázis ami több mint 100 ételt tartalmaz a hozzávalókkal és receptekkel. Ezt inportáljuk az adatbázisba miközben az egészet kiegészítjük a saját ötleteinkel is.

## Szerepkörök
Az oldal használata regiszrációhoz kötött, két szerepkör létezik.
- admin : 
    - Teljes körű hozzáféréssel rendelkezik.
    - Feltöltheti és módosíthatja a recepteket és a hozzá tartozó alapanyagokat.
- vendég : 
    - Böngészhet a receptek között.
    - Generálhat magának heti menüt.
    - Bevásárló listát nyomtathat a receptekről illetve a napi menüjéről.

## Technológiai
- Adatbázis: MySQL vagy PostgreSQL
- Backend: Laravel
- Frontend: Vue.js
- Dizájn: Bootstrap, saját CSS
- Csoportmunka: git, GitHub
- Kommunikáció: Teams, Discord
- Projekt terv: GitHub projekt felülete

## Csapattagok
Juhász Gergő, Molnár Krisztián (csoportvezető)
