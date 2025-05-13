<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:


### issue 1 

```
medaminebentaieb@Med-Macbook-M3-Max projet_laravel1 % npm install
npm error code ETARGET
npm error notarget No matching version found for vite-plugin-react@^5.0.0.
npm error notarget In most cases you or one of your dependencies are requesting
npm error notarget a package version that doesn't exist.
npm error A complete log of this run can be found in: /Users/medaminebentaieb/.npm/_logs/2025-05-13T09_35_47_602Z-debug-0.log
medaminebentaieb@Med-Macbook-M3-Max projet_laravel1 % 
```

### issue 1 - Solution

```
npm install vite
```

**package.json :**

```
"scripts": {
  "dev": "vite",
  "build": "vite build"
}
```



---


### issue 2 - redo the npm/react/vite-plugin installation missing few things

```
entaieb@Med-Macbook-M3-Max projet_laravel1 % npm run dev                               

> dev
> vite

failed to load config from /Users/medaminebentaieb/Documents/Github/projet_laravel1/vite.config.js
error when starting dev server:
Error: Cannot find module 'laravel-vite-plugin'
Require stack:
- /Users/medaminebentaieb/Documents/Github/projet_laravel1/vite.config.js
- /Users/medaminebentaieb/Documents/Github/projet_laravel1/node_modules/vite/dist/node/chunks/dep-DBxKXgDP.js
    at Function._resolveFilename (node:internal/modules/cjs/loader:1405:15)
    at defaultResolveImpl (node:internal/modules/cjs/loader:1061:19)
    at resolveForCJSWithHooks (node:internal/modules/cjs/loader:1066:22)
    at Function._load (node:internal/modules/cjs/loader:1215:37)
    at TracingChannel.traceSync (node:diagnostics_channel:322:14)
    at wrapModuleLoad (node:internal/modules/cjs/loader:235:24)
    at Module.require (node:internal/modules/cjs/loader:1491:12)
    at require (node:internal/modules/helpers:135:16)
    at Object.<anonymous> (/Users/medaminebentaieb/Documents/Github/projet_laravel1/vite.config.js:36:42)
    at Module._compile (node:internal/modules/cjs/loader:1734:14)
medaminebentaieb@Med-Macbook-M3-Max projet_laravel1 %
```

### issue 2 - Solution

```
npm install laravel-vite-plugin --save-dev
```


**Verify your vite.config.js file :**


```
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.css'],
            refresh: true,
        }),
    ],
});
```


```
npm run dev
```

---


### issue 3 

```
Illuminate\Encryption\MissingAppKeyException
No application encryption key has been specified.
GET localhost:8000
PHP 8.4.6 — Laravel 12.10.2
```

### issue 3 - Solution

```
php artisan key:generate --show
```

This will generate a new key and update the `APP_KEY` value in your `.env` file automatically.



---

### issue 4 
run npm run dev issue : 

```
VITE v6.3.5 ready in 133 ms  ➜ Local: http://localhost:5173/ ➜ Network: use --host to expose ➜ press h + enter to show help (node:4024) [MODULE_TYPELESS_PACKAGE_JSON] 
Warning: Module type of file:///Users/medaminebentaieb/Documents/Github/projet_laravel1/postcss.config.js?t=1747129792812 is not specified and it doesn't parse as CommonJS. Reparsing as ES module because module syntax was detected. This incurs a performance overhead. To eliminate this warning, add "type": "module" to /Users/medaminebentaieb/Documents/Github/projet_laravel1/package.json. (Use node --trace-warnings ... to show where the warning was created)  LARAVEL v12.10.2 plugin v1.2.0  ➜ APP_URL: http://localhost:8000
```

### issue 4 - Solution

Update `package.json`
Add the "type": "module" field to the root of your package.json file:
```
{
  "type": "module",
  "scripts": {
    "dev": "vite",
    "build": "vite build"
  },
  ...
}
```



---

### issue 5

```
bentaieb@Med-Macbook-M3-Max projet_laravel1 % php artisan migrate

   InvalidArgumentException 

  Database connection [MySQL] not configured.

  at vendor/laravel/framework/src/Illuminate/Database/DatabaseManager.php:227
    223▕ 
    224▕         $config = $this->dynamicConnectionConfigurations[$name] ?? Arr::get($connections, $name);
    225▕ 
    226▕         if (is_null($config)) {
  ➜ 227▕             throw new InvalidArgumentException("Database connection [{$name}] not configured.");
    228▕         }
    229▕ 
    230▕         return (new ConfigurationUrlParser)
    231▕             ->parseConfiguration($config);

      +26 vendor frames 

  27  artisan:16
      Illuminate\Foundation\Application::handleCommand(Object(Symfony\Component\Console\Input\ArgvInput))

medaminebentaieb@Med-Macbook-M3-Max projet_laravel1 %
```

### issue 5 - Solution

```
php artisan config:clear
php artisan config:cache
```

**config/database.php file:**

```
'mysql' => [
        'driver'         => 'mysql',
        'timezone'       => '+01:00', // ADDED THIS FOR TUNISIA TIME ZONE ; SHOULD BE CHANGED !
        'url'            => env('DATABASE_URL'),
        'host'           => env('DB_HOST', '127.0.0.1'),
        'port'           => env('DB_PORT', '3306'),
        'database'       => env('DB_DATABASE', 'forge'),
        'username'       => env('DB_USERNAME', 'forge'),
        'password'       => env('DB_PASSWORD', ''),
        'unix_socket'    => env('DB_SOCKET', ''),
        'charset'        => 'utf8mb4',
        'collation'      => 'utf8mb4_unicode_ci',
        'prefix'         => '',
        'prefix_indexes' => true,
        'strict'         => true,
        'engine'         => null,
        'options'        => extension_loaded('pdo_mysql') ? array_filter([
            PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
        ]) : [],
    ],
```


---


### Css or Tailwind issue

http://127.0.0.1:8000/login


<img src="https://i.imgur.com/epIJ2tZ.png" />



### `.gitignore` updated :

`.gitignore` updated & excluded the .env file so you see the changes done



