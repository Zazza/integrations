<?php
/**
 * Created by PhpStorm.
 * User: dsamotoy
 * Date: 18.11.19
 * Time: 14:50
 */
class MailerliteTest extends \PHPUnit\Framework\TestCase
{
    public function testAddSubscriber()
    {
        // Error (Default)
        $Task = [];
        $Task['integration']['service'] = "mailerlite";
        $Task['integration']['apiKey'] = "493ede2b62a8027a21267c15c570b1b4";
        $Task['integration']['groupId'] = '14395208';
        $Task['lead']['name'] = "Вася";
        $Task['lead']['email'] = "vasya@platformalp.ru";

        $name = $Task['lead']['name'];
        $email = $Task['lead']['email'];

        $Instance = \Integration\Integration::getInstance($Task);
        $Instance->addSubscriber($name, $email);

        $result = $Instance->getResult();



        //Added Group
        $Task = [];
        $Task['integration']['service'] = "mailerlite";
        $Task['integration']['apiKey'] = "493ede2b62a8027a21267c15c570b1b4";

        $Instance = \Integration\Integration::getInstance($Task);
        $Instance->createGroup(['name' => 'New group']);

        $groupId = $Instance->getResult()->id;

        $this->assertIsInt($groupId);

        //Added subscriber to Group
        $Task = [];
        $Task['integration']['service'] = "mailerlite";
        $Task['integration']['apiKey'] = "493ede2b62a8027a21267c15c570b1b4";
        $Task['integration']['groupId'] = $groupId;
        $Task['lead']['name'] = "Вася";
        $Task['lead']['email'] = "vasya@platformalp.ru";

        $name = $Task['lead']['name'];
        $email = $Task['lead']['email'];

        $Instance = \Integration\Integration::getInstance($Task);
        $Instance->addSubscriber($name, $email);

        $this->assertIsObject($Instance->getResult());
    }
}
