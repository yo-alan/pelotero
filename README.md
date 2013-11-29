# Pelotero S.A.#

*Aplicación diseñada para la administración de un pelotero 5 estrellas*

## Versión beta: 0.2.0


## Instalación:
Una vez clonado el repositorio, ejecutar las siguientes líneas de comandos:

```
cd pelotero/
composer install
mkdir log
mkdir cache
cp config/databases.yml.dist config/databases.yml
php symfony project:permissions
php symfony plugin:publish-assets
```
Luego abrir un navegador web con la siguiente URL: [http://localhost/pelotero](http://localhost/pelotero)

Y listo!!
