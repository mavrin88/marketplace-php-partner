<?php

namespace Yandex\Marketplace\Partner\Clients;

use Yandex\Marketplace\Partner\Models\Response\StocksResponse;

class StocksClient extends Client
{
    /**
     * Requests information stocks
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-stocks-docpage/
     *
     * @param $response
     * @return StocksResponse
     */
    public function getStocks($response)
    {
        $decodedResponseBody = $this->getDecodedBody($response);

        return new StocksResponse($decodedResponseBody);
    }
    
        /**
     * Update stocks
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/put-campaigns-id-offers-stocks.html
     *
     * @param $params
     * @return PostResponse
     */
    public function updateStocks($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/offers/stocks.json';
        $response = $this->sendRequest(
            'PUT',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }
}
