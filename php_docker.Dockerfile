FROM php:8.1.12-cli-bullseye

COPY src/ /var/www/html/

RUN chown -R www-data.www-data /var/www/html
RUN chmod -R 775 /var/www/html

RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
RUN service apache2 restart