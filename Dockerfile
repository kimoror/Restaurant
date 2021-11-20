FROM php:7.2-apache
COPY src/ /var/www/html
RUN apt-get update
RUN docker-php-ext-install mysqli
RUN apt-get install libmariadb3 -y
RUN apt-get install libaprutil1-dbd-mysql -y
RUN a2enmod dbd
RUN a2enmod authn_dbd
RUN a2enmod socache_shmcb
RUN a2enmod authn_socache

RUN pecl install -o -f redis \
&& docker-php-ext-enable redis

RUN apt-get install git -y \
&& apt-get install zip -y
RUN apt-get install -y libpng-dev
RUN apt-get install -y \
    libwebp-dev \
    libjpeg62-turbo-dev \
    libpng-dev libxpm-dev \
    libfreetype6-dev
RUN docker-php-ext-configure gd \
    --with-gd \
    --with-webp-dir \
    --with-jpeg-dir \
    --with-png-dir \
    --with-zlib-dir \
    --with-xpm-dir \
    --with-freetype-dir
RUN docker-php-ext-install gd
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY composer.json /var/www
RUN cd .. \
&& composer update