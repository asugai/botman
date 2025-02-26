<?php

namespace BotMan\BotMan\Tests\Fixtures;

use BotMan\BotMan\Interfaces\DriverInterface;
use BotMan\BotMan\Interfaces\VerifiesService;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Users\User;
use Illuminate\Http\Request;

class TestDriver implements DriverInterface, VerifiesService
{
    /**
     * Determine if the request is for this driver.
     *
     * @return bool
     */
    public function matchesRequest()
    {
        return true;
    }

    /**
     * Retrieve the chat message(s).
     *
     * @return array
     */
    public function getMessages()
    {
        return [new IncomingMessage('', '', '')];
    }

    /**
     * @return bool
     */
    public function isBot()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isConfigured()
    {
        return true;
    }

    /**
     * @param IncomingMessage $matchingMessage
     *
     * @return Answer
     */
    public function getConversationAnswer(IncomingMessage $message)
    {
        return Answer::create();
    }

    /**
     * @param string|Question $message
     * @param \BotMan\BotMan\Messages\Incoming\IncomingMessage $matchingMessage
     * @param array $additionalParameters
     * @return mixed
     */
    public function buildServicePayload($message, $matchingMessage, $additionalParameters = [])
    {
        return [];
    }

    /**
     * @param mixed $payload
     * @return mixed
     */
    public function sendPayload($payload)
    {
        return $this;
    }

    /**
     * @param \BotMan\BotMan\Messages\Incoming\IncomingMessage $matchingMessage
     * @return string
     */
    public function types(IncomingMessage $matchingMessage)
    {
    }

    /**
     * Send a typing indicator and wait for the given amount of seconds.
     * @param IncomingMessage $matchingMessage
     * @param int $seconds
     * @param float $seconds
     * @return mixed
     */
    public function typesAndWaits(IncomingMessage $matchingMessage, float $seconds)
    {
    }

    /**
     * @return bool
     */
    public function hasMatchingEvent()
    {
        return false;
    }

    /**
     * Return the driver name.
     *
     * @return string
     */
    public function getName()
    {
        return 'Test';
    }

    public function dummyMethod()
    {
    }

    /**
     * Retrieve User information.
     * @param \BotMan\BotMan\Messages\Incoming\IncomingMessage $matchingMessage
     * @return UserInterface
     */
    public function getUser(IncomingMessage $matchingMessage)
    {
        return new User();
    }

    /**
     * Tells if the stored conversation callbacks are serialized.
     *
     * @return bool
     */
    public function serializesCallbacks()
    {
        return false;
    }

    public static function loadExtension()
    {
        $_SERVER['loadedTestDriver'] = true;
    }

    public function verifyRequest(Request $request)
    {
        $_SERVER['verifiedTestDriver'] = true;
    }
}
