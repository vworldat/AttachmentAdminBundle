AttachmentAdminBundle installation
=============================

Require [`c33s/attachment-admin-bundle`](https://packagist.org/packages/c33s/attachment-admin-bundle)
in your `composer.json` file:


```js
{
    "require": {
        "c33s/attachment-admin-bundle": "@stable",
    }
}
```

Register the bundle and its dependencies in `app/AppKernel.php`:

```php

    // app/AppKernel.php

    public function registerBundles()
    {
        return array(
            // ...

            new C33s\AttachmentAdminBundle\C33sAttachmentBundle(),
            // also including avocode/form-extensions-bundle is recommended to geht the admin forms to work
            new Avocode\FormExtensionsBundle\AvocodeFormExtensionsBundle(),
        );
    }

```

Use it!
-------

See [usage documentation](usage.md).
