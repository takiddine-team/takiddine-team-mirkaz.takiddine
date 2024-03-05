### 1. clone the Package & install the packages and set the project folder name

```
git clone https://github.com/takiddine-team/done-platform.git done-platform
```

```
cd done-platform
```

### 2. Next make sure to create a new database and add your database credentials to your .env file:
    cp .env.example .env
    php artisan key:generate

### 3. Next make sure to create a new database and add your database credentials to your .env file:
    DB_HOST=localhost
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret

### 4. Change permissions
    sudo chmod -R ugo+rw storage
    sudo chmod -R ugo+rw public
    sudo chmod -R 775 bootstrap/cache

### 5. install wkhtmltopdf
    composer require h4cc/wkhtmltopdf-amd64 0.12.x
    composer require h4cc/wkhtmltoimage-amd64 0.12.x

### 6. Move the binaries to a path that is not in a synced folder, for example:
    cp vendor/h4cc/wkhtmltoimage-amd64/bin/wkhtmltoimage-amd64 /usr/local/bin/
    cp vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64 /usr/local/bin/

### 7. and make it executable:
    chmod +x /usr/local/bin/wkhtmltoimage-amd64
    chmod +x /usr/local/bin/wkhtmltopdf-amd64
    
### 8. environment
Php version: 7.4
Ubuntu version: 20
Laravel version: 8