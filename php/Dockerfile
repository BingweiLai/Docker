FROM php:7.3-fpm
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev 
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis \ 
    &&  echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
    &&  echo "session.save_handler = redis" >> /usr/local/etc/php/conf.d/redis.ini \
    &&  echo "session.save_path = tcp://redis:6379" >> /usr/local/etc/php/conf.d/redis.ini
RUN apt-get update && apt-get install -y \
    procps \
    telnet \
    iputils-ping \
    nano \
    vim