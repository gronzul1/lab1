#!/bin/bash
#sudo su
sudo yum update -y
sudo yum install httpd php php-mysqli git -y

sudo service httpd start
sudo chkconfig httpd on

git clone https://github.com/gronzul1/lab1.git

sudo usermod -a -G apache ec2-user
sudo chown  ec2-user:apache /var/www -R
# sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;

mkdir /var/www/inc
cp lab1/inc/dbinfo.inc /var/www/inc/
cp lab1/index.html /var/www/html/
cp lab1/webapp.php /var/www/html/
