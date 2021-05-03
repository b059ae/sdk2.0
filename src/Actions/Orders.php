<?php

declare(strict_types=1);

namespace CdekSDK2\Actions;

use CdekSDK2\BaseTypes\Order;
use CdekSDK2\Http\ApiResponse;

/**
 * Class Orders
 * @package CdekSDK2\Actions
 */
class Orders extends ActionsWithDelete
{
    /**
     * URL для запросов к API
     * @var string
     */
    public const URL = '/orders';

    /**
     * Создание заказа
     * @param Order $order
     * @return ApiResponse
     * @throws \CdekSDK2\Exceptions\RequestException
     */
    public function add(Order $order): ApiResponse
    {
        $params = $this->serializer->toArray($order);
        return $this->preparedAdd($params);
    }

   /**
     * Получить данные по номеру заказа СДЭК e.g. 1247603110
     * @param string $cdekNumber
     * @return ApiResponse
     * @throws RequestException
     */
    public function getByNumber(string $cdekNumber): ApiResponse
    {
        return $this->http_client->get(static::URL . '?cdek_number=' . $cdekNumber);
    }
}
