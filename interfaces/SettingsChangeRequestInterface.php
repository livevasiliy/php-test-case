<?php

declare(strict_types=1);

namespace interfaces;

use models\UserSettingsModel;

// Интерфейс для запроса на изменение настроек пользователя
interface SettingsChangeRequestInterface {
    public function requestSettingsChange(int $userId, UserSettingsModel $newSettings, string $confirmationMethod);
}
