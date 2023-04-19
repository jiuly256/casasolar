<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Evaluación Desarrollador full-stack semi-senior Casa Solar</h1>
    <br>
</p>

Para instalar solo debe correr en consola:
```
git clone https://github.com/jiuly256/casasolar.git
```
o descargar directamente el proyecto en Download zip. Copiar el proyecto en tu carpeta www

Comandos para inicializar el proyecto:
```
php init

composer update
```

crear una base de datos en mysql, yo propongo que se llame igual que el sistema <b>casasolar</b>

cambiar en el /common/config/main-local.php

```
<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost:3308;dbname=casasolar',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    ],
];

```
en mi caso el puerto es 3308 pero normalmente es 3306, y la base de datos deber el mismo nombre de la creada. <b>casasolar</b>

correr en la consola
```
php yii migrate
```
Si todo funciona con este link deberia correr: 

http://localhost:81/casasolar/frontend/web

Mi puerto es el 81.

Otra forma de visualizar el proyecto

en el archivo <b>httpd-vhosts</b> ubicado en C:\wamp\bin\apache\apache2.4.54.2\conf\extra
pegar el siguiente codigo
```
#casasolar
<VirtualHost *:81>
        ServerName casasolar.frontend
        DocumentRoot "C:/wamp/www/casasolar/frontend/web"

        <Directory "C:/wamp/www/casasolar/frontend/web/">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

        </Directory>
</VirtualHost>
```

Y en el <b>host</b> ubicado en C:\Windows\System32\drivers\etc
pegar el siguiente codigo
```
127.0.0.1	casasolar.frontend
```
Reiniciar el servidor 

link: http://casasolar.frontend:81

<h2 align="center">Usuarios</h2>
<br>   
<p align="letf">

<b>Administrador del sistema</b>
<br> 
usuario: admin
<br> 
contraseña: admin123
<br><br>
    
<b>Empresa</b>
<br>
usuario: empresa1
<br>
contraseña: empresa1
<br><br> 
    
<b>Solicitantes</b>
<br>
usuario: lfanza
<br>
contraseña: lfanza123
 <br><br>   
    
usuario: pperez
<br>
contraseña: pperez123
<br><br>
    
usuario: kdiaz
<br>
contraseña: kdiaz123
<br><br>

usuario: hfernandez
<br>
contraseña: hfernandez123
<br><br>
    
usuario: jhernandez
<br>
contraseña: jhernandez123
<br><br>

</p>


