<?php

namespace Votifier\Client;

use Votifier\Client\Vote;

class VoteTest extends \PHPUnit_Framework_TestCase
{
    private $vote = null;

    /**
     * Setup the test enviroment.
     */
    public function setUp()
    {
        $this->vote = new Vote('play.orbitrondev.org',
                               '8192',
                               'MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCD/pOb/P36IJYGPd+4h8ltTMMDWVwiCDjJh42Tva9oEaaNlODpWVzlTLDLKUM35zNYBpwUZ4gSgXFEp18fL4jxKX2xe9frxfOjkVtLSl7x9rYI/pyBFTxtbimBdBMSOPMG+Kz9Rmog78xRBoGRuLJbtVBZjEPZppowDxX3z+0fc0myh4f2l9UuPxITRO9kyiUtFspHW1iR4w3e8K4BhCf3jIbhzWtHLvEmPmyekBq1Ot9ELenZ7dvlcFqrrHRqqWL5Bui+FswcOXwVABqPrNumBOUMqpzKPZFazh00V94RkaO7+9eI5+Q1lfUsjP3OVZIHNJKiLYg7+cCzcxGFdS/JAgMBAAECggEAax75Jpg8enllp+0hGn5Az46Dmb00032+sHdtQ+CmcRwaAj84BMj8Zi9GL6ruHXlqJt8+XiTjvrkEdsYqoYGPbsDQfHDYfEUrhKyb3c+enFovw772vp/AacMEtkXAkIJdYWQB6I7z5IUYWQ2hq+SsA1dzvSjji8j0y1oC5xn9BA7vATzXXKnhmK25V5hAXtyzKMNlmIHGjUt8wVloVD117adJANoYuMfgyE3DkdKTMX068HQqsivMYiVAU+lCHR/mKyY3ftZarit33jyAaey31XvMI0M/LCYLOqYgiUuAlAcuGrcnRIQcEbpa9+1vxlyjkfP8YPq8HMR3IIKUUy5FvQKBgQD+nsBgUfi6pQ9MWWcZLZzCNVigUtrpDBn2N9nCOActu5WE0oKHypj7k6+6D5jSe3wLx3Fedep2IEYJvpS+gDZ35zwtfj4Kcwd/NjBeOyyZQ5Q1mipMGQB7v0XznxHIPAYh78wSzCkYXW66IIux272f7+cm8wVqB0yg4OWTUTPkfwKBgQCEtbMjfxd9hYbrkOEV+vfzRS9Eh32MJD7mcrTllt+fknd/jIqS/vo65qpiN+nh0I45oTwKcXkytkKzzZUiDWISE1NSg4aiyVeKTFgEunB0M0NNrl7wNutoRCa2n1j9/yHYzTcjOhgEDv4s6zS3s6xeUWPs8+EOLOU1UrwPwbKntwKBgQDR99/0jiRq5grDj0YxwSdwD8XSEAFuBQizvkLYopNo5zPZoC78A9o8PAHBkXMYv7P/kqyulNaQKvUWvA61Oc2w+wLpER3gSBN6mBky2+FfUhc6TLNspYF8irMIv7hOQxFbkv/a0HljGklhO813EhpBdfhMakOgt/w8/rjSzzfXyQKBgC69eAxmdLWG09AfxMbjD3UkxtMSDUvQcD7l44SBMN2YznGj5CKFn0gjeZsCKmOX+p+dg/IBqTgNLUz6eS33HLVVDSGgpUisNSLGZLG1oGmsrGWtpk5gaWTdq+ziDovW0erzzBmiGldDmI3lgTm6FFlbvR/1fSxq74dqTkYWaH/dAoGBAK6oejHJJ2UztSKjVFR10ra0tARjkB6+cPSNUSBRdt2tMw76mWBLz8+Q3Ku0k8mwV+BV5Wd4LQY0JnDSnehKLhxeiUZWyOxqStXGhZ9fgJS9Zlho45bN8ePZChqAYQaEjDS0QwQAPXiwuY924cwTGEegw8G7V6IfkSUypfDbeyXQ',
                               'D3strukt0r',
                               'Votifier-PHP-Client Test',
                               '127.0.0.1');
    }

    /**
     * Teardown the test environment.
     */
    public function tearDown()
    {
        $this->vote = null;
    }

    /**
     * Test instance of $this->vote.
     *
     * @test
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf('Votifier\Client\Vote', $this->vote);
    }

    /**
     * Test vote return the value true.
     *
     * @test
     */
    public function testValidResult()
    {
        $this->assertEquals(true, $this->vote->send());
    }
}
