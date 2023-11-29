FROM php:latest

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install required extensions and commands for Composer
RUN apt-get update \
    && apt-get install -y zip unzip git \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html

COPY composer.json ./

# Install dependencies
RUN composer install

COPY core/ core/
COPY public/ public/
COPY src/ src/
COPY .env.docker .env

EXPOSE 8080

# Use the PHP built-in server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public/"]