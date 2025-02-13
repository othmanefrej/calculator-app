FROM alpine:3.16.0

WORKDIR /var/www/html

EXPOSE 80

# Install curl, git, nginx, php, and other dependencies
RUN apk add --no-cache \
    curl \
    nginx \
    libpq-dev \
    php81 \
    php81-fpm \
    php81-curl \
    php81-pdo_mysql \
    php81-pdo \
    php81-zip \
    php81-fileinfo \
    php81-json \
    php81-xml \
    php81-xmlwriter \
    php81-xmlreader \
    php81-simplexml \
    php81-dom \
    php81-openssl \
    php81-soap \
    php81-opcache \
    php81-phar \
    php81-iconv \
    php81-tokenizer \
    php81-mbstring \
    php81-gd \
    php81-session 


# Install the Internationalization extension (NumberFormatter dependency)
RUN apk add --no-cache php81-intl


# Nginx configurations
COPY docker/configs/nginx/nginx.conf /etc/nginx/
COPY docker/configs/nginx/http.d/default.conf /etc/nginx/http.d


# Install composer
RUN apk add --no-cache php81-cli
RUN ln -s /usr/bin/php81 /usr/bin/php \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install the app dependencies
COPY ./src .
RUN composer update --no-ansi --no-interaction --no-progress

# Set ownership
RUN chown -R nginx:nginx /var/www/html/storage
RUN chown -R nginx:nginx /var/www/html/bootstrap

# CMD
CMD sh -c 'php-fpm81 && nginx -g "daemon off;"'
