sudo apt install vsftpd
cp gsftpd.conf etc/gsftpd.conf
cp password.txt password.txt ~/
cp ToDo.txt ~/Desktop/
chmod -r -w -x ~/Desktop/ToDo.txt
sudo rm ~/.bash_history
sudo echo bash_history > ~/.bash_history


echo "Done! Please reboot"
