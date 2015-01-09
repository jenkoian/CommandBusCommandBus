CommandBusCommandBus
=====================

!["Yo dawg, I heard you like command buses, so I put a command bus in your command bus, so you can command bus whilst you command bus"](yodawg.jpg)

Installation
-------------

```
composer require jenko/command-bus-command-bus
```

Usage
-----

Say you have a controller (or whatever) that looks something like

```php
<?php

namespace Acme\Controller;

use Jenko\CommandBusCommandBus\CommandBus

class MyController
{
    /**
     * CommandBus $commandBus
     */
    private $commandBus;

    /**
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param Request $request
     */
    public function myAction(Request $request)
    {
        $stuff = $request->get('stuff');
        $command = new MyCommand($stuff);

        $this->commandBus->execute($command);

        //...
    }
}
```

Then depending on your method of DependencyInjection just inject the required adapter for the command bus you want to use.

For example, in Symfony with controllers as services using Broadway:

```yaml
services:

    jenko.command_bus.broadway:
        class: Jenko\CommandBusCommandBus\BroadwayCommandBusAdapter
        arguments:
            - @broadway.command_handling.simple_command_bus

    acme.my_controller:
        class: Acme\Controller\MyController
        arguments:
            - @jenko.command_bus.broadway
````

Disclaimer
----------

This is a silly little project, you're probably better off just using the command bus which best fits your purpose. All the
command buses used within this project look great, so pick one of the following, don't use this and I'm sure you won't far go wrong :)

- [Broadway](https://github.com/qandidate-labs/broadway)
- [Commander](https://github.com/Enginebit/Commander)
- [Sergeant](https://github.com/acairns/sergeant)
- [SimpleBus](https://github.com/SimpleBus/CommandBus)
- [Tactician](https://github.com/thephpleague/tactician)

