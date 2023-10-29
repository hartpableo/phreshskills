<?php

namespace Core\CSRFToken;

use Core\Session;

class CSRFToken {
    protected string $token;
//    protected int $token_max_time = 60 * 60 * 24;
  protected int $token_max_time = 10;

    public function generateToken()
    {
      $this->token = md5( uniqid( rand(), true ) );
      Session::put( 'csrf_token', $this->token );
      Session::put( 'csrf_token_time', time() );
    }

    public function getToken(): string {
      return $this->token;
    }

    public function validateToken( $token ): bool {
      if ( ! isset( $token ) || $token !== Session::get( 'csrf_token' ) ) {
        return false;
      }

      if ( ( Session::get( 'csrf_token_time' ) + $this->token_max_time ) < time() ) {
        return false;
      }

      Session::delete( 'csrf_token' );
      Session::delete( 'csrf_token_time' );
      return true;
    }
}