FROM php:7.1-apache

RUN apt-get update && apt-get install -y \
  p7zip-full

RUN a2enmod rewrite
RUN docker-php-ext-install pdo_mysql mbstring

COPY src/virtualhost.conf /etc/apache2/sites-enabled/000-default.conf
RUN mkdir /var/logs && touch /var/logs/playground.log && chmod 777 /var/logs/*

CMD ["./bin/start"]
