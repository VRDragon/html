# html
pre spustenie prikazy

sudo apt-get update
git clone https://github.com/zhaolei/WiringOP.git -b h3 
cd WiringOP
chmod +x ./build
sudo ./build
sudo apt-get install apache2 php5 libapache2-mod-php5
cd /var/www
sudo rm -r html
git clone https://github.com/VRDragon/html
