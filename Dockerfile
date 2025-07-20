FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install system packages for PHP + Python + OpenCV + Face Recognition
RUN apt-get update && apt-get install -y \
    python3 \
    python3-pip \
    build-essential \
    cmake \
    libgtk-3-dev \
    libboost-all-dev \
    libssl-dev \
    libffi-dev \
    libjpeg-dev \
    libatlas-base-dev \
    libopencv-dev \
    ffmpeg \
    wget \
    curl \
    git \
    libgl1-mesa-glx \
    libgl1 \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli

# Install Python dependencies
RUN pip3 install --no-cache-dir \
    face_recognition \
    opencv-python \
    numpy \
    Pillow \
    mysql-connector-python

# Copy project files into Apache root
COPY . /var/www/html/

# Allow .htaccess override in Apache
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Set working directory
WORKDIR /var/www/html/

# Expose Apache
EXPOSE 80
