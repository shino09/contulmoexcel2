
# SISTEMA CONTULMO DSDSDSDS

## Introduccion

El siguiente sistema esta realizado con el framework LaravelPHP en su version 5.7, ademas utiliza el template AdminLTE para el frontend.

Este sistema cuenta con 3 modulos ya creados y facil de personalizar

- **Modulo de Usuarios:** En este modulo usted podra gestionar sus usuarios que ingresaran al sistema, editando sus datos, asignandole roles o eliminando dichos usuarios que ya no ingresaran al sistema.
- **Modulo de Roles:** En este modulo usted podra crear los roles necesarios para el sistema, con la posiblidad de personalizar los permisos de acceso del usuario a ciertas partes del sistema.
- **Empresa:** Aqui usted podra personalizar datos del perfil de la empresa como tambien actualizar su logo.

## Instalacion

Primeramente usted debe tener lo siguiente instalado en su equipo local:

- PHP v.7.13 o superior
- Apache
- MySql
- Las siguientes extensiones de PHP: GD PHP Extension(para el generador de PDF, Simple QR) PDO PHP Extension, Mbstring PHP Extension ,Tokenizer PHP Extension, XML PHP Extension.

Para instalar el sistema en su equipo de manera local debe seguir los siguientes pasos:

1. **Descargar o clonar el proyecto:** Primeramente debe descargar el proyecto o si usa git podra clonar dicho proyecto.
2. **Instalar dependencias de composer:** Una vez dercargado o clonado el proyecto, debera lanzar el siguiente comando desde la terminal `composer update` (Nota debe tener instalado [composer](https://getcomposer.org/) en su maquina). Esto descargara los paquetes necesarios para funcione el proyecto.
3. **Copiar y renombrar el archivo .env-example:** Para realizar esto desde la terminal puede ejecutar el siguiente comando `cp .env-example .env`. Esto crear un archivo .env donde se realizara las configuraciones iniciales para el proyecto
4. **Generar la key del proyecto:** Ahora debe ejecutar el siguiente comando en la terminal `php artisan key:generate`. Esto crear una string que sera la key del proyecto y se sobreescribira en el archivo .env
5. **Configuracion del archivo .env:** Lo siguiente a realizar es modificar el archivo .env con los siguientes datos:
```php
APP_NAME=Laravel
APP_SUB=LARA
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombrebasedatos
DB_USERNAME=nombreusuario
DB_PASSWORD=password
...
```
> *Nota:* **Laravel** &#10142; Nombre del Sistema, **LARA** &#10142; Abreviacion del Sistema (Siglas), **nombrebasedatos** &#10142; Nombre de la base de datos, **nombreusuario** &#10142; Usuario de la base de datos(root), **password** &#10142; Password del usuario de la base de datos

6. **Migraciones y Seeder Inicial:** Finalmente usted debe ejecutar el siguiente comando en la terminal `php artisan migrate --seed`. Esto creara las tablas del proyecto en la base de datos de Mysql, ademas crear datos iniciales para acceder al sistema, el perfil inicial de la empresa, y los roles y permisos del sistema.

## Uso del Sistema

Una vez instalado el proyecto puede colocarlo en su servidor local(Apache) o usar el servidor de prueba que trae laravel ejecutando el siguiente comando en la terminal `php artisan serve`. Esto creara un pequeño servidor de prueba con la podras probar el proyecto, te genera el siguiente enlace [http://127.0.0.1:8000](http://127.0.0.1:8000
)

**USUARIOS POR DEFECTO EN EL SISTEMA**

USUARIO | NICKNAME | PASSWORD
---|---|---
Administrador | admin | S1st3m4s

Y listo usted podra ver el sistema de roles y permisos.

Si usted ya tiene los 3 modulos principales y necesarios para cualquiere proyecto de sistema que desee y a partir de aqui usted puede agregar los modulos que usted necesite.

> *Nota:* El namespace del proyecto es **SIS** si desa cambiarlo ejecute el siguiente comando en la terminal `php artisan app:name App` donde **App** &#10142; Es el nuevo nombre del namespace.

Para mayor informacion de los paquetes que use les dejo los enlaces de su documentacion respectiva

- **[Documentacion oficial de Laravel](https://laravel.com/)**
- **[Laravel collective](https://laravelcollective.com/docs/master/html)**
- [Toastr con Laravel](https://packagist.org/packages/brian2694/laravel-toastr)
- [Sweetalert2](https://sweetalert2.github.io/)
- **[Datatables con Laravel](http://yajrabox.com/docs/laravel-datatables/master)**
- [Pagina oficial de Dropzone](https://www.dropzonejs.com/)
- [Chartjs con Laravel](https://packagist.org/packages/fx3costa/laravelchartjs)
- **[Shinobi (Roles y Permisos)](https://github.com/caffeinated/shinobi)**
- [Breadcrumbs](https://packagist.org/packages/davejamesmiller/laravel-breadcrumbs)
- [Dompdf con Laravel](https://github.com/barryvdh/laravel-dompdf)
- [Laravel Excel](https://laravel-excel.maatwebsite.nl/)
- [Simple-QRcode con Laravel](https://www.simplesoftware.io/docs/simple-qrcode)
- **[Pagina Oficial de Boostrap 3](https://getbootstrap.com/docs/3.3/)**
- **[Pagina Oficial de AdminLTE2](https://adminlte.io/)**

## Licencia

Este proyecto es un software de codigo abierto pueden usuarlo en cualquiere proyecto que deseen. [CODEWEB](#)
