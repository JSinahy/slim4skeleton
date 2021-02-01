# Slim Framework 4 Skeleton Application

Este es un skeleton para Slim framework 4 para utilizar de forma rapida el desarrollo de una pequena API, utilizando OpenAPI para documentacion, Monolog para el log de los requests, Eloquent para la base de datos y reallysimplejwt para el uso de JWT en las peticiones.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application.

```bash
composer create-project slim/slim4skeleton [my-app-name]
```

Reemplaza `[my-app-name]` por el nombre de tu proyecto que vas a crear. You'll want to:

* Apunta el documentroot de tu aplicacion al directorio `public/`.
* Asegurate que `logs/` tiene permisos de escitura.

Para ejecutar la aplicacion solo escribe:

```bash
cd [my-app-name]
composer start
```

O puedes usar `docker-compose` para ejecutar la aplicacion con `docker`:

```bash
cd [my-app-name]
docker-compose up -d
```
Despues abre `http://localhost:8080` en tu buscador.

