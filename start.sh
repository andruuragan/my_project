#!/bin/bash
# Запускаем nginx в фоне, но с привязкой к foreground через daemon off в конфиге
nginx &
# Запускаем php-fpm (он остается в foreground)
php-fpm