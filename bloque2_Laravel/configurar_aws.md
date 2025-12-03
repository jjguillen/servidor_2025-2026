# CONFIGURACIÓN AWS S3

---

## Instalación

composer require aws/aws-sdk-php
composer require league/flysystem-aws-s3-v3
composer update

## Configuración

En el archivo `.env`, c

```
FILESYSTEM_DISK=s3

AWS_ACCESS_KEY_ID=ASIAYNW6YFVIRFGT67EM
AWS_SECRET_ACCESS_KEY=ev/B3LUbl6Nx2RqTsepvqQ5bO48ssymJx84ArgI/
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=reservasapp25
AWS_USE_PATH_STYLE_ENDPOINT=false
```

## Subir un archivo a S3

```
use Illuminate\Support\Facades\Storage;

Storage::disk('s3')->put('test.txt', 'Hola desde S3');

```

## Acceder un archivo a S3

No se puede acceder a s3 directamente desde las vistas,
hay que pasarle la url a la vista.

```
use Illuminate\Support\Facades\Storage;

$url = Storage::disk('s3')->url('test.txt');

return view('vista', compact('url'));

```

```
<!-- En la vista -->

<img src={{$url}}>

```
