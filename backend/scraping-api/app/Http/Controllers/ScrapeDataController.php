<?php

namespace App\Http\Controllers;

use App\Models\ScrapeData;
use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;
class ScrapeDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $result = array();
        $client = new Client(HttpClient::create(['timeout' => 60]));
        $url = 'https://www.bet365.com/#/IP/B1';
        
        $page = $client->request('GET' ,$url);
        dd($client->getResponse());
        if ($client->getResponse()->getStatusCode() === 200) {
            echo $page->filter('.ovm-CompetitionHeader_Name ')->text(); //dito ko tinitesting mike
            // $page->filter('.hm-MainHeaderLHSNarrow_InPlayLabel ')->each(function ($item) {
            //     var_dump($item);
            // });
        } else {
            return 'status code: '.$client->getResponse()->getStatusCode();
        }
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScrapeData  $scrapeData
     * @return \Illuminate\Http\Response
     */
    public function show(ScrapeData $scrapeData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScrapeData  $scrapeData
     * @return \Illuminate\Http\Response
     */
    public function edit(ScrapeData $scrapeData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScrapeData  $scrapeData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScrapeData $scrapeData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScrapeData  $scrapeData
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScrapeData $scrapeData)
    {
        //
    }
}
