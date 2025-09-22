FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    wget \
    curl \
    zip \
    libzip-dev \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv $(find /root -type f -name symfony) /usr/local/bin/symfony \
    && chmod +x /usr/local/bin/symfony

# Define work directory
WORKDIR /var/www/symfony

# Add a user 
RUN useradd -m symfony && chown -R symfony:symfony /var/www/symfony
USER symfony

# Exposer the port
EXPOSE 8000

CMD ["php-fpm"]