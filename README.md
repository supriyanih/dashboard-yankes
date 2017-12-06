# Dashboard YanKes
Pelayanan Masyarakat dashboard repository

## TO DO :
Package for Dashboard Pimpinan
==============================

## Install
Via composer
``` bash
$ composer require supriyanih/dashboard-yankes "1.0.0"
```

## 1. In your config/app.php add for laravel 5.4:

``` php
'providers' => array(
    ...
    Supriyanih\DashboardYankes\DashboardYankesServiceProvider::class,
),
```

## 2. php artisan
``` bash
$ php artisan supriyanih:dashboard-yankes
$ php artisan vendor:publish --tag=views
$ php artisan vendor:publish --tag=migrations
```


in your `resources/assets/routes.js` add this code in `const routes`
``` php

const routes = [{
  path: '/',
  component: resolve => require(['./layout.vue'], resolve),
  children: [
  ....  
        {
      path: 'dashboard/faskes',
      component: resolve => require(['./components/dashboard_faskes.vue'], resolve),
      meta: {
          title: "Dashboard Fasilitas Kesehatan",
      }
  }, {
      path: 'faskes',
      component: resolve => require(['./components/faskes_list.vue'], resolve),
      meta: {
          title: "Fasilitas Kesehatan",
      }
  },  {
      path: 'faskes/create',
      component: resolve => require(['./components/add_faskes.vue'], resolve),
      meta: {
          title: "Faskes",
      }
  },  {
      path: 'faskes/:id/edit',
      component: resolve => require(['./components/edit_faskes.vue'], resolve),
      meta: {
          title: "Faskes",
      }
  }, {
      path: 'faskes/:id/destroy',
      component: resolve => require(['./components/destroy.vue'], resolve),
      meta: {
          title: "Destroy",
      }
  },
  
  {
      path: 'dashboard/kamar',
      component: resolve => require(['./components/dashboard_kamar.vue'], resolve),
      meta: {
          title: "Dashboard Kamar Rawat Inap",
      }
  }, {
      path: 'kamar',
      component: resolve => require(['./components/kamar_list.vue'], resolve),
      meta: {
          title: "Tempat Tidur",
      }
  },  {
      path: 'kamar/create',
      component: resolve => require(['./components/add_kamar.vue'], resolve),
      meta: {
          title: "Tempat Tidur",
      }
  },  {
      path: 'kamar/:id/edit',
      component: resolve => require(['./components/edit_kamar.vue'], resolve),
      meta: {
          title: "Tempat Tidur Edit",
      }
  }, {
      path: 'kamar/:id/destroy',
      component: resolve => require(['./components/destroy.vue'], resolve),
      meta: {
          title: "Tempat Tidur Hapus",
      }
  },
  ....  
  ]
]},
....
```

in your `resources/assets/menu.js` add this code
``` php

{
    name: 'Dashboard',
    icon: 'ti-bar-chart',
    child: [
    ....
   {
        name: 'FasKes',
        link: '/dashboard/faskes',
        icon: 'ti-angle-double-right'
    },
    {
        name: 'Kamar Rawat Inap',
        link: '/dashboard/kamar',
        icon: 'ti-angle-double-right'
    },
    ....
  ]
},
....
{
    name: "Data Yankes",
    icon: "ti-files",
    child: [{
        name: 'Fasilitas Kesehatan',
        link: '/faskes',
        icon: 'ti-angle-double-right'
    },
  
    {
        name: 'Kamar Rawat Inap',
        link: '/kamar',
        icon: 'ti-angle-double-right'
    }
    ]
},
....
```

## 3. Migrate Database and npm run dev
``` bash
$ composer dump-autoload
$ php artisan migrate 
$ npm run dev
```
## DEMO :
## CHANGELOG :

