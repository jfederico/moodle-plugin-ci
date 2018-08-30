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

namespace Moodlerooms\MoodlePluginCI\Tests\PluginValidate;

use Moodlerooms\MoodlePluginCI\PluginValidate\Plugin;
use Moodlerooms\MoodlePluginCI\PluginValidate\Requirements\QuestionRequirements;
use Moodlerooms\MoodlePluginCI\PluginValidate\Requirements\RequirementsResolver;

class QuestionRequirementsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var QuestionRequirements
     */
    private $requirements;

    protected function setUp()
    {
        $this->requirements = new QuestionRequirements(new Plugin('qtype_calculated', 'qtype', 'calculated', ''), 29);
    }

    protected function tearDown()
    {
        $this->requirements = null;
    }

    public function testResolveRequirements()
    {
        $resolver = new RequirementsResolver();

        $this->assertInstanceOf(
            'Moodlerooms\MoodlePluginCI\PluginValidate\Requirements\QuestionRequirements',
            $resolver->resolveRequirements(new Plugin('', 'qtype', '', ''), 29)
        );
    }

    public function testGetRequiredPrefixes()
    {
        $fileTokens = $this->requirements->getRequiredTablePrefix();
        $this->assertInstanceOf('Moodlerooms\MoodlePluginCI\PluginValidate\Finder\FileTokens', $fileTokens);
        $this->assertSame('db/install.xml', $fileTokens->file);
    }
}
