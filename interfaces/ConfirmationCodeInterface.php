<?php

declare(strict_types=1);

namespace interfaces;

// Интерфейс для работы с подтверждением по коду (SMS, email, telegram)
interface ConfirmationCodeInterface {
    public function generateConfirmationCode($userId);
    public function sendConfirmationCode($userId, $code, $confirmationMethod);
    public function verifyConfirmationCode($userId, $code);
}
