### System Specifications

| Requirements | Versions |
| :----------: | :------: |
|   LARAVEL    |   10.x    |
|     PHP      | ^8.1.12  |
|    MYSQL     |   ^10.4.25   |

## Configuration

1.  Clone this repository.

    ```bash
        $   git clone https://github.com/ericnicdao069/backend-dev-exam.git
    ```

2.  Recreate environment variable file.

    ```bash
        $   cp .env.example .env
    ```

3.  Install composer and npm.

    ```bash
        $   composer install && npm install
    ```

4.  Generate Application Key.

    ```bash
        $   php artisan key:generate
    ```

5.  Create your DB and update your DB configs in .env.

    ```bash
        $   DB_CONNECTION=mysql
        $   DB_HOST=127.0.0.1
        $   DB_PORT=3306
        $   DB_DATABASE=laravel
        $   DB_USERNAME=root
        $   DB_PASSWORD=
    ```

6.  Execute Database Migration and Seeders.

    ```bash
        $   php artisan migrate --seed
    ```

7.  Create a symlink for Storage in Public Directory.

    ```bash
        $   php artisan storage:link
    ```

8.  Generate Ziggy routes.

    ```bash
        $   php artisan ziggy:generate
    ```

9.  Run local server.

    ```bash
        $   php artisan serve
    ```

10.  Front Build.

    ```bash
        $   npm run dev
        $   npm run build
        $   npm i vite
        $   php artisan serve

11.  For Running implemented Laravel Tests (Unit Tests/ HTTP Tests /Database Tests)
    ``bash
        $   ./vendor/bin/phpunit

12.  For Running implemented Laravel Tests (Browser Tests)
    ``bash
        $   composer require --dev laravel/dusk
        $   php artisan dusk:install
        $   php artisan dusk:chrome-driver
        $   ./vendor/laravel/dusk/bin/chromedriver-linux
        $   php artisan dusk

## Requirements (Accomplished)
-Unit Test

    Test > Unit > ExamUnitTest.php
    
-HTTP Test

    Test > Feature > ExampleTest.php
    
-Browser Test

    Test > Browser 
    
-Database Test

    Test > Feature > DatabaseTest.php
    
-Vue JS Tests

    Added Vitetest
    
-CI/CD

    Github Repository Actions > Laravel.yml
