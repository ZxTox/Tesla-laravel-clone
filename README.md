<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Tesell - Premium second hand Tesla market

## Database
I've included the SQL dump of my database `sqldump.sql`. This given script will not only
create the database but will also seed it with data.

### Database tables
- Features
- Offers (car listings)
- users
- And some generated tables from Laravel

### Users in database
`Admin`: `Email: elon.musk@hotmaiL.com` `Pwd: test1234`

`Normal user`: `Email: djelal.fida@hotmail.com` `Pwd: test1234`

## Dotenv file 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tesell_app
DB_USERNAME=dbuser
DB_PASSWORD=1234
```

Please include this at the end of your dotenv file if you want to upload content

(Last 2 are empty)
```
CLOUDINARY_URL=
CLOUDINARY_UPLOAD_PRESET=
CLOUDINARY_NOTIFICATION_URL=
```

## Run the application
```bash
composer install
npm install
php artisan key:gen
sudo chmod -R 775 storage bootstrap/cache
```
After that you should be able to surf to the web app.
