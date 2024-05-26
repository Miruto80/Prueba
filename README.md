# Para correr el proyecto usando Docker se debe usar los siguientes comandos.

Parase en la raiz del proyecto y ejecutar:

``` docker build -t mi_php_app .  ```

```docker run -d -p 8080:80 --name mi_php_contenedor mi_php_app```

```localhost:8080```

