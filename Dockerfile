
FROM php:7.4-apache


WORKDIR /app


COPY . /app/


EXPOSE 80


CMD ["apache2-foreground"]
