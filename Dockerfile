FROM php:8.3-fpm
LABEL author="Alfarozy"
# Copy composer.lock and composer.json to /var/www
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install required dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    cron \
    unzip \
    git \
    nano \
    supervisor

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql bcmath gd
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Add user for Laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Supervisor configuration files
# COPY email-supervisor.conf /etc/supervisor/conf.d/supervisord.conf

# Running Supervisor
# RUN echo "[include]" >>  /etc/supervisor/supervisord.conf &&\
#     echo "files = /etc/supervisor/conf.d/*.conf" >>  /etc/supervisor/supervisord.conf

RUN composer install --ignore-platform-reqs
# Running Supervisor
RUN crontab -l | { cat; echo "* * * * * cd /var/www && php artisan schedule:run >> /var/log/cron.log 2>&1"; } | crontab -

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

RUN sed -i 's/9000/9001/g' /usr/local/etc/php-fpm.d/www.conf
RUN sed -i 's/9000/9001/g' /usr/local/etc/php-fpm.d/zz-docker.conf

# Change current user to www
USER www


# Start php-fpm on port 9000
CMD ["php-fpm"]