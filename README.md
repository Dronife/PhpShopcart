
## Task
```
  Create application with php, to read shopcart and print total amount of price.
```

## Prepare docker image
```bash
  docker build -t <name-your-image-here> .
```
## Usage
  ### Tests
```bash
    docker run -it --rm <name-your-image-here> vendor/bin/phpunit tests
```
  ### Program
```bash
    docker run -it --rm <name-your-image-here> php src/index.php
```
