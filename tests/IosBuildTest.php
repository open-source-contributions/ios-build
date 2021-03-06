<?php
/**
 * This file is part of the ios-build package.
 *
 * Copyright (c) 2019, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: Besitzer
 * Date: 09.09.2018
 * Time: 09:51
 */
namespace IosBuildTest;

use IosBuild\BuildException;
use IosBuild\IosBuild;
use IosBuild\NotFoundException;
use PHPUnit\Framework\TestCase;

final class IosBuildTest extends TestCase
{
    /**
     * @var IosBuild
     */
    private $object;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new IosBuild();
    }

    /**
     * @throws NotFoundException
     * @throws BuildException
     *
     * @return void
     */
    public function testGetVersionFail(): void
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('Could not detect the version from the build');

        $this->object->getVersion('\'x\': \'123\'');
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws BuildException
     * @throws NotFoundException
     *
     * @return void
     */
    public function testGetVersion(): void
    {
        self::assertSame('12.4b3', $this->object->getVersion('16G5038d'));
    }
}
