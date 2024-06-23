FROM php:8.2-fpm-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN mkdir -p /var/www/app

WORKDIR /var/www/app

RUN delgroup dialout

RUN addgroup -g ${GID} --system fenix_cinema_network
RUN adduser -G  fenix_cinema_network --system -D -s /bin/sh -u ${UID} fenix_cinema_network

RUN sed -i "s/user = www-data/user = fenix_cinema_network/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = fenix_cinema_network/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf
RUN echo "post_max_size = 500M" >> /usr/local/etc/php/conf.d/docker-fpm.ini
RUN echo "upload_max_filesize = 500M" >> /usr/local/etc/php/conf.d/docker-fpm.ini

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN docker-php-ext-install pdo pdo_mysql

USER fenix_cinema_network

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
