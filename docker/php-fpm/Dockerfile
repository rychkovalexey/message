FROM php:7.4-fpm-alpine
RUN apk --update --no-cache add git
RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /usr/share/nginx/html
CMD composer install ; php bin/console doctrine:migrations:migrate ;  php-fpm
EXPOSE 9000
