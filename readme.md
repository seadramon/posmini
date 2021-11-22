# Installation
run :
```
docker-compose up -d
```
and setting hosts file 127.0.0.1 to posmini.test.

# Eksekusi table via migration

migrate the tables:
```
docker-compose exec phpfpm php artisan migrate
```
or in windows : 
```
winpty docker-compose exec phpfpm php artisan migrate
```

# Akses Halaman Admin
```
http://posmini.test/admin
```