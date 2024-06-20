# Complete Infrastructure Project - Guardia School

## Introduction

In this project, you will utilize all the skills and knowledge acquired through various projects, workshops, and lectures throughout the year to create a single complete infrastructure.

## Technical Documentation

### Server

**Installation of Debian Server: Version 11.6.0**
- Download link: [Debian 11.6.0 ISO](https://lecrabeinfo.net/telecharger/debian-11-64-bits)
- Type: ISO
- Virtualizer: VirtualBox 7.0
- Settings:
  - Username: avg38
  - Password: *ask
  - Hostname: ServerUbuntu
  - Domain name: myguest.virtualbox.org
  - Network: enp0s3 / DHCPv4 10.0.2.15/24
  - OpenSSH server: Yes
  - Additional installation: None

### Web Server

**Choice: Apache2**

**Installation via command line:**
```sh
sudo apt-get update
sudo apt-get install apache2
sudo apt-get install vim
sudo apt-get install php libapache2-mod-php php-mysql
```

**Configuration Files:**

/etc/apache2/apache2.conf
/etc/apache2/sites-available/000-default.conf
/etc/apache2/sites-enabled/000-default.conf
**MariaDB**

Installation and Configuration:

```sh
sudo apt-get install mariadb-server
sudo mysql_secure_installation
sudo mysql -u root -p
```
**Database Setup:**

```sql
CREATE DATABASE dbname;
CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON dbname.* TO 'username'@'localhost';
FLUSH PRIVILEGES;
```
**Directory Setup:**

```sh
sudo mkdir /var/www/html/monsite
sudo chown -R www-data:www-data /var/www/html/monsite
sudo vim /var/www/html/monsite/index.php  # Add PHP code
sudo service apache2 restart
```
## Website Implementation

Framework Used: Tailwind CSS

**Integration:**

To integrate Tailwind CSS, simply add the following line in the HEAD section:
```html
<script src="https://cdn.tailwindcss.com"></script>
```
If additional steps are needed:

Download Node.js and the Tailwind CSS packages.
**Run the command:**

```sh
npx tailwindcss -i ./CSS/style.css -o ./dist/style.css --watch
```
Create the two files style.css (in a "CSS" folder) and style.css (in a "dist" folder). This setup allows Tailwind to automatically write the required CSS in the dist/style.css file based on the HTML classes.
**Benefits:**

Tailwind simplifies CSS by automating this task and ensuring responsiveness.

**Web PHP**

Currently, only the contact form (temporarily a guestbook) is linked to a database in phpMyAdmin via Uwamp (which will likely move to MariaDB on VM).

**Database Details:**

```php
db_name: Big_project
username: "root"
PHP Initialization:
Initialize PHP with its config.php file and require it in each .php file.
```
