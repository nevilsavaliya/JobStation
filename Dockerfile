FROM php:8.2-apache

# Enable Apache modules
RUN a2enmod rewrite

# Install system packages and dependencies
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
    python3-dev \
    && rm -rf /var/lib/apt/lists/*

# ✅ Install PHP mysqli extension
RUN docker-php-ext-install mysqli

# ✅ Install dlib before face_recognition
RUN pip3 install --no-cache-dir \
    numpy \
    dlib==19.24.0 \
    opencv-python \
    Pillow \
    mysql-connector-python \
    face_recognition

# Copy project files into Apache root
COPY . /var/www/html/

# Allow .htaccess override
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

WORKDIR /var/www/html/

EXPOSE 80
