#!/bin/bash
sudo yum update -y
sudo yum install git -y
#Install efs utils pre-req
sudo yum install -y amazon-efs-utils

#mount efs
sudo mkdir /mnt/efs
sudo mount -t efs -o tls fs-04f7c2f12fc049689:/ /mnt/efs        #!!! Change with new ref

#clone repo
cd /mnt/efs
sudo git clone https://github.com/gronzul1/lab1.git

#cp /mnt/efs/install_with_EFS.sh  .
sudo chmod a+x ./lab1/install_with_EFS.sh

#deploy app
. ./lab1/install_with_EFS.sh