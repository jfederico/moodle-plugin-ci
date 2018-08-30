<?php

/*
 * This file is part of the Moodle Plugin CI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Copyright (c) 2017 Blackboard Inc. (http://www.blackboard.com)
 * License http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace Moodlerooms\MoodlePluginCI\PluginValidate\Requirements;

use Moodlerooms\MoodlePluginCI\PluginValidate\Finder\FileTokens;

/**
 * Authentication plugin requirements.
 */
class AuthRequirements extends GenericRequirements
{
    public function getRequiredFiles()
    {
        return array_merge(parent::getRequiredFiles(), [
            'auth.php',
        ]);
    }

    public function getRequiredClasses()
    {
        return [
            FileTokens::create('auth.php')->mustHave('auth_plugin_'.$this->plugin->name),
        ];
    }
}
