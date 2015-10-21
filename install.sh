#installs DANSGUI to a certain point
#for ubuntu 10.10
#echo "installing apache"
#apt-get install apache2
#echo "installing PHP"
#apt-get install php5
echo "MOVING FILES TO DESTINATIONS"
cp ./dansTemplate/template.html /etc/dansguardian/languages/ukenglish/template.html
cp ./apachePHPfiles/dansrestart.sh /var/www/dansrestart.sh
cp ./apachePHPfiles/password.php /var/www/password.php
cp ./apachePHPfiles/unblock.php /var/www/unblock.php
cp ./apachePHPfiles/whoami.php /var/www/whoami.php
dansguardian --restart
echo "INSTALL DONE"