#!/bin/sh

echo "🔐 Получаем сертификат для r.wildbus.ca"

certbot certonly \
    --webroot -w /var/www/certbot \
    -d r.wildbus.ca \
#    -d www.r.wildbus.ca \
    --agree-tos --email wildbus.manager@gmail.com --non-interactive

echo "✅ Запускаем автообновление"

trap exit TERM

while :; do
  echo "🔁 Продление сертификата..."
  certbot renew \
      --webroot -w /var/www/certbot \
      --quiet
  sleep 12h & wait $!
done
