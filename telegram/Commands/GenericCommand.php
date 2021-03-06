<?php

namespace Longman\TelegramBot\Commands\UserCommand;

use Fenris\Bot\Help;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;

/**
 * Обработка любой ненайденной команды
 *
 * @package Longman\TelegramBot\Commands\UserCommand
 */
class GenericCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'generic';

    /**
     * @var string
     */
    protected $description = 'Handles generic commands or is executed by default when a command is not found';

    /**
     * @var string
     */
    protected $version = '0';

    /**
     * Исполняющий метод
     *
     * @return ServerResponse
     * @throws TelegramException
     */
    public function execute(): ServerResponse
    {
        return $this->generalAnswer();
    }

    /**
     * Исполняющий метод
     *
     * @return ServerResponse
     * @throws TelegramException
     */
    public function executeNoDb(): ServerResponse
    {
        return $this->generalAnswer();
    }

    /**
     * Общий ответ для методов
     *
     * @return ServerResponse
     * @throws TelegramException
     */
    private function generalAnswer(): ServerResponse
    {
        return $this->replyToChat(
            "Команда не найдена 😢 \nОбратитесь к справке /help",
            ['reply_markup' => Help::getHelpBtn()]
        );
    }
}
