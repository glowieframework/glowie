<?php
    namespace Glowie\Tests;

    use Glowie\Core\UnitTest;

    use Glowie\Models\Users;

    /**
     * Sample unit test for Glowie application.
     * @category Tests
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 1.0
     */
    class UsersModelTest extends UnitTest{
        
        /**
         * Tests a user retrieval from the model.
         */
        public function testUserRetrieval(){
            $model = new Users();
            $this->isNotNull($model->find(1));
        }

        /**
         * Tests if a specific user ID matches an expected email.
         */
        public function testEmailMatches(){
            $model = new Users();
            $result = $model->find(1);
            $this->equals($result->email, 'lorem@ipdsum.com');
        }

    }

?>