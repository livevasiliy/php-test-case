<?php

declare(strict_types=1);

namespace models;

class UserSettingsModel {
    private $userId;
    private $settings;

    public function __construct($userId) {
        $this->userId = $userId;
        $this->settings = array();
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getSettings() {
        return $this->settings;
    }

    public function setSettings($settings) {
        $this->settings = $settings;
    }

    public function addSetting($key, $value) {
        $this->settings[$key] = $value;
    }

    public function getSetting($key) {
        return $this->settings[$key] ?? null;
    }
}
