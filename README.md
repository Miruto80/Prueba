## Para correr el proyecto usando Docker se debe usar los siguientes comandos.

### Clonar el repositorio

``` git@github.com:Miruto80/Prueba.git ```

### Parase en la raiz del proyecto y ejecutar:

``` docker build -t mi_php_app .  ```

```docker run -d -p 8080:80 --name mi_php_contenedor mi_php_app```

```localhost:8080```

--------------------------------------------------------------------------

###  Para usar Docker Compose (Opcional)

``` docker-compose up -d ```