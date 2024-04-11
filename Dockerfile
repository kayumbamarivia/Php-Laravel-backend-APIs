# Use the official PHP image as a base
FROM php:8.0.19

# Install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install project dependencies
RUN composer install --no-interaction --no-plugins --no-scripts

# Expose port 80
EXPOSE 80

# Start the PHP server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
