<?php

namespace Longman\TelegramBot\Commands;

use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use MyBot\Exceptions\ExampleException;
use MyBot\Models\User;


abstract class UserCommand extends Command
{

    /**
     * @var User
     */
    protected User $user;

    protected function setUser(\Longman\TelegramBot\Entities\User $telegramUser): User
    {
        // save or update user in database
        global $local_lang;
        $user = User::firstOrCreate(['user_id' => $telegramUser->getId()]);
        $local_lang = $user->local_language;
        return $this->user = $user;
    }

    /**
     * Pre-execute command
     *
     * @return ServerResponse
     * @throws TelegramException
     */
    public function preExecute() :ServerResponse
    {

        try {
            return $this->execute();
        }
        catch (ExampleException $exception){
            // do stuff
        }
        finally {
            if (isset($this->user)){
                $this->user->touch();
            }
        }
    }

}
