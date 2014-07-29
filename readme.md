# Laravel 4 w/ Vagrant and Grunt for Web RAD

A basic Ubuntu 12.04 Vagrant setup with:
* [![Laravel4](http://laravel.com/assets/img/logo-head.png)](http://laravel.com/docs)
* [![PHP 5.5](http://www.php.net/images/logo.php)](http://php.net)
* Includes Jeffrey Way's [Laravel4 Generators](https://github.com/JeffreyWay/Laravel-4-Generators)
* Based on Bryan Nielsen's [Laravel4-Vagrant](https://github.com/bryannielsen/Laravel4-Vagrant)

* [![Built with Grunt](https://cdn.gruntjs.com/builtwith.png)](http://gruntjs.com/)

* Box without Laravel available at (https://github.com/chromelife/bare_basebox)


## Requirements

* VirtualBox - Free virtualization software [Download Virtualbox](https://www.virtualbox.org/wiki/Downloads)
* Vagrant **1.6+** - Tool for working with virtualbox images [Download Vagrant](https://www.vagrantup.com)
* Git - Source Control Management [Download Git](http://git-scm.com/downloads)
* Vagrant-Exec plugin - installed below

## Setup

* Add "C:\Program Files (x86)\Git\bin" to your system path environment variable
* Clone this repository
* Run `vagrant plugin install vagrant-exec` inside the newly created directory
* run `vagrant up` inside the directory
* (the first time you run vagrant it will need to fetch the virtual box image which is ~300mb so depending on your download speed this could take some time)
* Vagrant will then use puppet to provision the base virtual box with our LAMP stack etc (this could take a few minutes) also note that composer will need to fetch all of the packages defined in the app's composer.json which will add some more time to the first provisioning run
* You can verify that everything was successful by opening http://localhost:8888 in a browser

*Note: You may have to change permissions on the www/app/storage folder to 777 under the host OS*

For example: `chmod -R 777 www/app/storage/`

## Usage

* Some basic information on interacting with the vagrant box

### Grunt

* After first `vagrant up`, using CLI run `vagrant exec grunt depends` to pull in Bower modules and move them to dev directory, and to install necessary gems
* Within your project directory, using a CLI window run `Vagrant exec grunt` to have Grunt automatically compile/minify/concatenate files (can use `tasks` (batch file included))


### Port Forwards

* 8888 - Apache
* 8889 - MySQL
* 2222 - SSH


### Default MySQL

* User: root
* Password: (blank)
* DB Name: database


### PHPmyAdmin

Accessible at http://localhost:8888/phpmyadmin using MySQL access credentials above.

### PHP XDebug

XDebug is included in the build but **disabled by default** because of the effect it can have on performance.

To enable XDebug:

1. Set the variable `$use_xdebug = "1"` at the beginning of `puppet/manifests/phpbase.pp`
2. Then you will need to provision the box either with `vagrant up` or by running the command `vagrant provision` if the box is already up
3. Now you can connect to XDebug on **port 9001**

**XDebug Tools**

* [MacGDBP](http://www.bluestatic.org/software/macgdbp/) - Free, Mac OSX
* [Xdebug Client](https://sublime.wbond.net/packages/Xdebug%20Client) - Free, Sublime Text 2/3 plugin


_Note: All XDebug settings can be configured in the php.ini template at `puppet/modules/php/templates/php.ini.erb`_


### Vagrant

Vagrant is [very well documented](http://vagrantup.com/v1/docs/index.html) but here are a few common commands:

* `vagrant up` starts the virtual machine and provisions it
* `vagrant suspend` will essentially put the machine to 'sleep' with `vagrant resume` waking it back up
* `vagrant halt` attempts a graceful shutdown of the machine and will need to be brought back with `vagrant up`
* `vagrant ssh` gives you shell access to the virtual machine
* `vagrant exec` allows you to run commands within the /var/www directory without using SSH
* `vagrant destroy` attempts a graceful shutdown of the machine and, after confirmation, destroys the VM

----

