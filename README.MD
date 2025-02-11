# Táblák

## Users
 
>**id(azonosító) :** *A felhasználó azonosítója, int(10), autoIncrement*
 
>**username(Felhasználónév) :** Itt van a felhasználónév, string(25), notNull
 
> **roleId** -> A szerepkörhöz tartozó jogok [1 (admin), 2 (vendég)]

## Szerepkörök

> **id(azonosító)** -> A szerepkör azonosítója
 
> **role(szerepkör)** -> Itt vannak a szerepkörök, string(10), notNull

## Ételétkezés több több kapcsolat

>**id(azonosító) :** Az ételek azonosítója, int(10), autoIncrement*

>**etelId :** -> Itt vannak az ételek azonosítójai

>**etkezesId :** -> 

## Etkezések

>**id(azonosító) :** *Az étel azonosítója, int(10), autoIncrement*

>**etkezes :** -> Itt találhatóak meg a, reggeli, ebédek első és második fogása, ebéd desszert és a vacsora ételei

## MennyiségEgységek

>**id(azonosító) :** *A mennyiség egységek azonosítója, int(10), autoIncrement*

>**egységek :** -> Itt található az alapanyagok 

## Alapanyagok
>**id(azonosító) :** *Az alapanyagok azonosítója, int(10), autoIncrement*
>**alapanyagok :** -> Itt található az alapanyagok az ételekhez

## Kategoriák

>**id(azonosító) :** *A kategóriák aznososítója, int(10), autoIncrement*
>**name(nev) :** -> A különbötő kategóriák talűlhatóak meg itt

## Ételek

>**id(azonosító) :** *Az ételek azonosítója, int(10), autoIncrement*
>**nev(name) :** -> Itt találhatóak meg az ételek
>**etkezesId :** -> 

## Hozzávalók

>**id(azonosító) :** *A hozzávalók azonosítója, int(10), autoIncrement*
>**quantity(mennyiség) :** -> A ételeknek a hozzávalójuknak a mennyisége található meg itt
>**mennyisegegysegId :** 
>**etelId :** -> Az ételnek az azonosítója
>**alapanyagId :**-> Mennyi alapanyag kell az ételhez/ételekhez
>**hanyforeId :** -> Hány főre akarják a menüt

## Napi menük

>**id(azonosító) :** *A napi menü azonosítója, int(10), autoIncrement*
>**userId(felhasználói azonosító) :** 
>**hetNapjai :** -> Itt látható a hét napjai
>**hanyfore :** -> Itt lehet megadnia a felhasználónak hogy hány főre szeretné a napi menüjét

## Menü étkezés

>**id(azonosító) :** *A napi menü azonosítója, int(10), autoIncrement*
>**napimenuId :**
>**etkezesId :**
>**etelId :**
>**kellvagynem :**



