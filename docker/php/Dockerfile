FROM php:7.0.33-fpm

ADD php.ini /usr/local/etc/php/conf.d/php.ini

RUN apt-get update \
    && apt-get install -y libmcrypt-dev mysql-client \
    && docker-php-ext-install mcrypt pdo_mysql mysqli mbstring \
    && apt-get install -y zip unzip \
    && apt-get install -y curl git

    #composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod 777 /usr/local/bin/composer

RUN curl https://get.fuelphp.com/oil | sh

WORKDIR /var/www
