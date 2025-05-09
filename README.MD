
Legelső lépésként klónozzuk le ezt a repozitóriumot a git clone parancssal, amit a Git nevű program használatával lehet megoldani akár a Visual Studio Code-ban

# Adatbázis

- A mappa gyökerében van egy mentés az adatbázisról.

- Ahhoz, hogy ezeket az adatokat használni lehessen, a XAMMP letelepítése elengedhetetlen, mivel a adatbázistkezelő (MySQL) és a  backend indításához szükséges PHP szerver ebben van, és ezért le kell telepítenünk [innen](https://www.apachefriends.org/hu/download.html).

- Ha letepeítettük, utána indítsuk el a programot. Ha ez megtörtént, ezt kell látnunk :
    ![Kép](/Backend/img/xammp_startlap.png)

- Apache és a MySQL szervereket kell  elindítanunk. Így kell fog kinézni, ha mindent jól csináltunk:
    ![Kép](/Backend/img/xammp_working.png)

- Ha eddig megcsináltunk mindent, akkor nyomjuk meg a Stop melleti Admin fület, és akkor ezt kell látnunk:
    ![Kép](/Backend/img/php_admin.png)

- Majd az imporálás gombra rákattintva importáljuk be az sql fájlt itt a tallózás gombra kattintva:
    ![Kép](/Backend/img/php_admin.png.png)
    
- Ha sikerült importálnunk ezt kell látnunk:

# Backend

- Szükségünk lesz a: [Composer](https://getcomposer.org/download/) nevű programra és a [Visual Studio Code](https://code.visualstudio.com/) programra.

- Miután ezekkel megvagyunk, nyissuk meg a letöltött mappát a Visual Studio Code segítségével. A Ctrl + Ö billentyűkombinációval megnyithatjuk a beépített terminált, majd a cd backend paranccsal lépjünk be a backend nevű mappába.

- Ezután a "composer install" paranccsal letudjuk telepíteni a Laravel keretrendzserhez szükséges fájlokat. Ezeket a vendor mappába helyezi bew.

- Innán már csak annyi a dolgunk hogy a be írjuk a " php artisan serve" parancsot, és elindul a Backend oldalunk.


- Ha teszteket is szeretnénk futtatni, először importáljuk be a tesztadatbázist a phpMyAdmin felületére a "" fájl segítségével. Ez lényegében megegyezik az eredeti adatbázissal, csak más néven szerepel. Ezt követően nyissunk egy új terminált, és futtassuk le a php artisan test parancsot.

# Frontend 

-  Mindenek előtt telepítsük le a [Node.js](https://nodejs.org/en) programot, és ezzel egyaránt az npm csomagkezelő is letelepül, ami az egyil legfontosabb a fraontend beindításához.

- Kövessük a parancsokat, és ha ezzel megvagyunk, nyissunk egy új terminált, lépjünk be a frontend mappába, majd futtassuk az npm i parancsot. Ez letölti az összes szükséges csomagot a projekt megfelelő működéséhez.

- A projekt elindításához adjuk ki az npm run dev parancsot. Ha a megjelenő localhost-os linkre kattintunk miközben lenyomva tartjuk a Ctrl billentyűt, akkor megnyílik a weboldal böngészőben.

- Az end-to-end tesztek telepítéséhez használjuk az npx playwright install parancsot.

- A frontend tesztelését pedig az npm run test:unit és npm run test:e2e parancsokkal végezhetjük el egy külön terminálban.
=======
