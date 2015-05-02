#!/bin/sh

# You must have activated agent forwarding on your machine, and run this through ssh to provision the vm
# See https://developer.github.com/guides/using-ssh-agent-forwarding/

# MUST BE EXECUTED BY USER myjob in order that agent forwarding works
# The default user should be "myjob"

# install php5, apache, php5 mcrypt mod
sudo apt-get -y install php5 php5-json php5-mcrypt php5-mysql mysql-server

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

sudo service apache2 restart
fi

# If myjob has not been installed yet
if ! test -d /home/myjob/laravel; then

mkdir /home/myjob/laravel

# Clone myjob into ~/laravel - Must be executed by myjob user so that agent forwarding works.
git clone git@github.com:zifeo/Myjob.git /home/myjob/laravel 

# Generate new random encryption_key
random_key=`date +%s | sha256sum | base64 | head -c 32`

echo "<?php
return array(
	'encryption_key' => '$random_key'
);
?>
" > /home/myjob/laravel/.env.php

curl -sS https://getcomposer.org/installer | php -- --install-dir=/home/myjob/laravel


# Install laravel via composer
olddir=`pwd` # pushd doesn't exist in sh, have to "emulate" it...
cd /home/myjob/laravel
php composer.phar install

# Create user & database "forge"

echo "CREATE USER 'forge'@'localhost'; CREATE DATABASE forge; GRANT ALL PRIVILEGES ON forge.* To 'forge'@'localhost'" | mysql -u root

php artisan --migrate

cd "$olddir"
fi

# Give rights to laravel on storage folder
sudo chown -R www-data /home/myjob/laravel/app/storage
sudo chgrp -R www-data /home/myjob/laravel/app/storage
