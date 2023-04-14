<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<h1 align="center">Proyecto Solutoria Skills Test</h1>

Este proyecto fue creado en base a una lista de instrucciones diseñadas para medir mi habiliad en el ambito de la tecnologia.
El Proyecto se divide en 2 grandes partes:

- Script de Python para:
    - obtener token.
    - obtener datos entregados por la API.
    - importar los datos a la base de datos (configurada en el .env).

- Proyecto de Laravel con:
    - Mantenedor de los datos importados.
    - Gráfico de los datos importados filtrables por Fecha.

## Configuracion del Proyecto
Antes de ejecutar el proyecto hay una serie de pasos que se deben realizar para una correcta configuración del proyecto.

### Requisitos principales
Para una correcta ejecución del proyecto debe poseer una versión mayor o igual de:

- Laravel >= 10.6.2
- Python >= 3.11.2

### Crear tabla requerida en la base de datos
Para crear la tabla requerida para el ejercicio dirijase a la carpeta del proyecto, dentro de esta encontrara un archivo llamado `db.txt`. Este archivo posee una sentencia SQL para crear la tabla necesaria.

### Instalar requerimientos
Para instalar las librerias necesarias para una correcta ejecucion del script de Python dirigase a la carpeta raíz del proyecto y ejecute la siguiente linea de comando: 
```python
pip install -r requirements.txt
```

### Configurar .env
El `.env` se encuentra en la raíz del proyecto, con el nombre de `.env.example` debes editarlo y quitarle el `.example`, una vez editado es necesario configurar las siguientes variables:
```
DB_HOST
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```

## Ejecutar Proyecto
Una vez configurado el proyecto solo queda seguir los siguientes pasos para una correcta ejecución de este:

### Importar base de datos
Para importar la base de datos solo es necesario que tengas a mano las credenciales entregadas para el consumo de la api, dirijete a la raíz del proyecto y ejectua el siguiente comando: 
```python
python db_import.py 
```
Una vez ejecutado el comando el script te pedira que ingreses tu credencial de acceso, una vez ingresado este obtendra el token, hara una petición para obtener los datos y los importara a la base de datos establecida anteriormente en el .env.

## Ejectuar Laravel
### Instalar librerias de Laravel
Para instalar las librerias necesarias para correr el proyecto Laravel ejecute el siguiente comando en su directorio raíz:
```
composer install
```
### Generar KEY del Proyecto
La primera vez que inicias el proyecto debes generar una key para ingresar. Esta se genera con el siguiente comando:
```
php artisan key:generate
```
### Ejecutar Proyecto
Ya completados los pasos anteriores solo queda ejecutar el proyecto Laravel dirijiendose a la carpeta raíz y ejecutando las siguientes lineas de comando: 
```
php artisan serve
```
Este comando corre el servidor quedando solo por hacer ingresar s la url entregada mediante tu navegador favorito.
