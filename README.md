hypermedia
==========

This project shows an example on how to add hypermedia to an object.

See tests how to set it up and build hypermedia.

Example:


```php
# set up the POPO
$object = new fixtures\Person();
$object->setId(1);
$object->setGroupId(1);

# Resource holds information about possible links
$resource = new fixtures\PersonResource();

# The project comes with a SimpleVoter if none is set
# It can be implemented to vote on showing links or not depending on token role
$securityToken = new fixtures\SecurityToken('anonymously');
$voter = new fixtures\Voter();

$builder = Builder::createBuilder($voter, $securityToken);
$output = $builder->build($resource, $object);
```

Output:

```php
Array
(
    [0] => Array
        (
            [href] => /user
            [rel] => users
        )

    [1] => Array
        (
            [href] => /groups/1
            [rel] => group
        )

)
```
