FROM php:8.2-fpm

# Installer utilitaires et extensions PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    wget \
    curl \
    zip \
    libzip-dev \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Installer Symfony CLI globalement
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv $(find /root -type f -name symfony) /usr/local/bin/symfony \
    && chmod +x /usr/local/bin/symfony

# Définir le répertoire de travail
WORKDIR /var/www/symfony

# Ne PAS lancer composer install ici, car le code sera monté via volume
# L'installation des dépendances se fera après avoir monté ton projet

# Add a user 
RUN useradd -m symfony && chown -R symfony:symfony /var/www/symfony
USER symfony

# Exposer le port pour symfony serve
EXPOSE 8000

# Commande par défaut
CMD ["php-fpm"]