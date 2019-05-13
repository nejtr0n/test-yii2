FROM php:7.3-rc-fpm
ARG TZ=Europe/Moscow
ENV TZ ${TZ}
ENV DEBIAN_FRONTEND noninteractive
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin \
        --filename=composer
# Install Phpunit
RUN curl -o /usr/local/bin/phpunit https://phar.phpunit.de/phpunit-7.phar && chmod +x /usr/local/bin/phpunit
# Timezone
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
# Locale
RUN apt-get update && apt-get install -y --no-install-recommends locales && \
    dpkg-reconfigure -f noninteractive tzdata && \
    sed -i -e 's/# en_US.UTF-8 UTF-8/en_US.UTF-8 UTF-8/' /etc/locale.gen && \
    sed -i -e 's/# ru_RU.UTF-8 UTF-8/ru_RU.UTF-8 UTF-8/' /etc/locale.gen && \
    echo 'LANG="ru_RU.UTF-8"'>/etc/default/locale && \
    dpkg-reconfigure --frontend=noninteractive locales && \
    update-locale LANG=ru_RU.UTF-8
ENV LANG ru_RU.UTF-8
ENV LANGUAGE ru_RU:ru
ENV LC_ALL ru_RU.UTF-8
# PHP
RUN apt-get install -y sudo libcurl4-gnutls-dev curl \
libmcrypt-dev zip unzip postgresql-server-dev-all libfreetype6-dev \
libjpeg62-turbo-dev libpng-dev libpcre3-dev librabbitmq-dev supervisor libevent-dev libssl-dev libsqlite3-dev
RUN docker-php-ext-install iconv
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install mbstring tokenizer gd exif opcache bcmath sockets pdo_mysql pdo_pgsql pdo_sqlite

COPY schedule.sh /root/schedule.sh
RUN chmod +x /root/schedule.sh

RUN usermod  -u 1000 www-data
RUN groupmod -g 1000 www-data