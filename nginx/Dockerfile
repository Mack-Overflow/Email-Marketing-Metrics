FROM nginx:alpine

# Copy custom configuration file from the current directory
COPY nginx/nginx.conf /etc/nginx/nginx.conf

# Copy the application's public directory to the container
COPY --chown=www-data:www-data ./public /var/www/public
