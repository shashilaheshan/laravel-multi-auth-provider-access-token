<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use \Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Merchant;

class MerChantAuthController extends AccessTokenController
{
    /**
     * Hooks in before the AccessTokenController issues a token
     *
     *
     * @param  ServerRequestInterface $request
     * @return mixed
     */
    public function auth(ServerRequestInterface $request)
    {
        $httpRequest = request();


        if ($httpRequest->grant_type == 'password') {
            // 2.
            $user = Merchant::where('email', $httpRequest->username)->first();

            // Perform your validation here

            // If the validation is successfull:
            $token = $this->issueToken($request);

            return $token;
        }
    }
}
