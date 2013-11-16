# Pelotero S.A.#

*Aplicación diseñada para la admnistración de un pelotero 5 estrellas*

## Version alpha: 0.1.0


## Instalación:
Una vez clonado el repositorio, ejecutar las siguientes líneas de comandos:

```
cd pelotero/
composer install
mkdir log
mkdir cache
cp config/databases.yml.dist config/databases.yml
php symfony project:permissions
php symfony plugin:publish-assets`
```
