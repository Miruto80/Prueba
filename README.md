## Para correr el proyecto usando Docker se debe usar los siguientes comandos.

### Clonar el repositorio

``` git@github.com:Miruto80/Prueba.git ```

### Pararse en la rama developer

``` git checkout developer ```

### Parase en la raiz del proyecto y ejecutar:

``` docker build -t mi_php_app .  ```

```docker run -d -p 8080:80 --name mi_php_contenedor mi_php_app```

```localhost:8080```

--------------------------------------------------------------------------
###  Se agrego PHPMyAdmin, pare agestion de bases de datos y MariaDB10 al archivo docker-compose.yaml
- Se agrego MariaDB y phpmyadmin

para correr el proyecto usar Doker Compose.

###  Para usar Docker Compose

``` docker-compose up -d ```

Luego de correr el proyecto esto creara 3 contenedores para valdar esto usamo el comando.

``` docker-compose ps ```

para ingresar a phpmyadmin usar ``` http://localhost:8081 ```

- Servidor: El servidor debe ser db, el nombre del servicio MariaDB en tu docker-compose.yml.
- Usuario: Usa root como nombre de usuario.
- Contraseña: Usa root_password como se ha definido en el archivo docker-compose.yml.