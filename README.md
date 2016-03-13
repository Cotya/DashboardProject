

Repository for the Cotya Dashboard Project



Some used modules are symlinked, also the Theme, not installed via composer.  
Reason is, it is easier as long as the custom module location feature is not finished.

Used modules:  

* https://github.com/Cotya/AuthenticationModule
* https://github.com/Cotya/DebugModule



### some words about the development setup

for the case someone wants to copy the concept or documentate it.

Most of the modules are inside `app_local` to keeping them outside of the actual magento build because of
different reasons.

this loos like this:

```
    tree -L 3 app_local/
       app_local/
       |-- code
       |   `-- Cotya
       |       |-- Authentication
       |       |-- ComposerNotifyEndpoint
       |       |-- Dashboard
       |       |-- Debug
       |       |-- HelloWorld
       |       |-- Pionier
       |       |-- Queue
       |       `-- VcsMapper
       |-- design
       |   `-- frontend
       |       `-- Cotya
       `-- NonComposerComponentRegistration.php
```

the `NonComposerComponentRegistration.php` is a modified variant of the magento one in `/app/etc/` and you need to add
it in your project `composer.json` as autoload=>file entry. Also its important to add the autoloading for the modules
into your project `composer.json`.
 
This seems to work for modules, and probably also for design. I saw a few problems with design, but that may also be the
result of me having no idea how to do design changes yet.


