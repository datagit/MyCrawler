<?php

namespace AppBundle\Controller;

use GuzzleHttp\RequestOptions;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DomCrawler\Crawler;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //$this->testGuzzleBundle();
        $this->testCrawler();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    private function testGuzzleBundle() {
        //https://guzzle3.readthedocs.io/http-client/client.html
        /** @var \GuzzleHttp\Client $client */
//        $client = new \GuzzleHttp\Client();
//        $res = $client->request('GET', 'https://api.github.com/user', [
//            'auth' => ['datagit', '123strong']
//        ]);
//        echo $res->getStatusCode();
//// 200
//        echo $res->getHeaderLine('content-type');
//// 'application/json; charset=utf8'
//        echo $res->getBody();
//// {"type":"User"...'
//
//// Send an asynchronous request.
//        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
//        $promise = $client->sendAsync($request)->then(function ($response) {
//            echo 'I completed! ' . $response->getBody();
//        });
//        $promise->wait();


        $client = new \GuzzleHttp\Client();

        $options = array();
        //$options[RequestOptions::TIMEOUT] = 10;

        //https://www.thegioididong.com/aj/CategoryV4/Product?Category=44&Manufacture=0&PriceRange=0&Feature=0&Property=0&OrderBy=0&PageSize=82&PageIndex=1&Others
        $res = $client->request('GET', 'https://www.thegioididong.com/laptop', $options);
        echo $res->getStatusCode();
// 200
        echo $res->getHeaderLine('content-type');
// 'application/json; charset=utf8'
        echo $res->getBody();

        //echo '<pre>';
        //print_r($res);
// {"type":"User"...'

// Send an asynchronous request.
//        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://laptopkimlong.com/');
//        $promise = $client->sendAsync($request)->then(function ($response) {
//            echo 'I completed! ' . $response->getBody();
//        });
//        $promise->wait();



    }

    private function testCrawler() {
    //https://symfony.com/doc/current/components/dom_crawler.html

    //use Symfony\Component\DomCrawler\Crawler;

        $html = <<<'HTML'
<!DOCTYPE html>
<html>
    <body>
        <div class="d1">
        <p class="message">Hello World!</p>
        <span>span1</span>
        <p>Hello Crawler!</p>
        </div>
        <div class="d2">dat</div>
        <div id="id1">datid</div>
    </body>
</html>
HTML;

        $crawler = new Crawler($html);

        //$crawler = $crawler->filterXPath('descendant-or-self::body/p');

        $crawler = $crawler->filter('div#id1');

        foreach ($crawler as $domElement) {
            var_dump($domElement->nodeName);
            var_dump($domElement->nodeValue);
        }

    }
}
