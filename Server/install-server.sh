


sqlpass=123456

sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $sqlpass"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $sqlpass"


sudo apt-get -y install mysql-server
sudo apt-get -q install apache2 php7.0 libapache2-mod-php7.0 php-mysql
echo "CREATE DATABASE cameras; USE cameras; CREATE TABLE users (user varchar(255), pass varchar(255)); INSERT INTO users VALUES('froike', 'karpi');" | mysql -uroot -p$sqlpass



sudo rm /var/www/html/*
sudo cp image*.txt /var/www/html/
sudo cp cameraView.sh /var/www/html/
sudo cp index.php /var/www/html/

sudo chown -R www-data /var/www/html/
sudo chmod -R u=rx /var/www/html/

sudo usermod www-data -g root

sudo useradd teacher
echo teacher:teacher | sudo chpasswd

sudo cp ssh_config /etc/ssh/
sudo cp motd /etc/motd
sudo chmod 744 /etc/ssh/ssh_config /etc/motd

sudo service apache2 restart

echo "Done! Please reboot!"



