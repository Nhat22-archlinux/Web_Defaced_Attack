FROM php:8.3-apache-bookworm

RUN docker-php-ext-install mysqli \
    && printf 'ServerName localhost\n' > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername

WORKDIR /var/www/html

COPY --chown=www-data:www-data \
    config.php \
    db_config.php \
    index.php \
    dashboard.php \
    search.php \
    upload.php \
    ./

RUN mkdir -p uploads \
    && chown -R www-data:www-data uploads

EXPOSE 80
