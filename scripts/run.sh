#!/bin/sh

set -eu

ROOT_DIR=$(CDPATH= cd -- "$(dirname "$0")/.." && pwd)
SITE_DIR="$ROOT_DIR/mounts/site"
NGINX_CONF="$ROOT_DIR/nginx/default.conf"

mkdir -p "$SITE_DIR"

if ! docker info >/dev/null 2>&1; then
    echo "Docker daemon недоступен. Запусти Docker Desktop и повтори попытку."
    exit 1
fi

if ! docker network inspect internal >/dev/null 2>&1; then
    docker network create internal >/dev/null
fi

docker rm -f backend >/dev/null 2>&1 || true
docker rm -f frontend >/dev/null 2>&1 || true

docker run -d \
    --name backend \
    --network internal \
    -v "$SITE_DIR:/var/www/html" \
    php:7.4-fpm >/dev/null

docker run -d \
    --name frontend \
    --network internal \
    -p 80:80 \
    -v "$SITE_DIR:/var/www/html" \
    -v "$NGINX_CONF:/etc/nginx/conf.d/default.conf:ro" \
    nginx:1.23-alpine >/dev/null

echo "Контейнеры backend и frontend запущены."
echo "Открой http://localhost"
