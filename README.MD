# Táblák

## Users
 
>**id :** *A felhasználó azonosítója, int(10), autoIncrement*
 
>**username(Felhasználónév) :** Itt van a felhasználónév, string(25), notNull
 
> **roleId** -> A szerepkörhöz tartozó jogok [1 (admin), 2 (vendég)]

## Szerepkörök

> **id(azonosító)** -> A szerepkör azonosítója
 
> **role(szerepkör)** -> Itt vannak a szerepkörök, string(10), notNull