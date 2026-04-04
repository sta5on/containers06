#!/bin/sh

set -eu

docker rm -f frontend >/dev/null 2>&1 || true
docker rm -f backend >/dev/null 2>&1 || true
docker network rm internal >/dev/null 2>&1 || true

echo "Контейнеры и сеть internal удалены."
