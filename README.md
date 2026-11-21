# html

**Webový panel na ovládanie GPIO pinov Orange Pi: farebné tlačidlá (červená = vypnuté, zelená = zapnuté) v prehliadači.**

![Rok](https://img.shields.io/badge/rok-2017-blue) ![PHP](https://img.shields.io/badge/PHP-5-777bb3) ![Platforma](https://img.shields.io/badge/Orange%20Pi-WiringOP-orange)

> **Rok realizácie:** 2017 · **Tagy:** `orange-pi` `php` `javascript` `gpio` `wiringop` `iot` `home-automation` `web-panel`

## O projekte

Panel „FORLED PANEL“ zobrazuje 24 výstupov ako obrázkové tlačidlá. Kliknutím sa pin prepne a obrázok zmení farbu. Stránka sa sama obnovuje každé 2 sekundy, takže stav je vždy aktuálny aj pri ovládaní z viacerých zariadení.

Projekt vznikol na ovládanie osvetlenia v prostredí FORLED a je adaptáciou panela z Instructables od *TheFreeElectron* (2015), upravenou pre Orange Pi a knižnicu WiringOP.

## Ako to funguje

```
Prehliadač ──klik──► script.js ──AJAX──► gpio.php ──► príkaz `gpio` (WiringOP) ──► pin
     ▲                                                                   │
     └──────────────── index.php (stav pinov, obnova 2 s) ◄──────────────┘
```

- `index.php` načíta stav pinov príkazom `gpio read` a vykreslí tlačidlá.
- `script.js` pri kliknutí zavolá `gpio.php?pic=<pin>`.
- `gpio.php` pin prepne (`gpio write`) a vráti nový stav.
- Obrázky tlačidiel sú v `data/img/red` a `data/img/green`.

## Inštalácia (Orange Pi)

```bash
sudo apt-get update
git clone https://github.com/zhaolei/WiringOP.git -b h3
cd WiringOP && chmod +x ./build && sudo ./build

sudo apt-get install apache2 php5 libapache2-mod-php5
cd /var/www
sudo rm -r html
git clone https://github.com/VRDragon/html
```

Používateľ webservera (`www-data`) musí mať oprávnenie spúšťať príkaz `gpio`.

## Bezpečnosť

Panel nemá autentifikáciu a vstup do shellu ide cez `system()`. Pin sa preto validuje len číselne. Prevádzkujte ho iba v lokálnej, dôveryhodnej sieti.

## Súvisiace projekty

[OrangePi GPIO Controller](https://github.com/VRDragon/OPI-CONTROL-SYSTEM) (Flask verzia) · [Arduino 64-kanálový webový ovládač](https://github.com/VRDragon/Arduino-64-Channel-Ethernet-Relay-Controller)

## Autor

**Vratislav Režo** ([@VRDragon](https://github.com/VRDragon))
