# Laravel POS Management System

A four-page, read-only point-of-sale management demo for **IT0049 Technical Formative Assessment 5**. It rebuilds the TFA1 page structure in Laravel 13 and demonstrates routing, controllers, Blade views, static PHP arrays, navigation, and responsive styling.

> **Data source:** The customer and user pages use arrays defined in their controllers. Migrations and seeders are included for submission and future development. Displaying the pages does not require a database server or database queries.

## Features

- Dashboard at `/` with counts calculated from the sample arrays: **8 customers, 6 users, and 11 active accounts**.
- About page at `/about` explaining the project and MVC flow.
- Customer directory at `/customers` with eight fictional records.
- User directory at `/users` with six fictional records and role badges.
- Client-side search, responsive navigation, active-page highlighting, and a mobile card layout.

The account pages are intentionally read-only. There are no Add, Edit, Delete, or Save actions.

## First checks on Windows

Open **PowerShell**, **CMD**, or the **VS Code terminal** and run:

```powershell
php --version
php --ini
php -m
composer --version
laravel --version
node --version
npm.cmd --version
git --version
where.exe php
```

This project requires **PHP 8.3 or newer** and Composer 2. Git is needed for GitHub. Laravel's required PHP extensions include Ctype, cURL, DOM, Fileinfo, Filter, Hash, Mbstring, OpenSSL, PCRE, PDO, Session, Tokenizer, and XML. Enable `pdo_sqlite` and `sqlite3` for optional SQLite migrations and seeders. See [Laravel 13 server requirements](https://laravel.com/docs/13.x/deployment#server-requirements).

**Node.js, npm, Vite, and the Laravel installer are optional for this repository.** CSS and JavaScript load directly from `public/`. If PowerShell blocks `npm.ps1`, use `npm.cmd --version`; no execution-policy change is needed.

### PHP and XAMPP

XAMPP's PHP works only if `php --version` reports at least **8.3**. This computer originally resolved `php` to XAMPP PHP **8.2.12**, which cannot run Laravel 13. The delivered project was created and tested with official portable **PHP 8.5.11** outside this repository.

To install compatible PHP for ongoing use:

1. Download an **x64 Non Thread Safe ZIP** for PHP 8.3–8.5 from [PHP for Windows](https://www.php.net/downloads.php?os=windows). NTS supports the CLI and Artisan. Install the Visual C++ Redistributable linked on that page if PHP reports a missing runtime DLL.
2. Extract to a stable folder, for example `C:\tools\php85`. Copy `php.ini-development` to `php.ini` there.
3. In `php.ini`, set `extension_dir = "C:/tools/php85/ext"` and enable the needed extensions by removing a leading `;`, including `curl`, `fileinfo`, `mbstring`, `openssl`, `pdo_sqlite`, `sqlite3`, and `zip`. Verify with `php -m`.
4. In Windows **Edit environment variables for your account → Path**, put `C:\tools\php85` above `C:\xampp\php`. Open a new terminal and run `where.exe php` and `php --version`. The first result should be the new PHP.

XAMPP Apache and MySQL do not need to run when using `php artisan serve` and the controller arrays. If Composer still uses XAMPP PHP, reopen the terminal, inspect `where.exe php`, and rerun Composer's installer selecting the compatible `php.exe` if necessary.

### Composer, Git, and Laravel installer

- Download [Composer-Setup.exe](https://getcomposer.org/download/), select the compatible PHP executable, reopen the terminal, and run `composer --version` and `composer diagnose`.
- Install [Git for Windows](https://git-scm.com/download/win), reopen the terminal, and run `git --version`.
- The `laravel` command is optional. `composer global require laravel/installer` installs it if you later want it. This project was created directly with Composer.

### How the new Laravel project was created

In **PowerShell** or the **VS Code terminal**, from a parent folder where you want a new project, the exact Laravel 13 creation sequence is:

```powershell
cd "C:\path\to\your\projects"
composer create-project "laravel/laravel:^13.0" laravel-pos-lab
cd laravel-pos-lab
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan --version
php artisan serve --host=127.0.0.1 --port=8080
```

Replace the first `cd` path with your chosen parent folder. `create-project` downloads the Laravel skeleton and dependencies, so the following `composer install` is normally already satisfied; it is useful again after cloning from GitHub. `key:generate` should report that the key was set. `php artisan --version` should report **Laravel Framework 13.x**, and the final command should print a listening URL. The delivered project already contains the completed controllers, routes, views, assets, and documentation; you do not need to run `create-project` again for this copy.

To practice Artisan file generation in a separate learning copy, `php artisan make:controller PageController`, `php artisan make:controller CustomerController`, `php artisan make:controller UserController`, `php artisan make:migration create_customers_table`, and `php artisan make:seeder CustomerSeeder` create starter files. This repository already includes the finished versions. Routes are edited in `routes/web.php`; Blade files are stored in `resources/views/`.

## Run locally at localhost:8080

In **PowerShell** or the **VS Code terminal**, enter the project folder. For this delivered copy:

```powershell
cd "C:\Users\ahbarcelon\Documents\Codex\2026-10-17\https-chatgpt-com-codex-desktop-auth\outputs\laravel-pos-lab"
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan serve --host=127.0.0.1 --port=8080
```

For a fresh clone, replace the `cd` path. `composer install` downloads locked PHP packages into `vendor/`. `.env` stores local settings; `key:generate` creates a unique app key. The server prints a URL such as `http://127.0.0.1:8080` and waits for requests. Visit **<http://localhost:8080>**. `Ctrl+C` stops the server; rerun the same command to restart it.

This delivered copy already has dependencies and a local `.env` key. On this computer, if `php` still points to XAMPP, select the tested portable PHP for the current terminal session:

```powershell
$env:Path = "C:\Users\ahbarcelon\Documents\Codex\2026-10-17\https-chatgpt-com-codex-desktop-auth\work\php-8.5.11;$env:Path"
php --version
php artisan serve --host=127.0.0.1 --port=8080
```

That `work` runtime is a local development aid, not part of the GitHub repository. Install compatible PHP separately for another computer.

### Common local errors

| Symptom | Check |
| --- | --- |
| Composer says PHP is too old | Run `where.exe php`; put PHP 8.3+ first in Path and open a new terminal. |
| `vendor/autoload.php` is missing | Run `composer install` in this project folder. |
| No application encryption key | Copy `.env.example` to `.env` and run `php artisan key:generate`. |
| Missing PHP extension | Run `php --ini`, enable the named extension in that active `php.ini`, and reopen the terminal. |
| Port 8080 is occupied | Stop the other server. `Get-NetTCPConnection -LocalPort 8080 -State Listen` shows its PID. |
| `localhost` fails | Try `http://127.0.0.1:8080` and check the server terminal for errors. |
| CSS or JS is missing | Open `/css/app.css` and `/js/app.js` directly, then refresh the page. |

## Routes and MVC

| URL | Route name | Controller method | View |
| --- | --- | --- | --- |
| `/` | `home` | `PageController@home` | `pages.home` |
| `/about` | `about` | `PageController@about` | `pages.about` |
| `/customers` | `customers.index` | `CustomerController@index` | `pages.customers` |
| `/users` | `users.index` | `UserController@index` | `pages.users` |

A Laravel **route** selects a controller method, like a CodeIgniter 4 route. A **controller** prepares data. A **Blade view** displays it. A **model** usually handles database records, but these listing pages intentionally use arrays, so they need no models. **Composer** installs PHP packages; **Artisan** is Laravel's CLI. `.env` holds machine-specific settings. A **migration** describes a table and a **seeder** inserts sample rows. **Vite** bundles frontend code in many Laravel apps, but this small app uses plain files in `public/`.

Run `php artisan route:list` to inspect mappings. The account views use `@foreach` to render records and `{{ }}` to escape every displayed value.

## Project structure and file purposes

```text
laravel-pos-lab/
├── app/Http/Controllers/
│   ├── PageController.php
│   ├── CustomerController.php
│   └── UserController.php
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php      (Laravel scaffold)
│   │   ├── 0001_01_01_000001_create_cache_table.php      (Laravel scaffold)
│   │   ├── 0001_01_01_000002_create_jobs_table.php       (Laravel scaffold)
│   │   ├── 2026_10_17_000001_create_customers_table.php
│   │   └── 2026_10_17_000002_create_account_users_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── CustomerSeeder.php
│       └── AccountUserSeeder.php
├── public/
│   ├── css/app.css
│   └── js/app.js
├── resources/views/
│   ├── layouts/app.blade.php
│   └── pages/{home,about,customers,users}.blade.php
├── routes/web.php
├── tests/Feature/PageRoutesTest.php
├── .env.example
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
└── README.md
```

`app/` holds controllers and static records. `routes/web.php` connects URLs to methods. `resources/views/layouts/app.blade.php` shares navigation and footer; each page view supplies its content. `public/` holds browser assets. `database/migrations/` defines future tables; `database/seeders/` fills them with fictional data. `tests/` verifies behavior. `bootstrap/`, `config/`, and `storage/` are Laravel setup, configuration, and runtime folders. `vendor/` is regenerated by Composer and stays out of Git. `.env.example` is a safe template; `.env` contains a local secret and stays private.

The Laravel scaffold includes a default authentication `users` migration. This lab's future POS directory uses a separate `account_users` table so it is not confused with login users. Neither table powers the current User Accounts page.

### Complete code and how the files connect

Each linked file contains its complete working code; there are no missing snippets to paste.

| File | Purpose and connection |
| --- | --- |
| [`routes/web.php`](routes/web.php) | Names the four URLs and points each to the correct controller method. |
| [`app/Http/Controllers/PageController.php`](app/Http/Controllers/PageController.php) | Renders Home and About; derives dashboard counts from the two account controllers. |
| [`app/Http/Controllers/CustomerController.php`](app/Http/Controllers/CustomerController.php) | Defines eight static customer records and passes them to the customer Blade view. |
| [`app/Http/Controllers/UserController.php`](app/Http/Controllers/UserController.php) | Defines six static user records and passes them to the user Blade view. |
| [`resources/views/layouts/app.blade.php`](resources/views/layouts/app.blade.php) | Provides HTML shell, navigation, active-link state, asset links, and footer for all pages. |
| [`resources/views/pages/home.blade.php`](resources/views/pages/home.blade.php) | Shows the hero, quick links, and controller-derived statistics inside the layout. |
| [`resources/views/pages/about.blade.php`](resources/views/pages/about.blade.php) | Explains project goals, features, technology, and the route-controller-view flow. |
| [`resources/views/pages/customers.blade.php`](resources/views/pages/customers.blade.php) | Uses Blade `@foreach` to show customer records with escaped output and a search field. |
| [`resources/views/pages/users.blade.php`](resources/views/pages/users.blade.php) | Uses Blade `@foreach` to show team records, role/status badges, and a search field. |
| [`public/css/app.css`](public/css/app.css) | Styles the shared layout, pages, tables, and mobile widths. |
| [`public/js/app.js`](public/js/app.js) | Opens the mobile menu and filters existing rendered rows locally. |
| [`database/migrations/2026_10_17_000001_create_customers_table.php`](database/migrations/2026_10_17_000001_create_customers_table.php) | Describes a future customer table; it is not queried by a page. |
| [`database/migrations/2026_10_17_000002_create_account_users_table.php`](database/migrations/2026_10_17_000002_create_account_users_table.php) | Describes future POS account users separately from Laravel authentication users. |
| [`database/seeders/CustomerSeeder.php`](database/seeders/CustomerSeeder.php) | Adds fictional customers when `db:seed` is run. |
| [`database/seeders/AccountUserSeeder.php`](database/seeders/AccountUserSeeder.php) | Adds fictional POS users when `db:seed` is run. |
| [`database/seeders/DatabaseSeeder.php`](database/seeders/DatabaseSeeder.php) | Calls both account seeders. |
| [`tests/Feature/PageRoutesTest.php`](tests/Feature/PageRoutesTest.php) | Checks navigation, statistics, and operation without a database connection. |
| [`.env.example`](.env.example) | Safe template for local and hosted environment variables. |
| [`composer.json`](composer.json) and [`composer.lock`](composer.lock) | Declare Laravel/PHP requirements and pin dependency versions. |
| [`.gitignore`](.gitignore) | Keeps local secrets, dependencies, and SQLite files out of the repository. |

## Optional SQLite practice

Enable `pdo_sqlite` and `sqlite3`, then run from the project folder:

```powershell
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate
php artisan db:seed
```

`migrate` creates the scaffold tables plus `customers` and `account_users`. `db:seed` adds eight customers and six POS users. To reset **disposable** lab data, `php artisan migrate:fresh --seed` drops all tables first, then rebuilds them. The SQLite file is ignored by Git. The four pages still use controller arrays when SQLite is absent.

## Tests and manual verification

Run `php artisan test`. The feature tests check all four pages and navigation, verify dashboard counts, and show both account pages render with an invalid database connection. Also run `php artisan route:list`.

1. Open `/`, `/about`, `/customers`, and `/users`; click every navigation link.
2. Search each directory for a name or role. Try an unmatched term to see the empty state, then clear the field.
3. Narrow the browser to mobile width; open the navigation menu and check the table cards.
4. Confirm `/css/app.css` and `/js/app.js` load and check the console for errors.

During development, `php artisan test` passed **3 tests with 32 assertions**. `php artisan migrate:fresh --seed` succeeded with eight customers and six POS users. Direct HTTP checks returned **200** for all four pages and both assets on port 8080. A browser-independent JavaScript check exercised search and the mobile-menu toggle. Browser visual and interactive checks remain for final manual verification.

## GitHub repository

The project is published in the public [ahbarcelon/laravel-pos-lab repository](https://github.com/ahbarcelon/laravel-pos-lab) on the `main` branch. The source, migrations, seeders, README, `.env.example`, and Composer files are available there. Local secrets, installed dependencies, and the SQLite database are excluded by `.gitignore`.

To clone it on another computer, run `git clone https://github.com/ahbarcelon/laravel-pos-lab.git`, enter the cloned folder, and follow the local setup steps above. For future changes, review `git status --short` before committing and keep `.env`, `vendor/`, `node_modules/`, and `database/*.sqlite` out of Git. A Git commit's author name and email only label the commit; they do not create a GitHub account.

## Deploy to Railway yourself

Railway's [Laravel guide](https://docs.railway.com/guides/laravel) says Railpack detects Laravel and runs it with **PHP-FPM and Caddy**. This repository has no Vite build step. No worker, cron, or database service is needed to display the four static pages.

1. Create or sign in to a [Railway](https://railway.com) account and connect GitHub. Create a new project and select **Deploy from GitHub repo → laravel-pos-lab**.
2. Let Railpack detect the PHP app. Keep its detected build and start commands. Composer dependencies come from `composer.lock`; the web root is `public/`. Do not add `npm run build`.
3. In the service **Variables** tab, add `APP_NAME=Laravel POS Management System`, `APP_ENV=production`, `APP_DEBUG=false`, `LOG_CHANNEL=stderr`, `CACHE_STORE=file`, `SESSION_DRIVER=file`, and `QUEUE_CONNECTION=sync`.
4. Generate a fresh secret locally with `php artisan key:generate --show`; add the resulting `base64:...` as Railway's `APP_KEY`. Keep it out of Git. Do not upload `.env`.
5. Deploy and inspect build/runtime logs. Railway injects `PORT`; its web server must listen on `0.0.0.0` at that port. If detection fails, check Railpack and [Railway's build/start commands](https://docs.railway.com/builds/build-and-start-commands). For a lab-only fallback, use `sh -c 'php artisan serve --host=0.0.0.0 --port=${PORT:-8080}'` as a custom start command; Railpack's PHP-FPM/Caddy setup is preferred.
6. In **Settings → Networking → Public Networking**, click **Generate Domain**. Set `APP_URL` to its `https://...railway.app` URL and deploy the staged variable change.
7. Visit the public `/`, `/about`, `/customers`, and `/users` routes. Verify navigation, assets, search, and mobile layout before submitting the URL.

The deployed pages do not need persistent SQLite. Railway's filesystem is ephemeral, so add a managed database if future versions store real records. Railway's [plan documentation](https://docs.railway.com/pricing/plans) currently lists a 30-day trial with a one-time $5 grant, a Free plan with $1 monthly usage credit, and Hobby at $5/month with $5 usage included; extra usage can be billed. Check pricing before deploying.

## Screenshots

After final browser verification, capture the dashboard, About page, both directories, and one mobile view. Put them in `screenshots/` if your instructor requests images. Screenshots are not required by the app.

## Submission checklist

- [x] Laravel 13 project and four named routes are implemented.
- [x] Both account pages use static arrays with at least five records and Blade `@foreach`.
- [x] Shared layout, responsive CSS, search script, migrations, seeders, and README are included.
- [x] Feature tests, optional migrations/seeders, and local HTTP responses were verified.
- [ ] Manually verify browser search, mobile layout, and console.
- [x] Create and push the GitHub repository; confirm its URL.
- [ ] Deploy on Railway and verify the hosted URL.
- [ ] Submit the GitHub and hosted application links.

## Credits and references

Created for IT0049 TFA5, *From Zero to Four Pages, Again: Your First Laravel Application*. Reference: Matt Stauffer, *Laravel: Up & Running*, 3rd edition (2024). Technical references: [Laravel installation](https://laravel.com/docs/13.x/installation), [routing](https://laravel.com/docs/13.x/routing), [Blade](https://laravel.com/docs/13.x/blade), [deployment](https://laravel.com/docs/13.x/deployment), [PHP for Windows](https://www.php.net/downloads.php?os=windows), [Composer](https://getcomposer.org/doc/00-intro.md), [Git](https://git-scm.com/download/win), [GitHub](https://docs.github.com/en/migrations/importing-source-code/using-the-command-line-to-import-source-code/adding-locally-hosted-code-to-github), and [Railway](https://docs.railway.com/guides/laravel).
