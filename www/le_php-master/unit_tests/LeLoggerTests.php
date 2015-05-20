<?php

	class LeLoggerTest extends PHPUnit_Framework_TestCase
	{
		/**
		 *	@expectedException PHPUnit_Framework_Error_Warning
		 */
		public function testOneParameter()
		{
			$this->assertNotInstanceOf('LeLogger.php', LeLogger::getLogger('token'));
		}

		/**
		 *  @expectedException PHPUnit_Framework_Error_Warning
		 */
		public function testTwoParameter()
		{
			$this->assertNotInstanceOf('LeLogger', LeLogger::getLogger('token', false));
		}

		/**
		 *  @expectedException PHPUnit_Framework_Error_Warning
		 */
		public function testThreeParameter()
		{
			$this->assertNotInstanceOf('LeLogger', LeLogger::getLogger('token', false, false));
		}

		public function testAllParameters()
		{
			$this->assertInstanceOf('LeLogger', LeLogger::getLogger('token', false, false, LOG_DEBUG, false, "", 10000, "", "", false));

		}

		public function testIsPersistent()
		{
			$log = LeLogger::getLogger('token', false, true, LOG_DEBUG, false, "", 10000, "", "", false);

			$this->assertFalse($log->isPersistent());

			$this->tearDown();

			$log = LeLogger::getLogger('token', true, true, LOG_DEBUG, false, "", 10000, "", "", false);

			$this->assertTrue($log->isPersistent());
		}

		public function testIsTLS()
		{
			$log = LeLogger::getLogger('token',false,false, LOG_DEBUG, false, "", 10000, "", "", false);

			$this->assertFalse($log->isTLS());

			$this->tearDown();

			$log = LeLogger::getLogger('token', true, true, LOG_DEBUG, false, "", 10000, "", "", false);

			$this->assertTrue($log->isTLS());
		}

		public function testGetPort()
		{

			$log = LeLogger::getLogger('token', true, false, LOG_DEBUG, false, "",  10000, "", "", false);


			$this->assertEquals(10000, $log->getPort());

			$this->tearDown();

			$log = LeLogger::getLogger('token', true, true, LOG_DEBUG, false, "", 10000, "", "", false);

			$this->assertEquals(20000, $log->getPort());
		}

		public function testGetAddress()
		{
			$log = LeLogger::getLogger('token', true, false, LOG_DEBUG, false, "", 10000, "", "", false);

			$this->assertEquals('tcp://api.logentries.com', $log->getAddress());

			$this->tearDown();
			$log = LeLogger::getLogger('token', true, true, LOG_DEBUG, false, "", 10000, "", "", false);


			$this->assertEquals('tls://api.logentries.com', $log->getAddress());
		}

		public function tearDown()
		{
			LeLogger::tearDown();
		}
	}	
?>
