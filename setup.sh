sudo apt-get -y update
sudo apt-get -y install mysql-server php5-mcrypt php5-mysql apache2 php5 libapache2-mod-php5 php5-curl
sudo service apache2 restart
curl -sS https://getcomposer.org/installer | php