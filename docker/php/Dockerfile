FROM php:7.0.33-fpm

ADD php.ini /usr/local/etc/php/conf.d/php.ini

# TimeZoneをAsia/Tokyoに設定する
ENV TZ Asia/Tokyo
RUN echo "${TZ}" > /etc/timezone \
   && dpkg-reconfigure -f noninteractive tzdata

RUN apt-get clean \
    && apt-get update \
    && apt-get install -y \libmcrypt-dev mysql-client \
    && docker-php-ext-install mcrypt pdo_mysql mysqli mbstring \
    && apt-get install -y zip unzip  \
    && apt-get install -y vim less \
    && apt-get install -y curl git \
    && apt-get install -y locales && locale-gen ja_JP.UTF-8 \
    && apt-get install -y bash-completion # 入力補完

ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
ENV LC_ALL ja_JP.UTF-8

#composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod 777 /usr/local/bin/composer

RUN curl https://get.fuelphp.com/oil | sh

#RUN locale-gen en_US.UTF-8
#ENV LANG en_US.UTF-8
#ENV LANGUAGE en_US:en
#ENV LC_ALL en_US.UTF-8

#RUN env FUEL_ENV=production php oil -v

#RUNする際の実行DIR
WORKDIR /var/www
