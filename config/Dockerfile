FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Instalar dependências
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    jpegoptim optipng pngquant gifsicle \
    git \
    curl

RUN docker-php-ext-configure gd --with-freetype --with-jpeg=/usr/include/ --enable-gd

# Instalar extensões
RUN docker-php-ext-install gd

# Instalar composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Adicionar usuário para aplicação
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copiar o conteúdo do diretório de aplicativos existente
COPY . /var/www/html

# Copiar permissões existentes do diretório de aplicativos
COPY --chown=www:www . /var/www/html

# Alterar usuário atual para www
USER www

# Expor a porta 9000 e iniciar o servidor php-fpm
EXPOSE 9000
CMD ["php-fpm"]