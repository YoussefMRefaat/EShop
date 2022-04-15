# Men's Store 

## Idea

Ecommerce website <br>
Built using ***Laravel*** | ***MySQL*** | ***AJAX***

## Features

There are three types of roles in this application :-
- Admin
- User
- Guest

#### Guests can :-
1- Signup <br>
2- Login <br>
3- Reset password <br>
4- Access the homepage <br>
5- Access the shop page <br>


#### All authenticated accounts can :-
1- Update account information and password <br>
2- Logout <br>
3- Access the homepage <br>
4- Access the shop page <br>


#### Users can :-
 <em>In addition to the previous features</em> <br>
1- Add or remove an accessory to or from favourites <br>
2- Access the favourites page <br>
2- Add or remove an accessory to or from the cart <br>
3- Access the cart page <br>
4- Update the quantity of an accessory in the cart <br>
5- Place an order (if not banned)<br>

#### Admins can :-
<em>In addition to the previous features </em> <br>
1. Create, read, update, and delete categories <br>
2. Create, read, update, and delete accessories <br>
3. Read all orders
4. Update the status of the order<br>
    1. If the order is pending, It can be shipped or cancelled
    2. If the order is shipped, It can be delivered or cancelled
    3. If the order is delivered, It can be cancelled( in 14 days from delivering)
    4. If the order is cancelled it can be restored(restore the quantity in the stock)
    5. Delivered and restored are the endpoints of the process
5. Read all users
6. Ban or unban a user


## Front-end
- The templates are extended and converted from HTML into blades and components
#### Credits
- The templates are downloaded from __[The Meowagon](themewagon.com)__



## How to use

After installing the project as a Laravel 8 project,
run `php artisan db:seed` to create an admin with email= `admin@test` and password=`Admin123` <br>
After logging in with this admin account, you can manage the website's content and processes through the dashboard<br>

## License
[MIT license](https://opensource.org/licenses/MIT).
