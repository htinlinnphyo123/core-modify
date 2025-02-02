# Custom Mini CRUD directions

 + In .env Set Up(ARTISAN_COMMAND_PASSWORD=BigSoft)

## For overall short-note for mini crud features
-------------------------------------------------------------------------------------------------------------------------
 + first you need to run  
``` 
php artisan make:coreFeature--all
```

### This cmd was success another step are as follow

-------------------------------------------------------------------------------------------------------------------------

+ in ( routes/web.php ) u need to register for your new routes
+ in lang folder , u need to add new lang for ur new feature
    #### ===============For Detail ==================
    + add ( newFeature.php ) in en folder
    + add ( newFeature.php ) in mm folder
    + register new feature name in ( sidebar.php ) in en and mm folder;
+ in ( resources/views/components/sidebar.blade.php) u need to register for ur new feature of Ui and necessary

-------------------------------------------------------------------------------------------------------------------------
### Permission Step

+ in (config/numbers.php) u need to add this new Feature(users) in the permissons key (Hint. You can check in PermissionSeeder)
    #### ===============For Detail ==================
    + After Generating this feature, You need to run following command to add permissions for this feature in Permission tables
    ``` 
    php artisan migrate:fresh --seed
    ```

-------------------------------------------------------------------------------------------------------------------------

### Service Container Repository Binding Step

+ in RepositoryBindingProvider ( We have to bind newFeature RepositoryInerface to Repository Class to be resolved by Laravel Service Container)

-------------------------------------------------------------------------------------------------------------------------

# Optional

+ if you want to create only Logics(mean Controller , Resource , Service and Validation) , Run
    ```php artisan make:coreFeature--logic```
+ if you want to create only views ( C , R  , U , D) and show pages, Run
    ``` php artisan make:coreFeature--view```

-------------------------------------------------------------------------------------------------------------------------

#### Add Field To View

 ##### The Above Features will generate resources/view/admin/newFeature.php (Field will only include name(Default) in create,edit,show Blade Files)
 #### If you want to add fields(in Migration Field) and update index,create,show Blade files , you can run 
 ```
 php artisan add-fields-to-view --model={newFeature(Eg.users)}
 ```
<em> This will search all Fields in Migration Files and will add Add Fields in create,show and edit Files </em>

-------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------

# Tips that Need to know to use Our Core System

+ Form Request and Resources (Laraval has these pattern already)
+ Repository and Service Layer
+ Laravel Component For Reusable In View Files
+ Laravel View Composer (To Send data to Views With View::compose)
+ Repository Interface Binding
+ Laravel Macro (To extend custom methods to Laravel's Facedes Class like Storage and Response)

-------------------------------------------------------------------------------------------------------------------------

# Packages that we use
+ spatie/laravel-permission 
+ barryvdh/laravel-debugbar
+ barryvdh/laravel-ide-helper
+ rector/rector
+ TailwindCss / PrelineUi / Flowbite