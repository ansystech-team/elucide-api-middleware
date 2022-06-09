<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ElucideAPIService {
    
    protected const baseUrl = 'https://api.dev.elucidate.co';
    protected $client;

    public function __construct()
    {
        $this->client =  Http::withHeaders([
            'Authorization' => 'Bearer ' . env('ELUCIDE_TOKEN', null)
        ])->baseUrl(self::baseUrl);
    }

    /**
     * Search for institution
     * 
     * @param $query
     * @return Response
     */
    public function searchInstitution(string $query)
    {
        $url = '/institutions?fullSearch=' . $query;
        $response = $this->client->get($url);
        $data = $response->json();

        return Arr::get($data, 'hydra:totalItems', 0);
    }

    /**
     * Create a ticket for inextant 
     * institution
     * 
     * @param array $data
     * 
     * @return bool
     */
    public function createTicket(array $data): bool
    {
        if (!Arr::exists($data, 'institution') || !Arr::exists($data, 'date')) {
            return false;
        }

        $url = '/tickets';
        $response = $this->client->post($url, [
            "project" => "projects/2a9caad1-19c7-4340-949f-30b81a8a043e",  
            "title" => "missing Institution " . $data['institution'],  
            "description" => "add Institution " . $data['institution'],  
            "createdAt" => $data['date'],  
            "updatedAt" => $data['date'] 
        ]);

        return $response->ok();
    }
}
