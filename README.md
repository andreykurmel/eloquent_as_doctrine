# eloquent_as_doctrine
Hydrate Laravel Entities from Models to use all Eloquent benefits in Service/Repository pattern.

Laravel Eloquent Model changed to return Entities which can be used as Data Transfer Objects.

Just use "\AndreyKurmel\EloquentAsDoctrine\Models\Model" instead of "\Illuminate\Database\Eloquent\Model".

Class to be used as entity can be set as property:
- protected $entity = Entity::class;

By default will be used Entity the same as Laravel Model (without database functions).
But you can use any other class by implementing interface "\AndreyKurmel\EloquentAsDoctrine\Entities\EloquentInterface"

You can check an example in the folder "src/Example/" (without extra code with interfaces, entry point is "src/Example/Service.php").