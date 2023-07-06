#!/bin/bash
#sudo su
sudo yum update -y
sudo yum install httpd php php-mysqli git amazon-efs-utils -y

sudo service httpd start
sudo chkconfig httpd on

sudo mkdir efs
cd efs
sudo git clone https://github.com/gronzul1/lab1.git

sudo usermod -a -G apache ec2-user
sudo chown  ec2-user:apache /var/www -R
sudo chown  ec2-user:apache ~/efs -R

cd /var/www/html
ln -s ~/efs/lab1/index.php index.php
