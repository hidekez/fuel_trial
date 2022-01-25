FROM nginx:latest

ADD ./default.conf /etc/nginx/conf.d/default.conf

# TimeZoneをAsia/Tokyoに設定する
ENV TZ Asia/Tokyo
RUN echo "${TZ}" > /etc/timezone \
   && dpkg-reconfigure -f noninteractive tzdata

RUN apt-get clean  \
    && apt-get update \
    && apt-get install -y zip unzip  \
    && apt-get install -y vim less \
    && apt-get install -y locales && locale-gen ja_JP.UTF-8 \
    && apt-get install -y bash-completion # 入力補完
#    && locale-gen en_US.UTF-8

ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
ENV LC_ALL ja_JP.UTF-8

#ENV LANG en_US.UTF-8
#ENV LANGUAGE en_US:en
#ENV LC_ALL en_US.UTF-8

#RUNする際の実行DIR
WORKDIR /var/www
