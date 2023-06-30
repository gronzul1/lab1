#!/bin/bash
sudo su
yum update -y
yum install httpd php php-mysqli -y
cd /var/www/html
echo "<html><h1>Welcome to Autoscale Instance</h1><div><h1>Hostname $(hostname -f) </h1></div> </html>" > /var/www/html/index.html
service httpd start
chkconfig httpd on
sudo usermod -a -G apache ec2-user
sudo chown  ec2-user:apache /var/www -R
# sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;
