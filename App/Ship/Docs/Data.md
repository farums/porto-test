## Application.Data.UserInterface
```php
// Адаптер UserImplementation.php
namespace Application\Data\User;
Interface  UserInterface{
    public function getUserById($userId)
    public function updateUser($user)
}
```
##  Аdapters
```php
namespace Аdapters\Data\MongoDB\User;

use MongoDB\Client;
use Application\Data\User\UserInterface;

class UserRepository  implements UserInterface
{
    public function __construct(private Client $client){ }
    public function getUserById($userId) {
             //...
    }
    public function updateUser($user) {
     //...
    }
}

 class  UserRepositoryRedisProvider extends AbstractProvider{
    protected function abstractFactories()
    {
        return [
            // Здесь мы связываем интерфейс с его реализацией
            UserInterface::class => UserRepository::class,
        ];
    }
 }
```

return [
    'service_manager' => [
        'factories' => [
            'Аdapters\Data\MongoDB\User\MongoDBUserProvider' => 'Аdapters\Data\MongoDB\User\MongoDBUserProvider',
        ],
    ],
];




## Infrastructure.Data настройка 
```php
namespace Infrastructure\Data\MongoDB;
use MongoDB\Client;

class MongoDBFactory
{
    public static function createClient(string $connectionString): Client
    {
        return new Client($connectionString);
    }
}

```

