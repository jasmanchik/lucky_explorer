FROM php:8.1-fpm-alpine

# Install dependencies
RUN apk update && apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS\
    oniguruma-dev \
    libzip-dev \
    build-base \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    musl-locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    nano \
    unzip \
    git \
    curl \
    nodejs \
    npm \
    su-exec

#Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Add user for laravel app
RUN addgroup -g 1000 --system docker
RUN adduser -u 1000 --ingroup docker --system www

# Set working directory
WORKDIR /var/www

# Change current user to www-data
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]