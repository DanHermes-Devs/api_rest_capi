# Instalación del proyecto
Para poder usar el proyecto, se tiene como requisito tener instalado lo siguiente:

    php 8.2
    composer 2.7.7
    mysql 8.2.0

Una vez que se haya verificado que se tiene instalado lo anterior, será necesario descargar el repositorio o clonarlo.

Posterior a ello, para usar el proyecto se requiere que primero se ejecute el comando `composer install` esto instalará los paquetes necesarios para poder arrancar el proyecto.

Posterior a ello, se debe crear una base de datos con el nombre de tu preferencia y en el archivo `.env` se deberan colocar las credenciales para acceder a la base de datos y adiconal colocar el nombre de la base de datos.

Una vez realizado esto, se deberá ejecutar el comando `php artisan migrate:fresh --seed` para instalar las migraciones dentro de tu base de datos y adicional, crear los registros de prueba (son 5000 registros de prueba)

Los endpoints a utilizar dentro de postman, serán los siguientes

	Obtener todos los contactos
    GET: http://localhost/api/contacts

    Obtener un contacto
    GET: http://localhost/api/contact/1

	Obtener resultados por parametro
    POST: http://localhost/api/contacts/filter?term=Dan&per_page=10

    Actualizar un contacto
    PUT: http://localhost/api/contacts/1

    Eliminar un contacto
    DELETE: http://localhost/api/contacts/1

    Crear una Dirección
    POST: http://localhost/api/address

    Actualizar una Dirección
    PUT: http://localhost/api/address/1

    Eliminar una Dirección
    DELETE: http://localhost/api/address/1

    Crear un Email
    POST: http://localhost/api/email

    Actualizar un Email
    PUT: http://localhost/api/email/1

    Eliminar un Email
    DELETE: http://localhost/api/email/1

    Crear un Phone
    POST: http://localhost/api/phone

    Actualizar un Celular
    PUT: http://localhost/api/phone/1

    Eliminar un Phone
    DELETE: http://localhost/api/phone/1
