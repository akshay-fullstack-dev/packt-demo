Perquisites 
1)php >= 8.0.2
2) insall php certificate to call the https curl request without any issue steps mentioned in the note section
3)Nodejs version 16.4.1
4)npm version  7.18.1


1) clone project to local machine with composer install
2) create .env file from .env.example
3) add db connection and migrate the migration
4)add PACKT_API_KEY in the env file which you will obtain from api.packt.com
5)intall node packages
6)run npm run build or yarn build
7)run command php artisan serve and open the link in browser




<!-- insall php certificate to call the curl request without any issue -->
Error:- PHP - SSL certificate error: unable to get local issuer certificate
curl.cainfo="C:/wamp/cacert.pem"
openssl.cafile="C:/wamp/cacert.pem"
https://stackoverflow.com/questions/28858351/php-ssl-certificate-error-unable-to-get-local-issuer-certificate