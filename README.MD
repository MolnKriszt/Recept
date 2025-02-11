# Táblák

## Users
 
>**id :** *A felhasználó azonosítója, int(10), autoIncrement*
 
>**username(Felhasználónév) :** Itt van a felhasználónév, string(25), notNull
 
> **roleId** -> A szerepkörhöz tartozó jogok [1 (admin), 2 (vendég)]

## Szerepkörök

> **id(azonosító)** -> A szerepkör azonosítója
 
> **role(szerepkör)** -> Itt vannak a szerepkörök, string(10), notNull

## Ételétkezés

>**id :** A felhasználó azonosítója, int(10), autoIncrement*

>**etelId :** -> Itt vannak az ételek azonosítójai

>**etkezesId :** -> 

## Etkezések

>**id :** A felhasználó azonosítója, int(10), autoIncrement*

>**etkezes :** -> Itt találhatóak meg a, reggeli, ebédek első és második fogása, ebéd desszert és a vacsora ételei
