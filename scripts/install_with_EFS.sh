#!/bin/bash
#install SW
# sudo yum update -y
sudo yum install httpd php php-mysqli git -y

#configure apache
sudo service httpd start
sudo chkconfig httpd on

#configure ec2-user
sudo usermod -a -G apache ec2-user
sudo chown  ec2-user:apache /var/www -R
#configure permissions web directory
# sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;

# #Install efs utils
# sudo yum install -y amazon-efs-utils
# sudo mkdir /mnt/efs
# sudo mount -t efs -o tls fs-08276dd8be9678809:/ /mnt/efs


#deploy app
mkdir /var/www/inc

ln -s /mnt/efs/lab1/inc/dbinfo.inc  /var/www/inc/dbinfo.inc
ln -s /mnt/efs/lab1/index.php /var/www/html/index.php
ln -s /mnt/efs/lab1/webapp.php /var/www/html/webapp.php