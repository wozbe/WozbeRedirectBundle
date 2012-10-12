ArmetizRedirectBundle
=====================

You have many domains :
* http://www.john-doe.fr
* http://www.johndoe.fr
* http://john-doe.fr
* http://johndoe.fr

Users have to be redirect to **http://john-doe.fr/example** from **http://www.john-doe.fr/example**

## Installation

Installation is a quick 3 step process:

1. Download ArmetizRedirectBundle using composer
2. Enable the Bundle
3. Configure your application's config.yml

### Step 1: Download ArmetizRedirectBundle using composer

Add ArmetizRedirectBundle in your composer.json:

```js
{
    "require": {
        "armetiz/redirect-bundle": "*"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update armetiz/redirect-bundle
```

Composer will install the bundle to your project's `vendor/armetiz` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Armetiz\RedirectBundle\ArmetizRedirectBundle(),
    );
}
```
### Step 3: Configure your application's config.yml

Finally, add the following to your config.yml

``` yaml
# app/config/config.yml
armetiz_redirect:
    domains:
        john-doe.fr:
            aliases:
                - www.john-doe.fr
                - www.johndoe.fr
                - johndoe.fr
        foo-bar.fr:
            aliases:
                - www.foo-bar.fr
                - www.foobar.fr
                - foobar.fr
```
=======
A short bundle to manage many domains