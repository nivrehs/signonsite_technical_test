FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
  git \
  vim \
  zip \
  unzip \
  libonig-dev \
  libzip4 \
  libzip-dev \
  && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mbstring

RUN docker-php-ext-install zip

RUN mkdir /app

WORKDIR /app
COPY composer.phar composer.json composer.lock /app/
RUN ./composer.phar install --no-scripts --no-autoloader

ADD app app/
ADD artisan .
ADD bootstrap bootstrap/
ADD composer.json .
ADD composer.lock .
ADD composer.phar .
ADD config config/
ADD database database/
ADD package.json .
ADD package-lock.json .
ADD phpunit.xml .
ADD public public/
ADD resources resources/
ADD routes routes/
ADD server.php .
ADD storage storage/
ADD tests tests/
ADD webpack.mix.js .
Add .env .

RUN ./composer.phar install

CMD php artisan serve --host 0.0.0.0 --port 8080
