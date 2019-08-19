## Newsletter assinantes para OlCms

### Instalar o NewsletterCms

```console
$ composer require orlandolibardi/newslettercms
```
```console
$ php artisan vendor:publish --provider="OrlandoLibardi\NewsletterCms\app\Providers\OlCmsNewsletterServiceProvider" --tag="config"
```
```console
$ php artisan vendor:publish --provider="OrlandoLibardi\NewsletterCms\app\Providers\OlCmsNewsletterServiceProvider" --tag="templates"
```
```console
$ php artisan migrate
```
```console
$ composer dump
```
```console
$ php artisan db:seed --class=NewsletterAdminTableSeeder
```

# \o/



