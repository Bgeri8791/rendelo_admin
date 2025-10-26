# 🛠 Backend 2025 alap

Ez egy **Laravel 11** alapú backend alkalmazás.  
A cél egy biztonságos, moduláris és könnyen bővíthető backend környezet.

---

## 🚀 Tech Stack

- ⚡ [Laravel 11](https://laravel.com/) – PHP keretrendszer
- 🐘 [PHP 8.2](https://www.php.net/) – futtatókörnyezet
- 🗄️ [MySQL 8](https://www.mysql.com/) – adatbázis
- 🔑 [Sanctum](https://laravel.com/docs/sanctum) – API authentikáció
- 📦 [Composer](https://getcomposer.org/) – csomagkezelő
- 🐳 [Docker](https://www.docker.com/) (opcionális) – konténerizáció

---

## 📦 Telepítés

A Docker és a Laravel is a környezeti változókat használja a konfigurációhoz.
Ezeket az adatok a `.env` fájlban célszerű eltárolni.
Mivel az egyes példányok esetében eltérőek lehetnek, így a repository-ban nem lett eltárolva a fájl.

Cserébe ott a `.env.example`, ami tartalmazza az általános beállításokat. Ebből kell egy másolatot létrehozni `.env` néven.

```bash
cp .env.example .env
```

Az alábbi változók értékeét célszerű megvizsgálni, hogy megfeleljen az aktuális projektnek és ne ütközzön más portokkal.

- `WEB_HOST`:  A backend elérésének a címe
- `WEB_PORT`:  A backend portja
- `PMA_PORT`:  A phpMyAdmin eléhetőségének a portja
- `DB_NAME`: Az adatbázis neve.


# Docker buildelés
```bash
docker compose build
```
# Docker futtatás
```bash
docker compose up -d
```
- A `-d` hatására detached módban indul, azaz a konténerek kimenete leválasztásra kerül a konzolról, így az továbbra is használható marad.

## Függőségek telepítése
```bash
docker compose exec app composer install
```

## Kulcs generálása
```bash
docker compose exec app php artisan key:generate
```

## web elérés
```bash
http://localhost:8881
```
## adatbázis elérés
```bash
http://localhost:8882
```
## Fejlesztői infó
```text
Fejlesztő: Buzási Gergő
```
