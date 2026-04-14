# Borrowing and Acquisition Pages for Library System

## Steps:

### 1. Generate base files [✅ COMPLETE]
   - [x] php artisan make:model Borrowing -m
   - [x] php artisan make:model Acquisition -m
   - [x] php artisan make:controller BorrowingController --resource --model=Borrowing
   - [x] php artisan make:controller AcquisitionController --resource --model=Acquisition

### 2. Create/Edit migrations
   - [ ] Edit create_borrowings_table.php (fields)
   - [ ] Edit create_acquisitions_table.php (fields)
   - [ ] php artisan migrate

### 3. Update models
   - [ ] Edit app/Models/Borrowing.php (relationships)
   - [ ] Edit app/Models/Acquisition.php (relationships)
   - [ ] Edit app/Models/Book.php (add hasMany)
   - [ ] Edit app/Models/User.php (add hasMany Borrowings if needed)

### 4. Update controllers
   - [ ] Edit BorrowingController.php (validation, logic e.g. check availability)
   - [ ] Edit AcquisitionController.php

### 5. Add routes
   - [ ] Edit routes/web.php (add resources)

### 6. Create views
   - [ ] borrowings/index.blade.php, create, edit, show
   - [ ] acquisitions/index.blade.php, create, edit, show

### 7. Fix factories/seeder
   - [ ] Update database/factories/BorrowingFactory.php
   - [ ] Update database/factories/AcquisitionFactory.php
   - [ ] Update database/seeders/DatabaseSeeder.php
   - [ ] php artisan db:seed

### 8. Test
   - [ ] Run server, test CRUD for both.


### 2. Create/Edit migrations
   - [ ] Edit create_borrowings_table.php (fields)
   - [ ] Edit create_acquisitions_table.php (fields)
   - [ ] php artisan migrate

### 3. Update models
   - [ ] Edit app/Models/Borrowing.php (relationships)
   - [ ] Edit app/Models/Acquisition.php (relationships)
   - [ ] Edit app/Models/Book.php (add hasMany)
   - [ ] Edit app/Models/User.php (add hasMany Borrowings if needed)

### 4. Update controllers
   - [ ] Edit BorrowingController.php (validation, logic e.g. check availability)
   - [ ] Edit AcquisitionController.php

### 5. Add routes
   - [ ] Edit routes/web.php (add resources)

### 6. Create views
   - [ ] borrowings/index.blade.php, create, edit, show
   - [ ] acquisitions/index.blade.php, create, edit, show

### 7. Fix factories/seeder
   - [ ] Update database/factories/BorrowingFactory.php
   - [ ] Update database/factories/AcquisitionFactory.php
   - [ ] Update database/seeders/DatabaseSeeder.php
   - [ ] php artisan db:seed

### 8. Test
   - [ ] Run server, test CRUD for both.

