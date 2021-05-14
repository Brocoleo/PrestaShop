## Instalación de MySQL y despliegue de Prestashop

*Imagen utilizada para Prestashop* 

[Docker Hub](https://hub.docker.com/r/prestashop/prestashop)

![Proyecto%20Administracio%CC%81n%20de%20Redes%20Docker%20y%20Virtual%2053451f3b421d4be3887d3712f1d3691c/presta.png](https://github.com/Brocoleo/Prestashop/blob/main/PrestaShop/ImagesGit/presta.png)

*Instalación de Prestashop a traves de docker-compose.yml*

- Container separados:  **mysql**  & **prestashop**
- Para iniciar container de manera automatica:  ' **restart: always'**
- Red compartida:  **'network_mode: prestashop-net'**

```docker
version: '3.9'
services:
    mysql:
        container_name: mysql-DB
        volumes:
            - './data/prestashop_DB:/var/lib/mysql'
        network_mode: prestashop-net
				restart: always
        environment:
            - MYSQL_ROOT_PASSWORD=admin
        ports:
            - '3307:3306'
        image: mysql:5.7
    prestashop:
        container_name: prestashop-web
        volumes:
            - './data/prestashop:/var/www/html'
        network_mode: prestashop-net
				restart: always
        environment:
            - DB_SERVER=mysql
        ports:
            - '8080:80'
        image: prestashop/prestashop

volumes:
  mysql: 
  prestashop:
```

*Instalación de Prestashop a en el servidor local (localhost:8080)*

![Proyecto%20Administracio%CC%81n%20de%20Redes%20Docker%20y%20Virtual%2053451f3b421d4be3887d3712f1d3691c/Sin_ttulo.png](https://github.com/Brocoleo/Prestashop/blob/main/PrestaShop/ImagesGit/Sin_ttulo.png)

*Configuración inicial de PrestaShop (eliminar la carpeta install y renombrar la carpeta admin)*

![Proyecto%20Administracio%CC%81n%20de%20Redes%20Docker%20y%20Virtual%2053451f3b421d4be3887d3712f1d3691c/presta%201.png](https://github.com/Brocoleo/Prestashop/blob/main/PrestaShop/ImagesGit/presta%201.png)


*Verificación de los container independientes*

![Proyecto%20Administracio%CC%81n%20de%20Redes%20Docker%20y%20Virtual%2053451f3b421d4be3887d3712f1d3691c/Sin_ttulo%202.png](https://github.com/Brocoleo/Prestashop/blob/main/PrestaShop/ImagesGit/Sin_ttulo%202.png)

# Automatizacion de Procesos

*Actualización de los contenedores los Lunes a las 05:00, usando* **containrrr/watchtower**

```docker
watchtower:
        image: containrrr/watchtower
        volumes:
            - /var/run/docker.sock:/var/run/docker.sock
        restart: always
        command: --schedule "0 5 * * 1" --cleanup --debug
```

*El comando **schule** sirve para parametrizar cuando se actualizaran los contenedores*

![Proyecto%20Administracio%CC%81n%20de%20Redes%20Docker%20y%20Virtual%2053451f3b421d4be3887d3712f1d3691c/Sin_ttulo%203.png](https://github.com/Brocoleo/Prestashop/blob/main/PrestaShop/ImagesGit/Sin_ttulo%203.png)

Respaldo *de la Base de Datos todos los días a las 23:55, usando **fradelg/mysql-cron-backup***

```docker
dbBackup:
        image: fradelg/mysql-cron-backup
        depends_on:
            - mysql
        restart: always
        volumes:
            - ./data/database_backup:/backup
        environment:
            - MYSQL_USER=root
            - MYSQL_PASS=admin
            - MYSQL_DB=prestashop
            - CRON_TIME=55 23 * * *
            - MYSQL_HOST=mysql
            - MYSQL_PORT=3306
            - TIMEOUT=10s
            - INIT_BACKUP=1
```

![Proyecto%20Administracio%CC%81n%20de%20Redes%20Docker%20y%20Virtual%2053451f3b421d4be3887d3712f1d3691c/Sin_ttulo%204.png](https://github.com/Brocoleo/Prestashop/blob/main/PrestaShop/ImagesGit/Sin_ttulo%204.png)

# Modificación de la plantilla de Prestashop

![Proyecto%20Administracio%CC%81n%20de%20Redes%20Docker%20y%20Virtual%2053451f3b421d4be3887d3712f1d3691c/1.png](Proyecto%20Administracio%CC%81n%20de%20Redes%20Docker%20y%20Virtual%2053451f3b421d4be3887d3712f1d3691c/1.png)

*Resultado final de la Tienda de Prestashop*

![Proyecto%20Administracio%CC%81n%20de%20Redes%20Docker%20y%20Virtual%2053451f3b421d4be3887d3712f1d3691c/Sin_ttulo%205.png](https://github.com/Brocoleo/Prestashop/blob/main/PrestaShop/ImagesGit/Sin_ttulo%205.png)

![Proyecto%20Administracio%CC%81n%20de%20Redes%20Docker%20y%20Virtual%2053451f3b421d4be3887d3712f1d3691c/Sin_ttulo%206.png](https://github.com/Brocoleo/Prestashop/blob/main/PrestaShop/ImagesGit/Sin_ttulo%206.png)

# Monitoreo de la maquina

```docker
docker stats
```

![Proyecto%20Administracio%CC%81n%20de%20Redes%20Docker%20y%20Virtual%2053451f3b421d4be3887d3712f1d3691c/Sin_ttulo%207.png](https://github.com/Brocoleo/Prestashop/blob/main/PrestaShop/ImagesGit/Sin_ttulo%207.png)

- El contenedor que consume mas recursos de la CPU, en total un **15%**, es el que tiene prestashop y nuestro servidor web
- El contenedor que consume mas espacio en Disco es el que contiene mysql con nuestra Base de Datos, ocupa 195.7 **megabytes** y un 5% del espacio asignado como maximo
- Los contenedores con mas trafico en la red son:
    - prestashop-web (**237kB)**
    - mysql-DB (**32kB)**
    - prestashop_watchtower_1 (**1.82kB)**

# Resumen

Para ejecutar el proyecto es necesario correr nuestro docker-compose.yml que contiene los contenedores necesarios para ejecutar prestashop, nuestro archivo final es el siguiente:

```docker
version: '3.9'
services:
    mysql:
        container_name: mysql-DB
        volumes:
            - './data/prestashop_DB:/var/lib/mysql'
        network_mode: prestashop-net
        restart: always
        environment:
            - MYSQL_ROOT_PASSWORD=admin
        ports:
            - '3307:3306'
        image: mysql:5.7
    prestashop:
        container_name: prestashop-web
        volumes:
            - './data/prestashop:/var/www/html'
        network_mode: prestashop-net
        restart: always
        environment:
            - DB_SERVER=mysql
        ports:
            - '8080:80'
        image: prestashop/prestashop
    watchtower:
        image: containrrr/watchtower
        volumes:
            - /var/run/docker.sock:/var/run/docker.sock
        restart: always
        command: --schedule "0 5 * * 1" --cleanup --debug
    dbBackup:
        image: fradelg/mysql-cron-backup
        depends_on:
            - mysql
        restart: always
        volumes:
            - ./data/database_backup:/backup
        environment:
            - MYSQL_USER=root
            - MYSQL_PASS=admin
            - MYSQL_DB=prestashop
            - CRON_TIME=55 23 * * *
            - MYSQL_HOST=mysql
            - MYSQL_PORT=3306
            - TIMEOUT=10s
            - INIT_BACKUP=1

volumes:
  mysql: 
  prestashop: 
  watchtower:
  bdBackup:
```

*Link del repositorio del proyecto con docker-compose.yml y los demas archivos pertenecientes a prestashop y la base de datos*

[Brocoleo/Prestashop](https://github.com/Brocoleo/Prestashop.git)

# Bibliografía

*Documentación de Docker*

[Docker overview](https://docs.docker.com/get-started/overview/)

*Imagen PrestaShop*

[Docker Hub](https://hub.docker.com/r/prestashop/prestashop)

*Imagen MySQL*

[mysql](https://hub.docker.com/_/mysql)

*Imagen WatchTower*

[Docker Hub](https://hub.docker.com/r/containrrr/watchtower)

*Imagen fradelg (Backup Database)*

[Docker Hub](https://hub.docker.com/r/fradelg/mysql-cron-backup)
