<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Evaluación Desarrollador full-stack semi-senior Casa Solar</h1>
    <br>
</p>

Para instalar solo debe correr en consola:
```
clone https://github.com/jiuly256/casasolar.git
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



Documentation is at [docs/guide/README.md](docs/guide/README.md).

