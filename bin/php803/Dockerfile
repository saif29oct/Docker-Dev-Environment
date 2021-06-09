FROM php:8.0.3-apache

ARG DEBIAN_FRONTEND=noninteractive

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Update
RUN apt-get -y update --fix-missing && \
    apt-get install -y apt-utils && \
    apt-get upgrade -y && \
    rm -rf /var/lib/apt/lists/*


# Install useful tools and install important libaries
RUN apt-get -y update && \
    apt-get -y --no-install-recommends install nano wget \
dialog \
libsqlite3-dev \
libsqlite3-0 && \
    apt-get -y --no-install-recommends install default-mysql-client \
zlib1g-dev \
libzip-dev \
libicu-dev && \
    apt-get -y --no-install-recommends install --fix-missing apt-utils \
build-essential \
git \
curl \
libonig-dev && \ 
    apt-get -y --no-install-recommends install --fix-missing libcurl4 \
libcurl4-openssl-dev \
zip \
openssl && \
    rm -rf /var/lib/apt/lists/* && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install xdebug
#RUN pecl install xdebug-2.8.0 && \
#    docker-php-ext-enable xdebug


# Composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer

#Install Node & npm
RUN apt-get -y update
RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

# Install redis
RUN pecl install redis-5.3.3 && \
    docker-php-ext-enable redis

# Install imagick
#RUN apt-get update && \
   # apt-get -y --no-install-recommends install --fix-missing libmagickwand-dev && \
   # rm -rf /var/lib/apt/lists/* && \
   # pecl install imagick && \
   # docker-php-ext-enable imagick

RUN apt-get -y update
RUN apt-get install -y libmagickwand-dev
RUN rm -rf /var/lib/apt/lists/*
RUN apt-get -y update
RUN apt-get install -y imagemagick
RUN git clone https://github.com/Imagick/imagick
WORKDIR imagick/
RUN phpize && ./configure
RUN make
RUN make install
WORKDIR ../

# Other PHP7 Extensions

RUN docker-php-ext-install mysqli && \
    docker-php-ext-install zip
   # docker-php-ext-install pdo_mysql && \
   # docker-php-ext-install pdo_sqlite && \
   # docker-php-ext-install curl && \
   # docker-php-ext-install tokenizer && \
   # docker-php-ext-install json && \
   # docker-php-ext-install -j$(nproc) intl && \
   # docker-php-ext-install mbstring && \
   # docker-php-ext-install gettext && \
   # docker-php-ext-install exif


# Install Freetype 
RUN apt-get -y update && \
    apt-get --no-install-recommends install -y libfreetype6-dev \
libjpeg62-turbo-dev \
libpng-dev && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Enable apache modules
RUN a2enmod rewrite headers

# Cleanup
RUN rm -rf /usr/src/*
