Silex example for Pagodabox.com
===============================

[Silex][1] is a microframework in PHP based on [Symfony2][2] components. [Pagoda Box][3] is a PaaS for easy PHP hosting. This, silex-example, tries to bring the two together by showing an example on how a Silex app could be structured and configured to work on Pagoda.

## Instructions

1) Clone the Git repository and be sure to pull down the submodules.

```
$ git clone git@github.com:tobiassjosten/silex-example.git
$ git submodule update --init
```

2) Check to see if you are using the latest version of Silex and update if not.

```
$ cd vendor/silex
$ php silex.phar check
$ php silex.phar update
```

3) Deploy it to Pagoda!

[1]: http://silex-project.org/
[2]: http://symfony.com/
[3]: http://www.pagodabox.com/
