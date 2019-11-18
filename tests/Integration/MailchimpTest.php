<?php
/**
 * Created by PhpStorm.
 * User: dsamotoy
 * Date: 18.11.19
 * Time: 14:50
 */
class MailchimpTest extends \PHPUnit\Framework\TestCase
{
    public function testAddSubscriber()
    {
        //Added subscriber to Group
        $Task = [];
        $Task['integration']['service'] = "mailchimp";
        $Task['integration']['apiKey'] = "33f401b170e95096e9169206b229793d-us13";
        $Task['integration']['listId'] = '341781';
        $Task['lead']['name'] = "Петр";
        $Task['lead']['email'] = "petr@platformalp.ru";

        $name = $Task['lead']['name'];
        $email = $Task['lead']['email'];

        $Instance = \Integration\Integration::getInstance($Task);
        $Instance->createGroup(['name' => 'New group']);
        $Instance->addSubscriber($name, $email);
        print_r($Instance->getResult());

        //$this->assertEquals($Instance->getCode(), 200);
        //$this->assertIsObject($Instance->getResult());
    }
}
