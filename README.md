# InSiteTation - Inventory, Site, Location

This is a web-based **Asset Inventory Management and Tracking System** for Heavy Machinery, Construction Equipment and Light Machinery. There will be 3 different users for this system which are the admin, manager and normal staff.

* Admin: Manage assets, project sites, requisitions and users.
* Manager: Manage assets, ptoject sites and requisitions.
* Normal Staff: Submit requisitions and view requisitions history.


## Features

 **1. Inventory** <br />
	 Asset management, simplified. Minimum fuss, maximum productivity.

 **2. Requisition** <br />
	 Perform asset requisitions at the palm of your hands. No paperwork necessary.

 **3. Track** <br />
	 Update locations using QR code. Assets won't be out of sight anymore.

 **4. Sites** <br />
	 Straightforward presentation of data. Helps you stay on track as you manage sites.

## Development Tools Used

* [Laravel](https://laravel.com/) - Version 5.7.6
* [PHP](http://php.net/) - Version 7.1
* [PostgreSQL](https://www.postgresql.org/ ) - Version 3.2

## Package Used
* Used for set roles and permissions for user: [Jeremy Kenedy - Laravel Roles](https://github.com/jeremykenedy/laravel-roles)
* Used for generating QR code: [SimpleSoftwareIO - Simple QRCode](https://github.com/SimpleSoftwareIO/simple-qrcode)

## Library Used
* Site Point Nicer QR Reader: https://www.sitepoint.com/create-qr-code-reader-mobile-website/

## Installation

1. Install Node.js [here](https://nodejs.org/en/download/) to run `npm`.
2. Install Composer  [here](https://getcomposer.org/doc/00-intro.md)
3. Install PHP version 7.1 [here](http://php.net/downloads.php)
	1. Expand the zip file into the path `C:\PHP7`
	2. Rename `php.ini-development` to `php.ini`
	3. Edit `php.ini` in text editor
		Uncomment the followings by removing `;`
		```
		extension_dir = "ext"
		extension=php_gd2.dll
		extension=php_curl.dll
		extension=php_mbstring.dll
    extension=php_openssl.dll
    extension=php_sockets.dll
		extension=php_pdo_pgsql.dll
		extension=php_pgsql.dll
		```

4. Install Laravel version 5.7
	`php composer global require "laravel/installer"`
5. Install PostgreSQL pgAdmin 4 version 3.2 [here](https://www.postgresql.org/ftp/source/v10.5/)

## Get Started

1. Open Command Prompt and change directory to project file.
2. `composer install`
3. `copy .env.example .env`
4. Open the .env file using a text editor and modify the data as shown below. Once done, save the file and close it.
	```
	DB_CONNECTION=pgsql
	DB_HOST=127.0.0.1
	DB_PORT=5432
	DB_DATABASE=your_database_name
	DB_USERNAME=your_postgresql_username
	DB_PASSWORD=your_postgresql password
	```
5.  Run `php artisan key:generate` to generate the key.
6.  Seed an initial set of Permissions, Roles, and Users with roles. `composer dump-autoload`
7. To create tables in database with seed, run `php artisan migrate --seed`
8. Run `npm install`
9. To launch the application on **localhost**, run `php artisan serve`. Then launch `127.0.0.1:8000` on your browser.

	To launch the application from **mobile and other devices**, run `ipconfig` to get the IP Address of your laptop/desktop. Then run `php artisan serve --host your_ip_address`. You can now launch the application from multiple devices by entering `your_ip_address:8000`, provided they are in the same network.
