<?php

namespace Core\PostsManager;

use Core\App;
use Core\Session;
use Core\Database;
use Core\ValidationException;

class PostsManager
{

  private $employer;
  private $employer_posts;

  public function __construct($employer)
  {

    $this->employer = $employer;
    $this->employer_posts = $this->employer['monthly_posts_remaining'];

  }

  protected function deduct_posts($posts_value): bool|int {
    $int_val = (int) $posts_value;
    if ($int_val == 0) {
      Session::flash('error', 'Sorry! You have no more posts remaining for this month.');
      return false;
    }
    return $int_val - 1;
  }

  protected function add_posts($posts_value, $posts_to_add): bool|int {
    $initial_posts_number = (int) $posts_value;
    $additional_posts = (int) $posts_to_add;
    if ($additional_posts <= 0) return false;
    return $initial_posts_number + $additional_posts;
  }

  public function update_employer_posts_data($additional_posts = 0) {
    if ($additional_posts > 0) {
      $this->employer_posts = $this->add_posts($this->employer_posts, $additional_posts);
    } else {
      $this->employer_posts = $this->deduct_posts($this->employer_posts);
    }

    // Validate the value before attempting to update the database
    if (!is_int($this->employer_posts)) {
      throw new \InvalidArgumentException('Invalid monthly_posts_remaining value.');
    }

    $db = App::resolve(Database::class);

    try {
        $sql = 'UPDATE employers SET monthly_posts_remaining = :monthly_posts_remaining WHERE employer_id = :employer_id';
        $params = [
            ':monthly_posts_remaining' => $this->employer_posts,
            ':employer_id' => $this->employer['employer_id']
        ];

        $db->query($sql, $params);

        return true;
    } catch (\PDOException $exception) {
        throw $exception;
    }
  
  }

}