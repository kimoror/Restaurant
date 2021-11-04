FROM php:7.2-apache
COPY src/ /var/www/html
RUN apt-get update
RUN docker-php-ext-install mysqli
RUN apt-get update 
RUN apt-get install libmariadb3 -y
RUN apt-get install libaprutil1-dbd-mysql -y
RUN a2enmod dbd
RUN a2enmod authn_dbd
RUN a2enmod socache_shmcb
RUN a2enmod authn_socache
RUN service apache2 restart foreground
RUN apache2ctl -M 