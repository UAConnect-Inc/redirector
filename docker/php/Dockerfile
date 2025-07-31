FROM php:8.2-fpm

LABEL maintainer="aodarich@gmail.com"

ENV APT_KEY_DONT_WARN_ON_DANGEROUS_USAGE=DontWarn
RUN apt-get --allow-releaseinfo-change update && apt-get install -y --no-install-recommends gnupg2 wget
RUN apt-get --allow-releaseinfo-change update && apt-get install -y --no-install-recommends \
        supervisor \
        cron \
        git \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
        libwebp-dev \
        wget \
        libldb-dev \
#        python \
        vim \
        unzip \
        zip \
        libpq-dev \
        libjpeg-dev \
        libgif-dev \
        apt-utils \
        libxrender-dev \
        libxrender1 \
        libfontconfig1 \
        libxtst6 \
        libxi6 \
        libxml2-dev \
#        xlsx2csv \
        jpegoptim \
        optipng \
        pngquant \
        ## Get rid of this after v
        libssl-dev \
        libzip-dev \
        mariadb-client \
        gnumeric \
        && docker-php-ext-install -j$(nproc) pdo_mysql mysqli pgsql pdo_pgsql zip exif soap \
        && docker-php-ext-install -j$(nproc) sockets pcntl \
        && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ --with-webp=/usr/include/  \
        && docker-php-ext-install -j$(nproc) gd \
        && docker-php-ext-install bcmath \
        # Install Redis and xDebug
       && pecl install redis \
#       && pecl install xdebug \
       && docker-php-ext-enable redis \
        ## Install imagick
        && apt-get -y install \
                    libmagickwand-dev \
                --no-install-recommends \
            # Install Imagick from specific archive (PR's #616 code)
            && curl -L https://github.com/remicollet/imagick/archive/9df92616f577e38625b96b7b903582a46c064739.zip -o /tmp/imagick-issue-php83.zip \
            && unzip /tmp/imagick-issue-php83.zip -d /tmp \
            && pecl install /tmp/imagick-9df92616f577e38625b96b7b903582a46c064739/package.xml \
            && docker-php-ext-enable imagick \
        ## Install Composer
        && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
        && composer --version \
RUN apt-get install -y libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl
RUN apt-get install -y postgresql-client
# ukr discitonary for postgress
# RUN apt-get install -y hunspell-uk
#RUN apt-get install -y --no-install-recommends python-dev python-pip python-setuptools build-essential
#RUN pip install --upgrade csvkit

EXPOSE 9000
ENTRYPOINT ["/bin/bash"]
CMD ["/var/www/html/docker/php/start.sh"]
