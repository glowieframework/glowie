<?php
    namespace Glowie\Tests;

    use Glowie\Core\Tests\UnitTest;

    use Glowie\Models\Users;

    /**
     * Sample unit test for Glowie application.
     * @category Tests
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 1.2
     */
    class UsersModelTest extends UnitTest{

        /**
         * Model handler.
         * @var Users
         */
        private $usersModel;

        /**
         * This method will be called before any other methods from this test.
         */
        public function init(){
            $this->usersModel = new Users();
        }

        /**
         * Tests a user retrieval from the model.
         */
        public function testUserRetrieval(){
            $this->assertIsNotNull($this->usersModel->find(1));
        }

        /**
         * Tests if a specific user ID matches an expected email.
         */
        public function testEmailMatches(){
            $result = $this->usersModel->find(1);
            $this->assertEquals($result->email, 'lorem@ipsum.com');
        }

    }

?>