#!/bin/bash

echo "🚀 Iniciando configuração automática do ambiente Monorepo..."

# Composer global
echo "📦 Composer global"
composer install --no-interaction

# Composer vanilla
if [ -f "src/vanilla/composer.json" ]; then
    echo "📦 Composer Vanilla"
    cd src/vanilla && composer install
    cd ../..
fi

# Laravel
LARAVEL_DIR="src/laravel"

if [ ! -f "$LARAVEL_DIR/composer.json" ]; then
    echo "📦 Laravel não detectado. Inicialização instalação geral"
    composer create-project laravel/laravel $LARAVEL_DIR
fi

echo "📦 Composer Laravel"
cd $LARAVEL_DIR && composer install
cd ../..

# .env do Laravel
if [ -d "$LARAVEL_DIR" ] && [ ! -f "$LARAVEL_DIR/.env" ]; then
    echo "🔧 Configurando arquivo .env do Laravel com credenciais do Docker"
    cp $LARAVEL_DIR/.env.example $LARAVEL_DIR/.env

    sed -i 's/DB_CONNECTION=mysql/DB_CONNECTION=pgsql/g' $LARAVEL_DIR/.env
    sed -i "s/DB_HOST=127.0.0.1/DB_HOST=${DB_HOST}/g" $LARAVEL_DIR/.env
    sed -i "s/DB_PORT=3306/DB_PORT=${DB_PORT}/g" $LARAVEL_DIR/.env
    sed -i "s/DB_DATABASE=laravel/DB_DATABASE=${POSTGRES_DB}/g" $LARAVEL_DIR/.env
    sed -i "s/DB_USERNAME=root/DB_USERNAME=${POSTGRES_USER}/g" $LARAVEL_DIR/.env
    sed -i "s/DB_PASSWORD=/DB_PASSWORD=${POSTGRES_PASSWORD}/g" $LARAVEL_DIR/.env

    cd $LARAVEL_DIR && php artisan key:generate
    cd ../..
fi

# Ajuste de Permissões
echo "🔓 Ajustando permissões"
if [ -d "$LARAVEL_DIR" ]; then
    chmod -R 777 $LARAVEL_DIR/storage $LARAVEL_DIR/bootstrap/cache
fi

echo "✨ Ambiente pronto! Acesse http://localhost:8080/laravel"
