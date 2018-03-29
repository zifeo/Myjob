#!/bin/sh

# You must have activated agent forwarding on your machine, and run this through ssh to provision the vm
# See https://developer.github.com/guides/using-ssh-agent-forwarding/

# MUST BE EXECUTED BY USER myjob in order that agent forwarding works
# The default user should be "myjob"

# latest version of php5
sudo apt-get -y update
sudo add-apt-repository ppa:ondrej/php5-5.6 #for ubuntu it works. for debian, follow: http://nwdthemes.com/2016/01/31/how-to-upgrade-to-php-5-6-on-debian-7-wheezy/

sudo apt-get -y update
sudo apt-get -y install php5 php5-json php5-mhash php5-mcrypt php5-curl php5-cli php5-mysql mysql-server php5-gd php5-intl php5-xsl

# Enable mcrypt mod & restart apache
sudo php5enmod mcrypt
sudo apache2ctl restart

# Link /var/www to project folder
sudo rm -rf /var/www
sudo ln -s /home/myjob/laravel/public /var/www 

# If apache myjob.conf doesn't exist, create it
if ! test -e /etc/apache2/sites-available/myjob.conf; then

sudo rm -f /etc/apache2/sites-available/000-default.conf
sudo rm -f /etc/apache2/sites-enabled/000-default.conf

sudo echo "<VirtualHost *:80>
	DocumentRoot /var/www
 	ErrorLog \${APACHE_LOG_DIR}/error.log
 	CustomLog \${APACHE_LOG_DIR}/access.log combined
	<Directory "/var/www">
		AllowOverride all
	</Directory>
</VirtualHost>" > /etc/apache2/sites-available/myjob.conf

sudo ln -s /etc/apache2/sites-available/myjob.conf /etc/apache2/sites-enabled/myjob.conf

sudo service apache2 restart
fi

# If myjob has not been installed yet
if ! test -d /home/myjob/laravel; then

mkdir /home/myjob/laravel

# Clone myjob into ~/laravel - Must be executed by myjob user so that agent forwarding works.
git clone git@github.com:zifeo/Myjob.git /home/myjob/laravel

curl -sS https://getcomposer.org/installer | php -- --install-dir=/home/myjob/laravel

# Install laravel via composer
olddir=`pwd` # pushd doesn't exist in sh, have to "emulate" it...
cd /home/myjob/laravel
php composer.phar install

# Create user & database "forge"

echo "CREATE USER 'forge'@'localhost';" | mysql -u root
echo "CREATE DATABASE forge; GRANT ALL PRIVILEGES ON forge.* To 'forge'@'localhost'" | mysql -u root

php artisan migrate --force
php artisan migrate --seed --force

cd "$olddir"
fi

# Give rights to laravel on storage folder
sudo chown -R www-data /home/myjob/laravel/app/storage
sudo chgrp -R www-data /home/myjob/laravel/app/storage

# Generate random app key
php artisan key:generate


# Configure cron to execute laravel task scheduler
echo "* * * * * php /home/myjob/laravel/artisan schedule:run 1> /dev/null 2>&1" | crontab


# Warning
echo 'Please edit the ".env" file. If this is a production server, don\'t forget to put debug to false.'

