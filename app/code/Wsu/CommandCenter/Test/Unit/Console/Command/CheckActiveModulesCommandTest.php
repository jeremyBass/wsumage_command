<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Wsu\CommandCenter\Test\Unit\Console\Command;

use Symfony\Component\Console\Tester\CommandTester;
use Wsu\CommandCenter\Console\Command\CheckActiveModulesCommand;

class CheckActiveModulesCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CheckActiveModulesCommand
     */
    private $command;

    /**
     * @var \Magento\Framework\Module\ModuleListInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $moduleList;

    public function setUp()
    {
        $this->moduleList = $this->getMockForAbstractClass('Magento\Framework\Module\ModuleListInterface');
        $this->command = new CheckActiveModulesCommand($this->moduleList);
    }

    public function testExecute()
    {
        $this->moduleList->expects($this->once())->method('getNames')->willReturn([]);
        $commandTester = new CommandTester($this->command);
        $commandTester->execute([]);

        $this->assertContains('List of active modules', $commandTester->getDisplay());
    }
}
