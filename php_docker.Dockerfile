FROM php:8.1.12-apache

RUN apt-get update

COPY src/ /var/www/html/
COPY .env /var/www/html/php/

RUN chown -R www-data.www-data /var/www/html
RUN chmod -R 775 /var/www/html

RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
RUN service apache2 restart

RUN apt-get -y install git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer require vlucas/phpdotenv