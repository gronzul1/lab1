#!/bin/bash
sudo apt-get update -y
sudo apt-get install -y apache2 git
sudo apt-get install -y php libapache2-mod-php php-mysql

sudo service apache2 start
sudo systemctl enable apache2

sudo usermod -a -G www-data ubuntu
sudo chown  ubuntu:www-data /var/www -R

find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;

mkdir /var/www/inc

git clone https://github.com/gronzul1/lab1.git
cd lab1

cp inc/dbinfo.inc /var/www/inc/
cp index.html /var/www/html/
cp webapp.php /var/www/html/
