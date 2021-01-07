# Symfony REST sample project

[![Build Status](https://travis-ci.com/vidragabor/symfony-rest.svg?branch=main)](https://travis-ci.com/vidragabor/symfony-rest)

A simple REST project where data can be queried and modified using HTTP methods.

## Available public methods

*Default route:* /users

* / [GET] - get all users
* /id [GET] - get user
* /id [PUT] - update user
* /id [DELETE] - delete user
* /add [POST] - add (create) user

![Postman Printscreen](http://vidragabor.hu/data/images/github-symfony-rest-postman.jpg)
 
## Use AppFixtures to fake users

If you want users in the database, AppFixtures will help. Each run will create 10 users.

Run the following command:

```console
bin/console doctrine:fixtures:load
```

Of course, you can modify it in this code snippet:

```php
public function load(ObjectManager $manager)
{
    $faker = Factory::create();

    for ($i = 0; $i < 10; $i++) {
        $user = new User();
        $user->setFirstName($faker->firstName)
            ->setLastName($faker->lastName)
            ->setEmail($faker->email);
        $manager->persist($user);
    }

    $manager->flush();
}
```
