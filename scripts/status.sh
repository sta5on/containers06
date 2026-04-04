#!/bin/sh

set -eu

echo "=== Containers ==="
printf '%s\n' "NAMES      IMAGE              STATUS      PORTS"
docker ps --format '{{.Names}}\t{{.Image}}\t{{.Status}}\t{{.Ports}}' | awk -F '\t' '$1 == "frontend" || $1 == "backend" { print }'
echo
echo "=== Network ==="
docker network inspect internal --format '{{range $id, $container := .Containers}}{{printf "%s\t%s\n" $container.Name $container.IPv4Address}}{{end}}' | sort
