<?php

namespace App\Controller;

use App\DB\UserRepository;

class Login
{
  private $repository;

  function __construct(UserRepository $repository)
  {
    $this->repository = $repository;
  }

  public function page()
  {
    if (!empty($_POST)) {
      $user = $this->repository->getUserByUsername($_POST['username']);
      $username = $_POST['username'];
      $password = $_POST['password'];

      if ($username === $user['username']
          && password_verify($password, $user['password'])
      ) {
        $_SESSION['user'] = true;
        $_SESSION['username'] = 'admin';

        header('Location: http://localhost/duck_store/web/index.php');
      }
    }
    $this->render();
  }

  protected function render()
  {
    include_once __DIR__ . '/../../views/head.php';
    include_once __DIR__ . '/../../views/header.php';
    include_once __DIR__ . '/../../views/login/page.php';
    include_once __DIR__ . '/../../views/footer.php';
  }
}
