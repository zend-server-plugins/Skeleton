Zend Server Skeleton Plugins
==========

This package describes the most basic plugin for Z-Ray and Zend Server UI.

Zend Server UI, starting from version 9, is based on angularJs client library and therefore, 
all the new modules should be written in the angular way. The new modules should have 
static HTML templates (with angular's placeholders if necessary), and all the information from the 
server should be fetched using Zend Server's web APIs.
Therefore, the UI plugin contains two example modules. The module "exampleAngularModule" is built in
the angular way, and the module "exampleZf2Module" is built using the standard ZF2 approach, as most 
of the modules in Zend Server prior to version 9.

Additional information can be found on our [documentation repo](https://github.com/zend-server-plugins/Documentation).
