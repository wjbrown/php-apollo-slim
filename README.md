# php-kadmon-slim

Simple starting point for a slim project.

### Overview
This project is setup to more or less mirror a traditional php MVC framework, albeit "lightly".  

##### Routes/Controllers
Controller actions are defined directly as Routes `src/Routes`.  I've included a sample api.php if you need to make a dead-simple api endpoint, and I've also included a sample pages.php if you want to serve standard HTML.  

Notice that when you render a page, you need to pass the layout, the template and any data that you want to pass along.
```php
// render the layout/view
return $this->phpView->render($response, 'layouts/default.php', [   // here the layout is specified
    'view' => [
        'template' => 'pages/home.php',   // here the page template is specified
        'data'     => [   // here variables we want to have available in the view are specified
            'page_title' => 'This is the Home Page',
            'a_random_list' => [
                'the dreamscape',
                'the subtle world',
                'the inbetween',
                'the upside-down',
                'the other side'
            ]
        ]
    ]
]);
```

##### Views
Views are broken into a simple Layout/Page/Element structure.  They are located in `src/Views`.  Layouts wrap a single page and 0 or more elements.  Pages wrap 0 or more elements.  Hopefully this diagram makes it clear.

![Layouts, Views, Elements](https://docs.google.com/drawings/d/e/2PACX-1vRoOdOJ9xWbL4AhC_fU512QC0PLvuOxiR88R1cGM4M_SugiMkvjiJYYxT1eHc9fwe6lbU11M2Ytf75Y/pub?w=445&h=408)

### To Install

```bash
# clone the repo
git clone git@github.com:wjbrown/php-kadmon-slim.git;
cd php-kadmon-slim;

# install composer dependencies
composer install;
```
Then just point your domain's webroot to `/public`, or
```bash
cd public;
php -S localhost:8080
```
####
