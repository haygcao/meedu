FROM php:7.2-fpm
MAINTAINER Azure <https://baiyue.one>
#web服务器 larve框架base
ENV TZ=Asia/Shanghai
ENV REDIS_VERSION=5.0.4
# Update packages
RUN apt-get update && apt-get install -y libpng-dev libjpeg62-turbo-dev libpng-dev libfreetype6-dev zip git \
    && apt-get clean && rm -rf /var/lib/apt/lists/*
# 安装php扩展插件    
RUN docker-php-ext-install pdo pdo_mysql zip gd bcmath ctype \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
# 安装redis扩展
# Install redis driver
RUN mkdir -p /tmp/pear \
    && cd /tmp/pear \
    && pecl bundle redis-$REDIS_VERSION \
    && cd redis \
    && phpize . \
    && ./configure --enable-redis \
    && make \
    && make install \
    && cd ~ \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis \
    && php -m | grep redis
## 网站目录copy
WORKDIR /var/www/html

# 容器内拷贝网站
RUN git clone https://github.com/Qsnh/meedu.git /var/www/html \
    && sed -i "s/DB_HOST=127.0.0.1/DB_HOST=mysql/g" .env.example \
    && sed -i "s/REDIS_HOST=127.0.0.1/DB_HOST=redis/g" .env.example \
    && cp .env.example .env 


COPY vendor ./vendor
ADD php.ini /usr/local/etc/php/php.ini
# 运行权限设置
RUN chmod -R a+w+r /var/www/html/storage/ && \  
    chmod -R a+w+r /var/www/html/bootstrap/cache/ 

VOLUME /var/www/html



