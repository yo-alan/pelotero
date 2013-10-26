# symfony1-boilerplate #

*One-run script for symfony 1.x + sfPropelORMPlugin project generation!*

## Latest version: v5.0

## New from version 4.0:
* Using Composer to resolve and download dependencies,
* Generation via php script only (no bash), no more need of config files
* Windows compatibility improved! (see previous),
* There's no more apache setup, but it's easier to deploy your project (see below)

**As of now, you will need:**

- An environment with a working PHP cli and git.
- [Composer](http://getcomposer.org/) for dependency management.

## Instructions:

* Prepare the boilerplate and download the dependencies:

```
composer create-project mppfiles/symfony1-boilerplate {install_path}
```

* Then, just get into the new directory and call the boilerplate generation script:

```
cd {install_path}
php script/generate
```

* Give a project name, and if you wish answer 'Y' when promting for remove the existing VCS history.
* Deploy your project. The easiest way might be to just symlink your web directory from your Apache Document Root. For example:

```
sudo ln -s `pwd`/web /var/www/myproject
```

* Point your browser to `http://localhost/myproject/web/frontend_dev.php`
* Enjoy!

Conclusion: start with **nothing**, end with a **FULLY configured AND RUNNING project**!

## Disclaimer/Caveats:

- This method fits perfectly for a rather specific workflow (mine) thus it may not fit your needs.

Forks and PRs are welcome!
