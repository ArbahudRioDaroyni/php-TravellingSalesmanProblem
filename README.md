<p align="center">
    <h1 align="center">Completion Algorithm TSP Case with RBFS</h1>
    <a href="https://github.com/ArbahudRioDaroyni" target="_blank">Arbahud Rio Daroyni - GitHub
    </a>
    <br>
</p>

TSP PROJECTS

FILE STRUCTURE
-------------------

      index.php             contains code of index
      jquery.js             contains Jquery assets
      peta.php              contains maps of route
      README.md             contains How It Works Usage
      start.php             contains inisialzation class
      tsp.php               contains model classes



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
php composer.phar create-project --prefer-dist --stability=dev beta/beta-TravellingSalesmanProblem
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/TravellingSalesmanProblem/index.php
~~~

### Install from an Archive File

Get clone download on

```php
'https://github.com/ArbahudRioDaroyni'
```

You can then access the application through the following URL:

~~~
http://localhost/TravellingSalesmanProblem/index.php
~~~

CONFIGURATION
-------------

### Peta

Edit the file `peta.php` with real data, for example:

```php
$peta = array(
  ...
  'jkt' => (object)array(
      'id'   => 'jkt',
      'name' => 'Jakarta',
      'path' => array(
          'bdg' => 270,
          'crb' => 327
          )
      ),
  ...
```

**NOTES:**
- Beta

BASIC USAGE
-------------

```php
importclass 'tsp.php';
importclass 'peta.php';

$tsp = new TSP();
$tsp->setPeta($params = array());
//$tsp->setPeta($peta);

$id = $_REQUEST['id'];
// echo json_encode($tsp->start($id));

$data = array('status' => 'OK', 'data' => $tsp->start($startpoint = string));
// $data = array('status' => 'OK', 'data' => $tsp->start('sby'));

header('Content-Type: application/json');
echo json_encode($data);
// echo json_encode($tsp->start('cari'));
```
