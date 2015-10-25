<?php

namespace App\Controller;

use App\DB\UserRepository;

class Register
{
  private $repository;

  function __construct(UserRepository $repository)
  {
    $this->repository = $repository;
  }

  public function page()
  {
    if (!empty($_POST)) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $this->repository->saveUser(
        $username,
        password_hash($password, PASSWORD_DEFAULT)
      );

      header('Location: http://localhost/duck_store/web/index.php?page=login');
    }
    $this->render();
  }

  protected function render()
  {
    include_once __DIR__ . '/../../views/head.php';
    include_once __DIR__ . '/../../views/header.php';
    include_once __DIR__ . '/../../views/register/page.php';
    include_once __DIR__ . '/../../views/footer.php';
  }
}
