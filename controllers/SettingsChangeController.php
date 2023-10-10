<?php

declare(strict_types=1);

namespace controllers;

use interfaces\SettingsChangeRequestInterface;
use interfaces\ConfirmationCodeInterface;

class SettingsChangeController {
    private SettingsChangeRequestInterface $settingsChangeRequestInterface;
    private ConfirmationCodeInterface $confirmationCodeInterface;

    public function __construct($settingsChangeRequestInterface, $confirmationCodeInterface) {
        $this->settingsChangeRequestInterface = $settingsChangeRequestInterface;
        $this->confirmationCodeInterface = $confirmationCodeInterface;
    }

    public function changeSettings($userId, $newSettings, $confirmationMethod) {
        $confirmationCode = $this->confirmationCodeInterface->generateConfirmationCode($userId);
        if ($this->confirmationCodeInterface->sendConfirmationCode($userId, $confirmationCode, $confirmationMethod)) {
            return $this->settingsChangeRequestInterface->requestSettingsChange($userId, $newSettings, $confirmationMethod);
        } else {
            return "Failed to send confirmation code.";
        }
    }
}
