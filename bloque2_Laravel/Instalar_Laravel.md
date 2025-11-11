# INSTALACIÓN LARAVEL 12 (Ubuntu)

***

## Requisitos previos

### 0. PHPStorm
Como editor de código usaremos PHPStorm, tenemos licencia de estudiante

### 1. Node.js
Para las vistas necesitamos npm para instalar dependencias y compilar el código html,css
https://nodejs.org/en/download

```
# Download and install nvm:
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.3/install.sh | bash

# in lieu of restarting the shell
\. "$HOME/.nvm/nvm.sh"

# Download and install Node.js:
nvm install 24

# Verify the Node.js version:
node -v # Should print "v24.11.0".

# Verify npm version:
npm -v # Should print "11.6.1".

```

### 2. MariaDB
Para persistencia vamos a usar MariaDB
Crearemos un contenedor podman para más sencillez

podman run -d --name=mariadb_lv -p 3308:3306 -e MARIADB_USER=usuario -e MARIADB_PASSWORD=usuario1234 -e MARIADB_ROOT_PASSWORD=toor -e MARIADB_DATABASE=laravel docker.io/mariadb:latest


*** 

## Instalación Laravel

### 1. Instalación PHP, Composer y Laravel Installer
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
composer global require laravel/installer


### 2. Creación de aplicación
laravel new example-app

Nos va a pedir varias cosas en el proceso de instalación:
- Nada en las vistas
- Base de datos elegimos MariaDB

cd example-app
npm install && npm run build
composer run dev

La aplicación aparecerá en http://localhost:8000

Lo normal es que de error al no tener configurada bien la BBDD, ver siguiente paso.

### 3. Configuración BBDD
Abrimos el proyecto en PHPStorm
Abrimos el fichero .env
Buscamos configuración BBDD y ponemos:  

DB_CONNECTION=mariadb  
DB_HOST=127.0.0.1  
DB_PORT=3308  
DB_DATABASE=laravel  
DB_USERNAME=usuario  
DB_PASSWORD=usuario1234  

Para crear las bases de datos iniciales ejecutamos:  
php artisan migrate

Volvemos a ejecutar: composer run dev  
Abrimos http://localhost:8000 y debería funcionar ;)  


