FROM composer:1.8.6 as composer
MAINTAINER azure <https://baiyue.one>
# Docker版问题反馈地址：https://github.com/Baiyuetribe/meedu/pulls

FROM php:7.3.6-zts-alpine3.10
# 本镜像每月自动同步meedu官方源码
RUN apk update && apk add --no-cache libzip-dev freetype libpng libpng-dev libjpeg-turbo freetype-dev libjpeg-turbo-dev autoconf gcc g++ make git  \
    && docker-php-ext-install zip \
    && docker-php-ext-configure gd \
    --with-gd \
    --with-freetype-dir=/usr/include/ \
    --with-png-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ \
    && NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) \
    && docker-php-ext-install -j${NPROC} gd pdo_mysql bcmath \ 
    && mkdir -p /tmp/pear \
    && cd /tmp/pear \
    && pecl bundle redis-5.0.4 \
    && cd redis \
    && phpize . \
    && ./configure --enable-redis \
    && make \
    && make install \
    && cd ~ \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis \
    && php -m | grep redis \
    && apk del autoconf gcc g++ make \
    && rm -rf /var/cache/apk/*
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_HOME /var/cache/composer
RUN mkdir /var/cache/composer 


