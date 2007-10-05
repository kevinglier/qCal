<?php

require_once 'qCal.php';
require_once 'qCal/Property/calscale.php';

Mock::Generate('qCal');
Mock::Generate('qCal_Property_MultipleValue');

class MockqCal_Property_Abstract extends qCal_Property_Abstract
{
    protected $_name = 'QCALTESTPROPERTY';
    public function evaluateIsValid()
    {
        return true;
    }
    public function format($value)
    {
        return $value;
    }
}

function d($val)
{
    echo "<pre>";
    echo htmlentities(var_dump($val));
    echo "</pre>";
}

class TestOfqCalCore extends UnitTestCase
{
/*
    public function testqCalIsAComponent()
    {
        $cal = new qCal();
        $this->assertIsA($cal, 'qCal_Component_Abstract');
    }
    public function testqCalDefaults()
    {
        $cal = new qCal();
        $version = (string) $cal->getProperty('version');
        $prodid = (string) $cal->getProperty('prodid');
        d($cal);
        $this->assertEqual($version, '2.0');
        $this->assertEqual($prodid, '-//MC2 Design Group, Inc.//qCal v' . qCal::VERSION . '//EN');
    }*/
    public function testAddExistingNonMultiplePropertyThrowsException()
    {
        $prodid = 'PRODID';
        $cal = new qCal();
        $property = new MockqCal_Property_Abstract();
        
        $this->expectException(new qCal_Component_Exception('Property ' . $property->getName() . ' may not be set on a VCALENDAR component'));
        // should throw an exception because prodid is already set (by default)
        $cal->addProperty($property);
    }/*
    public function testAddProperty()
    {
        $value = 'value';
        $cal = new qCal();
        
        $cal->addProperty(new qCal_Property_calscale($value));
        $calscale = (string) $cal->getProperty('calscale');
        //$this->assertEqual($calscale, $value);
        
        $cal->addProperty('prodid', $value);
        $prodid = (string) $cal->getProperty('prodid');
        //$this->assertEqual($prodid, $value);
    }
    public function testqCalSerialize()
    {
    }
    public function testSendsRightContentType()
    {
    }
    // @todo: check that it is a requirement to have at least one component... I think it is - luke
    public function testToStringFailsWithoutAnyComponents()
    {
    }
    public function testCannotAddInvalidComponents()
    {
        $value = 'value';
        $cal = new qCal();
        
        $cal->addProperty('invalid', $value);
        $this->expectException();
    }
    public function testCanAddValidComponents()
    {
    }
    public function testRemoveComponents()
    {
    }
    public function testEditComponent()
    {
    }
    public function testCannotAddInvalidProperties()
    {
    }
    public function testCanAddValidProperties()
    {
    }
    public function testRemoveProperties()
    {
    }
    public function testEditProperties()
    {
    }*/
}